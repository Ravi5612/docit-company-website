<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('website/images/fav.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/fontello.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/prettyPhoto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/shortcodes.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/main.css?v=12345') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/megamenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('website/css/responsive.css') }}">

    <!-- REVOLUTION LAYERS STYLES -->
    <link rel='stylesheet' id='rs-plugin-settings-css' href="{{ asset('website/revolution/css/rs6.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css" />

</head>


<body>

    <!--page start-->
    <div class="page">




        <!--site-main start-->
        <div class="site-main">
            @include('website.components.common.header')
            <div class="site-main">

                @yield('content')
            </div>

            @include('website.components.common.footer')



        </div><!--site-main end-->





        <a id="totop" href="#top">
            <i class="icon-angle-up"></i>
        </a>


    </div><!-- page end -->


    <!-- Javascript -->
    <script src="{{ asset('website/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery-migrate-3.4.1.min.js') }}"></script>
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery-validate.js') }}"></script>
    <script src="{{ asset('website/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('website/js/slick.min.js') }}"></script>
    <script src="{{ asset('website/js/jquery-waypoints.js') }}"></script>
    <script src="{{ asset('website/js/numinate.min.js') }}"></script>
    <script src="{{ asset('website/js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('website/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}?v={{ filemtime(public_path('website/js/main.js')) }}"></script>

    <!-- Revolution Slider -->
    <script src='{{ asset('website/revolution/js/revolution.tools.min.js') }}'></script>
    <script src='{{ asset('website/revolution/js/rs6.min.js') }}'></script>
    <script src="{{ asset('website/revolution/js/slider.js') }}"></script>
    <div id="fb-root"></div>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v23.0">
    </script>
    <!-- Javascript end-->
    @stack('scripts')
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        const dritSwiper = new Swiper(".dritSwiper", {
            loop: true,

            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },

            pagination: {
                el: ".drit-pagination",
                clickable: true,
            },

            navigation: {
                nextEl: ".drit-next",
                prevEl: ".drit-prev",
            },
        });
        var swiper = new Swiper(".myPartnerSwiper", {
            slidesPerView: 6,
            spaceBetween: 10,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            speed: 1000,

            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 5,
                },
                576: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                992: {
                    slidesPerView: 5,
                    spaceBetween: 10,
                },
                1200: {
                    slidesPerView: 6,
                    spaceBetween: 10,
                },
            },
        });

        var reviewSwiper = new Swiper(".ts-review-swiper", {
            slidesPerView: 2,
            spaceBetween: 25,
            loop: true,

            pagination: {
                el: ".ts-review-pagination",
                clickable: true,
            },

            autoplay: {
                delay: 3000,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 1
                },
                992: {
                    slidesPerView: 2
                }
            }
        });

    </script>
    <script>
        new Swiper(".industrySlider", {
            slidesPerView: "auto",
            spaceBetween: 0,
            loop: true,
            grabCursor: true,
            freeMode: true,

            autoplay: {
                delay: 0,
                disableOnInteraction: false,
            },

            speed: 5000,

            breakpoints: {
                0: {
                    slidesPerView: 1.2
                },
                768: {
                    slidesPerView: 3
                },
                1200: {
                    slidesPerView: 4
                }
            }
        });
    </script>

</body>

</html>