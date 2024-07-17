<?php
namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductCart;
use App\Models\ProductWish;
use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\ProductSlider;
use App\Helper\ResponseHelper;
use App\Models\ProductDetails;
use App\Models\CustomerProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{


    public function WishList()
    {
        return view('pages.wish-list-page');
    }


    public function CartListPage()
    {
        return view('pages.cart-list-page');
    }


    public function Details()
    {
        return view('pages.details-page');
    }


    public function ListProductByCategory(Request $request):JsonResponse{
        $data=Product::where('category_id',$request->id)->with('brand','category')->get();
        return ResponseHelper::Out('success',$data,200);
    }

    public function ListProductByRemark(Request $request):JsonResponse{
        $data=Product::where('remark',$request->remark)->with('brand','category')->get();
        return ResponseHelper::Out('success',$data,200);
    }

    public function ListProductByBrand(Request $request):JsonResponse{
        $data=Product::where('brand_id',$request->id)->with('brand','category')->get();
        return ResponseHelper::Out('success',$data,200);
    }

    public function ListProductSlider():JsonResponse{
        $data=ProductSlider::all();
        return ResponseHelper::Out('success',$data,200);
    }

    public function ProductDetailsById(Request $request):JsonResponse{

        $data=ProductDetails::where('product_id',$request->id)->with('product','product.brand','product.category')->get();

        return ResponseHelper::Out('success',$data,200);
    }

    public function ListReviewByProduct(Request $request):JsonResponse{
        $data=ProductReview::where('product_id',$request->product_id)
            ->with(['profile'=>function($query){
                $query->select('id','cus_name');
            }])->get();
        return ResponseHelper::Out('success',$data,200);
    }



    public function CreateProductReview(Request $request):JsonResponse{
        $user_id=$request->header('id');
        $profile=CustomerProfile::where('user_id',$user_id)->first();

        if($profile){
            $request->merge(['customer_id' =>$profile->id]);
            $data=ProductReview::updateOrCreate(
                ['customer_id' => $profile->id,'product_id'=>$request->input('product_id')],
                $request->input()
            );
            return ResponseHelper::Out('success',$data,200);
        }
        else{
            return ResponseHelper::Out('fail','Customer profile not exists',200);
        }

    }



    public function ProductWishList(Request $request):JsonResponse{
        $user_id=$request->header('id');
        $data=ProductWish::where('user_id',$user_id)->with('product')->get();
        return ResponseHelper::Out('success',$data,200);
    }

    public function CreateWishList(Request $request):JsonResponse{
        $user_id=$request->header('id');
        $data=ProductWish::updateOrCreate(
            ['user_id' => $user_id,'product_id'=>$request->product_id],
            ['user_id' => $user_id,'product_id'=>$request->product_id],
        );
        return ResponseHelper::Out('success',$data,200);
    }


    public function RemoveWishList(Request $request):JsonResponse{
        $user_id=$request->header('id');
        $data=ProductWish::where(['user_id' => $user_id,'product_id'=>$request->product_id])->delete();
        return ResponseHelper::Out('success',$data,200);
    }

    public function CreateCartList(Request $request):JsonResponse{
        $user_id=$request->header('id');
        $product_id =$request->input('product_id');
        $color=$request->input('color');
        $size=$request->input('size');
        $qty=$request->input('qty');

        $UnitPrice=0;

        $productDetails=Product::where('id','=',$product_id)->first();
        if($productDetails->discount==1){
            $UnitPrice=$productDetails->discount_price;
        }
        else{
            $UnitPrice=$productDetails->price;
        }
        $totalPrice=$qty*$UnitPrice;


        $data=ProductCart::updateOrCreate(
            ['user_id' => $user_id,'product_id'=>$product_id],
            [
                'user_id' => $user_id,
                'product_id'=>$product_id,
                'color'=>$color,
                'size'=>$size,
                'qty'=>$qty,
                'price'=>$totalPrice
            ]
        );

        return ResponseHelper::Out('success',$data,200);
    }



    public function CartList(Request $request):JsonResponse{
        $user_id=$request->header('id');
        $data=ProductCart::where('user_id',$user_id)->with('product')->get();
        return ResponseHelper::Out('success',$data,200);
    }



    public function DeleteCartList(Request $request):JsonResponse{
        $user_id=$request->header('id');
        $data=ProductCart::where('user_id','=',$user_id)->where('product_id','=',$request->product_id)->delete();
        return ResponseHelper::Out('success',$data,200);
    }






    public function PruductPage()
    {
        return view('dashboard.pages.product-page');
    }











    public function ProductListPage(){
        $products = Product::all();
        return view('dashboard.component.product.product-list',compact('products'));
    }

    public function ProductCreatePage()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('dashboard.component.product.product-create', compact('categories', 'brands'));
    }

    public function ProductUpdatePage($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::find($id);
        return view('dashboard.component.product.product-update', compact('product', 'categories', 'brands'));
    }







    public function ProductCreate(Request $request)
    {
       
       
        $product = new Product();
        $product->title = $request->title;
        $product->short_des = $request->short_des;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->discount_price = $request->discount_price;
        $product->stock = $request->stock;
        $product->star = $request->star;
        $product->remark = $request->remark;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        if ($request->hasFile('image')) {
            $product->image = $request->file('image')->store('product_images', 'public');
        }

        $product->save();
        return redirect()->route('product.page')->with('success', 'Product created successfully');
    }

     


    public function ProductUpdate(Request $request, $id)
    {
            $product = Product::find($id);
            $product->title = $request->title;
            $product->short_des = $request->short_des;
            $product->price = $request->price;
            $product->discount = $request->discount;
            $product->discount_price = $request->discount_price;
            $product->stock = $request->stock;
            $product->star = $request->star;
            $product->remark = $request->remark;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
    
            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::delete('public/' . $product->image);
                }
                $product->image = $request->file('image')->store('product_images', 'public');
            }
    
            $product->save();
            return redirect()->route('product.page');
        
    }



    public function ProductDestroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        return redirect()->route('product.page')->with('success', 'Brand and associated products deleted successfully');
    }
    
    












    
    public function ProductDetailsListPage(){
        $productDetails = ProductDetails::all();
        return view('dashboard.component.productDetails.productDetails-list',compact('productDetails'));
    }

    public function ProductDetailsCreatePage()
    {
        $products = Product::all();
        return view('dashboard.component.productDetails.productDetails-create', compact('products'));
    }

    public function ProductDetailsUpdatePage($id)
    {
        

        $productDetails = ProductDetails::findOrFail($id);
        $products = Product::all();
        return view('dashboard.component.productDetails.productDetails-update',compact('productDetails', 'products'));
    }







    public function ProductDetailsCreate(Request $request)
    {
       
        $productDetail = new ProductDetails();
        $productDetail->des = $request->des;
        $productDetail->color = $request->color;
        $productDetail->size = $request->size;
        $productDetail->product_id = $request->product_id;

        if ($request->hasFile('img1')) {
            $productDetail->img1 = $request->file('img1')->store('product_images', 'public');
        }
        if ($request->hasFile('img2')) {
            $productDetail->img2 = $request->file('img2')->store('product_images', 'public');
        }
        if ($request->hasFile('img3')) {
            $productDetail->img3 = $request->file('img3')->store('product_images', 'public');
        }
        if ($request->hasFile('img4')) {
            $productDetail->img4 = $request->file('img4')->store('product_images', 'public');
        }

        $productDetail->save();
        return redirect()->route('productDetails.page')->with('success', 'Product Details created successfully');;
        
    }

     


    public function ProductDetailsUpdate(Request $request, $id)
    {

        $productDetail = ProductDetails::findOrFail($id);
        $productDetail->des = $request->des;
        $productDetail->color = $request->color;
        $productDetail->size = $request->size;
        $productDetail->product_id = $request->product_id;

        if ($request->hasFile('img1')) {
            if ($productDetail->img1) {
                Storage::delete('public/' . $productDetail->img1);
            }
            $productDetail->img1 = $request->file('img1')->store('product_images', 'public');
        }
        if ($request->hasFile('img2')) {
            if ($productDetail->img2) {
                Storage::delete('public/' . $productDetail->img2);
            }
            $productDetail->img2 = $request->file('img2')->store('product_images', 'public');
        }
        if ($request->hasFile('img3')) {
            if ($productDetail->img3) {
                Storage::delete('public/' . $productDetail->img3);
            }
            $productDetail->img3 = $request->file('img3')->store('product_images', 'public');
        }
        if ($request->hasFile('img4')) {
            if ($productDetail->img4) {
                Storage::delete('public/' . $productDetail->img4);
            }
            $productDetail->img4 = $request->file('img4')->store('product_images', 'public');
        }

        $productDetail->save();
        return redirect()->route('productDetails.page');
    }
        
    



    public function ProductDetailsDestroy($id)
    {
        $productDetails = ProductDetails::findOrFail($id);
        $productDetails->delete();
    
        return redirect()->route('productDetails.page')->with('success', ' productDetails deleted successfully');
    }
    






















}
