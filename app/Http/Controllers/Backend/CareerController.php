<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Career;
use File;

class CareerController extends Controller
{
    public function index()
    {
        $career_info = Career::first();
        return view('backend.career.career', compact('career_info'));
    }

    public function store(Request $request)
    {
        $data = [];
        $data['cover_image_caption'] = $request->cover_image_caption;
        $data['career_one_title'] = $request->career_one_title;
        $data['career_one_desc'] = $request->career_one_desc;
        $data['career_two_title'] = $request->career_two_title;
        $data['career_two_desc'] = $request->career_two_desc;        
        $data['career_three_title'] = $request->career_three_title;
        $data['career_three_desc'] = $request->career_three_desc;       
        $data['career_four_title'] = $request->career_four_title;
        $data['career_four_desc'] = $request->career_four_desc;        
        $data['career_five_title'] = $request->career_five_title;
        $data['career_five_desc'] = $request->career_five_desc;

        $career_info = Career::first();

        if($request->hasFile('cover_image'))
        {
            $path = public_path('frontend/img/updated/'.$career_info->cover_image);
            if(file_exists($path))
            {
                File::delete($path);
            }
            $cover_image = $request->cover_image;
            $new_name = rand().".".$cover_image->extension();
            $cover_image->move('public/frontend/img/updated', $new_name);
            $data['cover_image'] = $new_name;
        }
        if($request->hasFile('career_img_one'))
        {
            $path = public_path('frontend/img/updated/'.$career_info->career_img_one);
            if(file_exists($path))
            {
                File::delete($path);
            }
            
            $cover_image = $request->career_img_one;
            $new_name = rand().".".$cover_image->extension();
            $cover_image->move('public/frontend/img/updated', $new_name);
            $data['career_img_one'] = $new_name;
        }
        if($request->hasFile('career_img_two'))
        {
            $path = public_path('frontend/img/updated/'.$career_info->career_img_two);
            if(file_exists($path))
            {
                File::delete($path);
            }

            $cover_image = $request->career_img_two;
            $new_name = rand().".".$cover_image->extension();
            $cover_image->move('public/frontend/img/updated', $new_name);
            $data['career_img_two'] = $new_name;
        } 
        if($request->hasFile('career_img_three'))
        {
            $path = public_path('frontend/img/updated/'.$career_info->career_img_three);
            if(file_exists($path))
            {
                File::delete($path);
            }

            $cover_image = $request->career_img_three;
            $new_name = rand().".".$cover_image->extension();
            $cover_image->move('public/frontend/img/updated', $new_name);
            $data['career_img_three'] = $new_name;
        }
        if($request->hasFile('career_img_four'))
        {
            $path = public_path('frontend/img/updated/'.$career_info->career_img_four);
            if(file_exists($path))
            {
                File::delete($path);
            }

            $cover_image = $request->career_img_four;
            $new_name = rand().".".$cover_image->extension();
            $cover_image->move('public/frontend/img/updated', $new_name);
            $data['career_img_four'] = $new_name;
        }
        if($request->hasFile('career_img_five'))
        {
            $path = public_path('frontend/img/updated/'.$career_info->career_img_five);
            if(file_exists($path))
            {
                File::delete($path);
            }

            $cover_image = $request->career_img_five;
            $new_name = rand().".".$cover_image->extension();
            $cover_image->move('public/frontend/img/updated', $new_name);
            $data['career_img_five'] = $new_name;
        }

        Career::whereId(1)->update($data);

        return back()->with(['success' => 'Career page content updated']);
    }
}
