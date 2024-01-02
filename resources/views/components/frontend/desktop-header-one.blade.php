   <div>
    <header class="header-area d-none d-lg-block">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="header-top-left">
                            <a href="tel:{{ $allsettings['call_us'] }}">
                                <p class="contact-info">
                                    <i class="icon flaticon-phone"></i>
                                    {{ __('Hotline:') }}
                                    {{ $allsettings['call_us'] }}
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="header-top-right">
                            {{--<div class="top-bar-menu">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#trackOrderModal">{{ __('Track Order') }}</a>
                                    </li>
                                </ul>
                            </div>--}}

                             <div class="switcher-lang-currency">
                                {{--<div class="currency-switcher">
                                    <span class="flag">{{ currencySymbol()[currency()] }}</span>
                                    <a href="javascript:void(0)" class="currency">{{ currency() }} <i
                                            class="fas fa-angle-down"></i></a>
                                    <ul class="currency-list">
                                        @foreach (currency_array(currency()) as $crr)
                                            <li class="single-currency"><span
                                                    class="flag">{{ $crr->symbol }}</span><a class="currency-text"
                                                    href="{{ route('currency.switch', $crr->currency) }}">{{ $crr->currency }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>--}}
                                <!--<div class="lang-switcher">
                                    @if (app()->getLocale() == 'en')
                                        <span class="flag"></span>
                                        <a href="javascript:void(0)" class="lang">
                                            {{ getLanguage('en')->name }}
                                            @if (getLanguage('en')->status == 1 && getLanguage('fr')->status == 1)
                                                <i class="fas fa-angle-down"></i>
                                            @endif
                                        </a>
                                    @elseif(app()->getLocale() == 'fr')
                                        <span class="flag"></span>
                                        <a href="javascript:void(0)" class="lang">
                                            {{ getLanguage('fr')->name }}
                                            @if (getLanguage('en')->status == 1 && getLanguage('fr')->status == 1)
                                                <i class="fas fa-angle-down"></i>
                                            @endif
                                        </a>
                                    @endif
                                    <ul
                                        class="{{ getLanguage('en')->status != 1 || getLanguage('fr')->status != 1 ? null : 'lang-list' }}">
                                        @if (app()->getLocale() == 'en')
                                            @if (getLanguage('fr')->status == 1)
                                                <li class="single-lang"><span class="flag"></span><a class="lang-text"
                                                        href="{{ route('locale.switch', 'fr') }}">{{ getLanguage('fr')->name }}</a>
                                                </li>

                                            @endif
                                        @elseif(app()->getLocale() == 'fr')
                                            @if (getLanguage('en')->status == 1)
                                                <li class="single-lang"><span class="flag"></span><a class="lang-text"
                                                        href="{{ route('locale.switch', 'en') }}">{{ getLanguage('en')->name }}</a>
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div> -->
                                {{--<div class="lang-switcher">
                                    @if (session()->get('locale') == 'en')
                                        <span class="flag"><img
                                                src="{{ asset(IMG_LANGUAGE . getLanguage('en')->thumb) }}"
                                                alt="united-states" /></span>
                                        <a href="javascript:void(0)" class="lang">
                                            {{ getLanguage('en')->name }}
                                            @if (getLanguage('en')->status == 1 && getLanguage('fr')->status == 1)
                                                <i class="fas fa-angle-down"></i>
                                            @endif
                                        </a>
                                    @elseif(session()->get('locale') == 'fr')
                                        <span class="flag"><img
                                                src="{{ asset(IMG_LANGUAGE . getLanguage('fr')->thumb) }}"
                                                alt="india" /></span>
                                        <a href="javascript:void(0)" class="lang">
                                            {{ getLanguage('fr')->name }}
                                            @if (getLanguage('en')->status == 1 && getLanguage('fr')->status == 1)
                                                <i class="fas fa-angle-down"></i>
                                            @endif
                                        </a>
                                    @endif

                                    <ul
                                        class="{{ getLanguage('en')->status != 1 || getLanguage('fr')->status != 1 ? null : 'lang-list' }}">
                                        @if (session()->get('locale') == 'en')
                                            @if (getLanguage('fr')->status == 1)
                                                <li class="single-lang"><span class="flag"><img
                                                            src="{{ asset(IMG_LANGUAGE . getLanguage('fr')->thumb) }}"
                                                            alt="india"></span><a class="lang-text"
                                                        href="{{ route('locale.switch', 'fr') }}">{{ getLanguage('fr')->name }}</a>
                                                </li>

                                            @endif
                                        @elseif(session()->get('locale') == 'fr')
                                            @if (getLanguage('en')->status == 1)
                                                <li class="single-lang"><span class="flag"><img
                                                            src="{{ asset(IMG_LANGUAGE . getLanguage('en')->thumb) }}"
                                                            alt="united-states" /></span><a class="lang-text"
                                                        href="{{ route('locale.switch', 'en') }}">{{ getLanguage('en')->name }}</a>
                                                </li>
                                            @endif
                                        @endif
                                    </ul>
                                </div>--}}
                            </div>

                            @if (Auth::user())
                                <div class="account-switcher">
                                    <span class="flag">
                                        <img src="{{ file_exists(AdminProfilePicture() . Auth::user()->image) ? (isset(Auth::user()->image) ? asset(AdminProfilePicture() . Auth::user()->image) : Avatar::create(Auth::user()->name)->toBase64()) : Auth::user()->image }}"
                                            alt="{{ $allsettings['app_title'] }}">
                                    </span>

                                    <a href="javascript:void(0)" class="lang">{{ Auth::user()->name }} <i
                                            class="fas fa-angle-down"></i></a>
                                    <ul class="account-list">
                                        @if (Auth::user()->is_admin == ACTIVE)
                                            <li class="single-lang"><a class="lang-text"
                                                    href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                                            </li>
                                        @else
                                            <li class="single-lang"><a class="lang-text"
                                                    href="{{ route('user.profile') }}">{{ __('Profile') }}</a>
                                            </li>
                                        @endif
                                        <li class="single-lang"><a class="lang-text"
                                                href="{{ route('user.logout') }}">{{ __('Logout') }}</a>
                                        </li>
                                    </ul>
                                </div>
                            @else
                                <div class="account-switcher">
                                    {{--
                                    <span class="flag">

                                        <img src="{{ asset('frontend/assets/images/user-avatar.png') }}" alt="{{ $allsettings['app_title'] }}">
                                    </span>
                                    --}}
                                    <a href="{{ route('login') }}" class="lang"> {{ __("Sign In")}} |&nbsp;</a>
                                    <a href="{{ route('user.sign.up') }}" class="lang">  {{ __("Sign Up")}}  </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="header-middle-wrap">
                    <div class="brand-area">
                        <a class="brand-logo"
                            href="{{ route('front') }}"><img class="brand-image"
                                src="{{ asset(IMG_LOGO_PATH . $allsettings['main_logo']) }}"
                                alt="{{ $allsettings['app_title'] }}" /></a>
                    </div>
                    <div class="search-area">
                        <form action="{{ route('category.search') }}" method="get">
                            <div class="search-wrap">
                                {{--<select class="form-select" name="category">
                                    <option value="" selected>--{{ __('Category') }}--</option>
                                    @php
                                    	$categories = App\Models\Admin\Category::where('parent_id',0)->where('Status', 1)->orderBy('position', 'asc')->get();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                             <a href="{{ route('category.product', $category->id) }}"> {{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}</a>
                                        </option>
                                    @endforeach
                                </select>--}}
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="{{ __('Search Here') }}" />
                                    <button type="submit" class="search-btn"><i
                                            class="flaticon-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="header-right">


                        <!--<div class="icon-container" data-toggle="modal" data-target="#exampleModal">-->
                        <!--    <div class="circle">-->
                        <!--        <img src="https://cdn-icons-png.flaticon.com/128/2901/2901609.png" alt="Location Icon">-->

                        <!--    </div>-->

                        <!--</div>-->

                        <div class="location single-btn" data-toggle="modal" data-target="#exampleModal">
                            <a href="#" class="wishlist-btn header-btn">

                                   <div class="circle">
                                        <!--<img src="https://cdn-icons-png.flaticon.com/128/847/847372.png" alt="Location Icon">-->
                                       <!-- <img src="{{asset('frontend/assets/images/location1.png')}}" alt="Location Icon"> -->

                                    </div>
                                    <!--<i class="btn-icon flaticon-like"></i>-->


                                <div class="btn-right">
                                    <!--<span class="btn-text">{{ __('Location') }}</span>-->
                                    <!--<span-->
                                    <!--    class="item-count wishListCuntFromController">Location-->
                                    <!--    </span>-->
                                </div>
                            </a>
                        </div>



                        <div class="wishlist single-btn">
                            <a href="{{ route('wishlist') }}" class="wishlist-btn header-btn">
                                <div class="btn-left">
                                    <i class="btn-icon flaticon-like"></i>
                                    <span
                                        class="count wishListCuntFromController">{{ auth()->check() ? wishlistCount() : '0' }}</span>
                                </div>
                                <div class="btn-right">
                                    <span class="btn-text">{{ __('Wishlist') }}</span>
                                    <span
                                        class="item-count wishListCuntFromController">{{ auth()->check() ? wishlistCount() : '0' }}
                                        {{ __('items') }}</span>
                                </div>
                            </a>
                        </div>

                        <div class="compare single-btn">
                            <a href="{{ route('compare') }}" class="compare-btn header-btn">
                                <div class="btn-left">
                                    <i class="btn-icon flaticon-bar-chart"></i>
                                    <span
                                        class="count CompareCuntFromController">{{ auth()->check() ? compareListCount() : '0' }}</span>
                                </div>
                                <div class="btn-right">
                                    <span class="btn-text">{{ __('Compare') }}</span>
                                    <span
                                        class="item-count CompareCuntFromController">{{ auth()->check() ? compareListCount() : '0' }}
                                        {{ __('items') }}</span>
                                </div>
                            </a>
                        </div>
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>-->
                        <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>-->


                        <div class="cart single-btn">
                            <a data-bs-toggle="offcanvas" href="#cartOffcanvasSidebar" id="offcanvas" role="button"
                                aria-controls="cartOffcanvasSidebar" class="cart-btn header-btn">
                                <div class="btn-left">
                                    <i class="btn-icon flaticon-shopping-bag"></i>
                                    <span class="count totalCountItem">{{ cartCountItem() }}</span>
                                </div>
                                <div class="btn-right">
                                    <span class="btn-text">{{ __('Your Cart') }}</span>
                                    @php
                                        $content = Cart::content();
                                        $total = 0;
                                    @endphp
                                    @foreach ($content as $item)
                                        @php
                                            $total += $item->subtotal;
                                        @endphp
                                    @endforeach
                                    <span class="price totalAmount">
                                        {{ currencyConverter($total) }}</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <nav class="menu-area">

                <ul class="main-menu">

                    <li
                        class="menu-item menu-item-has-children {{ Route::is('front') || Route::is('front*') ? 'active' : '' }}">
                        <a class="menu-link" href="{{ route('front') }}">{{ staticMenuName('home') }}</a>
                    </li>

                    <!--start categories menu-->
                    <style>
                        .drop-nav {
                          background: #D93669;
                        }

                          .main-menu > li {
                            float: left;
                            /*border-left: solid 1px #1e2a36;*/
                          }

                          .main-menu li:first-child {
                            /*border-left: none;*/
                          }

                          .main-menu a {
                            color: #fff;
                            display: block;
                            padding: 5px 15px;
                            text-decoration: none;
                          }

                        .dropdown, .flyout {
                          position: relative;
                        }

                        .dropdown:after {
                          /*content: "\25bc";*/
                          /*font-size: .5em;*/
                          /*display: block;*/
                          /*position: absolute;*/
                          /*top: 38%;*/
                          /*right: 12%;*/
                        }

                        .drop-nav, .flyout-nav {
                          position: absolute;
                          display: none;
                        }

                        .drop-nav li {
                          border-bottom: 1px solid rgba(255,255,255,.2);
                          border-left: 1px solid #D93669;
                        }

                        .dropdown:hover > .drop-nav,
                        .flyout:hover > .flyout-nav {
                          display: block;
                          z-index: 99999 !important;
                        }

                        .flyout-nav {
                          left: 100%;
                          top: 0;
                        }

                        .flyout:hover a, .flyout-nav {
                          background: #2A3143;
                        }

                        .cat-a {
                            width: 230px !important;
                        }
                    </style>

                    <?php
                        $main_categories = App\Models\Admin\Category::where('parent_id', 0)->where('status', 1)->orderBy('position', 'asc')->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                     ?>

                    @foreach ($main_categories as $sub_main_category)
                    <?php
                        $categories = App\Models\Admin\Category::where('parent_id', $sub_main_category->id)->where('status', 1)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                     ?>
                     @if(count($categories) > 0)
                    <li class="dropdown menu-item mega-menu-parent">
                      <a class="menu-link" href="{{ route('category.product_left', $sub_main_category->id ) }}">{{ langConverter($sub_main_category->en_Category_Name, $sub_main_category->fr_Category_Name) }} <i class="arrow-icon fas fa-angle-down"></i></a>
                      <ul class="drop-nav">
                        @foreach ($categories as $category)
                        @php
                            $sub_categories = App\Models\Admin\Category::where('parent_id', $category->id)->where('status', 1)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                        @endphp
                        @if(count($sub_categories) > 0)
                        <li class="flyout">
                          <a href="{{ route('category.product_left', $category->id ) }}"><i class="arrow-icon fas fa-angle-right"></i> {{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}</a>
                          <ul class="flyout-nav">
                            @foreach ($sub_categories as $sub_category)
                                @php
                                    $sub_sub_categories = App\Models\Admin\Category::where('parent_id', $sub_category->id)->where('status', 1)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                                @endphp
                                @if(count($sub_sub_categories) > 0)
                                    <li class="flyout">
                                      <a class="cat-a" href="{{ route('category.product_left', $sub_category->id ) }}"><i class="arrow-icon fas fa-angle-right"></i> {{ langConverter($sub_category->en_Category_Name, $sub_category->fr_Category_Name) }}</a>
                                      <ul class="flyout-nav">
                                        @foreach ($sub_sub_categories as $sub_sub_category)
                                            <li><a class="cat-a" href="{{ route('category.product', $sub_sub_category->id) }}">{{ langConverter($sub_sub_category->en_Category_Name, $sub_sub_category->fr_Category_Name) }}</a></li>
                                        @endforeach
                                      </ul>
                                    </li>
                                @else
                                    <li><a class="cat-a" href="{{ route('category.product', $sub_category->id) }}">{{ langConverter($sub_category->en_Category_Name, $sub_category->fr_Category_Name) }}</a></li>
                                @endif
                            @endforeach
                          </ul>
                        </li>
                        @else
                            <li class="">
                                <a class="" href="{{ route('category.product', $category->id) }}">{{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}</a></li>
                        @endif
                        @endforeach
                      </ul>
                    </li>
                    @else
                        <li class="menu-item">
                            <a class="menu-link" href="{{ route('category.product', $sub_main_category->id) }}">
								{{ langConverter($sub_main_category->en_Category_Name, $sub_main_category->fr_Category_Name) }}
							</a>
						</li>
                    @endif
                    @endforeach


                    {{--
                    <li class="dropdown menu-item mega-menu-parent">
                      <a class="menu-link" href="#">Categories <i class="arrow-icon fas fa-angle-down"></i></a>
                      <ul class="drop-nav">
                         <?php
                            $categories = App\Models\Admin\Category::where('parent_id', 0)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                         ?>

                        @foreach ($categories as $category)
                        @php
                            $sub_categories = App\Models\Admin\Category::where('parent_id', $category->id)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                        @endphp
                        @if(count($sub_categories) > 0)
                        <li class="flyout">
                          <a href="{{ route('category.product', $category->id) }}"><i class="arrow-icon fas fa-angle-right"></i> {{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}</a>
                          <ul class="flyout-nav">
                            @foreach ($sub_categories as $sub_category)
                                @php
                                    $sub_sub_categories = App\Models\Admin\Category::where('parent_id', $sub_category->id)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                                @endphp
                                @if(count($sub_sub_categories) > 0)
                                    <li class="flyout">
                                      <a class="cat-a" href="{{ route('category.product', $sub_category->id) }}"><i class="arrow-icon fas fa-angle-right"></i> {{ langConverter($sub_category->en_Category_Name, $sub_category->fr_Category_Name) }}</a>
                                      <ul class="flyout-nav">
                                        @foreach ($sub_sub_categories as $sub_sub_category)
                                            <li><a class="cat-a" href="{{ route('category.product', $sub_sub_category->id) }}">{{ langConverter($sub_sub_category->en_Category_Name, $sub_sub_category->fr_Category_Name) }}</a></li>
                                        @endforeach
                                      </ul>
                                    </li>
                                @else
                                    <li><a class="cat-a" href="{{ route('category.product', $sub_category->id) }}">{{ langConverter($sub_category->en_Category_Name, $sub_category->fr_Category_Name) }}</a></li>
                                @endif
                            @endforeach
                          </ul>
                        </li>
                        @else
                            <li><a href="{{ route('category.product', $category->id) }}">{{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}</a></li>
                        @endif
                        @endforeach
                      </ul>
                    </li>
                    <!--End categories menu-->
                    --}}

                    {{--
                    @foreach ($all_menus as $menu)
                        @if ($menu->submenus->count() == 0)
                            <li class="menu-item"><a class="menu-link"
                                    href="{{ $menu->url }}">{{ langConverter($menu->en_name, $menu->fr_name) }}</a>
                            </li>
                        @else
                            <li class="menu-item menu-item-has-children">
                                <a class="menu-link"
                                    href="#">{{ langConverter($menu->en_name, $menu->fr_name) }} <i
                                        class="arrow-icon fas fa-angle-down"></i></a>
                                <ul class="sub-menu">
                                    @foreach ($menu->submenus as $submenu)
                                        <li class="sub-menu-item"><a class="sub-menu-link"
                                                href="{{ $submenu->url }}">{{ langConverter($submenu->en_name, $submenu->fr_name) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                    --}}

                    <li class="menu-item {{ Route::is('about.us') || Route::is('about.us*') ? 'active' : '' }}"><a
                            class="menu-link" href="{{ route('about.us') }}">{{ staticMenuName('about-us') }}</a>
                    </li>

                    {{--<li class="menu-item {{ Route::is('blog') || Route::is('blog*') ? 'active' : '' }}"><a class="menu-link" href="{{ route('blog') }}">{{ staticMenuName('blog') }}</a></li>--}}

                    <li class="menu-item {{ Route::is('contact.us') || Route::is('contact.us*') ? 'active' : '' }}">
                        <a class="menu-link" href="{{ route('contact.us') }}">{{ staticMenuName('contact') }}</a>
                    </li>

                </ul>
            </nav>
        </div>
    </header>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding-right: 17%;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select Location </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border:none;color: #5a5a5a">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <h4>Individual Account Type </h4>
          <h5>Provide Your Location </h5>
        <form action="{{route('submit.location')}}" method="post" enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control address-control" name="name" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Phone:</label>
            <input type="text" class="form-control address-control" name="phone" id="recipient-phone">
          </div>

          <div class="col-lg-12 form-group" style="margin-top:10px;">

            <label for="message-text" class="col-form-label">Adress Type:</label>
            <select class="form-control form-control-solid bg-light form-control-lg signin-signup-input " id="addressTitleSelect" name="address_type">
                <option disabled="" selected>Select Option </option>
                <option value="Home">Home</option>
                <option value="Work">Work</option>
                <option value="Other">Others</option></select>
          </div>
          <div class="row">

        <div class="col-lg-6 form-group" style="margin-top:10px;">
            <label for="message-text" class="col-form-label">City:</label>
            <!--<select class="form-control form-control-solid bg-light form-control-lg signin-signup-input " id="addressTitleSelect" name="address_title"><option disabled="">ঠিকানার শিরোনাম</option><option value="Home">Home</option><option value="Work">Work</option><option value="Other">Others</option></select>-->

            <select name="district_id" id="district_id" class="form-control form-control-solid bg-light form-control-lg signin-signup-input @error('district_id') is-invalid @enderror" required>
                <option value="">Please Chose a City</option>
                @php
                $districts = DB::table('districts')->get();
                $areas = DB::table('areas')->get();
                @endphp
                @foreach($districts as $district)
                <option value="{{ $district->id }}" >{{ $district->name }}</option>
                @endforeach
              </select>
              @error('district_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
        </div>
        <div class="col-lg-6 form-group" style="margin-top:10px;">
            <label for="message-text" class="col-form-label">Town:</label>
            <!--<select class="form-control form-control-solid bg-light form-control-lg signin-signup-input  " id="addressTitleSelect" name="address_title"><option disabled="">ঠিকানার শিরোনাম</option><option value="Home">Home</option><option value="Work">Work</option><option value="Other">Others</option></select>-->

            <select name="area_id" id="areas" class="form-control form-control-solid bg-light form-control-lg signin-signup-input @error('area_id') is-invalid @enderror" required>
                                            <option value="">Please Chose an Area</option>

                                          </select>
                                          @error('area_id')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
        </div>

          <div class="col-lg-12 form-group" style="margin-top:20px;">
            <button type="submit" class="btn btn-success btn-modal ">Submit </button>
          </div>

          </div>

        </form>
      </div>
      <!--<div class="modal-footer">-->
      <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
      <!--  <button type="button" class="btn btn-primary">Send message</button>-->
      <!--</div>-->
    </div>
  </div>
</div>




