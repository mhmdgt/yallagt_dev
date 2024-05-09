<?php

namespace App\Http\Controllers\Gt_manager\Blog;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\CarBrand;
use App\Models\FuelType;
use App\Models\BlogImage;
use App\Traits\SlugTrait;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use App\Models\EngineAspiration;
use App\Models\TransmissionType;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Drivers\Imagick\Driver;

class BlogController extends Controller
{
    use SlugTrait;

    // -------------------- Method -------------------- //
    public function index()
    {
        $blogs = Blog::with('category')->latest()->get();
        $categories = BlogCategory::latest()->get();
        return view('gt-manager.pages.blogs.blog.index', compact('blogs', 'categories'));
    }

    // -------------------- Method -------------------- //
    public function create()
    {
        $categories = BlogCategory::latest()->get();

        return view('gt-manager.pages.blogs.blog.create',
            compact('categories', 'brands', 'models', 'transmissionTypes', 'EngineAspirations', 'FuelTypes'));
    }
    // -------------------- Method -------------------- //
    public function blogTmpUpload(Request $request)
    {
        if ($request->has('image')) {
            $image = $request->image;

            // Convert to Jpeg
            $manager = new ImageManager(new Driver());
            $imageMngr = $manager->read($image);
            $encoded = $imageMngr->toJpeg(80); // Intervention\Image\EncodedImage

            // Image new name
            $fileName = 'BLOG-' . bin2hex(random_bytes(16)) . '.jpg';

            // Save image to storage
            Storage::disk('public')->put('/filepond-tmp/blog_imgs/' . $fileName, $encoded);

            // Save to DB
            TemporaryFile::create([
                'name' => $fileName,
            ]);

            return $fileName;
        } else {
            return response()->json(['error' => 'saving failed'], 400);
        }
    }
    // -------------------- Method -------------------- //
    public function blogTmpDelete(Request $request)
    {
        $temporaryImages = TemporaryFile::Where('name', $request->getContent())->first();
        if ($temporaryImages) {
            Storage::delete('filepond-tmp/blog_imgs/' . $temporaryImages->name);
            $temporaryImages->delete();
            return 'Done!';
        } else {
            return response()->json(['error' => 'deleting file failed'], 400);
        }
    }
    // -------------------- Method -------------------- //

    public function store(BlogRequest $request)
    {
        $temporaryImages = TemporaryFile::all();
        $firstImage = 1;
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
        ]);
        // Check the Validation
        if ($validator->fails()) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::delete('filepond-tmp/product_imgs/' . $temporaryImage->name);
                $temporaryImage->delete();
            }
            return redirect()->back()->withErrors($validator->errors());
        }
        // Create the blog
        $blog = Blog::create([
            'blog_category_id' => $request->blog_category_id,
            'title' => ['en' => $request->title_en, 'ar' => $request->title_ar],
            'slug' => $this->slug(['en' => $request->title_en, 'ar' => $request->title_ar]),
            'content' => ['en' => $request->content_en, 'ar' => $request->content_ar],
        ]);
        // store images into stock car images table
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/blog_imgs/' . $temporaryImage->name,
                'media/blog_imgs/' . $temporaryImage->name);

            BlogImage::create([
                'blog_id' => $blog->id,
                'name' => $temporaryImage->name,
                'main_img' => $firstImage ? '1' : '0', // Set main_img to 1 for the first image, 0 for others
            ]);

            $firstImage = false; // Set the flag to false after the first iteration

            Storage::delete('filepond-tmp/blog_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }
        // Redirect or return a response
        Session::flash('success', 'Stored Successfully');
        return redirect()->route('blogs.index');
    }
    // -------------------- Method -------------------- //
    public function edit($slug)
    {
        $blog = Blog::getByTranslatedSlug($slug)->first();
        $images = $blog->images;
        $categories = BlogCategory::latest()->get();
        $brands = CarBrand::latest()->get();
        $carBrand = new CarBrand();
        $models = $carBrand->getAllModels();
        $transmissionTypes = TransmissionType::all();
        $EngineAspirations = EngineAspiration::all();
        $FuelTypes = FuelType::all();

        return view('gt-manager.pages.blogs.blog.edit',
            compact('blog', 'categories', 'brands', 'models', 'transmissionTypes', 'EngineAspirations', 'FuelTypes'));
    }
    // -------------------- Method -------------------- //
    public function update(Request $request, $slug)
    {
        $temporaryImages = TemporaryFile::all();
        $blog = Blog::getByTranslatedSlug($slug)->first();
        $category = BlogCategory::find($request->blog_category_id);
        // Handle case where product is not found
        if (!$blog) {
            return redirect()->back()->withErrors(['Blog not found.']);
        }
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'blog_category_id' => 'required|exists:blog_categories,id',
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'main_img' => 'required', // Ensure main_img is present
        ]);
        // Check the Validation
        if ($validator->fails()) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::delete('filepond-tmp/blog_imgs/' . $temporaryImage->name);
                $temporaryImage->delete();
            }
            return redirect()->back()->withErrors($validator->errors());
        }
        // Update the blog
        $blog->update([
            'title' => ['en' => $request->title_en, 'ar' => $request->title_ar],
            'slug' => $this->slug(['en' => $request->title_en, 'ar' => $request->title_ar]),
            'blog_category_id' => $request->blog_category_id,
            'content' => ['en' => $request->content_en, 'ar' => $request->content_ar],
            'status' => $request->status,
        ]);
        // Deleted removed images and leave only stayed images into the update request
        if ($request->has('images')) {
            // Get the list of image names from the request
            $requestedImageNames = collect($request->images)->pluck('name')->toArray();

            // Find the existing images associated with the stock car
            $existingImages = $blog->images;

            // Store the main image ID before removal
            $mainImageId = null;
            foreach ($existingImages as $image) {
                if ($image->main_img === '1') {
                    $mainImageId = $image->id;
                    break;
                }
            }

            // Determine which images should be removed
            $imagesToRemove = [];
            foreach ($existingImages as $image) {
                if (!in_array($image->name, $requestedImageNames)) {
                    $imagesToRemove[] = $image->id;
                }
            }

            // Remove the images that are not included in the request
            $blog->images()->whereIn('id', $imagesToRemove)->delete();

            // Update the names of the existing images
            foreach ($request->images as $imageData) {
                $imageName = $imageData['name'];
                $blog->images()->where('name', $imageName)->update(['name' => $imageName]);
            }

            // If no new main image is selected, retain the existing main image
            if ($mainImageId) {
                $blog->images()->where('id', $mainImageId)->update(['main_img' => '1']);
            }

            // Update the main_img value
            if (!$request->has('main_img')) {
                // Check if there are images in the request
                if (!empty($request->images)) {
                    // Get the ID of the first image in the request
                    $newMainImageId = key($request->images);
                } else {
                    // No images in the request, set main_img to null
                    $newMainImageId = null;
                }
            } else {
                $newMainImageId = $request->main_img;
            }

            // If main_img is null, set it to the ID of the first image in the request
            if ($newMainImageId === null && isset($request->images[0])) {
                $newMainImageId = $request->images[0]['id'];
            }

            // Reset main_img to 0 for all images except the new main image
            $blog->images()->where('id', '!=', $newMainImageId)->update(['main_img' => '0']);

            // Set the new main_img value to 1 for the image with the new main image ID
            $blog->images()->where('id', $newMainImageId)->update(['main_img' => '1']);

        }
        // Store new images
        foreach ($temporaryImages as $temporaryImage) {
            Storage::copy('filepond-tmp/blog_imgs/' . $temporaryImage->name,
                'media/blog_imgs/' . $temporaryImage->name);

            // Skip setting the main_img value if it's explicitly provided in the request
            if (!$request->has('main_img')) {
                $mainImageId = $temporaryImage->id; // Assuming $temporaryImage->id is the ID of the newly added image
            }

            BlogImage::create([
                'blog_id' => $blog->id,
                'name' => $temporaryImage->name,
                'main_img' => "0",
            ]);

            Storage::delete('filepond-tmp/blog_imgs/' . $temporaryImage->name);
            $temporaryImage->delete();
        }

        Session::flash('success', 'Updated Successfully');
        return redirect()->route('blogs.index');
    }
    // -------------------- Method -------------------- //
    public function destroy($slug)
    {
        $blog = Blog::getByTranslatedSlug($slug)->first();
        $blog->delete();
        Session::flash('success', 'Deleted Successfully');
        return redirect()->route('blogs.index');
    }
}
