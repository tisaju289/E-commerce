<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use App\Helper\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function ByBrandPage()
    {
        return view('pages.product-by-brand');
    }


    public function BrandList():JsonResponse
    {
        $data= Brand::all();
        return ResponseHelper::Out('success',$data,200);
    }















    public function BrandListPage(){
        $brands = Brand::all();
        return view('dashboard.component.brand.brand-list',compact('brands'));
    }

    public function BrandCreatePage()
    {
        return view('dashboard.component.brand.brand-create');
    }

    public function BrandUpdatePage($id)
    {
        $brand = Brand::find($id);
        return view('dashboard.component.brand.brand-update', compact('brand'));
    }







    public function BrandCreate(Request $request)
    {
       
        $request->validate([
            'brandName' => 'required',
            'brandImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
    
        if ($request->hasFile('brandImg')) {
            $imagePath = $request->file('brandImg')->store('brands', 'public');
        }
    
   
        Brand::create([
            'brandName' => $request->input('brandName'),
            'brandImg' => $imagePath,
            ]);
    
            return redirect()->route('brand.page')->with('success', 'Brand created successfully');
    }

     


    public function BrandUpdate(Request $request, $id)
    {
        $request->validate([
            'brandName' => 'required',
            'brandImg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $brand = Brand::find($id);
        $brand->brandName = $request->input('brandName');
    
        if ($request->hasFile('brandImg')) {
            $imagePath = $request->file('brandImg')->store('brands', 'public');
            $brand->brandImg = $imagePath;
        }
    
        $brand->save();
    
        return redirect()->route('brand.page')->with('success', 'Brand updated successfully');
    }



    public function BrandDestroy($id)
    {
        $brand = Brand::findOrFail($id);
    
      
        $brand->products()->delete();
    
       
        $brand->delete();
    
        return redirect()->route('brand.page')->with('success', 'Brand and associated products deleted successfully');
    }
    
    

   
    


}