<?php

namespace App\Http\Controllers\Gt_manager\Blog;

use App\Models\Tag;
use App\Models\Blog;
use App\Models\CarBrand;
use App\Models\FuelType;
use App\Traits\DomTrait;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Traits\GetModelTrait;
use App\Models\EngineAspiration;
use App\Models\TransmissionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\GtManager\Blog\BlogRequest;
use App\Traits\SlugTrait;

class BlogController extends Controller{

   use GetModelTrait,DomTrait,SlugTrait;


    // -------------------- Method -------------------- //
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('gt-manager.pages.blogs.blog.index',compact('blogs'));
    }

    // -------------------- Method -------------------- //
    public function create()
    {
        $categories = BlogCategory::latest()->get();

        return view('gt-manager.pages.blogs.blog.create',
        compact('categories'));
    }
    // -------------------- Method -------------------- //

    public function store(BlogRequest $request)
    {
       
        $blog=Blog::create([
            'title'=>['en'=>$request->title_en,'ar'=>$request->title_ar],
            'slug'=>$this->slug(['en'=>$request->title_en,'ar'=>$request->title_ar]),
            'blog_category_id'=>$request->blog_category_id,
            'description'=>['en'=>$request->description_en,'ar'=>$request->description_ar],
        ]);

        $tags= explode(',', $request->tags);
        
        foreach ($tags as $tag) {
            $existTag=Tag::where('name',$tag)->first();
            if($existTag){
                $blog->tags()->attach($existTag->id);
            }else{
                $newTag=Tag::create(['name'=>$tag]);
                $blog->tags()->attach($newTag->id);
            }
        }
        return redirect()->route('blogs.index')->with('success', 'Blog Created Successfully');
    }
    // -------------------- Method -------------------- //
    public function show(string $id)
    {
        //
    }
    // -------------------- Method -------------------- //
    public function edit(string $id)
    {
        //
    }
    // -------------------- Method -------------------- //
    public function update(Request $request, string $id)
    {
        //
    }
    // -------------------- Method -------------------- //
    public function destroy(string $id)
    {
        //
    }
}
