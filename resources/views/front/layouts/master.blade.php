<!DOCTYPE html>
<html lang="en">
@include('front.layouts.include.head')
@stack('post_css')

<style>
.language-container {
    display: flex;
    align-items: center;
}

.menu-link,
.btn-group {
    margin-right: 10px; /* Adjust the margin as needed */
}
.custom-icon{
    color: #D93669 !important;
}
 .icon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-right: 30px;
        }

        .circle {
            width: 40px;
            height: 40px;
            /*background-color: #D93669;*/
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
        }

        .circle img {
            width: 30px;
            height: 40px;
            object-fit: contain;
            /*filter: invert(1); */
        }

        .icon-label {
            margin-top: 5px;
            color: #333;
        }
    .header-area .header-top {
        padding: 0.8rem 0 !important;
        border-bottom: 2px solid {{ $allsettings['header_top_border_color'] }};
        background-color: {{ $allsettings['header_top_color'] }} !important;
    }
    .section {
        padding: 3rem 0;
    }

    .cart-page-area .bottom-box-title {
        font-size: 16px !important;
    }
    .checkout-page-login-box h2, .checkout-discount-box h2{
        font-size: 1.4rem !important;
    }

    .checkout .checkout-form .checkout-title {
        font-size: 1.4rem !important;
    }
    .checkout .cart-summary .summary-top h2 {
        font-size: 1.4rem !important;
    }

    .address-control{
        height:40px;
        width:370px;
        font-size: 1.5rem;
    }
    .modal{
        background-color: transparent !important;
    }
    .btn-modal{
        height: 50px;
        width: 100%;
        background-color: #D93669;
    }

    .modal-content{
        width: 700px; height:550px; border-radius: 30px;
    }
    .signin-signup-area .signin-signup-input {
    border: 1px solid #ddd;
    display: table-cell;
    float: left;
    font-size: 13px;
    height: 50px;
    margin: 0;
    padding: 6px 12px;
    position: relative;
    width: 100%;
    z-index: 2;
}
.form-control-lg {
    border-radius: 0.3rem;
    font-size: 1.25rem;
    height: calc(1.5em + 1rem + 2px);
    line-height: 1.5;
    padding: 0.5rem 1rem;
    height: 50px;
}

    #scrollUp {
        display: none !important;
    }

    p.contact-info {
        color: #ffffff !important;
    }

    a.lang {
        color: #ffffff !important;
    }

    .header-area .header-bottom {
        background-color: {{ $allsettings['header_bottom_color'] }} !important;
    }
	.header-area .header-bottom .menu-area .main-menu .menu-item .menu-link::after{
		background-color:{{ $allsettings['header_top_color'] }};
	}
	.header-area .header-bottom .menu-area .main-menu .menu-item .menu-link::before{
		background-color:{{ $allsettings['header_top_color'] }};
	}

    .header-area .header-middle {
        padding: 1.6rem 0 !important;
		background-color:{{ $allsettings['header_mid_color'] }}
    }

    .header-area .header-middle .header-middle-wrap .brand-area .brand-image {
        max-width: 200px!important;
    }

    .header-area .header-middle .header-middle-wrap .header-right .single-btn .header-btn .btn-left {
    position: relative;
    width: 2rem;
    height: 2rem;
    margin-right: 1rem !important;
}
    .header-area .header-middle .header-middle-wrap .header-right .single-btn .header-btn .btn-right .btn-text{
        font-size: 1.5rem !important;
    }

    /* collapse button */


    /* collapse button */

    /* .header-area .header-middle .header-middle-wrap .search-area .search-wrap{
        width: 90%;
    } */
    .header-area .header-middle .header-middle-wrap .search-area {
    width: 410px;
    }
    .footer-area .footer-widget-area .footer-brand-logo img {
        max-width: 230px;
    }

    .footer-area .footer-widget-area {
        padding: 4rem 0 0rem 0 !important;
    }

    .footer-area .footer-bottom {
        padding:1rem 0 !important;
    }

    footer.footer-area {
        border-top: 3px solid {{ $allsettings['header_bottom_color'] }} !important;
        background-color: #2A3143 !important;
        color: #ffffff !important;
    }


    .section-header-area {
        margin-bottom: 2rem !important;
    }

    .image-button {
        background-color: {{ $allsettings['Add_to_cart_color']}} !important;
        border-radius:50px !important;
		padding: 5px 10px;
		font-size:12px;
    }


    .image-button a{
        color: #ffffff !important;

        font-weight:bold !important;
    }

    button .image-button .btn.btn-sm {
        border-radius: 50px !important;
        padding:8px!important !important;
    }

    .footer-area .footer-widget-area .newsletter-widget .newsletter-form .form-group .subscribe-btn{
        background-color: {{ $allsettings['header_bottom_color'] }} !important;
    }

    .single-grid-product .product-top {
        margin-bottom:1rem !important;
    }

    .single-grid-product .product-info .product-price {
        margin-bottom:1rem !important;
    }

    .single-grid-product .product-info .product-name {
        margin-bottom:0.2rem !important;
    }

    .single-grid-product .product-info .add-cart {
    height:4rem !important;

    }

    a.add-cart.addCart {
        border-radius:50px !important;
        background-color:{{ $allsettings['Add_to_cart_color']}} !important;
        /*  */
        color: #ffffff !important;
        border: none !important;
    }
    .single-grid-product .product-info .product-name .product-link{
		font-size: 14px;
		font-weight: 400;
	}

    .single-grid-product {
        border-radius:10px !important;
    }

    .single-grid-product .product-info .product-review {
        margin-bottom: 0rem!important;
    }

    /*.breadcrumb-area {*/
    /*    padding: 1.5rem 0 !important;*/
    /*    min-height: 130px !important;*/
    /*}*/

    .footer-area .footer-widget-area .widget-menu .menu-item {

        margin-bottom: 0.5rem !important;
    }
    .intro-section-mobile{
            display: none;
        }


/*img.product-thumbnal {*/
/*    height: 230px !important;*/
/*    border-radius:10px !important;*/
/*}*/
.section-header-area .section-title {
            font-size: 2.5rem !important;
        }

    @media only screen and (max-width: 724px) {

        .modal-content{
        width: 360px; height:600px; border-radius: 20px;
        }
        .address-control{

            width:330px;

        }
        .lang-switcher .lang-list{
            left: 0 !important;
        }
        .intro-section{
            display: none;
        }
        .intro-section-mobile{
            display: block;
        }
        .breadcrumb-area-image{
            min-height: 0px !important;
        }

         .mobile-header-area .brand-logo .brand-image {
            max-width:150px !important;
            margin-top: 5px;
         }

        .mobile-header-area {
            padding: 7px 0 !important;
        }

        a.product-link {
            font-size: 13px !important;
        }

        .single-grid-product .product-info .product-price .regular-price {
            font-size:14px !important;

        }

        .single-grid-product .product-info .product-name{
            line-height:1.2rem !important;
        }

        .single-grid-product .product-info .product-price .price {
            font-size:14px !important;
        }
    }

    @media (max-width: 575px){
        .section-header-area .section-title {
            font-size: 2rem !important;
        }
}

</style>

<body class="{{ session()->has('lang_dir') && session()->get('lang_dir') == 'rtl' ? 'direction-rtl' : 'direction-ltr' }}">

    <!-- External code for body -->
    {!! $allsettings['code_body'] !!}

<!-- External code for body -->

    <!-- Preloader Area Start -->
    <!-- <div id="preloader">-->
    <!--    <div id="status">-->
    <!--        <img src="{{ asset(IMG_PRELOADER_PATH . $allsettings['preloader']) }}" alt="img" />-->
    <!--    </div>-->
    <!--</div> -->
    <!-- Preloader Area End -->

    @include('front.layouts.include.desktop_header')

    @include('front.layouts.include.mobile_header')

    @include('front.layouts.include.mobile_menu')

    @include('front.layouts.include.cart_sidebar_menu')

    @yield('content')
    <div id="AddToCompareItemUrl" data-url="{{ route('compare.add') }}"></div>
    <div id="AddToCartIntoSession" data-url="{{ route('add.to.cart') }}"></div>
    <div id="productWishlistUrl" data-url="{{ route('wishlist.add') }}"></div>
    <div id="currency-price-url" data-url="{{ route('currency_price') }}"></div>
    <div id="currency-symbol-url" data-url="{{ route('currency_symbol') }}"></div>
    <div id="productImgAsset" data-url="{{ asset(ProductImage()) }}"></div>

    @include('front.layouts.include.footer')

    {{-- @yield('subscribe_pop_up_modal') --}}

    <div class="modal fade common-modal" id="trackOrderModal" tabindex="-1" aria-labelledby="trackOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">{{ __('Track Order') }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('checkout.order_track') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">{{ __('Order Number') }}</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" name="order_number"
                                placeholder="{{ __('Enter order number') }}">
                        </div>
                        <div class="modal-btn-wrap text-end">
                            <button type="submit" class="primary-btn">{{ __('Track') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade common-modal" id="trackOrderModal" tabindex="-1" aria-labelledby="trackOrderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="exampleModalLabel">{{ __('Track Order') }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('checkout.order_track') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput2" class="form-label">{{ __('Order Number') }}</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" name="order_number"
                                placeholder="{{ __('Enter order number') }}">
                        </div>
                        <div class="modal-btn-wrap text-end">
                            <button type="submit" class="primary-btn">{{ __('Track') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade common-modal" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="">{{ __('Login') }}</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user.sign.modal') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="{{ __('Email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="{{ __('Password') }}">
                        </div>

                        <div class="modal-btn-wrap text-end">
                            <button type="submit" class="primary-btn">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- route url --}}
    <div id="DoNotSubscribe" data-url="{{ route('do.not.subscribe') }}"></div>
    <div id="SubscribeStore" data-url="{{ route('admin.subscribe.store') }}"></div>
    {{-- include file --}}
    @include('front.layouts.include.script')
    @stack('post_script')
    {{-- @include('sweetalert::alert') --}}

</body>

</html>
