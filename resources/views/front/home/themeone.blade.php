<style>
    @media (max-width: 624px) {
        .slider-image {
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            /*min-height: 350px;*/
            height: 150px !important;
            border-radius: 0px;
            padding: 0px;
}
        }

</style>
<!--mobile slider -->
<!--mobile header -->
@if(count($sliders) > 0)
<section class="intro-section">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <!--{{ $sliders }}-->
            @foreach ($sliders as $slider)
                <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                    <a href="{{ $slider->link }}"><img class="d-block w-100 slider-image"
                            src="{{ asset(SliderImage() . $slider->Background_Image) }}" alt="First slide"></a>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</section>
@endif
<!-- hero-section area end here  -->
@if(count($sliders) > 0)
    <section class="intro-section-mobile">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!--{{ $sliders }}-->
                @foreach ($sliders as $slider)
                    <div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}">
                        <a href="{{ $slider->link }}"><img class="d-block w-100 slider-image"
                                src="{{ asset(SliderImage() . $slider->background_image_mobile) }}" alt="First slide"></a>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>
@endif

{{-- story are start  --}}
<style>
    .fancybox-shop-now:hover {
        color: #ffffff !important;
    }
    .custom-fancybox .fancybox-toolbar .fancybox_shop_now{
        background-color:{{ $allsettings['Add_to_cart_color']}}!important;
    }
</style>

@if(count($stories) > 0)
<div class="blog-area  section-bg ">
    <div class="container">
        <div class="section-header-area" style="margin-bottom:2rem !important;">
            <div class="row">
                <div class="col-md-6 mt-3">
                    <h2 class="section-title">
                        {{ __("OUR STORY")}}
                    </h2>
                </div>
            </div>
        </div>
        <!-- todays story Start -->
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    @foreach ($stories as $data)
                        <div class="swiper-slide">
                            <div class="image-container">
                                @if ($data->image == null)
                                    <a data-fancybox="gallery" data-type="video"
                                        data-src="{{ asset('uploaded_files/videos/' . $data->video) }}"
                                        href="{{ asset('uploaded_files/videos/' . $data->video) }}"
                                        onclick="getImageId('{{ $data->id }}')">
                                        <video controls>
                                            <source src="{{ asset('uploaded_files/videos/' . $data->video) }}"
                                                type="video/mp4">
                                        </video>
                                        <button class="image-button btn btn-sm">
                                            <a href = "{{ $data->product_url }}"> Shop now</a>

                                        </button>
                                    </a>
                                @else
                                    <a data-fancybox="gallery" href="{{ asset('uploaded_files/story/' . $data->image) }}"
                                        data_f_link="abc.com">
                                        <img class="fancybox-close" src="{{ asset('uploaded_files/story/' . $data->image) }}"
                                            onclick="getImageId('{{ $data->id }}')" alt="Image">
                                        <a href="{{$data->product_url}}"
                                            class="image-button btn btn-sm fancybox-shop-now">Shop now</a>

                                        <input type="hidden" name=""
                                            id="story{{ special_characters_replace(asset('uploaded_files/story/' . $data->image)) }}"
                                            value="{{$data->product_url}}">
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
</div>
 @endif
{{-- story are end  --}}



<!-- brads area start here  -->
{{-- <div class="brads-area">
        <div class="container">
            <div class="brads-slide">
                @foreach ($brands as $brand)
                    <div class="sigle-brad">
                        <img src="{{ asset(BrandImage() . $brand->BrandImage) }}" alt="brad image" />
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
<!-- brads area end here  -->

<!-- Popular Categories area start here  -->
@php
    $featured_categories = DB::table('categories')
        ->where('is_featured', 1)
        ->whereNotNull('position')
        ->orderBy('position', 'ASC')
        ->get(['CategoryImage', 'en_Category_Name', 'fr_Category_Name', 'position', 'id']);
@endphp
@if(count($featured_categories) > 0)
<div class="popular-categories-area">
    <div class="container">
        <div class="section-header-area">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="sub-title">
                        {{-- {{ langConverter(siteContentHomePage('many_goods')->en_Title, siteContentHomePage('many_goods')->fr_Title) }} --}}
                    </h3>
                    <h2 class="section-title">
                        {{ langConverter(siteContentHomePage('many_goods')->en_Description_One, siteContentHomePage('many_goods')->fr_Description_One) }}
                    </h2>
                </div>
                {{-- <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{ route('all.product') }}" class="primary-btn">{{ __('View All Products') }}</a>
                    </div> --}}
            </div>
        </div>

        <div class="team_container mb-10">
            <div class="row ">

                <style>
                    /* DESKTOP */
                    .featured_categories_image {
                        max-height: 130px !important;

                        height: auto;
                        width: 100%;

                    }
                    .static-catname{
                        color: #615E6E; width:100px; text-align: left; position: absolute; top: 50%; transform: translateY(-50%); font-weight:400; padding: 5px;font-size: 16px; margin-left: 5px;line-height: 1;
                    }

                    @media (min-width: 624px) {
                        .featured_categories {
                            max-height: 30px !important;
                            height: 30px !important;
                            width: 120px !important;

                        }

                    }

                    /* MOBILE */
                    @media (max-width: 624px) {
                        .featured_categories_image {
                            /*max-height: 60px !important;*/
                            /*height: 160px !important; */
                            /* width: 160px !important;*/
                            /*height: 30px !important;*/
                            /*width: auto;*/
                            height: auto;
                            width: 100%;

                        }
                        .static-catname{
                            font-size: 12px;
                            width: 80px;
                            line-height: 1;
                        }

                    }
                </style>
                @foreach ($featured_categories as $item)
                    {{-- {{ $item->position }} --}}
                    @php
                        $subCategories = DB::table('categories')->where('parent_id', $item->id)->get();
                    @endphp
                    @if(count($subCategories)>0)
                        <div class="col-6 col-md-3 static-catblock">
                            <a class="static-catlink" href="{{ route('category.product_left', $item->id ) }}">
                                <div class="cat-image-container" style="position: relative; display: inline-block;">
                                    <p class="static-catname" style="">
                                        {{ langConverter ($item->en_Category_Name, $item->fr_Category_Name) }}
                                    </p>
                                    <img class="img-fluid mb-3 featured_categories_image" src="{{ asset('uploaded_files/category/' . $item->CategoryImage) }}" alt="{{ langConverter ($item->en_Category_Name, $item->fr_Category_Name) }}">
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-6 col-md-3 static-catblock">
                            <a class="static-catlink" href="{{ route('category.product', $item->id) }}">
                                <div class="cat-image-container" style="position: relative; display: inline-block;">
                                    <p class="static-catname" style="">
                                        {{ langConverter ($item->en_Category_Name, $item->fr_Category_Name) }}
                                    </p>
                                    <img class="img-fluid mb-3 featured_categories_image" src="{{ asset('uploaded_files/category/' . $item->CategoryImage) }}" alt="{{ langConverter ($item->en_Category_Name, $item->fr_Category_Name) }}">
                                </div>
                            </a>
                        </div>
                     {{--<div class="col-lg-2 col-md-3 col-sm-6 col-6 mt-3  mb-3">

                        <a href="{{ route('category.product', $item->id) }}"
                            title="{{ optional($item)->en_Category_Name }}">
                            <div class="team__items text-center  hover-zoom" onmouseover="zoomIn(this)"
                                onmouseout="zoomOut(this)">

                                <img class="featured_categories_image" title="{{ optional($item)->en_Category_Name }}"
                                    src="{{ asset('uploaded_files/category/' . $item->CategoryImage) }}" alt="">

                                <div class="">
                                    <p style="color: #615E6E;text-align: center;"> {{ langConverter ($item->en_Category_Name, $item->fr_Category_Name) }}</p>
                                </div>
                            </div>
                        </a>

                    </div>--}}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
<!-- Popular Categories area end here  -->




<!-- Home active Category Products area start here  -->
@if (count($active_caetgory_products_into_home) > 0)
    @foreach ($active_caetgory_products_into_home as $home_category)
        @php
            $home_cat_products = App\Models\Admin\Product::with('brand', 'category', 'colors', 'sizes', 'product_tags')
                ->where('Category_Id', $home_category->id)
                ->limit(8)
                ->get();
        @endphp
        @if (count($home_cat_products) > 0)
            <div class="featured-productss-area ">
                <div class="container">
                    <div class="section-header-area">
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="sub-title">
                                    {{-- {{ langConverter(siteContentHomePage('products')->en_Title, siteContentHomePage('products')->fr_Title) }} --}}
                                </h3>
                                <h2 class="section-title">
                                    {{ optional($home_category)->en_Category_Name }}
                                </h2>
                            </div>
                            <div class="col-md-6 align-self-end text-md-end">
                                <a href="{{ route('category.product', $home_category->id) }}"
                                    class="see-btn">{{ __('See All') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($home_cat_products as $product)
                            @include('front.layouts.include.product_info')
                        @endforeach

                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endif
<!-- Home active Category Products area start here  -->


<!-- Best Selling area start here  -->
@if(count($best_sellings) > 0)
<div class="featured-productss-area ">
    <div class="container">
        <div class="section-header-area">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="sub-title">
                        {{-- {{ langConverter(siteContentHomePage('products')->en_Title, siteContentHomePage('products')->fr_Title) }} --}}
                    </h3>
                    <h2 class="section-title">
                        {{ __('BEST SELLING') }}
                    </h2>
                </div>
                <div class="col-md-6 align-self-end text-md-end">
                    <a href="{{ route('bestSelling.product') }}" class="see-btn">{{ __('See All') }}</a>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($best_sellings as $product)
                @include('front.layouts.include.product_info')
            @endforeach

        </div>
    </div>
</div>
@endif
<!-- Best Selling area start here end  -->
@if(count($promotion) > 0)
    <div class="product-banner">
        <div class="container">
            <div class="row">
                @foreach ($promotion as $promo)
                    <div class="col-md-5">
                        <a href="#" class="single-banner"><img class="banner-image"
                                src="{{ asset(PromotionImage() . $promo->Image_One) }}" alt="product-banner" /></a>
                    </div>
                    <div class="col-md-7">
                        <a href="#" class="single-banner"><img class="banner-image"
                                src="{{ asset(PromotionImage() . $promo->Image_Two) }}" alt="product-banner" /></a>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
@endif
<!-- Products area start here  -->
 @php
    $allproducts =App\Models\Admin\Product::with('brand', 'category', 'colors', 'sizes', 'product_tags')
                ->inRandomOrder()
                ->take(28)
                ->get();

@endphp
@if(count($allproducts) > 0)
<div class="featured-productss-area ">
    <div class="container">
        <div class="section-header-area">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="sub-title">
                        {{-- {{ langConverter(siteContentHomePage('products')->en_Title, siteContentHomePage('products')->fr_Title) }} --}}
                    </h3>
                    <h2 class="section-title">
                        {{ langConverter(siteContentHomePage('products')->en_Description_One, siteContentHomePage('products')->fr_Description_One) }}
                    </h2>
                </div>
                <div class="col-md-6 align-self-end text-md-end">
                    <a href="{{ route('all.product') }}" class="see-btn">{{ __('See All') }}</a>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach ($allproducts as $product)
                @include('front.layouts.include.product_info')
            @endforeach

        </div>
    </div>
</div>
@endif
<!-- Products area end here  -->

<!--<div>-->
<!--     <a-->
<!--        data-fancybox="gallery"-->
<!--        data-src="https://lipsum.app/id/2/1024x768"-->
<!--        data-caption="Optional caption,&lt;br /&gt;that can contain &lt;em&gt;HTML&lt;/em&gt; code"-->
<!--        >-->
<!--       <img src="https://lipsum.app/id/2/200x150" />-->
<!--     </a>-->

<!--     <a data-fancybox="gallery" data-src="https://lipsum.app/id/3/1024x768">-->
<!--       <img src="https://lipsum.app/id/3/200x150" />-->
<!--     </a>-->

<!--     <a data-fancybox="gallery" data-src="https://lipsum.app/id/4/1024x768">-->
<!--       <img src="https://lipsum.app/id/4/200x150" />-->
<!--     </a>-->
<!--   </div>-->



<!-- About Area start here  -->
{{-- <div class="about-area pb-50"
        style="background-image: url({{ asset(aboutUsPage() . siteContentHomePage('about_us')->image) }})">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title ">
                            {{ langConverter(siteContentHomePage('about_us')->en_Title, siteContentHomePage('about_us')->fr_Title) }}
                        </h3>
                        <h2 class="section-title">{!! langConverter(
                            siteContentHomePage('about_us')->en_Description_One,
                            siteContentHomePage('about_us')->fr_Description_One,
                        ) !!}</h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{ route('about.us') }}" class="primary-btn">{{ __('Know More About Us') }}</a>
                    </div>
                </div>
            </div>
            <div class="story-box-slide">
                @foreach ($story as $item)
                    <div class="single-story-box">
                        <h3 class="story-title">{{ __('Story Of') }} <span
                                class="story-year">{{ $item->Year }}</span>
                        </h3>
                        <p class="story-content">{!! langConverter($item->en_Description, $item->fr_Description) !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
<!-- About Area  end here  -->

<!-- Trending Products area start here  -->





<!-- Trending Products area end here  -->

{{-- new arrival products starts here  --}}

@if(count($new_arrivals) > 0)
<div class="featured-productss-area ">
    <div class="container">
        <div class="section-header-area">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="sub-title">
                        {{-- {{ langConverter(siteContentHomePage('products')->en_Title, siteContentHomePage('products')->fr_Title) }} --}}
                    </h3>
                    <h2 class="section-title">
                        {{ __('NEW ARRIVAL') }}
                    </h2>
                </div>
                <div class="col-md-6 align-self-end text-md-end">
                    <a href="{{ route('newArrival.product') }}" class="see-btn">{{ __('See All') }}</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($new_arrivals as $product)
                @include('front.layouts.include.product_info')
            @endforeach

        </div>
    </div>
</div>
@endif
{{-- new arrival products end here  --}}
@if(count($on_sales) > 0)
<div class="featured-productss-area ">
    <div class="container">
        <div class="section-header-area">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="sub-title">
                        {{-- {{ langConverter(siteContentHomePage('products')->en_Title, siteContentHomePage('products')->fr_Title) }} --}}
                    </h3>
                    <h2 class="section-title">
                        {{ __('ON SALE') }}
                    </h2>
                </div>
                <div class="col-md-6 align-self-end text-md-end">
                    <a href="{{ route('onSale.product') }}" class="see-btn">{{ __('See All') }}</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($on_sales as $product)
                @include('front.layouts.include.product_info')
            @endforeach

        </div>
    </div>
</div>
@endif
{{--
    <div class="featured-productss-area ">
        <div class="container">
            <div class="section-header-area">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="sub-title">
                        </h3>
                        <h2 class="section-title">
                             Featured Products
                        </h2>
                    </div>
                    <div class="col-md-6 align-self-end text-md-end">
                        <a href="{{ route('featured.product') }}" class="see-btn">{{ __('See All') }}</a>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($featured_products as $product)
                    @include('front.layouts.include.product_info')
                @endforeach

            </div>
        </div>
    </div>
    --}}


<!-- product banner area end here  -->
<!-- Blog area start here  -->
<!--<div class="blog-area  section-bg pb-50">-->
<!--    <div class="container">-->
<!--        <div class="section-header-area">-->
<!--            <div class="row">-->
<!--                <div class="col-md-6">-->
<!--                    <h3 class="sub-title">-->
<!--                        {{-- {{ langConverter(siteContentHomePage('blogspot')->en_Title, siteContentHomePage('blogspot')->fr_Title) }} --}}-->
<!--                    </h3>-->
<!--                    <h2 class="section-title">-->
<!--                        {{ langConverter(siteContentHomePage('blogspot')->en_Description_One, siteContentHomePage('blogspot')->fr_Description_One) }}-->
<!--                    </h2>-->
<!--                </div>-->
<!--                <div class="col-md-6 align-self-end text-md-end">-->
<!--                    <a href="{{ route('blog') }}" class="see-btn">{{ __('See All') }}</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        <div class="blog-slide">-->
<!--            @foreach ($blogs as $blog)
-->
<!-- Blog Item Start -->
<!--                <div class="single-grid-blog">-->
<!--                    <div class="blog-thumbnail">-->
<!--                        <a href="{{ route('blog.details', $blog->id) }}"><img class="thumbnail-image"-->
<!--                                src="{{ asset(BlogImage() . $blog->Small_Image) }}" alt="blog" /></a>-->
<!--                    </div>-->
<!--                    <div class="blog-info">-->
<!--                        <ul class="blog-category">-->
<!--                            @foreach ($blog->tags as $Item)
-->
<!--                                @foreach ($Item->Tag as $n)
-->
<!--                                    <li class="single-category"><a class="category-text"-->
<!--                                            href="{{ route('blog.details', $blog->id) }}">{{ $n }}</a>-->
<!--                                    </li>-->
<!--
@endforeach-->
<!--
@endforeach-->
<!--                        </ul>-->
<!--                        <h3 class="blog-title"><a class="blog-link"-->
<!--                                href="{{ route('blog.details', $blog->id) }}">{{ langConverter($blog->en_Title, $blog->fr_Title) }}</a>-->
<!--                        </h3>-->
<!--                        <p class="blog-content">{!! Str::limit(clean(langConverter($blog->en_Description_Two, $blog->fr_Description_Two)), 205) !!}</p>-->
<!--                        <a class="blog-btn"-->
<!--                            href="{{ route('blog.details', $blog->id) }}l">{{ __('See Details') }}</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--
@endforeach-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- Blog area end here  -->

<!-- Image Gallery area start here  -->
{{-- <x-frontend.image-gallery></x-frontend.image-gallery> --}}
<!-- Image Gallery area end here  -->

<!-- Testimonial ara start here  -->
{{-- <div class="testimonial-area section section-bg">
        <div class="container">
            <div class="section-header-area text-center">
                <h3 class="sub-title">{{ __('Testimonial') }}</h3>
                <h2 class="section-title">{{ __('What People Are') }} <br />{{ __('Saying About Ourself') }}</h2>
            </div>
            <div class="testimonial-slide-top">

                <!-- Testimonial authors Float Images Start -->
                @foreach ($testimonial as $test)
                    @if ($loop->iteration == 1)
                        <img src="{{ asset(IMG_TESTIMONIAL . $test->Image) }}" alt="img"
                            class="testimonial-float-img testimonial-left-1 position-absolute">
                    @elseif ($loop->iteration == 2)
                        <img src="{{ asset(IMG_TESTIMONIAL . $test->Image) }}" alt="img"
                            class="testimonial-float-img testimonial-left-2 position-absolute">
                    @elseif ($loop->iteration == 3)
                        <img src="{{ asset(IMG_TESTIMONIAL . $test->Image) }}" alt="img"
                            class="testimonial-float-img testimonial-left-3 position-absolute">
                    @elseif ($loop->iteration == 4)
                        <img src="{{ asset(IMG_TESTIMONIAL . $test->Image) }}" alt="img"
                            class="testimonial-float-img testimonial-left-4 position-absolute">
                    @elseif ($loop->iteration == 5)
                        <img src="{{ asset(IMG_TESTIMONIAL . $test->Image) }}" alt="img"
                            class="testimonial-float-img testimonial-right-1 position-absolute">
                    @elseif ($loop->iteration == 6)
                        <img src="{{ asset(IMG_TESTIMONIAL . $test->Image) }}" alt="img"
                            class="testimonial-float-img testimonial-right-2 position-absolute">
                    @elseif ($loop->iteration == 7)
                        <img src="{{ asset(IMG_TESTIMONIAL . $test->Image) }}" alt="img"
                            class="testimonial-float-img testimonial-right-3 position-absolute">
                    @elseif ($loop->iteration == 8)
                        <img src="{{ asset(IMG_TESTIMONIAL . $test->Image) }}" alt="img"
                            class="testimonial-float-img testimonial-right-4 position-absolute">
                    @endif
                @endforeach
                <!-- Testimonial authors Float Images End -->

                <img class="shape-image" src="{{ asset('frontend/assets/images/shape.png') }}" alt="shape" />
                <div class="testimonial-image-slide">
                    @foreach ($testimonial as $test)
                        <div class="signle-testimonial-image"><img class="testimonial-image"
                                src="{{ asset(IMG_TESTIMONIAL . $test->Image) }}" alt="testimonal-image" /></div>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="testimonail-slide">
                        @foreach ($testimonial as $test)
                            <div class="single-testimonial">
                                <p class="testimonial-text">
                                    {{ langConverter($test->en_Description, $test->fr_Description) }}</p>
                                <h3 class="testimonial-title">{{ $test->Name }}</h3>
                                <ul class="review-area">
                                    <li><i class="flaticon-star"></i></li>
                                    <li class="{{ $test->star == 1 ? 'inactive' : '' }}"><i
                                            class="flaticon-star"></i>
                                    </li>
                                    <li class="{{ $test->star == 1 || $test->star == 2 ? 'inactive' : '' }}"><i
                                            class="flaticon-star"></i></li>
                                    <li
                                        class="{{ $test->star == 1 || $test->star == 2 || $test->star == 3 ? 'inactive' : '' }}">
                                        <i class="flaticon-star"></i>
                                    </li>
                                    <li
                                        class="{{ $test->star == 1 || $test->star == 2 || $test->star == 3 || $test->star == 4 ? 'inactive' : '' }}">
                                        <i class="flaticon-star"></i>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


<!-- Testimonial ara end here  -->
