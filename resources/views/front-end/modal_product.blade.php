<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-info">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body modal-spa">
                <div class="col-md-5 span-2">
                    <div class="item">
                        <img src="<?php echo url('/images/products'); ?>/{{ $modal_product->image }}" class="img-responsive" alt="">
                    </div>
                </div>
                <div class="col-md-7 span-1 ">
                    <h3>{{ $modal_product->name }}</h3>
                    <div class="price_single">
                        <span class="reducedfrom ">${{ $modal_product->price }}</span>
                        <div class="clearfix"></div>
                    </div>
                    <h4 class="quick">Description:</h4>
                    <p class="quick_desc">{{ $modal_product->details }}</p>
                    <div class="add-to">
                        <button class="btn btn-danger my-cart-btn my-cart-btn1 " data-id="{{ $modal_product->id }}" data-name="{{ $modal_product->name }}" data-summary="{{ $modal_product->name }}" data-price="{{ $modal_product->price }}" data-quantity="1" data-image="<?php echo url('/images/products'); ?>/{{ $modal_product->image }}">Add to Cart</button>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
</div>