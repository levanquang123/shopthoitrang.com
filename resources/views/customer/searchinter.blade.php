@extends('customer.maininterface')
@section('maininter-content')
  <section class="trending-products-area" id="section-template--14742516727872__1630312092f711827f">
    <div id="shopify-section-template--14742516727872__1630312092f711827f" class="shopify-section">
        <section class="trending-products-area" id="section-template--14742516727872__1630312092f711827f">
          <div class=" container-fluid" style="text-align: center">
            <div class="row mb--40 mb-md--30">
                <div class="col-12 text-center">
                  <h2 class="heading-secondary" style="font-family:'Trebuchet MS', sans-serif; font-size: 50px">
                      {{ $title }}
                  </h2>
                  <label style="text-align: center; font-size: 20px; color: black; padding-top: 5px"> {{ count($sanpham) }} sản phẩm</label>
                </div>  
              </div>
            <div class="row" style="display: flex">
                @foreach ($sanpham as $sp)
                    <div class="col-2">
                        <div class="airi-product product-wrapper">
                            <div class="product-inner">
                                <figure class="product-image">
                                    <div class="product-image--holder product-img">
                                        <a href="{{ route('increase-view', ['ma_san_pham' => $sp->ma_san_pham]) }}">
                                            @if ($sp->hinhAnhs->isNotEmpty())
                                                <img src="{{ asset('storage/images/' . $sp->hinhAnhs->first()->duong_dan) }}" alt="{{ $sp->ten_san_pham }}" class="primary-image">
                                                @if ($sp->hinhAnhs->count() > 1)
                                                    <img src="{{ asset('storage/images/' . $sp->hinhAnhs[1]->duong_dan) }}" alt="{{ $sp->ten_san_pham }}" class="secondary-image">
                                                @else
                                                    <img src="{{ asset('storage/images/' . $sp->hinhAnhs->first()->duong_dan) }}" alt="{{ $sp->ten_san_pham }}" class="secondary-image">
                                                @endif
                                            @else
                                                <img src="default_primary_image_url" alt="{{ $sp->ten_san_pham }}" class="primary-image">
                                                <img src="default_secondary_image_url" alt="{{ $sp->ten_san_pham }}" class="secondary-image">
                                            @endif
                                        </a>
                                    </div>
                                   
                                </figure>
                                <div class="product-info text-center">
                                    <h3 class="product-title popup_cart_title">
                                        <a href="{{ route('increase-view', ['ma_san_pham' => $sp->ma_san_pham]) }}">{{ $sp->ten_san_pham }}</a>
                                    </h3>
                                    <div class="product-rating">
                                        <span>
                                            <span class="shopify-product-reviews-badge" data-id="{{ $sp->ma_san_pham }}"></span>
                                        </span>
                                    </div>
                                    <span>
                                        <span class="btn btn-danger" style="font-weight:bolder">{{ $sp->gia_ban }} VNĐ</span>
                                    </span>
                                    <div class="product-color-swatch product-color">
                                        <ul class="grid-color-swatch">
                                           
                                        </ul>
                                        <script>
                                            
                                            $('.product-color li label').hover(function(){
                                                var variantImage = jQuery(this).parent().find('.hidden a').attr('href');
                                                jQuery(this).parents('.product-wrapper').find('.product-img > a > img').attr({ src: variantImage }); 
                                                return false;
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <br>
            <br>
          </div>
        </section>  
      </div>
  </section>  
@endsection