<div class="col-lg-4 widget-area sidebar-right">
    <!-- <aside class="widget widget-search with-title">
        <form role="search" method="get" class="search-form" action="#">
            <label>
                <span class="screen-reader-text">Search for:</span>
                <input type="search" class="input-text" placeholder="Search …" value="" name="s">
            </label>
            <button class="btn cmt-btn cmt-btn-size-md cmt-btn-shape-square cmt-btn-style-fill cmt-btn-color-dark"
                type="submit"><i class="icon-search-1"></i> </button>
        </form>
    </aside> -->
    <aside class="widget widget-categories with-title">
        <h3 class="widget-title">Our Technology</h3>
        @php
            $sidebartechnologies = App\Models\Technology::where('status', 'active')->latest()->get();
        @endphp
        <ul>
            @forelse($sidebartechnologies as $technology)
                <li>
                    <a href="{{ url('technology-details/' . $technology->slug) }}">
                        {{ $technology->name ?? 'No Name' }}
                    </a>
                </li>
            @empty
                <li>
                    <p>No Technology Found</p>
                </li>
            @endforelse

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