@extends('front.layouts.master')
@section('title', isset($title) ? $title : 'Home')
@section('description', isset($description) ? $description : '')
@section('keywords', isset($keywords) ? $keywords : '')
@section('content')
    <!-- breadcrumb area start here  -->
    <style>
    .breadcrumb-area-image {
        padding: 5.5rem 0;
		@if($category_m->CategoryBanner)
        background-image: url('{{ asset('uploaded_files/category/'. $category_m->CategoryBanner)}}');
		@endif
		background-color : #F0E6DA
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        min-height: 200px;
    }
     .product-thumbnal-responsive {
        min-height: 180px !important;
    }
    </style>
    <div class="breadcrumb-area-image">
        <div class="container">
            <div class="breadcrumb-wrap text-center mt-5">
                <h1 class="page-title ">
                    {{ langConverter($category_m->en_Category_Name, $category_m->fr_Category_Name) }}
                </h1>
                <ul class="breadcrumb-pages d-none ">
                    <li class="page-item"><a class="page-item-link" href="{{ route('front') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="page-item">
                        {{ langConverter($category_m->en_Category_Name, $category_m->fr_Category_Name) }}</li>

                </ul>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end here  -->

    <!-- Product Area Start -->
    <div class="product-area my-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="sidebar-widget-area mobile-sidebar">
                        <div class="sidebar-widget-header d-block d-lg-none">
                            <div class="widget-header-wrap">
                                <h5 class="offcanvas-title">{{ __('Filter') }}</h5>
                                <button type="button" class="btn-close text-reset sidebar-close"></button>
                            </div>
                        </div>
                        {{--
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
                        --}}
                        <!-- Category -->

                         {{--<div class="single-widget categories-widget">
                            <h3 class="widget-title">{{ __('Categories') }}</h3>
                            <div class="categories-list">

                                <!-- Level 2 Category -->
                             @php
                                $level2_categories = App\Models\Admin\Category::where('parent_id',$category_m->id)->get();
                            @endphp
                            @foreach ($level2_categories as $level2_category)
                                @if(productCategoryCount($level2_category->id)>0)
                                    <div class="single-categorie">
                                        <div class="categorie-left">
                                            <input class="form-check-input CheckCategory" type="checkbox"
                                                value="{{ $level2_category->en_Category_Name }}">
                                            <label class="form-check-label ">{{ $level2_category->en_Category_Name }}</label>
                                        </div>
                                        <span class="categories-count">{{ productCategoryCount($level2_category->id) }}</span>
                                    </div>
                                @endif
                                <!-- Level 3 Category -->
                                @php
                                    $level3_categories = App\Models\Admin\Category::where('parent_id',$level2_category->id)->get();
                                @endphp
                                @foreach ($level3_categories as $level3_category)
                                    @if(productCategoryCount($level3_category->id)>0)
                                        <div class="single-categorie">
                                            <div class="categorie-left">
                                                <input class="form-check-input CheckCategory" type="checkbox"
                                                    value="{{ $level3_category->en_Category_Name }}">
                                                <label class="form-check-label ">{{ $level3_category->en_Category_Name }}</label>
                                            </div>
                                            <span class="categories-count">{{ productCategoryCount($level3_category->id) }}</span>
                                        </div>
                                    @endif
                                    <!-- Level 4 Category -->
                                    @php
                                    $level4_categories = App\Models\Admin\Category::where('parent_id',$level3_category->id)->get();
                                @endphp
                                    @foreach ($level4_categories as $level4_category)
                                        @if(productCategoryCount($level4_category->id)>0)
                                            <div class="single-categorie">
                                                <div class="categorie-left">
                                                    <input class="form-check-input CheckCategory" type="checkbox"
                                                        value="{{ $level4_category->en_Category_Name }}">
                                                    <label class="form-check-label ">{{ $level4_category->en_Category_Name }}</label>
                                                </div>
                                                <span class="categories-count">{{ productCategoryCount($level4_category->id) }}</span>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach

                            </div>
                        </div>--}}

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
                                    @if(productColorCount($color->id) > 0)
                                        <div class="single-colors">
                                            <div class="colors-left">
                                                <input style="background: {{ $color->ColorCode }}"
													title="{{ $color->Name }}"
                                                    class="form-check-input checkColor pointer" type="checkbox"
                                                    id="{{ $color->ColorCode }}" value="{{ $color->Name }}">
                                                <label class="form-check-label"
                                                    for="{{ $color->ColorCode }}">{{ $color->Name }}</label>
                                            </div>
                                            <span class="colors-count">{{ productColorCount($color->id) }}</span>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                        <div class="single-widget size-widget">
                            <h3 class="widget-title">{{ __('Size') }}</h3>
                            <div class="size-list">
                                @foreach ($sizes as $size)
                                    @if(productSizeCount($size->id) > 0)
                                        <div class="single-size">
                                            <input class="form-check-input checkSize" type="checkbox" id="{{ $size->id }}"
                                                value="{{ $size->Size }}">
                                            <label class="form-check-label"
                                                for="{{ $size->id }}">{{ $size->Size }}</label>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!--<div class="single-widget brand-widget">-->
                        <!--    <h3 class="widget-title">{{ __('Brand') }}</h3>-->
                        <!--    <div class="brand-list">-->
                        <!--        @foreach ($brands as $brand)-->
                        <!--            <div class="single-brand">-->
                        <!--                <div class="brand-left">-->
                        <!--                    <input class="form-check-input CheckBrand" type="checkbox"-->
                        <!--                        value="{{ $brand->en_BrandName }}">-->
                        <!--                    <label class="form-check-label"-->
                        <!--                        for="Renuar">{{ $brand->en_BrandName }}</label>-->
                        <!--                </div>-->
                        <!--                <span class="brand-count">{{ productBrandCount($brand->id) }}</span>-->
                        <!--            </div>-->
                        <!--        @endforeach-->
                        <!--    </div>-->
                        <!--</div>-->

                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">

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
                                    {{--<div class="list-grid-view">
                                        <a href="{{ route('category.product_left', $category_m->id) }}"
                                            class="view-btn list-view"><img class="view-icon"
                                                src="{{ asset('frontend/assets/images/view-list.svg') }}"
                                                alt="view-list" /></a>
                                        <a href="{{ route('category.product', $category_m->id) }}"
                                            class="view-btn grid-view active"><img class="view-icon"
                                                src="{{ asset('frontend/assets/images/view-grid.svg') }}"
                                                alt="view-grid" /></a>
                                    </div>--}}
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-filter">
                                   {{--<form>
                                        <select class="form-select sortingFilter">
                                            <option value="stop">{{ __('Categories') }}</option>
                                            @foreach (Category() as $item)

                                                    <option value="{{ route('category.product', $item->id) }}">
                                                        {{ langConverter($item->en_Category_Name, $item->fr_Category_Name) }}
                                                    </option>

                                            @endforeach


                                        </select>
                                    </form>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filterProduct">
                        <div class="product-list">
                            <div class="row">
                                @foreach ($products as $product)
                                    @include('front.layouts.include.category_wise_product_info')
                                @endforeach
                            </div>
                            <div class="pagination-area mt-30">
                                <ul class="paginations text-center">
                                    {{ $products->links('vendor.pagination.custom') }}
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
                {{--
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
                --}}
               {{-- <div class="single-widget categories-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{ __('Categories') }}</h3>
                    <div class="categories-list">
                        @foreach ($category as $cateogories)
                            <div class="single-categorie">
                                <div class="categorie-left">
                                    <input class="form-check-input CheckCategoryMobile" type="checkbox"
                                        value="{{ $cateogories->en_Category_Name }}">
                                    <label class="form-check-label">{{ $cateogories->en_Category_Name }}</label>
                                </div>
                                <span class="categories-count">{{ productCategoryCount($cateogories->id) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div> --}}

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
                                    <input
									style="background: {{ $color->ColorCode }}"
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
                {{--<div class="single-widget brand-widget p-0 bg-transparent">
                    <h3 class="widget-title">{{ __('Brand') }}</h3>
                    <div class="brand-list">
                        @foreach ($brands as $brand)
                            <div class="single-brand">
                                <div class="brand-left">
                                    <input class="form-check-input CheckBrandMobile" type="checkbox"
                                        value="{{ $brand->en_BrandName }}">
                                    <label class="form-check-label" for="Renuar">{{ $brand->en_BrandName }}</label>
                                </div>
                                <span class="brand-count">{{ productBrandCount($brand->id) }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>--}}

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
