<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSectionImage;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class HomeController extends Controller
{
    public function home(){

        $sliders=Slider::all();
        $cats=Category::all();
        $recent_product = session()->get('recent_product', []);

        $recent_products=Product::whereIn('id',$recent_product)->take(4)->get();
        $images=HomeSectionImage::all();

        return view('frontend.home', compact('sliders','cats','recent_products','images'));
    }
}
