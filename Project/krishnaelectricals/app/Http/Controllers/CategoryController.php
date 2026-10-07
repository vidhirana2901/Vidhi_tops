<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);

     

        // Create a new category
        $category = new Category();
        $category->category_name = $request->category_name;
        //image upload
        $image=$request->file('image');
		$filename=time().'_img.'.$request->file('image')->getClientOriginalExtension(); // 121545454_img.jpg
		$image->move('admin/assets/upload/images/category',$filename); // upload file in public 
		$category->image=$filename;

        $category->description = $request->description;
        $category->save();

        return redirect('/admin/view_categories')->with('success', 'Category added successfully.');    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $categories = Category::paginate(5);
        return view('admin.view_categories', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category, $id)
    {
        $edit_category = Category::find($id);
        return view('admin.edit_category', compact('edit_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category,$id)
    {
        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        if($request->hasFile('image')){
            $oldImage = $category->image;
            unlink('admin/assets/upload/images/category/' . $oldImage);
            $file = $request->file('image');
            $filename = time() . '_img.' . $request->file('image')->getClientOriginalExtension();
            $file->move('admin/assets/upload/images/category', $filename);
            $category->image = $filename;
        }
        $category->description = $request->description;
        $category->save();

        return redirect('/admin/view_categories')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::find($id);
        $image=$category->image;
        unlink(public_path('admin/assets/upload/images/category/'.$image));
    
        $category->delete();
        return redirect('/admin/view_categories')->with('success', 'Category deleted successfully.');
    }
}
