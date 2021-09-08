<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BaogiaController;
use App\Http\Controllers\BaogiaExportExcelController;
use App\Http\Controllers\BaogiaImportExcelController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ChitietdonhangController;
use App\Http\Controllers\ChucnangUserController;
use App\Http\Controllers\donhangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\mathangController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ThongtinController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login', function () {
    return  view('auth.login');
})->name('admin.login.get');

Route::get('/register', function () {
    return  view('auth.register');
})->name('register');
/////////
route::group(
    [
        'as' => 'excel.',
        'prefix' => 'excel',
        // 'middleware' => 'checkuser',
    ],

    function () {
        Route::get('/excel', [BaogiaImportExcelController::class, 'index'])->name('excel');
        Route::post('/excel', [BaogiaImportExcelController::class, 'store'])->name('excelimport');
    }
);


Route::get('/export', [BaogiaExportExcelController::class, 'export'])->name('exportexcel');
//////////////
Route::post('/mail', [HomeController::class, 'postSendMail'])->name('sendmail');

/////
Route::post('/search/mathang', [HomeController::class, 'searchmathang'])->name('search.mathang');
////
Route::post('/addtocart', [HomeController::class, 'addtocart'])->name('addtocart');

////Frontend
Route::get('/', [HomeController::class, 'index'])->name('trangchu');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/productdetails', [HomeController::class, 'productdetails'])->name('productdetails');
Route::get('/productdetails/{mathang}', [HomeController::class, 'mathangshow'])->name('mathangshow');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blogsingle', [HomeController::class, 'blogsingle'])->name('blogsingle');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/error', [HomeController::class, 'error'])->name('error');
Route::get('/login', [HomeController::class, 'login'])->name('login');


/////Backend
Route::group(
    [
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => "auth", "checkuser",
    ],
    function () {
        Route::get('/ad', [AdminController::class, 'index'])->name('ad');
        Route::get('/dashboard', [AdminController::class, 'show_dashboard'])->name('dashboard');
        Route::post('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admindashboard');
        Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

        Route::group(
            [
                'as' => 'post.',         //Phan cua name route
                'prefix' => 'post',      //Duong dan
            ],
            function () {
                Route::get('/index', [PostController::class, 'index']);
                Route::get('', [PostController::class, 'index'])->name('index');
                Route::get('{post}', [PostController::class, 'show'])->name('show');

                Route::get('/post1/create', [PostController::class, 'create'])->name('create');
                Route::post('store', [PostController::class, 'store'])->name('store');

                Route::get('{post}/edit', [PostController::class, 'edit'])->name('edit');
                Route::post('update/{post}', [PostController::class, 'update'])->name('update');

                Route::get('destroy/{post}', [PostController::class, 'destroy'])->name('destroy');
            }
        );

        Route::group(
            [
                'as' => 'news.',
                'prefix' => 'news',
            ],
            function () {

                Route::get('/index', [NewsController::class, 'index']);
                Route::get('', [NewsController::class, 'index'])->name('index');
                Route::get('/{news}/show', [NewsController::class, 'show'])->name('show');

                Route::get('/create', [NewsController::class, 'create'])->name('create');
                Route::post('store', [NewsController::class, 'store'])->name('store');

                Route::get('{news}/edit', [NewsController::class, 'edit'])->name('edit');
                Route::post('update/{news}', [NewsController::class, 'update'])->name('update');

                Route::get('destroy/{news}', [NewsController::class, 'destroy'])->name('destroy');
            }

        );

        Route::group(
            [
                'as' => 'categories.',
                'prefix' => 'categories',
            ],
            function () {
                Route::get('/index', [CategoriesController::class, 'index']);
                Route::get('', [CategoriesController::class, 'index'])->name('index');
                Route::get('/{category}/show', [CategoriesController::class, 'show'])->name('show');

                Route::get('/create', [CategoriesController::class, 'create'])->name('create');
                Route::post('store', [CategoriesController::class, 'store'])->name('store');

                Route::get('{category}/edit', [CategoriesController::class, 'edit'])->name('edit');
                Route::post('update/{category}', [CategoriesController::class, 'update'])->name('update');

                Route::get('destroy/{category}', [CategoriesController::class, 'destroy'])->name('destroy');

                Route::get('/{category}/children', [CategoriesController::class, 'children'])->name('children');
            }
        );

        Route::group(
            [
                'as' => 'product.',
                'prefix' => 'product',
            ],
            function () {
                Route::get('index', [ProductController::class, 'index']);
                Route::get('', [ProductController::class, 'index'])->name('index');
                Route::get('show/{product}', [ProductController::class, 'show'])->name('show');

                Route::get('create', [ProductController::class, 'create'])->name('create');
                Route::post('store', [ProductController::class, 'store'])->name('store');

                Route::get('{product}/edit', [ProductController::class, 'edit'])->name('edit');
                Route::post('update/{product}', [ProductController::class, 'update'])->name('update');

                Route::get('destroy/{product}', [ProductController::class, 'destroy'])->name('destroy');

                Route::post('destroy/all', [ProductController::class, 'destroyAllProduct'])->name('destroyAllProduct');
            }
        );
        Route::group(
            [
                'as' => 'mathang.',
                'prefix' => 'mathang',
            ],
            function () {
                Route::get('index', [mathangController::class, 'index']);
                Route::get('', [mathangController::class, 'index'])->name('index');
                Route::get('show/{mathang}', [mathangController::class, 'show'])->name('show');

                Route::get('create', [mathangController::class, 'create'])->name('create');
                Route::post('store', [mathangController::class, 'store'])->name('store');

                Route::get('{mathang}/edit', [mathangController::class, 'edit'])->name('edit');
                Route::post('update/{mathang}', [mathangController::class, 'update'])->name('update');

                Route::get('destroy/{mathang}', [mathangController::class, 'destroy'])->name('destroy');

                Route::post('destroy/all', [mathangController::class, 'destroyAllmathang'])->name('destroyAllmathang');
            }
        );
        Route::group(
            [
                'as' => 'donhang.',
                'prefix' => 'donhang',
            ],
            function () {
                Route::get('index', [donhangController::class, 'index']);
                Route::get('', [donhangController::class, 'index'])->name('index');
                Route::get('show/{donhang}', [donhangController::class, 'show'])->name('show');

                Route::get('create', [donhangController::class, 'create'])->name('create');
                Route::post('store', [donhangController::class, 'store'])->name('store');

                Route::get('{donhang}/edit', [donhangController::class, 'edit'])->name('edit');
                Route::post('update/{donhang}', [donhangController::class, 'update'])->name('update');

                Route::get('destroy/{donhang}', [donhangController::class, 'destroy'])->name('destroy');

                Route::post('destroy/all', [donhangController::class, 'destroyAlldonhang'])->name('destroyAlldonhang');
            }
        );
        Route::group(
            [
                'as' => 'chitietdonhang.',
                'prefix' => 'chitietdonhang',
            ],
            function () {
                Route::get('index', [ChitietdonhangController::class, 'index']);
                Route::get('', [chitietdonhangController::class, 'index'])->name('index');
                Route::get('show/{chitietdonhang}', [chitietdonhangController::class, 'show'])->name('show');

                Route::get('create', [chitietdonhangController::class, 'create'])->name('create');
                Route::post('store', [chitietdonhangController::class, 'store'])->name('store');

                Route::get('{chitietdonhang}/edit', [chitietdonhangController::class, 'edit'])->name('edit');
                Route::post('update/{chitietdonhang}', [chitietdonhangController::class, 'update'])->name('update');

                Route::get('destroy/{chitietdonhang}', [chitietdonhangController::class, 'destroy'])->name('destroy');

                Route::post('destroy/all', [chitietdonhangController::class, 'destroyAllchitietdonhang'])->name('destroyAllchitietdonhang');
            }
        );
        Route::group(
            [
                'as' => 'user.',
                'prefix' => 'user',
            ],
            function () {
                Route::get('index', [UserController::class, 'index']);
                Route::get('', [userController::class, 'index'])->name('index');
                Route::get('show/{data}', [userController::class, 'show'])->name('show');

                Route::get('create', [userController::class, 'create'])->name('create');
                Route::post('store', [userController::class, 'store'])->name('store');

                Route::get('{data}/edit', [userController::class, 'edit'])->name('edit');
                Route::post('update/{data}', [userController::class, 'update'])->name('update');

                Route::get('destroy/{data}', [UserController::class, 'destroy'])->name('destroy');

            }
        );
        Route::group(
            [
                'as' => 'baogia.',
                'prefix' => 'baogia',

            ],
            function () {
                Route::get('/', [BaogiaController::class, 'index'])->name('index');
                Route::get('show/{baogia}', [BaogiaController::class, 'show'])->name('show');

                Route::get('create', [BaogiaController::class, 'create'])->name('create');
                Route::post('store', [BaogiaController::class, 'store'])->name('store');

                Route::get('edit/{baogia}', [BaogiaController::class, 'edit'])->name('edit');
                Route::post('update/{baogia}', [BaogiaController::class, 'update'])->name('update');

                Route::get('destroy/{baogia}', [BaogiaController::class, 'destroy'])->name('destroy');
            }
        );
        Route::group(
            [
                'as' => 'thongtin.',
                'prefix' => 'thongtin',

            ],
            function () {
                Route::get('/', [ThongtinController::class, 'index'])->name('index');
                Route::get('show/{thongtin}', [ThongtinController::class, 'show'])->name('show');

                Route::get('create', [ThongtinController::class, 'create'])->name('create');
                Route::post('store', [ThongtinController::class, 'store'])->name('store');

                Route::get('edit/{thongtin}', [ThongtinController::class, 'edit'])->name('edit');
                Route::post('update/{thongtin}', [ThongtinController::class, 'update'])->name('update');

                Route::get('destroy/{thongtin}', [ThongtinController::class, 'destroy'])->name('destroy');
            }
        );
    }


);
Route::group(
    [
        'as' => 'chucnang.',
        'prefix' => 'chucnang',
    ],
    function () {
        Route::get('index', [ChucnangUserController::class, 'index']);
        Route::get('', [chucnanguserController::class, 'index'])->name('index');
        Route::get('show/{chucnang}', [chucnanguserController::class, 'show'])->name('show');

        Route::get('create', [chucnanguserController::class, 'create'])->name('create');
        Route::post('store', [chucnanguserController::class, 'store'])->name('store');

        Route::get('{chucnang}/edit', [chucnanguserController::class, 'edit'])->name('edit');
        Route::post('update/{chucnang}', [chucnanguserController::class, 'update'])->name('update');

        Route::get('destroy/{chucnang}', [chucnanguserController::class, 'destroy'])->name('destroy');

        Route::post('destroy/all', [chucnanguserController::class, 'destroyAllchucnanguser'])->name('destroyAllchucnang');
    }

);

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home');
