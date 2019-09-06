<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    
    public function addBrand()
    {
        return view('admin.brand.addBrand');
    }
    public function manageBrand()
    {
        $brands =Brand::all();
        return view('admin.brand.manageBrand',['brands'=>$brands]);
    }
    public function saveBrand(Request $request)
    {
        
        $this->validate($request, [
            'brand_name'=>'required|regex:/^[\pL\s\-]+$/u|max:15|min:5',
            'brand_description'=>'required',
            'publication_status'=>'required'
        ]);
        $brand =  new Brand();
        
         $brand->brand_name = $request->brand_name;
         $brand->brand_description = $request->brand_description;
         $brand->publication_status = $request->publication_status;
         
         $brand->save();
         
         return redirect('add-brand')->with('message','Brand info save succesfully');
        
        
    }
    
    public function unpublishedBrand($id)
    {
        $brand =Brand::find($id);
        $brand->publication_status = 0;
        $brand->save();
        return redirect('manage-brand')->with('message','Brand info Unpublished succesfully');
        
    }
    public function publishedBrand($id)
    {
        $brand =Brand::find($id);
        $brand->publication_status = 1;
        $brand->save();
        return redirect('manage-brand')->with('message','Brand info Published succesfully');
        
    }
    
    public function editdBrand($id)
    {
       $brand =  Brand::find($id);
       return view('admin.brand.editBrand',['brand'=>$brand]);
       
    }
    
    public function updatedBrand(Request $request)
    {
        $brand =Brand::find($request->brand_id);
        
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->publication_status;
        $brand->save();
        return redirect('/manage-brand')->with('message', 'Brand info Update successfully');
        
    }

    public function deleteBrand($id)
    {
       $brand =  Brand::find($id);
       $brand->delete();
        return redirect('/manage-brand')->with('message', 'Brand info delete successfully');
       
    }
    
    
}
