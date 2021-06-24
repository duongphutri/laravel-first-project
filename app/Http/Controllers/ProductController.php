<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\categories;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all();

        return view('product.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->except('_token');

        if (isset($data['image'])) {
            $image = $data['image'];
            $imageName = $image->getClientOriginalName();           //lay ten goc cua file
            $storedPath = $image->move('images', $imageName);       //luu image->public/images/*

            $pathSaveImage = $storedPath->getPathname();            //lay link images/ten file
            $data['image'] = $pathSaveImage;
        }

        Product::create($data);

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = categories::all();
        return view('product.edit', [
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->except('_token');

        if (isset($data['image'])) {
            if ($product->image) {
                @unlink($product->image);
            }
            $image = $data['image'];
            $imageName = $image->getClientOriginalName();
            $storedPath = $image->move('images', $imageName);
            $pathSaveImage = $storedPath->getPathname();
            $data['image'] = $pathSaveImage;
        };

        $product->update($data);

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }

    public function destroyAllProduct(Request $request)
    {
        $listProduct = $request->deleteProduct;

        foreach ($listProduct as $productId) {
            Product::find($productId)->delete();
        }

        return redirect()->route('product.index');
    }
}
