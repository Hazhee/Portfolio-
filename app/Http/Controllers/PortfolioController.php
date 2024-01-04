<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class PortfolioController extends Controller
{
    public function index()
    {
        $data = Portfolio::latest()->get();
        return view('admin.portfolio.index',compact('data'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'title' =>'required',
            'disc' =>'required',
            'image' =>'required',
            'created_at' => Carbon::now(),
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(1020,520)->save('upload/portfolios/'.$name_gen);

        $save_url = 'upload/portfolios/'.$name_gen;

        Portfolio::insert([
            'name' => $request->name,
            'title' => $request->title,
            'disc' => $request->disc,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Portfolio created successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('portfolio.index')->with($notification);  
    }

    public function edit($id)
    {
        $data = Portfolio::findOrFail($id);
        return view('admin.portfolio.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(1020,520)->save('upload/portfolios/'.$name_gen);

            $save_url = 'upload/portfolios/'.$name_gen;

            Portfolio::findOrFail($id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'disc' => $request->disc,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Portfolio updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('portfolio.index')->with($notification);  
            
        }else{
            Portfolio::findOrFail($id)->update([
                'name' => $request->name,
                'title' => $request->title,
                'disc' => $request->disc,
            ]);

            $notification = array(
                'message' => 'Portfolio updated without image successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('portfolio.index')->with($notification);  
        }
    }

    public function destroy($id)
    {
        $data = Portfolio::findOrFail($id);
        $img = $data->image;
        unlink($img);

        Portfolio::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Portfolio deleted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);  
    }

    public function show($id)
    {
        $data = Portfolio::findOrFail($id);
        return view('frontend.page.portfolio_details',compact('data'));
    }

    public function allPortfolios()
    {
        $data = Portfolio::latest()->paginate(3);
        return view('frontend.page.portfolios',compact('data'));
    }


    

}
