<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller {

    public function addCategory() {
        return view('admin.category.addCategory');
    }

    public function saveCategory(Request $request) {
        $category = new Category();

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;

        $category->save();

        return redirect('/add-category')->with('message', 'Category info save successfully');
    }

    public function manageCategory() {
        $categories = Category::all();
        return view('admin.category.manageCategory', ['categories' => $categories]);
    }

    public function unpublishedCategory($id) {
        $category = Category::find($id);

        $category->publication_status = 0;
        $category->save();

        return redirect('/manage-category')->with('message', 'Category info Unpublished successfully');
    }

    public function publishedCategory($id) {
        $category = Category::find($id);
        $category->publication_status = 1;
        $category->save();

        return redirect('/manage-category')->with('message', 'Category info published successfully');
    }

    public function editCategory($id) {
        $editcategory = Category::find($id);
        return view('admin.category.editCategory', ['editcategory' => $editcategory]);
    }

    public function updateCategory(Request $request) {
        $category = Category::find($request->category_id);

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();

        return redirect('/manage-category')->with('message', 'Category info Update successfully');
    }
    
    public function deleteCategory($id)
    {
        $category =Category::find($id);
        $category->delete();
        
        return redirect('/manage-category')->with('message', 'Category info delete successfully');
        
        
    }

}
