<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{

    public function index()
    {
        $data = About::findOrFail(1);
        return view('frontend.page.about', compact('data'));
    }

    public function aboutPageEdit()
    {
        $data = About::find(1);
        return view('admin.aboutPage.edit', compact('data'));
    }

    public function aboutPageupdate(Request $request)
    {
        $id = $request->id;

        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(523,605)->save('upload/home_about_image/'.$name_gen);
            $save_url = 'upload/home_about_image/'.$name_gen;

            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_disc' => $request->short_disc,
                'long_disc' => $request->long_disc,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'About Page updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);  
            
        }else{
            About::findOrFail($id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_disc' => $request->short_disc,
                'long_disc' => $request->long_disc,
            ]);

            $notification = array(
                'message' => 'About Page updated without image successfully.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);  
        }
    }

    public function aboutMultiImage()
    {
        return view('admin.aboutPage.multi_image');
    }

    public function aboutMultiImageStore(Request $request)
    {
        $images = $request->file('multi_image');
        foreach ($images as $image) {
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now(),
            ]);

        }

        $notification = array(
            'message' => 'Multi Imaages inserted updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);  
    }

    public function aboutAllMultiImage()
    {
        $data = MultiImage::all();
        return view('admin.aboutPage.multi_image_index', compact('data'));
    }

    public function aboutMultiImageEdit($id)
    {
        $data = MultiImage::findOrFail($id);
        return view('admin.aboutPage.multi_image_edit',compact('data'));
    }

    public function aboutMultiImageUpdate(Request $request)
    {
        $id = $request->id;

        if($request->file('multi_image')){
            $image = $request->file('multi_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(220,220)->save('upload/multi/'.$name_gen);
            $save_url = 'upload/multi/'.$name_gen;

            MultiImage::findOrFail($id)->update([
                'multi_image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Multi Image updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('multi.image.index')->with($notification);  
            
        }
    }

    public function aboutMultiImageDestroy($id)
    {
        $data = MultiImage::findOrFail($id);
        $img = $data->multi_image;
        unlink($img);

        MultiImage::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Multi Image deleted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);   

    }
}
