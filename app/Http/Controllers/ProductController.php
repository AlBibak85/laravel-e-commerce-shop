<?php

namespace App\Http\Controllers;

use App\Category;
use App\Brand;
use App\Product;
use Image;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller {

    public function addProduct() {
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        return view('admin.product.addProduct', ['categories' => $categories, 'brands' => $brands]);
    }

    protected function productInfoValidate($request) {
        $this->validate($request, [
            'product_name' => 'required'
        ]);
    }

    protected function productImageUpload($request) {
        $productImage = $request->file('product_image');
        //$imageName = $productImage->getClientOriginalName();
        $fileType = $productImage->getClientOriginalExtension();
        $imageName = $request->product_name . '.' . $fileType;
        $directory = 'product-image/';
        $imageUrl = $directory . $imageName;
        //$productImage->move($directory, $imageName);
        Image::make($productImage)->save($imageUrl); //use package intervension.io
        return $imageUrl;
    }

    protected function saveProductBasic($request, $imageUrl) {
        $product = new Product();

        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;

        $product->save();
    }

    public function saveProduct(Request $request) {

        $this->productInfoValidate($request);
        $imageUrl = $this->productImageUpload($request);
        $this->saveProductBasic($request, $imageUrl);



        return redirect('/add-product')->with('message', 'Product info save successfully');
    }

    public function manageProduct() {
        $products = DB::table('products')
                ->join('categories', 'products.category_id', '=', 'categories.id')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->select('products.*', 'categories.category_name', 'brands.brand_name')
                ->get();
        return view('admin.product.manageProduct', ['products' => $products]);
    }

    public function unpublishedProduct($id) {
        $product = Product::find($id);

        $product->publication_status = 0;
        $product->save();
        return redirect('/manage-product')->with('message', 'Product info Unpublished successfully');
    }

    public function publishedProduct($id) {
        $product = Product::find($id);

        $product->publication_status = 1;
        $product->save();
        return redirect('/manage-product')->with('message', 'Product info published successfully');
    }

    public function editProduct($id) {
        $product = Product::find($id);
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        return view('admin.product.editProduct', ['product' => $product, 'categories' => $categories, 'brands' => $brands]);
    }

//    public function updateProduct(Request $request) {
//        $productImage = $request->file('product_image');
//        if ($productImage) {
//            
//            
//            
//            
//        } else {
//
//            $product =Product::find($request->product_id);
//            $product->category_id = $request->category_id;
//            $product->brand_id = $request->brand_id;
//            $product->product_name = $request->product_name;
//            $product->product_price = $request->product_price;
//            $product->product_quantity = $request->product_quantity;
//            $product->short_description = $request->short_description;
//            $product->long_description = $request->long_description;
//            $product->publication_status = $request->publication_status;
//            $product->save();
//            
//           
//            return redirect('/manage-product')->with('message','Update product info');
//        }
//    }

    public function deleteProduct($id) {
        
    }

}
