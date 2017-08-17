@extends('master_frontend')
@section('content')
    <!---->
    <div data-vide-bg="video/video">
        <div class="container">
            <div class="banner-info">
                <h3>It is a long established fact that a reader will be distracted by 
            the readable </h3>
                <div class="search-form">
                    <form action="#" method="post">
                        <input type="text" placeholder="Search..." name="Search...">
                        <input type="submit" value=" ">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    window.jQuery || document.write('<script src="<?php echo asset("assets/front-end/"); ?>/js/vendor/jquery-1.11.1.min.js"><\/script>')
    </script>
    <script src="<?php echo asset('assets/front-end/'); ?>/js/jquery.vide.min.js"></script>
    <!--content-->
<div class="content-top ">
    <div class="container ">
        <div class="spec ">
            <h3>Products</h3>
            <div class="ser-t">
                <b></b>
                <span><i></i></span>
                <b class="line"></b>
            </div>
        </div>
        <div class="tab-head " style="padding:50px">
            <!-- <nav class="nav-sidebar">
                <ul class="nav tabs ">
                    @foreach ($main_categories as $categories)
                        <li class=""><a href="#tab{{ $categories['id'] }}" data-toggle="tab">{{ $categories['name'] }}</a></li>
                    @endforeach
                </ul>
            </nav> -->
            <div class=" tab-content tab-content-t ">
                <div class="tab-pane active text-style" id="tab1">
                    <div class='con-w3l'>
                        <?php $i=0; ?>
                        @foreach ($home_products as $home_products)
                            <div class="col-md-3 m-wthree " style="margin-bottom:15px">
                                <div class="col-m">
                                    <a href="#" data-toggle="modal" data-id="{{ $home_products['id'] }}" data-target="#myModal1" class="offer-img">
    									<img src="<?php echo url("images/products/$home_products[image]"); ?>" class="img-responsive" alt="" width="110" height="110">
    									<div class="offer"><p><span>Offer</span></p></div>
    								</a>
                                    <div class="mid-1">
                                        <div class="women">
                                            <h6><a href="{{ url('single_product/'.$home_products['id'])}}">{{ $home_products['name'] }}</a> ( {{ $home_products['quantity'] }} )</h6>
                                        </div>
                                        <div class="mid-2">
                                            <p>
                                            <em class="item_price">${{ $home_products['price'] }}</em></p>
                                            <div class="block">
                                                <div class="starbox small ghosting"> </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="add">
                                            <button class="btn btn-danger my-cart-btn my-cart-b " data-id="{{ $home_products['id'] }}" data-name="{{ $home_products['name'] }}" data-summary="{{ $home_products['name'] }}" data-price="{{ $home_products['price'] }}" data-quantity="1" data-image="<?php echo url("images/products/$home_products[image]"); ?>">Add to Cart</button>
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
                <!-- <div class="tab-pane  text-style" id="tab5">
                    <div class=" con-w3l">
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                    <img src="<?php echo asset('assets/front-end/'); ?>/images/of.png" class="img-responsive" alt="">
                                    <div class="offer"><p><span>Offer</span></p></div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">dsfghdfhjdfg</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p>
                                            <label>$2.00</label><em class="item_price">$1.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
          
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="tab-pane  text-style" id="tab9">
                    <div class=" con-w3l">
                        <div class="col-md-3 m-wthree">
                            <div class="col-m">
                                <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                                    <img src="<?php echo asset('assets/front-end/'); ?>/images/of.png" class="img-responsive" alt="">
                                    <div class="offer"><p><span>Offer</span></p></div>
                                </a>
                                <div class="mid-1">
                                    <div class="women">
                                        <h6><a href="single.html">dsfghdfhjdfg9999999</a>(1 kg)</h6>
                                    </div>
                                    <div class="mid-2">
                                        <p>
                                            <label>$2.00</label><em class="item_price">$1.50</em></p>
                                        <div class="block">
                                            <div class="starbox small ghosting"> </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="add">
                                        <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
          
                        <div class="clearfix"></div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
@endsection