<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\categories;
use App\Models\images;
use App\Models\Product;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);

        return view('backend.product.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all();

        return view('backend.product.create', ['categories' => $categories]);
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
        $created = product::create($data);

        if (isset($data['image'])) {
            $image = $data['image'];
            $extension      = $image->getClientOriginalExtension();
            $fileNm         =  (string) \Str::uuid() . ".$extension";
            $fileCd         =  (string) \Str::uuid();
            $fileOrigin     =  $image->getClientOriginalName();
            $createBy       = auth()->user()->id;
            $idproduct         = $created->id;
            $object         = 'App\Models\product';
            $order          = 99;

            $imageData = [
                'file_nm'           => $fileNm,
                'file_cd'           => $fileCd,
                'file_origin'       => $fileOrigin,
                'imageable_id'      => $idproduct,
                'imageable_object'  => $object,
                'size'              => $image->getSize(),
                'file_type'         => $extension,
                'created_by'        => $createBy,
                'order'             => $order,
            ];

            Storage::disk(config('filesystems.default'))->putFileAs("public/images", $image, $fileNm);

            images::create($imageData);
        }
        $data['created_by'] = auth()->user()->id;
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('backend.product.show', ['product' => $product]);
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
        return view('backend.product.edit', [
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
        $product->update($data);

        if (isset($data['image'])) {
            $image = $data['image'];
            $extension      = $image->getClientOriginalExtension();
            $fileNm         =  (string) \Str::uuid() . ".$extension";
            $fileCd         =  (string) \Str::uuid();
            $fileOrigin     =  $image->getClientOriginalName();
            $createBy       = auth()->user()->id;
            $idproduct         = $product->id;
            $object         = 'App\Models\product';
            $order          = 99;

            $imageData = [
                'file_nm'           => $fileNm,
                'file_cd'           => $fileCd,
                'file_origin'       => $fileOrigin,
                'imageable_id'      => $idproduct,
                'imageable_object'  => $object,
                'size'              => $image->getSize(),
                'file_type'         => $extension,
                'created_by'        => $createBy,
                'order'             => $order,
            ];
            //kiem tra anh cu va xoa no
            if ($product->image_product) {
                Storage::disk(config('filesystems.default'))->delete("public/images/" . $product->image_product->file_nm);
                $product->image_product->delete();
            }

            Storage::disk(config('filesystems.default'))->putFileAs("public/images", $image, $fileNm);

            Image::create($imageData);
        }

        $data['created_by'] = auth()->user()->id;
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if ($product->image_product) {
            Storage::disk(config('filesystems.default'))->delete("public/images/" . $product->image_product->file_nm);
            $product->image_product->delete();
        }

        $product->delete();

        return redirect()->route('admin.product.index');
    }

    public function destroyAllProduct(Request $request)
    {
        $listProduct = $request->deleteProduct;

        foreach ($listProduct as $productId) {
            Product::find($productId)->delete();
        }

        return redirect()->route('admin.product.index');
    }
}
