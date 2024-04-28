<?php

namespace App\Http\Controllers\Gt_manager\Blog;

use App\Models\Blog;
use App\Traits\DomTrait;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Traits\GetModelTrait;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
   use GetModelTrait,DomTrait;
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = $this->getModel(BlogCategory::class,['id','name']);
        return view('gt-manager.pages.blogs.blog.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Blog::create([
            'title'=>['en'=>$request->title_en,'ar'=>$request->title_ar],
            'slug'=>$this->slug(['en'=>$request->title_en,'ar'=>$request->title_ar]),
            'blog_category_id'=>$request->blog_category_id,
            'brand_model_id'=>$request->brand_model_id?? null,
            'content'=>$request->content
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
