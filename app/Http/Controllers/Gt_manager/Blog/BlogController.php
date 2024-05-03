<?php

namespace App\Http\Controllers\Gt_manager\Blog;

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

class BlogController extends Controller{

   use GetModelTrait,DomTrait;


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
        $brands = CarBrand::latest()->get();
        $carBrand = new CarBrand();
        $models = $carBrand->getAllModels();
        $transmissionTypes = TransmissionType::all();
        $EngineAspirations = EngineAspiration::all();
        $FuelTypes = FuelType::all();

        return view('gt-manager.pages.blogs.blog.create',
        compact('categories' , 'brands' , 'models' , 'transmissionTypes' , 'EngineAspirations' , 'FuelTypes'));
    }
    // -------------------- Method -------------------- //

    public function store(BlogRequest $request)
    {
        Blog::create([
            'title'=>['en'=>$request->title_en,'ar'=>$request->title_ar],
            'slug'=>$this->slug(['en'=>$request->title_en,'ar'=>$request->title_ar]),
            'blog_category_id'=>$request->blog_category_id,
            'brand_model_id'=>$request->brand_model_id?? null,
            'description'=>['en'=>$request->description_en,'ar'=>$request->description_ar],
        ]);
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
