<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Brand;
use Illuminate\Http\Request;

class WelcomeController extends Controller {

    public function index() {
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        $newProducts = Product::where('publication_status', 1)->orderBy('id', 'DESC')->take(8)->get();


        return view('frontEnd.home.home',['categories'=>$categories,'newProducts'=>$newProducts,'brands'=>$brands]);
    }

    public function categoryProduct($id) {
        $categoryProducts = Product::where('category_id', $id)
                ->where('publication_status', 1)
                ->get();
        return view('frontEnd.category.categoryProduct', ['categoryProducts' => $categoryProducts]);
    }

    public function productDetails($id) {
        $product = Product::find($id);
        return view('frontEnd.product.productDetails', ['product'=>$product]);
    }

}
