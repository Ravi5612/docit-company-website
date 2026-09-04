<!--padding_bottom_zero-section-->
@php
    $partners = App\Models\Partner::where('status', 'active')->latest()->get();
@endphp
<section class="cmt-row  clearfix">
    <div class="container">
        <!-- row -->
        <div class="row mt_15 mb_15">
            @forelse($partners as $partner)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- featured-imagebox-portfolio -->
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img width="700" height="800" class="img-fluid"
                                src="{{ $partner->image ? asset('storage/' . $partner->image) : asset('website/images/portfolio/portfolio-01-700x800.jpg') }}"
                                alt="portfolio_img">
                        </div>
                       
                        <div class="featured-content">
                            <div class="category">
                                <span>{{ $partner->name ?? 'Partner' }}</span>
                            </div>
                            <div class="featured-title">
                                <h3><a href="{{ $partner->link ?? '' }}" target="_blank">Explore More</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- featured-imagebox-portfolio end-->
                </div>
            @empty
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <!-- featured-imagebox-portfolio -->
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img width="700" height="800" class="img-fluid"
                                src="{{ asset('website/images/portfolio/portfolio-01-700x800.jpg') }}" alt="portfolio_img">
                        </div>
                        <div class="cmt-media-link">
                            <a href="#" class="ttm_link"><i class="icon-plus-1"></i></a>
                        </div>
                        <div class="featured-content">
                            <div class="category">
                                <span>Image Documentary</span>
                            </div>
                            <div class="featured-title">
                                <h3><a href="#">Bootstrap modal plugin</a></h3>
                            </div>
                        </div>
                    </div><!-- featured-imagebox-portfolio end-->
                </div>
            @endforelse

        </div>
        <!-- row end -->
    </div>
</section>
<!--padding_bottom_zero-section end-->