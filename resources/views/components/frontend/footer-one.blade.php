<!-- footer area start here -->
<footer class="footer-area">
    <div class="footer-widget-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4">
                    <div class="single-widget about-widget">
                        <a href="{{ route('front') }}" class="footer-brand-logo mb-25"><img
                                src="{{ asset(IMG_LOGO_PATH . $allsettings['footer_logo']) }}" alt="footer-logo" /></a>
                        <p class="address-text">
                            {{ $allsettings['address'] }} <br />
                            {{ $allsettings['state'] }} <br />
                            {{ $allsettings['country'] }}
                        </p>
                        <div class="block-content mb-30">
                            <p class="contact">{{ __('Call us:') }} {{ $allsettings['call_us'] }}</p>
                            <p class="contact">{{ __('Email:') }} {{ $allsettings['email'] }}</p>
                        </div>
                        <style>
                            .social-media-link-size{
                                    width:40px;
                                   height:40px;
                                min-width:40px;
                               min-height:40px;
                               transition: transform 0.3s;
                               box-shadow: 2px 2px 3px #999;
                            }
                            .social-media-link-zoom:hover { color:#FFF; border:0px solid white !important; transform: scale(1.1); }
                            .fa_icon_size{
                                font-size:25pt !important;
                            }
                        </style>
                        <ul class="social-media" style="height:40px;">
                            <!--Facebook-->
                            @if (getSocialLink()->Facebook)
                                <li class="social-media-item" style="">
                                    <a target="_blank" style="" class="social-media-link social-media-link-size social-media-link-zoom bg-white" href="{{ getSocialLink()->Facebook }}">
                                        <i style="color: #1298F6 !important;" class="fab fa-facebook-f fa-lg fa_icon_size"></i></a>
                                </li>
                            @endif
                             <!--YouTube-->
                             @if (getSocialLink()->youtube)
                                <li class="social-media-item"style="">
                                    <a target="_blank" style="" class="social-media-link social-media-link-size social-media-link-zoom bg-white" href="{{ getSocialLink()->youtube }}">
                                        <i style="color: red !important;" class="fab fa-youtube fa-lg fa_icon_size"></i></a>
                                </li>
                            @endif
                            <!--Skype-->
                            @if (getSocialLink()->Skype)
                                <li class="social-media-item">
                                    <a target="_blank" style="" class="social-media-link social-media-link-size social-media-link-zoom bg-white" href="{{ getSocialLink()->Skype }}">
                                        <i style="color: #00aff0 !important;" class="fab fa-skype fa-lg fa_icon_size"></i></a>
                                </li>
                            @endif
                            <!--Twitter-->
                            @if (getSocialLink()->Twitter)
                                <li class="social-media-item"style="">
                                    <a target="_blank" style="" class="social-media-link social-media-link-size social-media-link-zoom bg-white" href="{{ getSocialLink()->Twitter }}">
                                        <i style="color: #00acee !important;" class="fab fa-twitter fa-lg fa_icon_size"></i></a>
                                </li>
                            @endif
                            <!--Linkedin-->
                            @if (getSocialLink()->Linkedin)
                                <li class="social-media-item"style="">
                                    <a target="_blank" style="padding: 3px !important;" class="social-media-link social-media-link-size social-media-link-zoom bg-white"
                                        href="{{ getSocialLink()->Linkedin }}">
                                        <i style="color:#0077B5 !important;" class="fab fa-linkedin-in fa-lg fa_icon_size"></i></a>
                                </li>
                            @endif
                            @if (getSocialLink()->Instagram)
                               <li class="social-media-item">
                                    <a target="_blank" style="padding: 3px !important;" class="social-media-link social-media-link-size social-media-link-zoom bg-white"
                                      href="{{ getSocialLink()->Instagram }}">
                                        <i style="color:#d62976 !important;" class="fab fa-instagram fa-lg fa_icon_size"></i></a>
                              </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-8 col-md-8 col-sm-8">
                    <div class="row">
                       {{-- <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="single-widget">
                                <h3 class="widget-title">{{ __('Category') }}</h3>
                                <ul class="widget-menu show">
                                    @php
                                    	$categories = App\Models\Admin\Category::where('parent_id',0)->where('Status', 1)->get();
                                    @endphp
                                    @foreach (Category()->sortByDesc('position')->take(6) as $item)
                                        <li class="menu-item"><a class="menu-link"
                                                href="{{ route('category.product', $item->id) }}">{{ langConverter($item->en_Category_Name, $item->fr_Category_Name) }}</a>
                                        </li>
                                    @endforeach

                                    @foreach ($categories->take(6) as $item)
                                        <li class="menu-item"><a class="menu-link"
                                                href="{{ route('category.product', $item->id) }}">{{ langConverter($item->en_Category_Name, $item->fr_Category_Name) }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>--}}
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <!--<div class="single-widget">-->
                            <!--    <h3 class="widget-title">{{ __('Brand') }}</h3>-->
                            <!--    <ul class="widget-menu">-->
                            <!--        @foreach (Brnad() as $item)-->
                            <!--            <li class="menu-item"><a class="menu-link"-->
                            <!--                    href="{{ route('brand.product', $item->id) }}">{{ langConverter($item->en_BrandName, $item->fr_BrandName) }}</a>-->
                            <!--            </li>-->
                            <!--        @endforeach-->
                            <!--    </ul>-->
                            <!--</div>-->
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4">
                            <div class="single-widget">
                                <h3 class="widget-title">{{ __('Customer Service') }}</h3>
                                <ul class="widget-menu">
                                    <li class="menu-item"><a class="menu-link"
                                            href="{{ route('faq') }}">{{ __('Help & FAQ') }}</a></li>
                                    <li class="menu-item"><a class="menu-link"
                                            href="{{ route('terms.conditions') }}">{{ __('Terms of Conditions') }}</a>
                                    </li>
                                    <li class="menu-item"><a class="menu-link"
                                            href="{{ route('privacy.policy') }}">{{ __('Privacy Policy') }}</a>
                                    </li>
                                    <li class="menu-item"><a class="menu-link"
                                            href="{{ route('refund.policy') }}">{{ __('Online Returns Policy') }}</a>
                                    </li>
                                    <li class="menu-item"><a class="menu-link"
                                            href="{{ route('shipping.return') }}">{{ __('Shipping & Return') }}</a>
                                    </li>
                                    <li class="menu-item"><a class="menu-link"
                                            href="{{ route('contact.us') }}">{{ __('Contact Us') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 p-3">
                    <div class="single-widget newsletter-widget">
                        <h3 class="widget-title">{{ __('Newsletter Sign Up') }}</h3>
                        <p class="newsletter-text">
                            {!! clean($allsettings['news_letter']) !!}
                        </p>
                        <div class="newsletter-form mb-40">
                            <form id="subscribe_form" name="subscribe_form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control subscribe" id="subscribe" name="subscribe"
                                        placeholder="{{ __('Email') }}" required />
                                    <button type="button"
                                        class="subscribe-btn subscribe_btn">{{ __('Subscribe') }}</button>
                                </div>
                            </form>
                        </div>
                        <!--@if ($allsettings['news_letter_status'] == '1')-->
                        <!--    <div class="payment-area">-->
                        <!--        <h3 class="widget-title">{{ $allsettings['news_letter_title'] }}</h3>-->
                        <!--        <img class="payment-icons"-->
                        <!--            src="{{ asset(IMG_FOOTER_PATH . $allsettings['news_letter_img']) }}"-->
                        <!--            alt="accepts-image" />-->
                        <!--    </div>-->
                        <!--@endif-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container-fluid">
            <div class="footer-bottom-wrap">
                Developed By <a style="color:#D93669; font-weight: bold;" href="https://faraitltd.com/">FARA IT Fusion LTD.</a>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end here -->
