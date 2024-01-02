@extends('front.layouts.master')


@section('content')
    <style>
    .breadcrumb-area-image {
        padding: 5.5rem 0;
       background-image: url('{{ asset('uploaded_files/category/')}}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center; 
        min-height: 200px; 
    }
     .product-thumbnal-responsive {
        min-height: 180px !important;
    }
    .static-catname{
                        color: #615E6E; width:95px; text-align: left; position: absolute; top: 50%; transform: translateY(-50%); font-weight:400; padding: 5px;font-size: 16px; margin-left: 5px;line-height:1;
                    }
    </style>
    
    <!-- breadcrumb area end here  -->

    <!-- Product Area Start -->
    <div class="product-area my-5">
        <div class="container">
            <div class="row">
                {{--<div class="col-xl-3 col-lg-4">
                    <div class="sidebar-widget-area mobile-sidebar">
                        <div class="sidebar-widget-header d-block d-lg-none">
                            <div class="widget-header-wrap">
                                <h5 class="offcanvas-title">{{ __('Filter') }}</h5>
                                <button type="button" class="btn-close text-reset sidebar-close"></button>
                            </div>
                        </div>
                        
                        <div class="single-widget search-widget">
                            <h3 class="widget-title">{{ __('Search Here') }}</h3>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="searchwidget" name="searchwidget"
                                        placeholder="{{ __('Product Store') }}" />
                                    <button type="button" class="search-btn"><i
                                            class="flaticon-search searchWidget"></i></button>
                                </div>
                            </form>
                        </div>
                        <!-- Category -->
                       

                        <div class="single-widget price-widget">
                            <h3 class="widget-title">{{ __('Price') }}</h3>
                            <form>
                                <div class="price-wrap">
                                    <div class="price-wrap-left">
                                        <div class="single-price">
                                            <input type="number" class="form-control" id="minPrice" name="min_price"
                                                placeholder="{{ __('৳ Min') }}" min="1" />
                                        </div>
                                        <div class="single-price">
                                            <input type="number" class="form-control" id="maxPrice" name="max_price"
                                                placeholder="{{ __('৳ Max') }}" />
                                        </div>
                                    </div>
                                    <button type="button" class="price-submit PriceSubmit"><i
                                            class="fas fa-play"></i></button>
                                </div>
                            </form>
                        </div>

                        <div class="single-widget colors-widget">
                            <h3 class="widget-title">{{ __('Colors') }}</h3>
                            <div class="colors-list">
                                @foreach ($colors as $color)
                                    <div class="single-colors">
                                        <div class="colors-left">
                                            <input style="background: {{ $color->ColorCode }}"
                                                class="form-check-input checkColor" type="checkbox"
                                                id="{{ $color->ColorCode }}" value="{{ $color->Name }}">
                                            <label class="form-check-label"
                                                for="{{ $color->ColorCode }}">{{ $color->Name }}</label>
                                        </div>
                                        <span class="colors-count">{{ productColorCount($color->id) }}</span>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="single-widget size-widget">
                            <h3 class="widget-title">{{ __('Size') }}</h3>
                            <div class="size-list">
                                @foreach ($sizes as $size)
                                    <div class="single-size">
                                        <input class="form-check-input checkSize" type="checkbox" id="{{ $size->id }}"
                                            value="{{ $size->Size }}">
                                        <label class="form-check-label"
                                            for="{{ $size->id }}">{{ $size->Size }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>


                    </div>
                </div>--}}
                <div class="col-xl-12 col-lg-8">
                    <div class="product-section-top">
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <div class="product-section-top-left">
                                    <button class="sidebar-filter d-block d-lg-none" type="button"
                                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample"
                                        aria-controls="offcanvasExample">
                                        {{ __('Filter') }} <img
                                            src="{{ asset('frontend/assets/images/angle-down.svg') }}"
                                            alt="angle-down" />
                                    </button>
                                    
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-filter">
                                   
                                  
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div id="filterProduct">
                        <div class="product-list">
                            <div class="row">
                                @foreach($categories as $item )
                                 @php
                                    $subCategories = DB::table('categories')->where('parent_id', $item->id)->get();
                                @endphp
                                @if(count($subCategories)>0)
                                   <!--<div class="col-6 col-md-3">-->
                                   <!--     <a class="static-catlink" href="{{ route('category.product_left', $item->id ) }}">-->
                                   <!--         <img class="img-fluid mb-3 featured_categories_image" src="{{ asset('uploaded_files/category/' . $item->CategoryImage) }}" alt="Image">-->
                                   <!--         <p class="static-catname">{{ langConverter ($item->en_Category_Name, $item->fr_Category_Name) }}</p>-->
                                   <!--     </a>-->
                                
                                   <!-- </div>-->
                                   <div class="col-6 col-md-3 static-catblock">
                                        <a class="static-catlink" href="{{ route('category.product_left', $item->id ) }}">
                                            <div class="cat-image-container" style="position: relative; display: inline-block;">
                                                <p class="static-catname">
                                                    {{ langConverter ($item->en_Category_Name, $item->fr_Category_Name) }}
                                                </p>
                                                <img class="img-fluid mb-3 featured_categories_image" src="{{ asset('uploaded_files/category/' . $item->CategoryImage) }}" alt="Rice &amp; Foodgrain">
                                            </div>
                                        </a>
                                    </div>  
                                @else
                                    <div class="col-6 col-md-3">
                                        <!--<a class="static-catlink" href="{{ route('category.product', $item->id ) }}">-->
                                        <!--    <img class="img-fluid mb-3 featured_categories_image" src="{{ asset('uploaded_files/category/' . $item->CategoryImage) }}" alt="Image">-->
                                        <!--    <p class="static-catname" style="color: #615E6E; width:120px; text-align: left; position: absolute; top: 50%; transform: translateY(-50%); font-weight:600; padding: 5px;font-size: 18px; margin-left: 5px;">{{ langConverter ($item->en_Category_Name, $item->fr_Category_Name) }}</p>-->
                                        <!--</a>-->
                                        
                                        <a class="static-catlink" href="{{ route('category.product', $item->id ) }}">
                                            <div class="cat-image-container" style="position: relative; display: inline-block;">
                                                <p class="static-catname" style="">
                                                    {{ langConverter ($item->en_Category_Name, $item->fr_Category_Name) }}
                                                </p>
                                                <img class="img-fluid mb-3 featured_categories_image" src="{{ asset('uploaded_files/category/' . $item->CategoryImage) }}" alt="Rice &amp; Foodgrain">
                                            </div>
                                        </a>
                                
                                    </div>
                                @endif
                                @endforeach
                            </div>
                            <div class="pagination-area mt-30">
                                <ul class="paginations text-center">
                               
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- For Mobile Filter Sidebar Start -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">{{ __('Filter') }}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="sidebar-widget-area">
                <div class="single-widget search-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{ __('Search Here') }}</h3>
                    <form action="#">
                        <div class="form-group">
                            <input type="text" class="form-control bg-color" id="searchWidgetMobile"
                                name="searchWidgetMobile" placeholder="{{ __('Product Store') }}" />
                            <button type="button" class="search-btn searchWidgetMobile"><i
                                    class="flaticon-search"></i></button>
                        </div>
                    </form>
                </div>

                
                <div class="single-widget price-widget">
                            <h3 class="widget-title"> {{ __('Price') }} </h3>
                            <form>
                                <div class="price-wrap">
                                    <div class="price-wrap-left">
                                        <div class="single-price">
                                            <input type="number" class="form-control" id="minPrice" name="min_price"
                                                placeholder="{{ __('৳ Min') }}" min="1" />
                                        </div>
                                        <div class="single-price">
                                            <input type="number" class="form-control" id="maxPrice" name="max_price"
                                                placeholder="{{ __('৳ Max') }}" />
                                        </div>
                                    </div>
                                    <button type="button" class="price-submit PriceSubmit"><i
                                            class="fas fa-play"></i></button>
                                </div>
                            </form>
                        </div>
                <div class="single-widget colors-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{ __('Colors') }}</h3>
                    <div class="colors-list">
                        @foreach ($colors as $color)
                            <div class="single-colors">
                                <div class="colors-left">
                                    <input style="background: {{ $color->ColorCode }}"
                                        class="form-check-input checkColorMobile" type="checkbox"
                                        id="{{ $color->ColorCode }}" value="{{ $color->Name }}">
                                    <label class="form-check-label"
                                        for="{{ $color->ColorCode }}">{{ $color->Name }}</label>
                                </div>
                                <span class="colors-count">{{ productColorCount($color->id) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="single-widget size-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{ __('Size') }}</h3>
                    <div class="size-list">

                        @foreach ($sizes as $size)
                            <div class="single-size">
                                <input class="form-check-input checkSizeMobile" type="checkbox" id="{{ $size->id }}"
                                    value="{{ $size->Size }}">
                                <label class="form-check-label" for="{{ $size->id }}">{{ $size->Size }}</label>
                            </div>
                        @endforeach

                    </div>
                </div>
               
                
            </div>
        </div>
    </div>
    <!-- For Mobile Filter Sidebar End -->

    <!-- Product Area End -->
    <div id="shortingUrl" data-url="{{ route('product.shorting') }}"></div>
    <div id="checkCategoryFilter" data-url="{{ route('product.filtering') }}"></div>

    <div id="checkCategoryFilter" data-url="{{ route('product.filtering') }}"></div>
    <div id="checkColorFilter" data-url="{{ route('product.filtering') }}"></div>
    <div id="checkBrandFilter" data-url="{{ route('product.filtering') }}"></div>
    <div id="checkSizeFilter" data-url="{{ route('product.filtering') }}"></div>
    <div id="searchWidgetFilter" data-url="{{ route('product.filtering') }}"></div>
    <div id="minMaxPriceFilter" data-url="{{ route('product.filtering') }}"></div>

    <div id="AddToCompareItemUrl" data-url="{{ route('compare.add') }}"></div>
    <div id="AddToCartIntoSession" data-url="{{ route('add.to.cart') }}"></div>
    <div id="productWishlistUrl" data-url="{{ route('wishlist.add') }}"></div>
    <div id="productImgAsset" data-url="{{ asset(ProductImage()) }}"></div>

    @push('post_script')
        <script src="{{ asset('frontend/assets/js/pages/product.js') }}"></script>
    @endpush
@endsection 
