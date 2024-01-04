<?php

namespace App\Http\Controllers;

use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Image;

class HomeSlideController extends Controller
{
    public function homeSlideEdit()
    {
        $data = HomeSlide::find(1);
        return view('admin.homeSlider.edit',compact('data'));
    }

    public function homeSlideupdate(Request $request)
    {
        $id = $request->id;

        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(636,852)->save('upload/home_slide_image/'.$name_gen);

            $save_url = 'upload/home_slide_image/'.$name_gen;

            HomeSlide::findOrFail($id)->update([
                'title' => $request->title,
                'short_disc' => $request->short_disc,
                'video_url' => $request->video_url,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Home Slide updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);  
            
        }else{
            HomeSlide::findOrFail($id)->update([
                'title' => $request->title,
                'short_disc' => $request->short_disc,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slide updated without image successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);  
        }
    }
}
