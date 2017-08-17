@extends('master_frontend')
@section('content')
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
            <div class=" tab-content tab-content-t ">
                <div class="tab-pane active text-style" id="tab1">
                    <div class='con-w3l'>
                        <?php $i=0; ?>
                        @foreach ($products['data'] as $products)
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
                                            <button class="btn btn-danger my-cart-btn my-cart-b " data-id="1" data-name="Moong" data-summary="summary 1" data-price="1.50" data-quantity="1" data-image="images/of.png">Add to Cart</button>
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