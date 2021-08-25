<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredonhangRequest;
use App\Http\Requests\UpdatedonhangRequest;
use App\Models\donhang;
use App\Models\images;
use App\Models\mathang;
use App\Models\Product;
use Faker\Provider\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class donhangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donhangs = donhang::paginate(10);

        return view('backend.donhang.index', ['donhangs' => $donhangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mathangs = mathang::all();

        return view('backend.donhang.create', ['mathangs' => $mathangs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $created = donhang::create($data);

        if (isset($data['image'])) {
            $image = $data['image'];
            $extension      = $image->getClientOriginalExtension();
            $fileNm         =  (string) \Str::uuid() . ".$extension";
            $fileCd         =  (string) \Str::uuid();
            $fileOrigin     =  $image->getClientOriginalName();
            $createBy       = auth()->user()->id;
            $iddonhang         = $created->id;
            $object         = 'App\Models\donhang';
            $order          = 99;

            $imageData = [
                'file_nm'           => $fileNm,
                'file_cd'           => $fileCd,
                'file_origin'       => $fileOrigin,
                'imageable_id'      => $iddonhang,
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
        return redirect()->route('admin.donhang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function show(donhang $donhang)
    {
        return view('backend.donhang.show', ['donhang' => $donhang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function edit(donhang $donhang)
    {
        $mathangs = mathang::all();
        return view('backend.donhang.edit', [
            'donhang' => $donhang,
            'mathangs' => $mathangs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, donhang $donhang)
    {
        $data = $request->except('_token');
        $donhang->update($data);

        if (isset($data['image'])) {
            $image = $data['image'];
            $extension      = $image->getClientOriginalExtension();
            $fileNm         =  (string) \Str::uuid() . ".$extension";
            $fileCd         =  (string) \Str::uuid();
            $fileOrigin     =  $image->getClientOriginalName();
            $createBy       = auth()->user()->id;
            $iddonhang         = $donhang->id;
            $object         = 'App\Models\donhang';
            $order          = 99;

            $imageData = [
                'file_nm'           => $fileNm,
                'file_cd'           => $fileCd,
                'file_origin'       => $fileOrigin,
                'imageable_id'      => $iddonhang,
                'imageable_object'  => $object,
                'size'              => $image->getSize(),
                'file_type'         => $extension,
                'created_by'        => $createBy,
                'order'             => $order,
            ];
            //kiem tra anh cu va xoa no
            if ($donhang->image_donhang) {
                Storage::disk(config('filesystems.default'))->delete("public/images/" . $donhang->image_donhang->file_nm);
                $donhang->image_donhang->delete();
            }

            Storage::disk(config('filesystems.default'))->putFileAs("public/images", $image, $fileNm);

            images::create($imageData);
        }

        $data['created_by'] = auth()->user()->id;
        return redirect()->route('admin.donhang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donhang  $donhang
     * @return \Illuminate\Http\Response
     */
    public function destroy(donhang $donhang)
    {
        if ($donhang->image_donhang) {
            Storage::disk(config('filesystems.default'))->delete("public/images/" . $donhang->image_donhang->file_nm);
            $donhang->image_donhang->delete();
        }

        $donhang->delete();

        return redirect()->route('admin.donhang.index');
    }

    public function destroyAlldonhang(Request $request)
    {
        $listdonhang = $request->deletedonhang;

        foreach ($listdonhang as $donhangId) {
            donhang::find($donhangId)->delete();
        }

        return redirect()->route('admin.donhang.index');
    }
}
