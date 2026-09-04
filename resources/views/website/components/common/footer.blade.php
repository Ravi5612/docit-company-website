@php
    $websiteSetting = App\Models\WebsiteSetting::where('is_active', true)->first();
    $social = App\Models\SocialSetting::where('is_active', true)->first();
@endphp
<footer class="footer widget-footer bg-base-dark text-base-white clearfix">
    <div class="cmt-row-wrapper-bg-layer cmt-bg-layer"></div>
    <div class="second-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_text clearfix">
                        <h3 class="widget-title">About us</h3>
                        <!-- <div class="footer-logo">
                            @php
                                $logo = optional($websiteSetting)->logo
                                    ? asset('storage/' . $websiteSetting->logo)
                                    : asset('website/images/main-logo.png');
                                $logoWhite = optional($websiteSetting)->logo_white
                                    ? asset('storage/' . $websiteSetting->logo_white)
                                    : asset('website/images/main-logo.png');
                            @endphp
                            <img id="footer-logo-img" class="img-fluid auto_size" 
                                src="{{ $logoWhite }}" alt="image">

                        </div> -->
                        <div class="textwidget widget-text">
                            <p align="justify">
                                {{ $websiteSetting->description ?? 'At Dr ITM, we bridge the gap between complex technology and seamless business operations. Our commitment to Value-Driven Excellence ensures scalable, cost-effective solutions that drive superior outcomes for our global partners. ' }}
                            </p>
                        </div>
                        <div class="widget_social_wrapper social-icons pt-40">
                            <h3 class="fs-18 mb-25">Social Info</h3>
                            <ul class="list-inline">
                                @if(!empty($social->facebook_url))
                                    <li>
                                        <a href="{{ $social->facebook_url }}" target="_blank" rel="noopener"
                                            aria-label="facebook">
                                            <i class="icon-facebook"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(!empty($social->instagram_url))
                                    <li>
                                        <a href="{{ $social->instagram_url }}" target="_blank" rel="noopener"
                                            aria-label="instagram">
                                            <i class="icon-instagram"></i>
                                        </a>
                                    </li>
                                @endif

                                @if(!empty($social->linkedin_url))
                                    <li>
                                        <a href="{{ $social->linkedin_url }}" target="_blank" rel="noopener"
                                            aria-label="linkedin">
                                            <i class="icon-linkedin"></i>
                                        </a>
                                    </li>
                                @endif
                                @if(!empty($social->twitter_url))
                                    <li>
                                        <a href="{{ $social->twitter_url }}" target="_blank" rel="noopener"
                                            aria-label="twitter">
                                            <i class="icon-twitter"></i>
                                        </a>
                                    </li>
                                @endif

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 widget-area">
                    <div class="widget multi_widget clearfix">

                        <div class="">
                            <h3 class="widget-title">Quick links</h3>
                            <ul class="menu-footer-quick-links links-1">
                                <li><a href="{{ route('about-us') }}">About Us</a></li>
                                <!-- <li><a href="{{ route('eea') }}">EEA</a></li> -->
                                <li><a href="{{ route('contact-us') }}">Contact us</a></li>
                                <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                <li><a href="{{ route('terms-conditions') }}">Terms and Conditions</a></li>
                            </ul>
                        </div>
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 widget-area">
                    <div class="widget multi_widget clearfix">

                        @php
                            $serviceHeader = App\Models\Service::where('status', 'active')
                                ->orderBy('id', 'desc')
                                ->get();
                        @endphp
                        <div class="">
                            <h3 class="widget-title">Services</h3>
                            <ul class="menu-footer-quick-links links-1">
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
                        </div>
                        
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 widget-area">
                    <div class="widget widget_cta clearfix">
                        <h3 class="widget-title">Contact Us</h3>
                        <!-- <h4>{{ $websiteSetting->phone1 ?? '+0022 6544 9977' }}</h4> -->
                        <ul class="widget_contact_wrapper">
                            <li><i class="flaticon-envelope"></i>
                                <a href="mailto:{{ $websiteSetting->email ?? 'info@drit.in' }}" target="_blank">{{
                                    $websiteSetting->email ?? 'info@drit.in' }}</a>
                                <a href="mailto: Hr.noida@drit.in" target="_blank"> Hr.noida@drit.in</a>
                                24 x 7
                                Online Support
                            </li>
                            <li>
                                <i class="flaticon-pin"></i>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($websiteSetting->location ?? 'Dr IT Group, Plot No: 4, IT Park, Sector-67 Mohali') }}"
                                target="_blank" rel="noopener noreferrer">
                                    {{ $websiteSetting->location ?? 'Dr IT Group, Plot No: 4, IT Park, Sector-67 Mohali' }}
                                </a>
                            </li>

                            <li>
                                <i class="flaticon-pin"></i>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($websiteSetting->address_noida ?? 'Dr IT Group, C 56A/10&11, Sector 62 Noida - 201301') }}"
                                target="_blank" rel="noopener noreferrer">
                                    {{ $websiteSetting->address_noida ?? 'Dr IT Group, C 56A/10&11, Sector 62 Noida - 201301' }}
                                </a>
                            </li>

                            <li>
                                <i class="flaticon-pin"></i>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($websiteSetting->address_jaipur ?? 'Dr IT Group IT 2003, IT Zone, Behind Bombay Hospital, Sitapura, Jaipur, Rajasthan 302022') }}"
                                target="_blank" rel="noopener noreferrer">
                                    {{ $websiteSetting->address_jaipur ?? 'Dr IT Group IT 2003, IT Zone, Behind Bombay Hospital, Sitapura, Jaipur, Rajasthan 302022' }}
                                </a>
                            </li>
                        </ul>
                        {{-- <div class="g-map">
                            <iframe
                                src="https://www.google.com/maps?q={{ urlencode($websiteSetting->location ?? 'Mohali,Punjab,India') }}&output=embed"
                                width="100%" height="150" style="border:0;">
                            </iframe>
                        </div>
                        <a href="https://www.google.com/search?q={{ urlencode($websiteSetting->location ?? 'Mohali,Punjab,India') }}=chrome&ie=UTF-8"
                            target="_blank"><button class=" mt-2 footer-button">Visit Now !</button></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer-text copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="cpy-text">&copy; <?= date('Y') ?> <a href="{{ route('home') }}">Dr IT Group</a> |
                        Designed and Developed by Dr IT Software Development Team</span>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Floating Call Button -->
<!-- <div class="floating-call-btn">

    <span></span>
    <span></span>
    <span></span>

    <a href="tel:+911234567890">
        <i class="flaticon-phone-call"></i>
    </a>

</div> -->