<?php

namespace App\Http\Controllers\Gt_manager\Blog;

use App\Traits\SlugTrait;
use App\Traits\ImageTrait;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GtManager\Blog\BlogCategoryRequest;

class BlogCategoryController extends Controller
{
    use SlugTrait,ImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=BlogCategory::paginate(10);
        return view('gt-manager.pages.blogs.blog_categories.index',compact('categories'));
    }

   
    public function store(BlogCategoryRequest $request)
    {
        
       
        
        // dd($request->all());
        BlogCategory::create([
            'name' => [
                'en' => $request->name_en,
                'ar' => $request->name_ar
            ],
            'slug' => $this->slug(['en' => $request->name_en, 'ar' => $request->name_ar]),
            'image' => $request->hasFile('image') ? $this->uploadImage($request->image, 'blog_categories', $request->name_en) : null
        ]);
        
        return back()->with('success', 'Blog Category Created Successfully');
    }

   
    public function update(BlogCategoryRequest $request, string $slug)
    {
        $category=BlogCategory::getByTranslatedSlug($slug)->first();
        $category->update([
            'name'=>['en'=>$request->name_en,'ar'=>$request->name_ar],
            'slug'=>$this->slug(['en'=>$request->name_en,'ar'=>$request->name_ar]),
            'image'=>$request->hasFile('image')?$this->uploadImage($request->image,'blog_categories',$request->name_en,$category->image):$category->image
        ]);
        return back()->with('success', 'Blog Category Updated Successfully');
    }

   
    public function destroy(string $slug)
    {
        $category=BlogCategory::getByTranslatedSlug($slug)->first();
        $this->deleteImage($category->image);
        $category->delete();
        return back()->with('success', 'Blog Category Deleted Successfully');
    }
}
