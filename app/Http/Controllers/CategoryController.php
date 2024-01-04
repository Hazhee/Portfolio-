<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('admin.category.index',compact('data'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        Category::create($validated);

        $notification = array(
            'message' => 'category created successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);  
    }

    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view('admin.category.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $data = Category::findOrFail($id);

        $data->name = $request->name;

        $data->save();

        $notification = array(
            'message' => 'category updated successfully.',
            'alert-type' => 'success'
        );
        return redirect()->route('category.index')->with($notification);  
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Category deleted successfully.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification); 
    }
}
