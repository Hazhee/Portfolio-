<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::all();
        return view('admin.blog.index',compact('data'));
    }

    public function create()
    {
        $data = Category::orderBy('name')->get();
        return view('admin.blog.create',compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' =>'required',
            'category_id' =>'required',
            'disc' =>'required',
            'image' =>'required',
        ]);

        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(430,327)->save('upload/blogs/'.$name_gen);

        $save_url = 'upload/blogs/'.$name_gen;

        Blog::insert([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'tags' => $request->tags,
            'disc' => $request->disc,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Blog created successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('blog.index')->with($notification);  
    }

    public function edit($id)
    {
        $data = Blog::findOrFail($id);
        $category = Category::orderBy('name')->get();
        return view('admin.blog.edit', compact('data', 'category'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        if($request->file('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            Image::make($image)->resize(430,327)->save('upload/blogs/'.$name_gen);

            $save_url = 'upload/blogs/'.$name_gen;

            Blog::findOrFail($id)->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'disc' => $request->disc,
                'tags' => $request->tags,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Blog updated successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.index')->with($notification);
        }else{
            Blog::findOrFail($id)->update([
                'title' => $request->title,
                'category_id' => $request->category_id,
                'disc' => $request->disc,
                'tags' => $request->tags,
            ]);

            $notification = array(
                'message' => 'Blog updated without image successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('blog.index')->with($notification);  
        }
    }

    public function destroy($id)
    {
        $data = Blog::findOrFail($id);
        $img = $data->image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog deleted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
        
    }


    public function show($id)
    {
        $data = Blog::findOrFail($id);
        $blogs = Blog::latest()->limit(5)->get();
        $categories = Category::orderBy('name')->get();
        return view('frontend.page.blog_details',compact('data','blogs','categories'));
    }

    public function BlogCategory($id)
    {
        $data = Blog::where('category_id',$id)->latest()->get();
        $blogs = Blog::latest()->limit(5)->get();
        $categories = Category::orderBy('name')->get();
        return view('frontend.page.catg_blog_details',compact('data','blogs','categories'));

    }

    public function allBlogs()
    {
        $data = Blog::latest()->paginate(3);
        $categories = Category::orderBy('name')->get();
        return view('frontend.page.blogs',compact('data','categories'));

    }
}
