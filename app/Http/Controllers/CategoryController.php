<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function category()
    {
        $category =Category::all();
        return view('admin.category.category-list',compact('category'));
    }
    public function createcategory()
    {
        return view('admin.category.category-create');
    }
    public function store(Request $request)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'category_name.unique' => 'The category name is already added.',
        ];
        $request->validate([
            'category_name' => 'required|unique:categories',
        ], $messages);
        $category = new Category;
        $category->category_name = $request->category_name;

        $res = $category->save();
        if ($res) {   return back()->with('success', 'Congratulations, Category is added ');
        } else {
            return back()->with('fail', 'Sorry, Category couldnot be added.');
        }
       
    }
    public function editcategory($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.category-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'The :attribute field is required.',
            'category_name.unique' => 'The category name is already taken.',
        ];
        
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,' . $id,
        ], $messages);
        
        $category = Category::findOrFail($id);
        $category->category_name = $request->category_name;
        
        $res = $category->save();
        if ($res) {
            return back()->with('success', 'Category updated successfully.');
        } else {
            return back()->with('fail', 'Failed to update the category.');
        }
    }
    public function destroy($id)
{
    $category = Category::findOrFail($id);
    $res = $category->delete();
    
    if ($res) {
        return back()->with('success', 'Category deleted successfully.');
    } else {
        return back()->with('fail', 'Failed to delete the category.');
    }
}

}