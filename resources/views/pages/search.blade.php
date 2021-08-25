@extends('layout')
@section('content')
    @foreach ($mathangs as $mathang)
        @if ($mathang->is_show)
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="/storage/images/{{ isset($mathang->image_mathang) ? $mathang->image_mathang->file_nm : null }}"
                                alt="" />
                            <h2>{{ number_format($mathang->gia) }}</h2>
                            <p>{{ $mathang->name }}</p>
                            <button id="addtocart{{ $mathang->id }}" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Addtocart</button>
                        </div>
                        {{-- <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>{{ $mathang->gia }}</h2>
                                <p>{{ $mathang->name }}</p>
                                <button id="addtocart{{ $mathang->id }}"
                                    class="btn btn-default add-to-cart"><i
                                        class="fa fa-shopping-cart"></i>Addtocart</button>
                            </div>
                        </div> --}}
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
