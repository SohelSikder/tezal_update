<!-- Js file  -->
<script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/main.js') }}"></script>
<script src="{{ asset('frontend/assets/js/front/custom.js') }}"></script>
<script src="{{ asset('frontend/assets/js/front/extra.js') }}"></script>
<script src="{{ asset('frontend/assets/js/front/sweat_aleart.js') }}"></script>
<script src="{{ asset('frontend/assets/js/common.js') }}"></script>

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>-->
{{-- toastr --}}
<script src="{{ asset('admin/js/toastr.min.js') }}"></script>

<script src="{{ asset('frontend/assets/js/jquery.fancybox.min.js') }}"></script>

<!--<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>-->

<!--Fancybox script start here -->

    
<script>
    $(document).ready(function() {
            $("[data-fancybox='gallery']").fancybox({
                buttons: [
                    "close",
                    "download",
                    // "share",
                    "slideShow",
                    // "fullScreen",
                    // "thumbs",
                    // "arrowLeft",
                    // "arrowRight"
                ],
                loop: true,
                baseClass: "custom-fancybox",
                
            });
        });
        
</script>
<script>
    function  getImageId(id){
        setInterval(function() {
            $(".fancybox-button--play").trigger('click');
        }, 1000);
    }
    
  function goStoryUrl(event, element) {
      event.preventDefault();
      let href = $(element).attr("href");
      let pattern = /[^a-zA-Z0-9\s]/g;
      let replacement = "_";
      let result = href.replace(pattern, replacement);
      let nextUrl = $('#story'+result).val();
      window.location.href = nextUrl;
  }
    
    
</script>
<!--Fancybox script start here -->

<!--Swiper start here -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: '7',
        spaceBetween: 5,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            delay: 2000, // Change the delay value (in milliseconds) as needed
        },
        breakpoints: {
            300: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 4,
            },
            1024: {
                slidesPerView: 5,
            },
            1280: {
                slidesPerView: 7,
            },
        },
       
    });
</script>

<!--Swiper end  here -->
<!-- category hover start -->
<script>

    $(document).ready(function() {
    $('.sub-category-menu .dropdown-toggle').on('mouseover', function(e) {
        var subSubmenu = $(this).next('.sub-submenu');
        if (subSubmenu.length > 0) {
            subSubmenu.toggle();
            $(this).parent('.dropdown-item').siblings('.dropdown-item').find('.sub-submenu').hide();
            e.stopPropagation();
            e.preventDefault();
        }
    });
});

$(document).ready(function() {
    $('.dropdown-submenu').each(function() {
        var hasSubSubCategories = $(this).find('.sub-submenu').length > 0;
        // console.log(hasSubSubCategories);

        if (hasSubSubCategories) {
            $(this).hover(
                function() {
                    $(this).children('.sub-submenu').css('display', 'block');
                },
                function() {
                    $(this).children('.sub-submenu').css('display', 'none');
                }
            );
        }
    });
});

</script>
<!-- category hover end -->

<!--responsive category start -->



<!--responsive category end  -->

<!--Carousel start here -->
 <script>
//     $('#carouselExample').on('slide.bs.carousel', function(e) {

// var $e = $(e.relatedTarget);
// var idx = $e.index();
// var itemsPerSlide = 4;
// var totalItems = $('.carousel-item').length;

// if (idx >= totalItems - (itemsPerSlide - 1)) {
//     var it = itemsPerSlide - (totalItems - idx);
//     for (var i = 0; i < it; i++) {
//         // append slides to end
//         if (e.direction == "left") {
//             $('.carousel-item').eq(i).appendTo('.carousel-inner');
//         } else {
//             $('.carousel-item').eq(0).appendTo('.carousel-inner');
//         }
//     }
// }
// });

// $('#carouselExample').carousel({
// interval: 2000
// });

  $(document).ready(function() {
    // Enable the carousel
    $('.carousel').carousel();

    // Auto-slide the carousel
    $('.carousel').carousel({
      interval: 1000 // Change the interval value (in milliseconds) as desired
    });
  });

</script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!--Carousel end here -->



<script>
    document.addEventListener('DOMContentLoaded', function () {
        var subCategories = document.querySelectorAll('.sub-category');
        var subSubCategories = document.querySelectorAll('.sub-sub-category');

        function showSubCategories() {
            this.classList.add('active');
        }

        function hideSubCategories() {
            this.classList.remove('active');
        }

        subCategories.forEach(function (subCategory) {
            subCategory.addEventListener('mouseover', showSubCategories);
            subCategory.addEventListener('mouseout', hideSubCategories);
        });

        subSubCategories.forEach(function (subSubCategory) {
            subSubCategory.addEventListener('mouseover', showSubCategories);
            subSubCategory.addEventListener('mouseout', hideSubCategories);
        });
    });
</script>



<script>
    function zoomIn(element) {
        element.style.transform = "scale(1.1)";
    }
    
    function zoomOut(element) {
        element.style.transform = "scale(1)";
    }
</script>

@if (@$errors->any())
    <script>
        "use strict";
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    </script>
@endif
@if (env('APP_DEMO') == true)
    {{-- for sandbox sslcommerz --}}
    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(
                    7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>
@else
    {{-- for live sslcommerz --}}
    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://seamless-epay.sslcommerz.com/embed.min.js?" + Math.random().toString(36)
                    .substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload",
                loader);
        })(window, document);
    </script>





<script>
    function showSubSubcategories(categoryId) {
        console.log(categoryId)
        // Make an AJAX request or perform any other logic to retrieve the subcategories based on the category ID
        // Update the content of the subcategories div accordingly
        
        // Example using jQuery AJAX:
        $.ajax({
            url: "{{ url('product/subsubcategorydata/') }}/" + categoryId,  // Replace with your actual subcategory retrieval route
            method: 'GET',
            success: function(response) {
                console.log(response);
                
                 $('#subsubcategories-' + categoryId).html(response);
                $('#subsubcategories-' + categoryId).show();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
           
    }
    
    function hideSubSubcategories(categoryId) {
        $('#subsubcategories-' + categoryId).hide();
    }
</script>

    <script>
      $('#district_id').change(function(){
            var district_id = $(this).val();
            if (district_id == ''){
                district_id = -1;
            }
            var option = "<option value=''>Please Chose an Area</option>";
            var url = "{{ url('/') }}";

            $.get( url + "/get-area/"+district_id, function( data ) {
                data = JSON.parse(data);
                data.forEach(function (element) {
                    option += "<option value='"+ element.id +"'>"+ element.name + "</option>";
                });
                //console.log(option);
                $('#areas').html(option);
            });

        });
        
        
    </script>
    
    <script>
        $('#district').change(function(){
              var district_id = $(this).val();
            //   alert(district_id);
              if (district_id == ''){
                  district_id = -1;
              }
              var option = "<option value=''>Please Chose an Area</option>";
              var url = "{{ url('/') }}";
  
              $.get( url + "/get-area/"+district_id, function( data ) {
                  data = JSON.parse(data);
                  data.forEach(function (element) {
                      option += "<option value='"+ element.id +"'>"+ element.name + "</option>";
                  });
                  //console.log(option);
                  $('#areass').html(option);
              });
  
          });
   
    </script>

@endif











