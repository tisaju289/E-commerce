<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductSlider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function AdminDashboardPage()
    {
        $brand = Brand::all()->count();
        $user = User::all()->count();
        $product = Product::all()->count();
        $slider = ProductSlider::all()->count();
        $category = Category::all()->count();
        return view('dashboard.pages.dashboard' , compact('brand' , 'user' , 'product' , 'slider', 'category'));
    }

    
}
