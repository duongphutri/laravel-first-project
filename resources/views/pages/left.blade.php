<section>
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h2>Category</h2>
            <div class="panel-group category-products" id="accordian">
                @foreach ($data_categories as $category)
                <!--category-productsr-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="{{ route('product',['category'=>$category->id]) }}">{{{ $category->name}}}</a></h4>
                    </div>
                </div>
                @endforeach
            </div>
            <!--/category-productsr-->

            <div class="brands_products">
                <!--brands_products-->
                <h2>Brands</h2>
                <div class="brands-name">
                    @foreach ($data_product as $product)
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="{{ route('product',['product'=>$product->id]) }}"> <span class="pull-right">({{count($product->mathangs)}})</span>{{$product->name}}</a></li>
                    </ul>
                    @endforeach
                </div>
            </div>
            <!--/brands_products-->

            {{-- <div class="price-range">
                <!--price-range-->
                <h2>Price Range</h2>
                <div class="well">
                    <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"
                        data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
                    <b>$ 0</b> <b class="pull-right">$ 600</b>
                </div>
            </div> --}}
            <!--/price-range-->

            <div class="shipping text-center">
                <!--shipping-->
                <img src="images/home/shipping.jpg" alt="" />
            </div>
            <!--/shipping-->
        </div>
    </div>
</section>
