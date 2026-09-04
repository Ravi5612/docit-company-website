<div class="col-lg-4 widget-area sidebar-left">
    <aside class="widget widget-nav-menu with-title">
        <h3 class="widget-title">Our Services</h3>
        @php
            $serviceHeader = App\Models\Service::where('status', 'active')
                ->orderBy('id', 'desc')
                ->get();
        @endphp
        <ul>
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
    </aside>
    <aside class="widget widget-banner with-title">
        <div class="cmt-col-bgcolor-yes bg-base-skin text-base-white col-bg-img-five cmt-col-bgimage-yes cmt-bg">
            <div class="cmt-col-wrapper-bg-layer cmt-bg-layer bg-base-skin">
                <div class="cmt-col-wrapper-bg-layer-inner bg-base-skin"></div>
            </div>
            <div class="layer-content text-center">
                <div class="icon-img mb-25">
                    <img src="{{ asset('website/images/icon-service.png') }}" alt="icon-service.png">
                </div>
                <h3>For Tomorrow We Can Take Action Today!</h3>
                <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-white"
                    href="{{ route('contact-us') }}">Join With Us<i class="icon-right"></i></a>
            </div>
        </div>
    </aside>

</div>