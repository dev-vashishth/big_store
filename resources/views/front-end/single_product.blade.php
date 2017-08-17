@extends('master_frontend')
@section('content')
<div class="banner-top">
    <div class="container">
        <h3>{{ $product['name'] }}</h3>
        <h4><a href="#">Home</a><label>/</label>{{ $product['name'] }}</h4>
        <div class="clearfix"> </div>
    </div>
</div>
<div class="single">
    <div class="container">
        <div class="single-top-main">
            <div class="col-md-5 single-top">
                <div class="single-w3agile">
                    <div id="picture-frame">
                        <img src="{{ url('images/products/'.$product["image"])}}" data-src="{{ url("images/products/$product[image]")}}" alt="" data-id="{{ $product['id'] }}" class="img-responsive" />
                    </div>
                    <script src="<?php echo asset('assets/front-end/'); ?>/js/jquery.zoomtoo.js"></script>
                    <script>
                    $(function() {
                        $("#picture-frame").zoomToo({
                            magnify: 1
                        });
                    });
                    </script>
                </div>
            </div>
            <div class="col-md-7 single-top-left ">
                <div class="single-right">
                    <h3>{{ $product['name'] }}</h3>
                    <div class="pr-single">
                        <p class="reduced ">
                            &#8377; {{ $product['price'] }}</p>
                    </div>
                    <div class="block block-w3">
                        <div class="starbox small ghosting"> </div>
                    </div>
                    <p class="in-pa"> {{ $product['details'] }} </p>
                    <ul class="social-top">
                        <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                        <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
                        <li><a href="#" class="icon pinterest"><i class="fa fa-pinterest-p" aria-hidden="true"></i><span></span></a></li>
                        <li><a href="#" class="icon dribbble"><i class="fa fa-dribbble" aria-hidden="true"></i><span></span></a></li>
                    </ul>
                    <div class="add add-3">
                        <button class="btn btn-danger my-cart-btn my-cart-b" data-id="{{ $product['id'] }}" data-name="{{ $product['name'] }}" data-summary="{{ $product['name'] }}" data-price="{{ $product['price'] }}" data-quantity="1" data-image="{{ url('images/products/'.$product["image"])}}">Add to Cart</button>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="content-top ">
    <div class="container ">
        <div class="spec ">
            <h3>Similar Products</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class="tab-head " style="padding:50px">
            <div class=" tab-content tab-content-t ">
                <div class="tab-pane active text-style" id="tab1">
                    <div class='con-w3l'>
                        <?php $i=0; ?>
                        @foreach ($similar_products as $products)
                            <div class="col-md-3 m-wthree" style="margin-bottom:15px">
                                <div class="col-m">
                                    <a href="#" data-toggle="modal" data-target="#myModal1" data-id="{{ $products['id'] }}" class="offer-img">
    									<img src="<?php echo url("images/products/$products[image]"); ?>" class="img-responsive" alt="" width="110" height="110">
    									<div class="offer"><p><span>Offer</span></p></div>
    								</a>
                                    <div class="mid-1">
                                        <div class="women">
                                            <h6><a href="{{ url('single_product/'.$products['id'])}}">{{ $products['name'] }}</a> ( {{ $products['quantity'] }} )</h6>
                                        </div>
                                        <div class="mid-2">
                                            <p>
                                            <em class="item_price">${{ $products['price'] }}</em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="add">
                                            <button class="btn btn-danger my-cart-btn my-cart-b " data-id="{{ $products['id'] }}" data-name="{{ $products['name'] }}" data-summary="{{ $products['name'] }}" data-price="{{ $products['price'] }}" data-quantity="1" data-image="<?php echo url("images/products/$products[image]"); ?>">Add to Cart</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php 
                            ++$i;
                            echo ($i % 4 == 0) ? ' <div class="clearfix"></div>' : '';
?>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection