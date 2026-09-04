@php
    $websiteSetting = App\Models\WebsiteSetting::where('is_active', true)->first();
    $social = App\Models\SocialSetting::where('is_active', true)->first();
@endphp
<header id="masthead" class="header cmt-header-style-01">

    <!-- topbar -->
    <div class="top_bar bg-base-skin text-base-white clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 my-auto top_bar_contact_item1">
                    <div class="sector-marquee">
                        <div class="sector-track">
                            <span>BPO</span>
                            <span>Financial Services</span>
                            <span>Education</span>
                            <span>Real Estate</span>
                            <span>Skill Development</span>
                            <span>Co-Working Space</span>

                            <!-- Duplicate for seamless loop -->
                            <span>BPO</span>
                            <span>Financial Services</span>
                            <span>Education</span>
                            <span>Real Estate</span>
                            <span>Skill Development</span>
                            <span>Co-Working Space</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 my-auto">
                    <div class="top_bar_inner bg-base-skin text-base-white">


                        <div class="top_bar_contact_item  with-icon me-4">
                            <div class="top_bar_icon">
                                <i class="icon-mail me-2"></i>
                            </div>
                            <a href="mailto:{{
                                    $websiteSetting->email ?? 'info@drit.in' }}" target="_blank"
                                class="text-base-white">
                                {{
                                $websiteSetting->email ?? 'info@drit.in' }}
                            </a> |
                            <a href="mailto:Hr.noida@drit.in" target="_blank" class="text-base-white">
                                Hr.noida@drit.in
                            </a>
                        </div>
                        <div class="top_bar_contact_item with-icon">
                            <div class="top_bar_icon">
                                <i class="flaticon flaticon-briefcase me-2 career-icon"></i>
                            </div>
                            <a href="{{ route('apply-now') }}" class=" career-link">
                                Apply Now
                            </a>
                        </div>

                        <!-- Right Side Social -->
                        <div class="top_bar_contact_item  ms-auto d-flex align-items-center">
                            <!-- <div class="top_bar_contact_item with-icon me-2">
                                <div class="top_bar_icon">
                                    <i class="flaticon flaticon-briefcase me-2 career-icon"></i>
                                </div>
                                <a href="{{ route('apply-now') }}" class=" career-link">
                                    Apply Now
                                </a>
                            </div> -->
                            <span class="me-3">Follow Us On :</span>

                            <div class="social-icons d-flex align-items-center">
                                @if(!empty($social->facebook_url))
                                    <li>
                                        <a class="top_bar_contact_item1" href="{{ $social->facebook_url }}" target="_blank"
                                            rel="noopener" aria-label="facebook">
                                            <i id="fb" class="icon-facebook"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty($social->instagram_url))
                                    <li>
                                        <a class="top_bar_contact_item1" href="{{ $social->instagram_url }}" target="_blank"
                                            rel="noopener" aria-label="instagram">
                                            <i id="insta" class="icon-instagram"></i>
                                        </a>
                                    </li>
                                @endif


                                @if(!empty($social->linkedin_url))
                                    <li>
                                        <a class="top_bar_contact_item1" href="{{ $social->linkedin_url }}" target="_blank"
                                            rel="noopener" aria-label="linkedin">
                                            <i id="linkedin" class="icon-linkedin"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(!empty($social->twitter_url))
                                    <li>
                                        <a class="top_bar_contact_item1" href="{{ $social->twitter_url }}" target="_blank"
                                            rel="noopener" aria-label="twitter">
                                            <i id="twitter" class="icon-twitter"></i>
                                        </a>
                                    </li>
                                @endif

                            </div>
                        </div>

                    </div>

                    <div class="side-menu-container d-none">
                        <div class="side-menu">
                            <a href="#"><i class="icon-menu"></i></a>
                        </div>

                        <!-- Side Menu -->
                        <div class="side-overlay">
                            <div class="side bg-base-dark">
                                <a href="#" class="close-side">
                                    <i class="icon-close"></i>
                                </a>

                                <div class="d-flex align-items-center pb-30">
                                    <div class="flotingbar-img">
                                        <img class="img-fluid rounded-circle" src="images/flotingbar-img.png"
                                            height="60" width="60" alt="flotingbar-img">
                                    </div>

                                    <div class="pl-20">
                                        <h3 class="fs-18 mb-0">Alex william</h3>
                                        <label class="text-base-skin">Support Expert</label>
                                    </div>
                                </div>

                                <p>
                                    An excellent service management in the area of IT providing
                                    solutions. High level efficient solution to businesses growth.
                                </p>

                                <div class="cmt-detailss">
                                    <ul>
                                        <li>
                                            <span class="cmt-li">Call us Now! :</span>
                                            <span>+123-456-7890</span>
                                        </li>

                                        <li>
                                            <span class="cmt-li">Email :</span>
                                            <span class="cmt-li4">
                                                <a href="mailto:example.supoort@gmail.com">
                                                    example.supoort@gmail.com
                                                </a>
                                            </span>
                                        </li>
                                    </ul>
                                </div>

                                <aside class="widget_text clearfix">
                                    <h3>Quick contact info</h3>

                                    <p class="mb-25">
                                        Our Solutions pride on world class customer service.
                                    </p>

                                    <form action="#" class="cta_form wrap-form clearfix" method="post">

                                        <label>
                                            <span class="text-input">
                                                <input name="name" type="text" placeholder="Enter your name here..."
                                                    required>
                                            </span>
                                        </label>

                                        <label>
                                            <span class="text-input">
                                                <input name="email" type="text"
                                                    placeholder="Enter your email address here..." required>
                                            </span>
                                        </label>

                                        <label>
                                            <span class="text-input">
                                                <textarea name="message" rows="4" placeholder="Type your message here"
                                                    required></textarea>
                                            </span>
                                        </label>

                                        <button
                                            class="submit cmt-btn btn-default cmt-icon-btn-left cmt-btn-size-md cmt-btn-color-white mt-15"
                                            type="submit">
                                            <i class="icon-right"></i>
                                            <span>Send Message</span>
                                        </button>

                                    </form>
                                </aside>

                            </div>
                        </div>
                        <!-- Side Menu -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- topbar end -->

    <!-- site-header-menu -->
    <div id="site-header-menu" class="site-header-menu">
        <div class="site-header-menu-inner cmt-stickable-header">
            <div class="container">
                <div class="row">
                    @php
                        $websiteSetting = App\Models\WebsiteSetting::where('is_active', true)->first();
                        $socialSetting = App\Models\SocialSetting::where('is_active', true)->first();
                    @endphp

                    <div class="col-lg-12">
                        <!--site-navigation -->
                        <div class="site-navigation d-flex align-items-center justify-content-between">
                            <!-- site-branding -->
                            <div class="site-branding me-auto">
                                @php
                                    $logo = optional($websiteSetting)->logo
                                        ? asset('storage/' . $websiteSetting->logo)
                                        : asset('website/images/main-logo.png');
                                    $logoWhite = optional($websiteSetting)->logo_white
                                        ? asset('storage/' . $websiteSetting->logo_white)
                                        : asset('website/images/main-logo.png');
                                @endphp
                                <a class="home-link" href="{{ route('home') }}" rel="home">
                                    <img id="logo-img" class="img-fluid auto_size" src="{{ $logo }}" alt="logo-img" >
                                    <style>
                                       @media (min-width:786px) {
                                        #logo-img{
                                            min-height:100px;
                                        }
                                       }
                                    </style>
                                </a>
                            </div><!-- site-branding end -->
                            <div class="btn-show-menu-mobile menubar menubar--squeeze">
                                <span class="menubar-box">
                                    <span class="menubar-inner"></span>
                                </span>
                            </div>
                            <!-- menu -->
                            <nav class="main-menu menu-mobile" id="menu">
                                <ul class="menu">
                                    <li class="mega-menu-item">
                                        <a href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li class="mega-menu-item">
                                        <a href="#" class="mega-menu-link">Company</a>
                                        <ul class="mega-submenu">
                                            <li class="mega-menu-item">
                                                <a href="{{ route('about-us') }}">About Us</a>
                                            </li>
                                            <li class="mega-menu-item">
                                                <a href="{{ route('mission-vision') }}">Mission & Vision</a>
                                            </li>

                                            <!-- <li class="mega-menu-item">
                                                <a href="{{ route('eea') }}">EEA</a>
                                            </li> -->


                                        </ul>
                                    </li>
                                    @php
                                        $serviceHeader = App\Models\Service::where('status', 'active')
                                            ->orderBy('id', 'desc')
                                            ->get();
                                    @endphp
                                    <li class="mega-menu-item">
                                        <a href="#" class="mega-menu-link">Our Services</a>
                                        <ul class="mega-submenu">
                                            @forelse($serviceHeader as $service)
                                                <li>
                                                    <a href="{{ url('service-details/' . $service->slug) }}">
                                                        {{ $service->title ?? 'No Name' }}
                                                    </a>
                                                </li>
                                            @empty
                                                <li>
                                                    <a>No Service Found Yet !!</a>
                                                </li>
                                            @endforelse

                                            <li><a href="https://dritimt.in/" target="_blank">Education </a></li>
                                        </ul>
                                    </li>
                                    @php
                                        $technologyHeader = App\Models\Technology::where('status', 'active')
                                            ->orderBy('id', 'desc')
                                            ->get();
                                    @endphp

                                    <li class="mega-menu-item">
                                        <a href="#" class="mega-menu-link">Our Technology</a>

                                        <ul class="mega-submenu">
                                            @forelse($technologyHeader as $technology)
                                                <li>
                                                    <a href="{{ url('technology-details/' . $technology->slug) }}">
                                                        {{ $technology->name ?? 'No Name' }}
                                                    </a>
                                                </li>
                                            @empty
                                                <li>
                                                    <p>No Technology Found Yet !!</p>
                                                </li>
                                            @endforelse
                                        </ul>
                                    </li>
                                    <li class="mega-menu-item">
                                        <a href="{{ route('our-gallery') }}">Our Gallery</a>

                                    </li>
                                    <li class="mega-menu-item">
                                        <a href="{{ route('our-presence') }}">Our Presence</a>
                                    </li>
                                    <li class="mega-menu-item ">
                                        <a href="{{ route('contact-us') }}">Contact us</a>
                                    </li>
                                </ul>
                            </nav><!-- menu end -->
                            <!-- header_extra -->
                            <div class="header_extra d-flex flex-row align-items-center">
                                <div class="header_btn d-none"><a
                                        class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-skincolor"
                                        href="{{ route('contact-us') }}">Contact Us<i class="icon-right"></i></a></div>
                                <div class="header_search">
                                    <a href="#" class="btn-default search_btn"><i class="icon-search-1"></i></a>
                                    <div class="header_search_content">
                                        <div class="header_search_content_inner">
                                            <a href="#" class="close_btn"><i class="icon-cancel-2"></i></a>
                                            <form id="searchbox" method="get" action="#">
                                                <input class="search_query" type="text" id="search_query_top" name="s"
                                                    placeholder="Type Your Search..." value="">
                                                <button type="submit" class="btn close-search"><i
                                                        class="icon-search-1"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div><!-- site-navigation end-->
                    </div>
                </div>
            </div>
        </div>
        <!-- site-header-menu end-->
</header><!--header end-->