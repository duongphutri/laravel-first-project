<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\categories;
use App\Models\images;
use App\Models\Product;
use Faker\Provider\Image;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categories::paginate(10);

        return view('backend.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->except('_token');
        $created = categories::create($data);

        if (isset($data['image'])) {
            $image = $data['image'];
            $extension      = $image->getClientOriginalExtension();
            $fileNm         =  (string) \Str::uuid() . ".$extension";
            $fileCd         =  (string) \Str::uuid();
            $fileOrigin     =  $image->getClientOriginalName();
            $createBy       = auth()->user()->id;
            $idCategory         = $created->id;
            $object         = 'App\Models\categories';
            $order          = 99;

            $imageData = [
                'file_nm'           => $fileNm,
                'file_cd'           => $fileCd,
                'file_origin'       => $fileOrigin,
                'imageable_id'      => $idCategory,
                'imageable_object'  => $object,
                'size'              => $image->getSize(),
                'file_type'         => $extension,
                'created_by'        => $createBy,
                'order'             => $order,
            ];

            Storage::disk(config('filesystems.default'))->putFileAs("public/images", $image, $fileNm);

            images::create($imageData);
        }

        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $category)
    {
        return view('backend.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $category)
    {
        return view('backend.categories.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, categories $category)
    {
        $data = $request->except('_token');
        $category->update($data);
        if (isset($data['image'])) {
            $image = $data['image'];
            $extension      = $image->getClientOriginalExtension();
            $fileNm         =  (string) \Str::uuid() . ".$extension";
            $fileCd         =  (string) \Str::uuid();
            $fileOrigin     =  $image->getClientOriginalName();
            $createBy       = auth()->user()->id;
            $idcategory         = $category->id;
            $object         = 'App\Models\categories';
            $order          = 99;

            $imageData = [
                'file_nm'           => $fileNm,
                'file_cd'           => $fileCd,
                'file_origin'       => $fileOrigin,
                'imageable_id'      => $idcategory,
                'imageable_object'  => $object,
                'size'              => $image->getSize(),
                'file_type'         => $extension,
                'created_by'        => $createBy,
                'order'             => $order,
            ];
            //kiem tra anh cu va xoa no
            if ($category->image_category) {
                Storage::disk(config('filesystems.default'))->delete("public/images/" . $category->image_category->file_nm);
                $category->image_category->delete();
            }

            Storage::disk(config('filesystems.default'))->putFileAs("public/images", $image, $fileNm);

            Image::create($imageData);
        }

        return redirect()->route('admin.categories.index');
    }

    public function children(categories $category)
    {
        $children = $category->products;

        return view('backend.categories.children', ['children' => $children]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy(categories $category)
    {
        if ($category->image_category) {
            Storage::disk(config('filesystems.default'))->delete("public/images/" . $category->image_category->file_nm);
            $category->image_category()->delete();
        }
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
