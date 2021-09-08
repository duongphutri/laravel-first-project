@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Shopping Cart</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="name">tên</td>
                            <td class="description"></td>
                            <td class="price">giá</td>
                            <td class="quantity">soluong</td>
                            <td class="total">tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{dd(session()->get('cart'))}} --}}
                        <?php
                        $cart = session()->get('cart');
                        $tong = 0;
                        ?>

                        @foreach ($cart as $value)

                            <?php $tong += $value['gia'] * $value['soluong']; ?>
                            <tr>
                                <td>
                                    <p>{{ $value['name'] }}</p>
                                </td>
                                <td class="cart_description">
                                    <h4><a href=""></a></h4>
                                    <p></p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($value['gia']) }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up" href=""> + </a>
                                        <input class="cart_quantity_input" type="text" name="quantity" value="1"
                                            autocomplete="off" size="2">
                                        <a class="cart_quantity_down" href=""> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">
                                        {{ number_format($value['gia'] * $value['soluong'] ?? 'NULL') }}
                                    </p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div>

            <div class="row">
                <div class="col-sm-6">

                    <form action="{{ route('admin.donhang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">nguoimua</label>
                            <input type="text" value="{{ old('nguoimua') }}" class="form-control" name="nguoimua"
                                  placeholder="Enter nguoimua">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">sodienthoai</label>
                            <input type="tel" value="{{ old('sodienthoai') }}" class="form-control" name="sodienthoai"
                                  placeholder="Enter sodienthoai">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">diachi</label>
                            <input type="text" value="{{ old('diachi') }}" class="form-control" name="diachi"
                                  placeholder="Enter diachi">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">tongtien</label>
                            <input type="text" value="{{ $tong }}" class="form-control" name="tongtien"
                                  placeholder="Enter tongtien">
                        </div>

                        <input type="hidden" value="đã đặt hàng" class="form-control" name="trangthai"
                            >
                        <input type="text" value="{{ date('y-m-d') }}" class="form-control" name="ngaymua"
                            >
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                    {{-- <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul> --}}

                </div>
            </div>
            {{-- <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <li>Cart Sub Total <span>$59</span></li>
                        <li>Eco Tax <span>$2</span></li>
                        <li>Shipping Cost <span>Free</span></li>
                        <li>Total <span>$61</span></li>
                    </ul>
                    <a class="btn btn-default update" href="">Update</a>
                    <a class="btn btn-default check_out" href="">Check Out</a>
                </div>
            </div> --}}
        </div>
        </div>
    </section>
    <!--/#do_action-->
@endsection
