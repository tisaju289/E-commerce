<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\SliderController;
use App\Http\Middleware\TokenAuthenticate;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolePermissionController;




// Home Page
Route::get('/', [HomeController::class, 'HomePage']);
Route::get('/dashboard', [DashboardController::class, 'AdminDashboardPage']);
Route::get('/by-category', [CategoryController::class, 'ByCategoryPage']);
Route::get('/by-brand', [BrandController::class, 'ByBrandPage']);
Route::get('/policy', [PolicyController::class, 'PolicyPage']);
Route::get('/details', [ProductController::class, 'Details']);
Route::get('/login', [UserController::class, 'LoginPage'])->name('login');
Route::get('/verify', [UserController::class, 'VerifyPage']);
Route::get('/wish', [ProductController::class, 'WishList']);
Route::get('/cart', [ProductController::class, 'CartListPage']);
Route::get('/profile', [ProfileController::class, 'ProfilePage']);



// Brand List
Route::get('/BrandList', [BrandController::class, 'BrandList']);
// Category List
Route::get('/CategoryList', [CategoryController::class, 'CategoryList']);
// Product List
Route::get('/ListProductByCategory/{id}', [ProductController::class, 'ListProductByCategory']);
Route::get('/ListProductByBrand/{id}', [ProductController::class, 'ListProductByBrand']);
Route::get('/ListProductByRemark/{remark}', [ProductController::class, 'ListProductByRemark']);
// Slider
Route::get('/ListProductSlider', [ProductController::class, 'ListProductSlider']);
// Product Details
Route::get('/ProductDetailsById/{id}', [ProductController::class, 'ProductDetailsById']);
Route::get('/ListReviewByProduct/{product_id}', [ProductController::class, 'ListReviewByProduct']);
//policy
Route::get("/PolicyByType/{type}",[PolicyController::class,'PolicyByType']);



// User Auth
Route::get('/UserLogin/{UserEmail}', [UserController::class, 'UserLogin']);
Route::get('/VerifyLogin/{UserEmail}/{OTP}', [UserController::class, 'VerifyLogin']);
Route::get('/logout',[UserController::class,'UserLogout']);


// User Profile
Route::post('/CreateProfile', [ProfileController::class, 'CreateProfile'])->middleware([TokenAuthenticate::class]);
Route::get('/ReadProfile', [ProfileController::class, 'ReadProfile'])->middleware([TokenAuthenticate::class]);


// Product Review
Route::post('/CreateProductReview', [ProductController::class, 'CreateProductReview'])->middleware([TokenAuthenticate::class]);



// Product Wish
Route::get('/ProductWishList', [ProductController::class, 'ProductWishList'])->middleware([TokenAuthenticate::class]);
Route::get('/CreateWishList/{product_id}', [ProductController::class, 'CreateWishList'])->middleware([TokenAuthenticate::class]);
Route::get('/RemoveWishList/{product_id}', [ProductController::class, 'RemoveWishList'])->middleware([TokenAuthenticate::class]);



// Product Cart
Route::post('/CreateCartList', [ProductController::class, 'CreateCartList'])->middleware([TokenAuthenticate::class]);
Route::get('/CartList', [ProductController::class, 'CartList'])->middleware([TokenAuthenticate::class]);
Route::get('/DeleteCartList/{product_id}', [ProductController::class, 'DeleteCartList'])->middleware([TokenAuthenticate::class]);




// Invoice and payment
Route::get("/InvoiceCreate",[InvoiceController::class,'InvoiceCreate'])->middleware([TokenAuthenticate::class]);
Route::get("/InvoiceList",[InvoiceController::class,'InvoiceList'])->middleware([TokenAuthenticate::class]);
Route::get("/InvoiceProductList/{invoice_id}",[InvoiceController::class,'InvoiceProductList'])->middleware([TokenAuthenticate::class]);


//payment
Route::post("/PaymentSuccess",[InvoiceController::class,'PaymentSuccess']);
Route::post("/PaymentCancel",[InvoiceController::class,'PaymentCancel']);
Route::post("/PaymentFail",[InvoiceController::class,'PaymentFail']);





















Route::get('/categoryListPage', [CategoryController::class, 'CategoryListPage'])->name('category.page');

Route::get('/categoryCreatePage', [CategoryController::class, 'CategoryCreatePage'])->name('category.create.page');

Route::get('/categories/{id}/UpdatePage', [CategoryController::class, 'CategoryUpdatePage'])->name('category.update.page');

Route::post('/categoryCreate', [CategoryController::class, 'CategoryCreate'])->name('category.create');

Route::put('/categories/{id}', [CategoryController::class, 'CategoryUpdate'])->name('category.update');

Route::delete('/categories/{id}', [CategoryController::class, 'CategoryDestroy'])->name('category.destroy');









Route::get('/productSliderListPage', [SliderController::class, 'ProductSliderListPage'])->name('productSlider.page');

Route::get('/productSliderCreatePage', [SliderController::class, 'ProductSliderCreatePage'])->name('productSlider.create.page');

Route::get('/productSliders/{id}/UpdatePage', [SliderController::class, 'ProductSliderUpdatePage'])->name('productSlider.update.page');

Route::post('/productSliderCreate', [SliderController::class, 'ProductSliderCreate'])->name('productSlider.create');

Route::put('/productSliders/{id}', [SliderController::class, 'ProductSliderUpdate'])->name('productSlider.update');

Route::delete('/productSliders/{id}', [SliderController::class, 'ProductSliderDestroy'])->name('productSlider.destroy');




Route::get('/productListPage', [ProductController::class, 'ProductListPage'])->name('product.page');

Route::get('/productCreatePage', [ProductController::class, 'ProductCreatePage'])->name('product.create.page');

Route::get('/products/{id}/UpdatePage', [ProductController::class, 'ProductUpdatePage'])->name('product.update.page');

Route::post('/productCreate', [ProductController::class, 'ProductCreate'])->name('product.create');

Route::put('/products/{id}', [ProductController::class, 'ProductUpdate'])->name('product.update');

Route::delete('/products/{id}', [ProductController::class, 'ProductDestroy'])->name('product.destroy');








Route::get('/productDetailsListPage', [ProductController::class, 'ProductDetailsListPage'])->name('productDetails.page');

Route::get('/productDetailsCreatePage', [ProductController::class, 'ProductDetailsCreatePage'])->name('productDetails.create.page');

Route::get('/productDetails/{id}/UpdatePage', [ProductController::class, 'ProductDetailsUpdatePage'])->name('productDetails.update.page');

Route::post('/productDetailsCreate', [ProductController::class, 'ProductDetailsCreate'])->name('productDetails.create');

Route::put('/productDetails/{id}', [ProductController::class, 'ProductDetailsUpdate'])->name('productDetails.update');

Route::delete('/productDetails/{id}', [ProductController::class, 'ProductDetailsDestroy'])->name('productDetails.destroy');


















        Route::get('roleCreatePage', [RolePermissionController::class, 'RoleCreatePage'])->name('role-createPage');
        Route::put('role-create', [RolePermissionController::class, 'RoleCreate'])->name('role-store');



        Route::get('/roles/{id}/edit', [RolePermissionController::class, 'RoleEditPage'])->name('role-edit');
        Route::put('/roles/{id}', [RolePermissionController::class, 'RoleUpdate'])->name('role-update');


        Route::delete('/roles/{id}', [RolePermissionController::class, 'RoleDestroy'])->name('role-destroy');
 
        Route::get('roleList', [RolePermissionController::class, 'RoleListPage'])->name('role-list');







        Route::get('permissionCreatePage', [RolePermissionController::class, 'PermissionCreatePage'])->name('permission-createPage');
        Route::put('permission-create', [RolePermissionController::class, 'PermissionCreate'])->name('permission-store');



        Route::get('/permissions/{id}/edit', [RolePermissionController::class, 'PermissionEditPage'])->name('permission-edit');
        Route::put('/permissions/{id}', [RolePermissionController::class, 'PermissionUpdate'])->name('permission-update');



        Route::delete('/permissions/{id}', [RolePermissionController::class, 'PermissionDestroy'])->name('permission-destroy');
 
        Route::get('/permissions', [RolePermissionController::class, 'PermissionListPage'])->name('permission-list');









        
Route::get('userCreatePage', [UserController::class, 'UserCreatePage'])->name('user-createPage');
Route::put('user-create', [UserController::class, 'UserCreate'])->name('user-store');




Route::get('user-list', [UserController::class, 'UserListPage'])->name('user-list');
Route::get('/usres/{id}/assignRole', [UserController::class, 'UserAssignRoleEditPage'])->name('users-assign-role-edit');
Route::post('/usres/{id}/assignRole', [UserController::class, 'UserAssignRoleUpdate'])->name('users-assign-role-update');






//Role Pages Route
Route::get('/roles/{id}/permissions', [RolePermissionController::class, 'RolePermissionEditPage'])->name('roles-permissions-edit');


//Role API Route
Route::post('/roles/{id}/permissions', [RolePermissionController::class, 'RolePermissionUpdate'])->name('roles.permissions.update');









Route::middleware(['auth'])->group(function () {
    
        // Brand Create Routes
        Route::middleware(['permission:brand create'])->group(function () {
            Route::get('/brandCreatePage', [BrandController::class, 'BrandCreatePage'])->name('brand.create.page');
            Route::post('/brandCreate', [BrandController::class, 'BrandCreate'])->name('brand.create');
        });
        
        // Brand Update Routes
        Route::middleware(['permission:brand update'])->group(function () {
            Route::get('/brands/{id}/UpdatePage', [BrandController::class, 'BrandUpdatePage'])->name('brand.update.page');
            Route::put('/brands/{id}', [BrandController::class, 'BrandUpdate'])->name('brand.update');
        });
        
        // Brand Delete Routes
        Route::middleware(['permission:product delete'])->group(function () {
            Route::delete('/brands/{id}', [BrandController::class, 'BrandDestroy'])->name('brand.destroy');
        });
        
     

          
    });
    Route::get('/brandListPage', [BrandController::class, 'BrandListPage'])->name('brand.page');
 