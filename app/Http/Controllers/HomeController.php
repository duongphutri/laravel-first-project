<?php

namespace App\Http\Controllers;

use App\Mail\NewMailtrap;
use App\Models\categories;
use App\Models\donhang;
use App\Models\images;
use App\Models\mathang;
use App\Models\Product;
use App\Models\thuonghieu;
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
    public function product(Request $request)
    {
        if (!empty($request->input('product'))) {
            $mathang = product::find($request->input('product'))->mathangs;
        }
        if (!empty($request->input('category'))) {
            $mathang = categories::find($request->input('category'))->mathangs;
        } else {

            $mathang = mathang::all();
        }

        return view('pages.product', ['mathangs' => $mathang]);
    }
    public function mathangshow(mathang $mathang)
    {
        return view('pages.productdetails', ['mathang' => $mathang]);
    }
    public function productdetails(mathang $mathang)
    {
        return view('pages.productdetails', ['mathang' => $mathang]);
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
        $donhang = donhang::all();
        // dd($donhang->all());

        return view('pages.cart', ['donhangs' => $donhang]);
    }
    public function checkout()
    {
        $donhang = donhang::all();
        return view('pages.checkout', ['donhang' => $donhang]);
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
        if (array_key_exists($mathangs->id, $cart)) {
            $cart[$mathangs->id]['soluong'] = $cart[$mathangs->id]['soluong'] + 1;
        } else {
            $cart[$mathangs->id] = [
                'idmathang' => $mathang,
                'soluong' => 1,
                'name' => $mathangs->name,
                'gia' => $mathangs->gia,
                'id_product' => $mathangs->id_product,
            ];
        }

        $count = count($cart);
        session()->put([
            'cart' => $cart,
            'count' => $count,
        ]);
        return response()->json([
            'mathang' => session()->get('cart'),
            'count' => session()->get('count'),
        ]);
    }
}
