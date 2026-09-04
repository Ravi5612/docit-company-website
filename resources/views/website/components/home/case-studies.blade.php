<!--padding_bottom_zero-section-->
@php
    $projects = App\Models\Partner::where('status', 'active')->latest()->get();
@endphp

<section class="cmt-row padding_bottom_zero-section position-relative z-index-1 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="section-title">
                    <div class="title-header">
                        <h3>Our Clients</h3>
                        <h2 class="title">Trusted by Businesses Across Industries for Reliable BPO Solutions.

                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="text-md-end res-767-pb-30">
                    <a class="cmt-btn btn-default cmt-icon-btn-left cmt-btn-size-md cmt-btn-color-dark"
                        href="{{ route('our-clients') }}">
                        <i class="icon-right"></i>
                        <span>see more Clients</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Slider -->
    <div class="container-fluid">
        <div class="row slick_slider ps-3 pe-3" data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "arrows":false, "autoplay":true, "dots":false, "infinite":true,
            "responsive":[
                {"breakpoint":1200,"settings":{"slidesToShow":4}},
                {"breakpoint":992,"settings":{"slidesToShow":3}},
                {"breakpoint":768,"settings":{"slidesToShow":2}},
                {"breakpoint":500,"settings":{"slidesToShow":1}}
            ]}'>

            @forelse($projects as $project)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="featured-imagebox featured-imagebox-portfolio style1">

                        <!-- Image -->
                        <div class="featured-thumbnail">
                            <img class="img-fluid" width="700" height="800"
                                src="{{ $project->image ? asset('storage/' . $project->image) : asset('website/images/portfolio/portfolio-01-700x800.jpg') }}"
                                alt="project_img">
                        </div>

                        <!-- Content -->
                        <div class="featured-content">
                            <div class="category">
                                <span><a class="text-white" href="{{ $partner->link ?? '' }}" target="_blank">Explore
                                        More</a></span>
                            </div>

                            <div class="featured-title">
                                <h3>
                                    <a href="{{ $project->link ?? '#' }}" target="_blank">
                                        {{ $project->name ?? 'Project Title' }}
                                    </a>
                                </h3>
                            </div>
                        </div>

                    </div>
                </div>

            @empty
                <!-- Fallback -->
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="featured-imagebox featured-imagebox-portfolio style1">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" width="700" height="800"
                                src="{{ asset('website/images/portfolio/portfolio-01-700x800.jpg') }}" alt="portfolio_img">
                        </div>

                        <div class="featured-content">
                            <div class="category">
                                <span>No Projects</span>
                            </div>
                            <div class="featured-title">
                                <h3><a href="#">Coming Soon</a></h3>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
</section>
<!--padding_bottom_zero-section end-->