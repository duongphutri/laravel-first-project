<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoremathangRequest;
use App\Http\Requests\UpdatemathangRequest;
use App\Models\categories;
use App\Models\images;
use App\Models\mathang;
use App\Models\Product;
use App\Models\Thongtin;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class mathangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mathangs = mathang::paginate(10);

        return view('backend.mathang.index', ['mathangs' => $mathangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all();
        $category = categories::all();
        $thongtin = Thongtin::all();
        return view('backend.mathang.create', [
            'products' => $products,
            'categories' => $category,
            'thongtins' => $thongtin,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoremathangRequest $request)
    {
        $data = $request->except('_token');
        $created = mathang::create($data);

        if (isset($data['image'])) {
            $image = $data['image'];
            $extension      = $image->getClientOriginalExtension();
            $fileNm         =  (string) \Str::uuid() . ".$extension";
            $fileCd         =  (string) \Str::uuid();
            $fileOrigin     =  $image->getClientOriginalName();
            $createBy       = auth()->user()->id;
            $idmathang         = $created->id;
            $object         = 'App\Models\mathang';
            $order          = 99;

            $imageData = [
                'file_nm'           => $fileNm,
                'file_cd'           => $fileCd,
                'file_origin'       => $fileOrigin,
                'imageable_id'      => $idmathang,
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
        return redirect()->route('admin.mathang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mathang  $mathang
     * @return \Illuminate\Http\Response
     */
    public function show(mathang $mathang)
    {
        return view('backend.mathang.show', ['mathang' => $mathang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mathang  $mathang
     * @return \Illuminate\Http\Response
     */
    public function edit(mathang $mathang)
    {
        $product = Product::all();
        $category = categories::all();
        $thongtin = Thongtin::all();
        return view('backend.mathang.edit', [
            'mathang' => $mathang,
            'products' => $product,
            'categories' => $category,
            'thongtins' => $thongtin,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mathang  $mathang
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatemathangRequest $request, mathang $mathang)
    {
        $data = $request->except('_token');
        $mathang->update($data);

        if (isset($data['image'])) {
            $image = $data['image'];
            $extension      = $image->getClientOriginalExtension();
            $fileNm         =  (string) \Str::uuid() . ".$extension";
            $fileCd         =  (string) \Str::uuid();
            $fileOrigin     =  $image->getClientOriginalName();
            $createBy       = auth()->user()->id;
            $idmathang      = $mathang->id;
            $object         = 'App\Models\mathang';
            $order          = 99;

            $imageData = [
                'file_nm'           => $fileNm,
                'file_cd'           => $fileCd,
                'file_origin'       => $fileOrigin,
                'imageable_id'      => $idmathang,
                'imageable_object'  => $object,
                'size'              => $image->getSize(),
                'file_type'         => $extension,
                'created_by'        => $createBy,
                'order'             => $order,
            ];
            //kiem tra anh cu va xoa no
            if ($mathang->image_mathang) {
                Storage::disk(config('filesystems.default'))->delete("public/images/" . $mathang->image_mathang->file_nm);
                $mathang->image_mathang->delete();
            }

            Storage::disk(config('filesystems.default'))->putFileAs("public/images", $image, $fileNm);
            info($fileNm);
            images::create($imageData);
        }

        $data['created_by'] = auth()->user()->id;
        return redirect()->route('admin.mathang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mathang  $mathang
     * @return \Illuminate\Http\Response
     */
    public function destroy(mathang $mathang)
    {
        if ($mathang->image_mathang) {
            Storage::disk(config('filesystems.default'))->delete("public/images/" . $mathang->image_mathang->file_nm);
            $mathang->image_mathang->delete();
        }

        $mathang->delete();

        return redirect()->route('admin.mathang.index');
    }

    public function destroyAllmathang(Request $request)
    {
        $listmathang = $request->deletemathang;

        foreach ($listmathang as $mathangId) {
            mathang::find($mathangId)->delete();
        }

        return redirect()->route('admin.mathang.index');
    }
}
