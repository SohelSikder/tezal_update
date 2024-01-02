<style>
/* Desktop*/
    @media (min-width: 625px) {
        .product-thumbnal-responsive {
            max-height: 295px !important;

        }
    }

    /* Mobile */
    @media (max-width: 624px) {
        .product-thumbnal-responsive {
            max-height: 156px !important;

        }

    }
</style>
<div class="col-lg-3 col-md-4 col-sm-6 col-6">
    <div class="single-grid-product" style="border: 0px solid white;">
        <div class="product-top">
            <a href="{{ route('single.product', $product->en_Product_Slug) }}">
			<img style="height:295px !important; min-height:200px !important;"
                    class="product-thumbnal product-thumbnal-responsive"
                    src="{{ asset(ProductImage() . $product->Primary_Image) }}"
                    alt="{{ __('product') }}" /></a>
            <div class="product-flags">
                @if ($product->ItemTag)
                    <span class="product-flag sale">{{ $product->ItemTag }}</span>
                @endif
                @if ($product->Discount>0)
                    <span
                        class="product-flag discount">{{ __('-') }}{{ $product->Discount }}%</span>
                @endif
            </div>
            <ul class="prdouct-btn-wrapper">
                <li class="single-product-btn">
                    <a class="product-btn CompareList" id="" data-id="{{ $product->id }}"
                        title="{{ __('Add To Compare') }}"><i
                            class="icon flaticon-bar-chart"></i></a>
                </li>
                <li class="single-product-btn">
                    <a class="product-btn MyWishList" data-id="{{ $product->id }}"
                        title="{{ __('Add To Wishlist') }}"><i
                            class="icon flaticon-like"></i></a>
                </li>
            </ul>
        </div>
        <div class="product-info text-center">
            {{--
            @foreach ($product->product_tags as $ppt)
                <h4 class="product-catagory">{{ $ppt->tag }}</h4>
            @endforeach
            --}}
            <input type="hidden" name="quantity" value="1" id="product_quantity">

            <h3 title="Product name" class="product-name" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-weight: 100; font-size: 14px; color: #1a1a1a;">
                <a class="product-link" href="{{ route('single.product', $product->en_Product_Slug) }}" title="{{ langConverter($product->en_Product_Name, $product->fr_Product_Name) }}">{{ langConverter($product->en_Product_Name, $product->fr_Product_Name) }}</a>
            </h3>

            <h3 title="Quantity" class="product-name" style="font-weight: 100; font-size: 12px; color: #1a1a1a;">
                @if($product->Quantity>0) {{ langConverter($product->Quantity, $product->fr_Quantity) }} @else &nbsp; @endif
                <!--<a class="product-link" href="{{ route('single.product', $product->en_Product_Slug) }}" title="{{ langConverter($product->en_Product_Name, $product->fr_Product_Name) }}"></a>-->
            </h3>

            <!-- This is server side code. User can not modify it. -->
            {!! productReview($product->id) !!}
            <div class="product-price">
                @if ($product->Discount>0)
                <span class="regular-price">{{ currencyConverter($product->Price) }}</span>
                @endif

                <span class="price">{{ currencyConverter($product->Discount_Price)  }}</span>

            </div>
            <a href="javascript:void(0)" title="{{ __('Add To Cart') }}" id="offcanvas" style="font-weight: 500; font-size: 1.6rem;"
                class="add-cart addCart" data-id="{{ $product->id }}">{{ __('Add To Cart') }}
                <i class="icon fas fa-plus-circle"></i></a>
        </div>
    </div>
</div>