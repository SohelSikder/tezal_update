<!-- mobile-menu-area area start here  -->
<div class="offcanvas offcanvas-start menu-offcanvas" tabindex="-1" id="offcanvasMobileMenu">
    <div class="mobile-menu-area">
        <div class="offcanvas-header">
            <a class="brand-logo" href="{{ route('front') }}"><img class="brand-image"
                    src="{{ asset(IMG_LOGO_PATH . $allsettings['main_logo']) }}"
                    alt="{{ $allsettings['app_title'] }}" /></a>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="menu-search-form">
            <form action="{{ route('category.search') }}" method="get">
                <div class="search-wrap">
                    <select class="form-select">
                        <option selected>{{ __('Category') }}</option>
                        
                         @php
                        	$categories = App\Models\Admin\Category::where('parent_id',0)->where('Status', 1)->orderBy('position', 'asc')->get();
                        @endphp
                        @foreach ($categories as $item)
                            <option value="{{ route('category.product', $item->id) }}">
                                {{ langConverter($item->en_Category_Name, $item->fr_Category_Name) }}
                            </option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <input type="text" class="form-control" id="search" name="search"
                            placeholder="{{ __('Search Heres') }}" />
                        <button type="submit" class="search-btn"><i class="flaticon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        
        <!--categories menu start-->
        <style>
            #menu ul {
              margin: 0;
              padding: 0;
            }
            
            #menu .main_menu {
              display: none;
            }
            
            #tm:checked + .main_menu {
              display: block;
            }
            
            #menu input[type="checkbox"], 
            #menu ul span.drop-icon {
              display: none;
            }
            
            
            #menu li, 
            #toggle-menu, 
            #menu .sub-menu {
              /*border-style: solid;*/
              /*border-color: #c7c5c5;*/
              border-bottom: 1px solid #e9dadf;
            }
            
            
            #menu li, 
            #toggle-menu {
              border-width: 0 0 1px;
            }
            
            #menu .sub-menu {
              background-color: #2A3143;
              border-width: 1px 1px 0;
              margin: 0 1em;
              /*border-radius: 5px;*/
            }
            
            #menu .sub-menu li:last-child {
              border-width: 0;
            }
            
            #menu li, 
            #toggle-menu, 
            #menu a {
              position: relative;
              display: block;
              color: white;
              text-shadow: 1px 1px 0 rgba(0, 0, 0, .125);
            }
            
            #menu, 
            #toggle-menu {
              background-color: #D93669;
              border-radius: 5px;
            }
            
            #toggle-menu, 
            #menu a {
              padding: 0.7em 1em;
            }
            
            #menu a {
              transition: all .125s ease-in-out;
              -webkit-transition: all .125s ease-in-out;
            }
            
            #menu a:hover {
              background-color: white;
              color: #09c;
            }
            
            #menu .sub-menu {
              display: none;
            }
            
            #menu input[type="checkbox"]:checked + .sub-menu {
              display: block;
            }
            
            #menu .sub-menu a:hover {
              color: #444;
            }
            
            #toggle-menu .drop-icon, 
            #menu li label.drop-icon {
              position: absolute;
              right: 1.5em;
              top: 1em;
            }
            
            #menu label.drop-icon, #toggle-menu span.drop-icon {
              border-radius: 50%;
              width: 1em;
              height: 1em;
              text-align: center;
              background-color: rgba(0, 0, 0, .125);
              text-shadow: 0 0 0 transparent;
              color: rgba(255, 255, 255, .75);
            }
            
            #menu .drop-icon {
              line-height: 1;
            }
            
            @media only screen and (max-width: 64em) and (min-width: 52.01em) {
              #menu li {
                width: 33.333%;
              }
            
              #menu .sub-menu li {
                width: auto;
              }
            }
            
            @media only screen and (min-width: 52em) {
              #menu .main_menu {
                display: block;
              }
            
              #toggle-menu, 
              #menu label.drop-icon {
                display: none;
              }
            
              #menu ul span.drop-icon {
                display: inline-block;
              }
            
              #menu li {
                float: left;
                border-width: 0 1px 0 0;
              }
            
              #menu .sub-menu li {
                float: none;
              }
            
              #menu .sub-menu {
                border-width: 0;
                margin: 0;
                position: absolute;
                top: 100%;
                left: 0;
                width: 12em;
                z-index: 3000;
              }
            
              #menu .sub-menu, 
              #menu input[type="checkbox"]:checked + .sub-menu {
                display: none;
              }
            
              #menu .sub-menu li {
                border-width: 0 0 1px;
              }
            
              #menu .sub-menu .sub-menu {
                top: 0;
                left: 100%;
              }
            
              #menu li:hover > input[type="checkbox"] + .sub-menu {
                display: block;
              }
            }
            
        </style>
        <!--categories menu end-->
        
        
        <nav class="main-menu">
            <ul class="menu-list">
                
                <li class="menu-item"><a class="menu-link" href="{{ route('front') }}">{{ staticMenuName('home') }}</a></li>
                
                <li class="menu-item">
                    <nav id="menu">
                      <label for="tm" id="toggle-menu" style="background-color: #cd0744;">{{ __('Category') }} <span class="drop-icon">▾</span></label>
                      <input type="checkbox" id="tm">
                      <ul class="main_menu clearfix">
                        <?php
                            $categories = App\Models\Admin\Category::where('parent_id', 0)->where('status', 1)->orderBy('position', 'asc')->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                         ?>
                        @foreach ($categories as $category)
                        @php
                            $two_step_categories = App\Models\Admin\Category::where('parent_id', $category->id)->where('status', 1)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                        @endphp
                        @if(count($two_step_categories) > 0)
                        <li>
                           
                            <a href="{{ route('category.product_left', $category->id ) }}">{{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}
                                <span class="drop-icon">▾</span>
                                <label title="Toggle Drop-down" class="drop-icon" for="sm{{$category->id}}">▾</label>
                            </a>
                         
                          <input type="checkbox" id="sm{{$category->id}}">
                          <ul class="sub-menu sub-menu_main">
                            @foreach ($two_step_categories as $two_step_category)
                            @php
                                $three_step_categories = App\Models\Admin\Category::where('parent_id', $two_step_category->id)->where('status', 1)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                            @endphp
                            @if(count($three_step_categories) > 0)
                            
                            <li><a href="{{ route('category.product_left', $two_step_category->id ) }}">{{ langConverter($two_step_category->en_Category_Name, $two_step_category->fr_Category_Name) }}
                                <span class="drop-icon">▾</span>
                                <label title="Toggle Drop-down" class="drop-icon" for="sm{{$two_step_category->id}}">▾</label>
                              </a>
                              <input type="checkbox" id="sm{{$two_step_category->id}}">
                              <ul class="sub-menu">
                                @foreach ($three_step_categories as $three_step_category)
                                @php
                                    $four_step_categories = App\Models\Admin\Category::where('parent_id', $three_step_category->id)->where('status', 1)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                                @endphp
                                
                                    @if(count($four_step_categories) > 0)
                                    <li><a href="{{ route('category.product_left', $three_step_category->id ) }}">{{ langConverter($three_step_category->en_Category_Name, $three_step_category->fr_Category_Name) }}
                                        <span class="drop-icon">▾</span>
                                        <label title="Toggle Drop-down" class="drop-icon" for="sm{{$three_step_category->id}}">▾</label>
                                      </a>
                                      <input type="checkbox" id="sm{{$three_step_category->id}}">
                                      <ul class="sub-menu">
                                        @foreach ($four_step_categories as $four_step_category)
                                            <li><a href="{{ route('category.product', $four_step_category->id) }}">{{ langConverter($four_step_category->en_Category_Name, $four_step_category->fr_Category_Name) }}</a></li>
                                        @endforeach
                                      </ul>
                                    @else
                                        <li><a href="{{ route('category.product', $three_step_category->id) }}">{{ langConverter($three_step_category->en_Category_Name, $three_step_category->fr_Category_Name) }}</a></li>
                                    @endif
                                
                                @endforeach
                              </ul>
                            </li>
                            
                            @else
                                <li><a href="{{ route('category.product', $two_step_category->id) }}">{{ langConverter($two_step_category->en_Category_Name, $two_step_category->fr_Category_Name) }}</a></li>
                            @endif
                            @endforeach
                          </ul>
                        </li>
                        @else
                            <li><a href="{{ route('category.product', $category->id) }}">{{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}</a></li>
                        @endif
                        @endforeach
                      </ul>
                    </nav>
                </li>
                
                {{--
                <li class="menu-item">
                    <nav id="menu">
                      <label for="tm" id="toggle-menu">Categories <span class="drop-icon">▾</span></label>
                      <input type="checkbox" id="tm">
                      <ul class="main_menu clearfix">
                        <?php
                            $categories = App\Models\Admin\Category::where('parent_id', 0)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                         ?>
                        @foreach ($categories as $category)
                        @php
                            $two_step_categories = App\Models\Admin\Category::where('parent_id', $category->id)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                        @endphp
                        @if(count($two_step_categories) > 0)
                        <li>
                            <a href="{{ route('category.product', $category->id) }}">{{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}
                            <span class="drop-icon">▾</span>
                            <label title="Toggle Drop-down" class="drop-icon" for="sm1">▾</label>
                          </a>
                          <input type="checkbox" id="sm1">
                          <ul class="sub-menu sub-menu_main">
                            @foreach ($two_step_categories as $two_step_category)
                            @php
                                $three_step_categories = App\Models\Admin\Category::where('parent_id', $two_step_category->id)->get(['fr_Category_Name', 'en_Category_Name', 'id']);
                            @endphp
                            @if(count($three_step_categories) > 0)
                            <li><a href="{{ route('category.product', $two_step_category->id) }}">{{ langConverter($two_step_category->en_Category_Name, $two_step_category->fr_Category_Name) }}
                                <span class="drop-icon">▾</span>
                                <label title="Toggle Drop-down" class="drop-icon" for="sm2">▾</label>
                              </a>
                              <input type="checkbox" id="sm2">
                              <ul class="sub-menu">
                                @foreach ($three_step_categories as $three_step_category)
                                    <li><a href="{{ route('category.product', $three_step_category->id) }}">{{ langConverter($three_step_category->en_Category_Name, $three_step_category->fr_Category_Name) }}</a></li>
                                @endforeach
                              </ul>
                            </li>
                            @else
                                <li><a href="{{ route('category.product', $two_step_category->id) }}">{{ langConverter($two_step_category->en_Category_Name, $two_step_category->fr_Category_Name) }}</a></li>
                            @endif
                            @endforeach
                          </ul>
                        </li>
                        @else
                            <li><a href="{{ route('category.product', $category->id) }}">{{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}</a></li>
                        @endif
                        @endforeach
                      </ul>
                    </nav>
                </li>
                --}}
                
                {{--
                <li class="menu-item">
                    <span class="menu-expand"></span>
                    <a class="menu-link" href="#">Categories </a>

                        <ul class="sub-menu">
                            @foreach (Category() as $category)
                                <li class="sub-menu-item">
                                    <a class="category-toggle" href="#" role="button" id="mainDropdown{{ $category->id }}">
                                        {{ langConverter($category->en_Category_Name, $category->fr_Category_Name) }}
                                        <span class="submenu-indicator"></span>
                                    </a>
                                    <ul class="sub-category-menu" aria-labelledby="mainDropdown{{ $category->id }}">
                                        @php
                                        $two_step_categories = App\Models\Admin\Category::where('parent_id', $category->id)->get();
                                        @endphp
                                        @foreach ($two_step_categories as $two_step_category)
                                            @php
                                            $three_step_categories = App\Models\Admin\Category::where('parent_id', $two_step_category->id)->get();
                                            $hasSubSubCategories = $three_step_categories->count() > 0;
                                            @endphp
                                            <li class="sub-category-item">
                                                <a class="subcategory-toggle {{ $hasSubSubCategories ? 'has-subcategories' : '' }}" href="#">
                                                    -->{{ langConverter($two_step_category->en_Category_Name, $two_step_category->fr_Category_Name) }}
                                                    <span class="submenu-indicator"></span>
                                                </a>
                                                @if ($hasSubSubCategories)
                                                    <ul class="sub-subcategory-menu">
                                                        @foreach ($three_step_categories as $three_step_category)
                                                            <li>
                                                                <a class="subcategory-item" href="#">
                                                                    --->{{ langConverter($three_step_category->en_Category_Name, $three_step_category->fr_Category_Name) }}
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                </li>
                --}}
                
                {{--
                @foreach ($all_menus as $menu)
                    @if ($menu->submenus->count() == 0)
                        <li class="menu-item"><a class="menu-link"
                                href="{{ $menu->url }}">{{ langConverter($menu->en_name, $menu->fr_name) }}</a>
                        </li>
                    @else
                        <li class="menu-item">
                            <span class="menu-expand"></span>
                            <a class="menu-link"
                                href="#">{{ langConverter($menu->en_name, $menu->fr_name) }}</a>
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
                
                <li class="menu-item language-switcher">
                    <div class="language-container">
                        @if (app()->getLocale() == 'en')
                            <a style="color:black;" class="account-btn menu-link" href="{{ route('locale.switch', 'fr') }}"> 
                                {{ __('Language') }} </a>
                        @else
                            <a style="color:black;" class="account-btn menu-link" href="{{ route('locale.switch', 'en') }}"> 
                                {{ __('ভাষা') }} </a>
                        @endif
                        
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" {{ app()->getLocale() == 'en' ? 'checked' : '' }}>
                            <a  style="color:black;" href="{{ route('locale.switch', 'en') }}" class="btn btn-outline-secondary">
                                <!--<img src="{{ asset(IMG_LANGUAGE . getLanguage('en')->thumb) }}" alt="united-states" />-->
                                English
                            </a>
                        
                            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"{{ app()->getLocale() == 'fr' ? 'checked' : '' }}>
                            <a  style="color:black;"  href="{{ route('locale.switch', 'fr') }}" class="btn btn-outline-secondary">
                                <!--<img src="{{ asset(IMG_LANGUAGE . getLanguage('fr')->thumb) }}" alt="united-states" />-->
                                বাংলা
                            </a>
                        </div>
                        
                    </div>
                </li>
                
                <!--<li>-->
                <!--    <a style="color:black;" class="account-btn mb-3" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i>-->
                <!--            {{ __('Logout') }}</a>-->
                <!--</li>-->
                <!--<li>-->
                <!--    <a style="color:black;"  class="account-btn" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>-->
                <!--            {{ __('Login') }} </a>-->
                <!--</li>-->
                
                @if (Auth::user())
                <li class="menu-item">
                    
                        @if (Auth::user()->is_admin == ACTIVE)
                            <a class="account-btn mb-3 menu-link" href="{{ route('admin.dashboard') }}"><i
                                    class="user-icon flaticon-user"></i> {{ __('Dashboard') }}</a>
                        @else
                            <a class="account-btn mb-3 menu-link" href="{{ route('user.profile') }}"><i
                                    class="user-icon flaticon-user"></i> {{ __('Profile') }}</a> 
                        @endif  
                   
                </li>
                <li class="menu-item">
                    <a class="account-btn mb-3 menu-link" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i>
                        {{ __('Logout') }}</a>
                </li>
                @else
                <li class="menu-item" >
                    <a class="account-btn menu-link" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>
                            {{ __('Login') }} </a>
                </li>
                 @endif

            </ul>
        </nav>
        {{--<div class="menu-bottom">
          <div class="switcher-lang-currency">

            <div class="lang-switcher">
                @if (app()->getLocale() == 'en')
                    @if(getLanguage('en')->status == 1)
                   
                    <a href="javascript:void(0)" class="lang">{{ getLanguage('en')->name }}
                        @if(getLanguage('fr')->status == 1)
                            <i class="fas fa-angle-down"></i>
                        @endif
                    </a>
                    @endif
                @elseif(app()->getLocale() == 'fr')
                    @if(getLanguage('fr')->status == 1)
                    
                    <a href="javascript:void(0)" class="lang">{{ getLanguage('fr')->name }}
                        @if(getLanguage('en')->status == 1)
                            <i class="fas fa-angle-down"></i>
                        @endif
                    </a>
                    @endif
                @endif
        
                <ul class="{{ activeLanguage() > 1 ? 'lang-list' : '' }}">
                    @if (app()->getLocale() == 'en')
                        @if(getLanguage('fr')->status == 1)
                            <li class="single-lang"><span class="flag">Bangla</span><a class="lang-text"
                                    href="{{ route('locale.switch', 'fr') }}">{{ getLanguage('fr')->name }}</a>
                            </li>
                        @endif
                    @elseif(app()->getLocale() == 'fr')
                        @if(getLanguage('en')->status == 1)
                            <li class="single-lang"><span class="flag">English</span><a class="lang-text"
                                    href="{{ route('locale.switch', 'en') }}">{{ getLanguage('en')->name }}</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>--}}
        
            
        </div>
    </div>
</div>
<!-- mobile-menu-area area end here  -->
