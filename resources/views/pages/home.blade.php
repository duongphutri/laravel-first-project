@extends('layout')
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <!--features_items-->
                        <h2 class="title text-center">Features Items</h2>
                        @foreach ($mathangs as $mathang)
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/storage/images/{{ isset($mathang->image_mathang) ? $mathang->image_mathang->file_nm : null }}"
                                                alt="" />
                                            <h2>{{ number_format($mathang->gia) }}</h2>
                                            <p>{{ $mathang->name }}</p>
                                            {{-- <button id="addtocart{{ $mathang->id }}"
                                                class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Addtocart</button> --}}
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
                                    {{-- <div class="choose">
                                        <ul class="nav nav-pills nav-justified">
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                            <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        @endforeach
                        <ul class="pagination">
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">&raquo;</a></li>
                        </ul>
                    </div>
                    <!--features_items-->
                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">New</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($mathangs as $mathang)
                                    @if ($mathang->is_new == 1)
                                        <div class="item active">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="/storage/images/{{ isset($mathang->image_mathang) ? $mathang->image_mathang->file_nm : null }}"
                                                                alt="" />
                                                            <h2>{{ number_format($mathang->gia) }}</h2>
                                                            <p>{{ $mathang->name }}</p>
                                                            <button id="addtocart{{ $mathang->id }}"
                                                                class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>Addtocart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="/storage/images/{{ isset($mathang->image_mathang) ? $mathang->image_mathang->file_nm : null }}"
                                                                alt="" />
                                                            <h2>{{ number_format($mathang->gia) }}</h2>
                                                            <p>{{ $mathang->name }}</p>
                                                            <button id="addtocart{{ $mathang->id }}"
                                                                class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>Addtocart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="recommended_items">
                        <!--recommended_items-->
                        <h2 class="title text-center">Hot</h2>

                        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($mathangs as $mathang)
                                    @if ($mathang->is_hot)
                                        <div class="item active">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="/storage/images/{{ isset($mathang->image_mathang) ? $mathang->image_mathang->file_nm : null }}"
                                                                alt="" />
                                                            <h2>{{ number_format($mathang->gia) }}</h2>
                                                            <p>{{ $mathang->name }}</p>
                                                            <button id="addtocart{{ $mathang->id }}"
                                                                class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>Addtocart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="col-sm-4">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">
                                                            <img src="/storage/images/{{ isset($mathang->image_mathang) ? $mathang->image_mathang->file_nm : null }}"
                                                                alt="" />
                                                            <h2>{{ number_format($mathang->gia) }}</h2>
                                                            <p>{{ $mathang->name }}</p>
                                                            <button id="addtocart{{ $mathang->id }}"
                                                                class="btn btn-default add-to-cart"><i
                                                                    class="fa fa-shopping-cart"></i>Addtocart</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!--/recommended_items-->
                </div>

            </div>
        </div>
    </section>
@endsection
