<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@if(Route::current()->getName() == "front") {{ $allsettings['title'] }} @else @yield('title') {{ __('| ' . $allsettings['app_title']) }} @endif </title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="author" content="{{ $allsettings['meta_author'] }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- fonts file -->
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allison&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- css file  -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/extra.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/cookie-consent.css') }}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset(IMG_FAVICON_PATH . $allsettings['favicon']) }}" type="image/x-icon">
    {{-- toastr --}}
<link rel="stylesheet" href="{{ asset('admin/css/toastr.min.css') }}">

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>



<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
  <script>
      Fancybox.bind('[data-fancybox="gallery"]', {
        Toolbar: {
          items: {
            facebook: {
              tpl: '<button class="f-button"><svg><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></button>',
              click: () => {
                window.open(
                  "https://www.facebook.com/sharer/sharer.php?u=" +
                  encodeURIComponent(window.location.href) +
                  "&t=" +
                  encodeURIComponent(document.title),
                  "",
                  "left=0,top=0,width=600,height=300,menubar=no,toolbar=no,resizable=yes,scrollbars=yes"
                );
              },
            },
            twitter: {
              tpl: '<button class="f-button"><svg><path stroke="none" d="M0 0h24v24H0z"/><path d="M22 4.01c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.323 12 8v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497-3.753c0-.249 1.51-2.772 1.818-4.013z"/></svg></button>',
              click: () => {
                window.open(
                  "http://twitter.com/share?url=" +
                  encodeURIComponent(window.location.href) +
                  "&text=" +
                  encodeURIComponent(document.title),
                  "",
                  "left=0,top=0,width=600,height=300,menubar=no,toolbar=no,resizable=yes,scrollbars=yes"
                );
              },
            },
          },
          display: {
            left: ["infobar"],
            middle: [],
            right: ["twitter", "facebook", "close"],
          },
        },
      });
    </script>
<style>
  .custom-fancybox img {
    border-radius: 5%;
  }

  .custom-fancybox .fancybox-slide--image {
    background-color: rgba(255, 255, 255, 0.995);
    /* Customize the color overlay */
  }
  .custom-fancybox .fancybox-toolbar {
    position: absolute;
    top: 60px;
    /* Adjust the top position as needed */
    left: 69%;
    transform: translateX(-50%);
    /* z-index: 9999; */
  }

  .custom-fancybox .fancybox-toolbar .fancybox_shop_now{
    position: absolute;
    /*top: 120px;*/
    background-color: #D93669 !important;
    border-radius: 50px !important;
    color:#ffffff;
    height:50px;
    /*line-height: 1.5;*/
    padding:10px;
    /* Adjust the top position as needed */
    margin-top: 430px;
    /*left: 69%;*/
    transform: translateX(-50%);
    /* z-index: 9999; */
  }

  @media only screen and (max-width: 742px) {
      .custom-fancybox .fancybox-toolbar .fancybox_shop_now {
        position: absolute;
        /* top: 120px; */
        background-color: #D93669 !important;
        border-radius: 50px !important;
        color: #ffffff;
        /* height: 76px; */
        width: 100px;
        /* line-height: 1.5; */
        padding: 10px;
        margin-top: 430px;
        /* left: 69%; */
        /* transform: translateX(-50%); */
        /* z-index: 9999; */
    }
}

</style>
<style>
  .single-grid-product{
    border: 1px solid black;
    padding:10px;
  }

   .hover-zoom {
        transition: transform 0.3s;
    }

    .hover-zoom:hover {
        transform: scale(1.1);
    }
</style>


<style>

    a.fancybox_shop_now {
      display: inline !important;
      visibility: visible !important;
      opacity: 1 !important;
    }


    #story {
        height: 300px;
    }

    .swiper-container {
        max-width: 100%;
        overflow: hidden;
        position: relative;
    }

    .swiper-slide {
        width: 20%;
        padding: 5px;
        margin-right: -50px;/* Adjust the padding as needed */
    }

    /* .swiper-slide img {
        height: 280px;
        width: 155px;
        border-radius: 5%;
        object-fit: cover;
    } */

    .swiper-container .swiper-slide img {
    object-fit: cover;
        width: 100%;
        height: 100%;
        border-radius: 5%;
    }

    .swiper-container .swiper-slide video {
    object-fit: cover;
        width: 100%;
        height: 280px;
        border-radius: 5%;
    }

    /* .swiper-slide video {
        height: 280px;
        width: 155px;
        border-radius: 5%;
        object-fit: cover;
    } */

    @media (max-width: 768px) {
        .swiper-container .swiper-slide video {
            height: 200px; /* Adjust the height value for smaller screens */
        }
    }

@media (max-width: 480px) {
    .swiper-container .swiper-slide video {
        height: 210px; /* Adjust the height value for even smaller screens */
    }
}
  .image-container {
    position: relative;
    display: inline-block;
  }

  .image-text {
    position: absolute;
    bottom: 10px;
    left: 10px;
    color: #fff;
    font-size: 12px;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 5px;
  }
  .image-button {
    position: absolute;
    bottom: 10px;
    right: 10px;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }



  .swiper-button-next,
  .swiper-button-prev {
    position: absolute;
    top: 50%;
    transform: translate(6%,31%);
    width: 40px;
    height: 40px;
    background-color: #333;
    color: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    cursor: pointer;
  }

  .swiper-button-next {
    right: 10px;
  }

  .swiper-button-prev {
    left: 10px;
  }

  .swiper-button-next-icon,
  .swiper-button-prev-icon {
    font-size: 10px; /* Customize the font-size as needed */

  }
    /* Modal Styling */
.modal {
    display: none;
    position: fixed;
    z-index: 9999;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.9);
}

.modal-content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.close {
    color: #fff;
    font-size: 30px;
    font-weight: bold;
    position: absolute;
    top: 20px;
    right: 30px;
    cursor: pointer;
}

/* Additional CSS styling as per your requirements */

.menu-items {
    position: relative;
}

/*.subcategories {*/
/*    position: absolute;*/
/*    background: white;*/
/*    width: 100%;*/
/*    top: 0;*/
/*    margin-top:-23px;*/
/*    left: 45%;*/
/*    z-index: 1;*/
/*    display: none;*/
    /* Add more styling as needed */
/*}*/


/*.sub-category-menu {*/
/*    position: relative;*/
/*}*/

/*.dropdown-submenu {*/
/*    position: relative;*/
/*}*/

/*.sub-submenu {*/
/*    display: none;*/
/*    position: absolute;*/
/*    top: 0;*/
/*    left: 100%;*/
/*    min-width: 10rem;*/
/*    z-index: 9999;*/
/*}*/

/*.dropdown-submenu:hover > .sub-submenu {*/
/*    display: block;*/
/*}*/

/*.dropdown-submenu:hover > .dropdown-menu {*/
/*    display: none;*/
/*}*/

/*.dropdown-submenu:hover > .dropdown-toggle::after {*/
/*    transform: rotate(-90deg);*/
/*}*/

/* category responsive start */




/*.submenu-indicator {*/
/*    display: inline-block;*/
/*    width: 0.8rem;*/
/*    height: 0.8rem;*/
/*    border-top: 0.2rem solid;*/
/*    border-right: 0.2rem solid transparent;*/
/*    transition: transform 0.3s ease;*/
/*}*/

/*.rotated {*/
/*    transform: rotate(90deg);*/
/*}*/




/*.dropdown-submenu {*/
/*    position: relative;*/
/*}*/

/*.dropdown-submenu .sub-submenu {*/
/*    position: absolute;*/
/*    top: 100%;*/
/*    left: 0;*/
/*    z-index: 100;*/
/*    display: none;*/
/*}*/

/*.dropdown-submenu:hover .sub-submenu {*/
/*    display: block;*/
/*}*/

/* category responsive end */











    /*.sub-category,*/
    /*.sub-sub-category {*/
    /*    display: none;*/
    /*}*/
    /*.sub-category.active,*/
    /*.sub-sub-category.active {*/
    /*    display: block;*/
    /*}*/




</style>






<style>
    .category-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .category-item {
        width: calc(33.33% - 10px); /* Adjust the width as per your desired layout */
        padding: 10px;
        background-color: #f5f5f5;
        border-radius: 5px;
    }

    .category-name {
        font-size: 20px;
        font-weight: bold;
        color: black;
        font-size: 15px;
    }

    .sub-category-item {
        margin-left: 20px;
        font-size: 16px;
        color: black!important;
    }

    .phone{
    	position:fixed;
    	width:45px;
    	height:45px;
    	bottom:30%;
    	right:25px;
    	background-color:rgb(255, 0, 0);
    	color:#FFF;
    	border-radius:50px;
    	text-align:center;
        font-size:30px;
    	box-shadow: 2px 2px 3px #999;
        z-index:2147483647;
        transition: transform 0.3s;
        margin-bottom: 8px;

    }

    @media (min-width: 624px) {
        .phone{display:none !important;}
    }

    .phone-zoom:hover { color:#FFF; transform: scale(1.1); }

 /*   .messenger{*/
	/*position:fixed;*/
	/*width:40px;*/
	/*height:40px;*/
	/*bottom:12%;*/
	/*right:20px;*/
	/*background-color:rgb(20, 110, 190);*/
	/*color:#FFF;*/
	/*border-radius:50px;*/
	/*text-align:center;*/
 /*   font-size:30px;*/
	/*box-shadow: 2px 2px 3px #999;*/
 /*   z-index:2147483647;*/
 /*   transition: transform 0.3s;*/
 /*   }*/
 /*   .messenger-zoom:hover { color:#FFF; transform: scale(1.1); }*/

    .whatsapp{
    	position:fixed;
    	width:45px;
    	height:45px;
    	bottom:18%;
    	right:25px;
    	background-color:#25d366;
    	color:#FFF;
    	border-radius:50px;
    	text-align:center;
        font-size:30px;
    	box-shadow: 2px 2px 3px #999;
        z-index:2147483647;
        transition: transform 0.3s;
        margin-bottom:2px;
    }
    .messenger{
        height: 45px !important;
        width: 45px !important;
    }

    .whatsapp-zoom:hover { color:#FFF; transform: scale(1.1); }

    .my-phone{
	    margin-top:8px;
    }

    .my-messenger{
	    margin-top:8px  !important;
    }

    .my-whatsapp{
	    margin-top:8px;
    }
</style>
<!------ Include the above in your HEAD tag ---------->

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- messenger -->
<a href="http://m.me//" class="messenger messenger-zoom d-none" target="_blank">
<i class="fab fa-facebook-messenger  my-messenger"></i>
</a>
<!-- Phone -->
<a href="tel:{{ $allsettings['call_us'] }}" class="phone phone-zoom" target="_blank">
<i class="fa fa-phone my-phone"></i>
<!-- WhatsApp -->
<a href="https://api.whatsapp.com/send?phone={{ $allsettings['call_us'] }}&text=Hey%20there%21%20How%20can%20i%20help%20you?" class="whatsapp whatsapp-zoom" target="_blank">
<i class="fa fa-whatsapp my-whatsapp"></i>
</a>
<!--  Extarnal code -->
{!! $allsettings['code_head'] !!}
</head>


{{-- @php
$info=DB::table('settings')->where('slug', 'code_head')->first();
@endphp

{!! $info->value !!}

--}}
