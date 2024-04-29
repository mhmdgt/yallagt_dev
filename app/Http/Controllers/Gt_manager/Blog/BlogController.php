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

class BlogController extends Controller
{

    // -------------------- Method -------------------- //
    public function index()
    {
        //
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
