<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductSlider;

class SliderController extends Controller
{
   



    public function ProductSliderListPage(){
        $productSliders = ProductSlider::all();
        return view('dashboard.component.slider.slider-list',compact('productSliders'));
    }

    public function ProductSliderCreatePage()
    {
        $products = Product::all();
        return view('dashboard.component.slider.slider-create', compact('products'));
    }

    public function ProductSliderUpdatePage($id)
    {
        $productSlider = ProductSlider::findOrFail($id);
        $products = Product::all();
        return view('dashboard.component.slider.slider-update', compact('productSlider', 'products'));
    }







    public function ProductSliderCreate(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|max:200',
                'short_des' => 'required|max:500',
                'price' => 'required|max:50',
                'image' => 'required|image|max:10240',
                'product_id' => 'required|exists:products,id',
            ]);
    
            $productSlider = new ProductSlider($request->all());
    
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('slider_images', 'public');
                $productSlider->image = $imagePath;
            }
    
            $productSlider->save();
    
            return redirect()->route('productSlider.page')->with('success', 'Product Slider created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
    }

     


    public function ProductSliderUpdate(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:200',
            'short_des' => 'required|max:500',
            'price' => 'required|max:50',
            'image' => 'nullable|image|max:10240',
            'product_id' => 'required|exists:products,id',
        ]);
    
        $productSlider = ProductSlider::findOrFail($id);
        $productSlider->fill($request->all());
    
      
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('slider_images', 'public');
            $productSlider->image = $imagePath;
        }
    
        $productSlider->save();
    
        return redirect()->route('productSlider.page')->with('success', 'Product Slider updated successfully.');
    }


    public function ProductSliderDestroy($id)
    {
        $productSlider = ProductSlider::findOrFail($id);
        $productSlider->delete();
    
        return redirect()->route('productSlider.page')->with('success', 'Slider and associated products deleted successfully');
    }
    
    
}
