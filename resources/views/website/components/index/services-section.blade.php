@php
    $ServiceHome = App\Models\Service::where('status', 'active')
        ->limit(4)
        ->orderBy('id', 'desc')
        ->get();
@endphp
<section class="cmt-row  clearfix" style="background: linear-gradient(45deg, #fbdada, #fbf8eb);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- section title -->
                <div class="section-title title-style-center_text res-991-mb_20">
                    <div class="title-header">
                        <h3 class="">Our Services</h3>
                        <h2 class="title">Our Specialized BPO Services.</h2>
                    </div>

                </div><!-- section title end -->
                <div class="pb-60 res-991-p-0"></div>
            </div>
        </div>
    </div>
</section>
<section class="cmt-row padding_zero-section clearfix">
    <div class="container">
        <div class="row mt_140 res-991-mt-40 mb_15 res-991-mb-0">
            @forelse($ServiceHome as $service)

                <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                    <!-- featured-imagebox -->

                    <div class="featured-imagebox featured-imagebox-procedure">
                        <span class="number"></span>
                        <div class="featured-thumbnail">
                            <img class="img-fluid auto_size" width="185" height="185"
                                src="{{ $service->image ? asset('storage/' . $service->image) : asset('website/images/process-01.jpg') }}"
                                alt="image">
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h3>{{ $service->title ?? 'No Name' }}

                                </h3>
                            </div>
                            <div class="featured-desc">
                                <p> {{ \Illuminate\Support\Str::words($service->description ?? 'No Description Found', 12, '...') }}
                                </p>
                            </div>
                            <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-skincolor"
                                href="{{ url('service-details/' . $service->slug) }}">view more<i
                                    class="icon-right"></i></a>

                        </div>
                    </div><!-- featured-imagebox end-->

                </div>

            @empty
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- featured-imagebox -->
                    <div class="featured-imagebox featured-imagebox-procedure">
                        <span class="number"></span>
                        <div class="featured-thumbnail">
                            <div class="featured-thumbnail">
                                <img class="img-fluid auto_size" width="185" height="185"
                                    src="{{ asset('website/images/process-01.jpg') }}" alt="image">
                            </div>
                        </div>
                        <div class="featured-content">
                            <div class="featured-title">
                                <h3>Service Title</h3>
                            </div>
                            <div class="featured-desc">
                                <p>No Description Found</p>
                            </div>
                        </div>
                    </div><!-- featured-imagebox end-->
                </div>
            @endforelse

        </div>
    </div>
</section>