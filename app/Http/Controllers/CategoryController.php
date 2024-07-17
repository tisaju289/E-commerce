<?php
namespace App\Http\Controllers;
use App\Helper\ResponseHelper;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function ByCategoryPage()
    {
        return view('pages.product-by-category');
    }

    public function CategoryList():JsonResponse
    {
        $data= Category::all();
        return  ResponseHelper::Out('success',$data,200);
    }





    

    public function CategoryListPage(){
        $categories = Category::all();
        return view('dashboard.component.category.category-list',compact('categories'));
    }

    public function CategoryCreatePage()
    {
        return view('dashboard.component.category.category-create');
    }

    public function CategoryUpdatePage($id)
    {
        $category = Category::find($id);
        return view('dashboard.component.category.category-update', compact('category'));
    }







    public function CategoryCreate(Request $request)
    {
       
        $request->validate([
            'categoryName' => 'required',
            'categoryImg' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
    
        if ($request->hasFile('categoryImg')) {
            $imagePath = $request->file('categoryImg')->store('categories', 'public');
        }
    
   
        Category::create([
            'categoryName' => $request->input('categoryName'),
            'categoryImg' => $imagePath,
            ]);
    
            return redirect()->route('category.page')->with('success', 'category created successfully');
    }

     


    public function CategoryUpdate(Request $request, $id)
    {
        $request->validate([
            'categoryName' => 'required',
            'categoryImg' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $category = Category::find($id);
        $category->categoryName = $request->input('categoryName');
    
        if ($request->hasFile('categoryImg')) {
            $imagePath = $request->file('categoryImg')->store('categories', 'public');
            $category->categoryImg = $imagePath;
        }
    
        $category->save();
    
        return redirect()->route('category.page')->with('success', 'category updated successfully');
    }



    public function CategoryDestroy($id)
    {
        $category = Category::findOrFail($id);
    
      
        $category->products()->delete();
    
       
        $category->delete();
    
        return redirect()->route('category.page')->with('success', 'category and associated products deleted successfully');
    }
    
 


}
