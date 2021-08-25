<?php

namespace App\Http\Controllers;

use App\Mail\NewMailtrap;
use App\Models\categories;
use App\Models\images;
use App\Models\mathang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {


        if ($request->has('category')) {
            $mathang = categories::find($request->category)->products;
        } else {
            $mathang = mathang::all();
        }
        return view('pages.home', ['mathangs' => $mathang]);
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function product()
    {
        $mathang = mathang::all();

        return view('pages.product', ['mathangs' => $mathang]);
    }
    public function productdetails()
    {
        return view('pages.productdetails');
    }
    public function blog()
    {
        return view('pages.blog');
    }
    public function blogsingle()
    {
        return view('pages.blogsingle');
    }
    public function cart()
    {
        return view('pages.cart');
    }
    public function checkout()
    {
        return view('pages.checkout');
    }
    public function error()
    {
        return view('pages.error');
    }
    public function login()
    {
        return view('pages.login');
    }
    public function searchmathang(Request $request)
    {
        $key = $request->except('_token');
        $mathang = mathang::where('name', 'like', '%' . $key['key'] . '%')->paginate(10);
        return view('pages.search', ['mathangs' => $mathang]);
    }
    public function postSendMail(Request $request)
    {
        \Mail::to($request->email)->send(new NewMailtrap($request->name, $request->email, $request->subject, $request->message));

        return view('pages.contact');
    }
    public function addtocart(Request $request)
    {
        $mathang = $request->idmathang;
        $mathangs = mathang::find($mathang);
        $cart = (session()->has('cart')) ? session()->get('cart') : [];
        $cart = [
            'idmathang' => $mathang,
            'soluong' => $mathangs->soluong,
        ];
        $count = count($cart);
        session()->put([
            'cart' => $cart,
            'count' => $count,
        ]);
        return response()->json([
            'code' => 'ok',
            'mathang' => session()->get('cart'),
            'count' => session()->get('count'),
        ]);
    }
}
