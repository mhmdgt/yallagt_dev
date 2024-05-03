<?php

namespace App\Http\Controllers\Gt_manager\Blog;

use App\Traits\SlugTrait;
use App\Traits\ImageTrait;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\GtManager\Blog\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    use SlugTrait,ImageTrait;
    // -------------------- Method -------------------- //
    public function index()
    {
        $categories=BlogCategory::paginate(10);
        return view('gt-manager.pages.blogs.blog_categories.index',compact('categories'));
    }
    // -------------------- Method -------------------- //
    public function store(BlogCategoryRequest $request)
    {
        BlogCategory::create([
            'name' => [ 'en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'image' => $request->hasFile('image') ? $this->uploadImage($request->image, 'media/blog_categories' ,$request->name_en) : null,
        ]);

        Session::flash('success', 'Stored Successfully');
        return back();
    }
    // -------------------- Method -------------------- //
    public function update(BlogCategoryRequest $request, string $slug)
    {
        $category=BlogCategory::getByTranslatedSlug($slug)->first();
        $category->update([
            'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
            'slug'=>$this->slug(['en'=>$request->name_en,'ar'=>$request->name_ar]),
            'image' => $request->hasFile('image') ? $this->uploadImage($request->image, 'media/blog_categories' ,$request->name_en, $category->image) : $category->logo,
        ]);
        Session::flash('success', 'Updated Successfully');
        return back();
    }
    // -------------------- Method -------------------- //
    public function destroy(string $slug)
    {
        $category=BlogCategory::getByTranslatedSlug($slug)->first();
        $this->deleteImage($category->image);
        $category->delete();

        Session::flash('success', 'Updated Successfully');
        return back();
    }
}
