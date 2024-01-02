<div>
    <div class="mobile-header-area d-block d-lg-none">
        <div class="container">
            <div class="menu-wrap">
                <div class="header-left">
                    
                  
                    <!--<a href="#" data-toggle="modal" data-target="#myModal">-->
                    <!--  <i class="fas fa-bars"></i>-->
                    <!--</a>-->
                    <a class="brand-logo" href="{{ route('front') }}"><img class="brand-image"
                            src="{{ asset(IMG_LOGO_PATH . $allsettings['main_logo']) }}"
                            alt="" />
                    </a>
                    
                </div>
                
                <div class="header-right" style="padding-right: 10px;">
                <!--    <a href="#" class="compare-btn header-btn" data-toggle="modal" data-target="#exampleModal">
                        <div class="btn-left" >
                            <i style="margin-left: 8px;" class="custom-icon btn-icon fas fa-map-marker-alt"></i>
                            <img src="{{asset('frontend/assets/images/location1.png')}}" alt="Location Icon">
                            
                        </div>
                    </a> -->
                    <a href="{{ route('wishlist') }}" class="wishlist-btn header-btn">
                        <div class="btn-left">
                            <i class="btn-icon flaticon-like"></i>
                            <span
                                class="count wishListCuntFromController">{{ session()->has('wishlist') ? count(session()->get('wishlist')) : '0' }}</span>
                        </div>
                    </a>
                    
                    <a href="{{ route('compare') }}" class="compare-btn header-btn">
                        <div class="btn-left">
                            <i class="btn-icon flaticon-bar-chart"></i>
                            <span
                                class="count CompareCuntFromController">{{ session()->has('compare') ? count(session()->get('compare')) : '0' }}</span>
                        </div>
                    </a>


                    <a data-bs-toggle="offcanvas" href="#cartOffcanvasSidebar" role="button"
                        aria-controls="cartOffcanvasSidebar" class="cart-btn header-btn">
                        <div class="btn-left">
                            <i class="btn-icon flaticon-shopping-bag"></i>
                            <span class="count totalCountItem">{{ cartCountItem() }}</span>
                        </div>
                    </a>
                    
                    
                    
                    <button class="menu-bar" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasMobileMenu" aria-controls="offcanvasMobileMenu"><i
                            class="fas fa-bars"></i></button>
                </div>
                
            </div>
      
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="background: transparent !important;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 60%;margin:auto;align-items: start;">
      <div class="modal-header" style="background: #D93669;width: 100%;justify-content: center;">
        <h5 class="modal-title" style="color:white;" id="myModalLabel"> TEZAL </h5>
        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>--}}
      </div>
      <div class="modal-body" style="list-style:none; line-height:2;">
        <!-- Modal content goes here -->
        <!--<li>-->
        <!--   @if (Auth::user())-->
        <!--        @if (Auth::user()->is_admin == ACTIVE)-->
        <!--            <a class="account-btn mb-3" href="{{ route('admin.dashboard') }}"><i-->
        <!--                    class="user-icon flaticon-user"></i> {{ __('Dashboard') }}</a>-->
        <!--        @else-->
        <!--            <a class="account-btn mb-3" href="{{ route('user.profile') }}"><i-->
        <!--                    class="user-icon flaticon-user"></i> {{ __('Profile') }}</a>-->
        <!--        @endif-->
        <!--        <a class="account-btn mb-3" href="{{ route('user.logout') }}"><i class="user-icon flaticon-user"></i>-->
        <!--            {{ __('Logout') }}</a>-->
        <!--    @else-->
        <!--        <a class="account-btn" href="{{ route('login') }}"><i class="user-icon flaticon-user"></i>-->
        <!--            {{ __('My Account') }} </a>-->
        <!--    @endif-->
        <!--</li>-->
        <li>
            <a style="color:black;" class="account-btn mb-3" href="{{ route('user.logout') }}"><i class="fas fa-sign-out-alt"></i>
                    {{ __('Logout') }}</a>
        </li>
        <li>
            <a style="color:black;"  class="account-btn" href="{{ route('login') }}"><i class="fas fa-sign-in-alt"></i>
                    {{ __('Login') }} </a>
        </li>
        <li>
            @if (app()->getLocale() == 'en')
                <a style="color:black;" class="account-btn" href="{{ route('locale.switch', 'fr') }}"> <i class="fas fa-language"></i>
                    {{ __('Language') }} </a>
            @else
                <a style="color:black;" class="account-btn" href="{{ route('locale.switch', 'en') }}"> <i class="fas fa-language"></i>
                    {{ __('Language') }} </a>
                
            @endif
            
            
            
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" {{ app()->getLocale() == 'en' ? 'checked' : '' }}>

                <a href="{{ route('locale.switch', 'en') }}" class="btn btn-outline-secondary">
                  <img src="{{ asset(IMG_LANGUAGE . getLanguage('en')->thumb) }}" alt="united-states" />
                </a>
            
                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off"{{ app()->getLocale() == 'fr' ? 'checked' : '' }}>
                <a href="{{ route('locale.switch', 'fr') }}" class="btn btn-outline-secondary">
                  <img src="{{ asset(IMG_LANGUAGE . getLanguage('fr')->thumb) }}" alt="united-states" />
                </a>
            
            </div>
            
        </li>

      </div>
      <!--<div class="modal-footer">-->
      <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        
      <!--</div>-->
    </div>
  </div>
</div>
