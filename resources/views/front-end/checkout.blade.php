@extends('master_frontend')
@section('content')
    <div class="check-out">
        <div class="container">
            <div class="spec ">
                <h3>Order</h3>
                <div class="ser-t">
                    <b></b>
                    <span><i></i></span>
                    <b class="line"></b>
                </div>
            </div>
            <script>
                $(document).ready(function(c) {
                	var products = $.parseJSON(localStorage.getItem("products"));
                	$.ajax({
    		            type: "POST",
    		            url: "{{ url('/checkout_products_list')}}",
    		            data: {'products' : products},
    		            success: function(data) {
                           data = JSON.parse(data);
                            $.each(data.products, function(key,value){
                                $('#checkedout-product').append('<tr><td class="ring-in t-data"><h5>'+value.name+'</h5></td><td class="t-data">'+value.price+'</td><td class="t-data"><div class="entry value"><span class="span-1">'+value.quantity+'</span></div></td></tr>');
                            });
                            $('#checkedout-product').append('<tr><td colspan="3" class="ring-in t-data"><center><b>Total amount : </b> &#8377;'+data.total+'</center></td>></tr>')
                            $('#checkedout-product').append('<tr><td colspan="3"><button class="btn btn-primary pull-right"> Do Payment</button></td></tr>')
    				    }
    				})

                });
            </script>
            <table class="table" id="checkedout-product">
                <tr>
                    <th class="t-head head-it ">Products</th>
                    <th class="t-head">Price</th>
                    <th class="t-head">Quantity</th>
                </tr>
            </table>
        </div>
    </div>
@endsection