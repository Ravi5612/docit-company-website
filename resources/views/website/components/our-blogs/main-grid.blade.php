<!--site-main start-->
<div class="site-main">

    @php
        $blogsgrid = App\Models\Blog::where('status', 'active')->latest()->get();
    @endphp

    <!--grid-section-->
    <section class="cmt-row grid-section clearfix">
        <div class="container">
            <!-- row -->
            <div class="row">
                @forelse($blogsgrid as $blogs)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <!-- featured-imagebox-post -->
                        <div class="featured-imagebox featured-imagebox-post style3">
                            <div class="featured-thumbnail">
                                <img width="1200" height="800" class="img-fluid"
                                    src="{{ $blogs->image ? 'storage/' . $blogs->image : "asset('website/images/blog/blog-02-1200x800.jpg')" }}"
                                    alt="">

                            </div>
                            <!-- featured-content -->
                            <div class="featured-content">
                                <div class="featured-content-inner">
                                    <div class="post-header">
                                        <!-- post-meta -->
                                        <div class="post-meta">
                                            <span class="cmt-meta-line date-link"><i class="icon-calendar"></i><time
                                                    class="entry-date published" datetime="2022-01-11T06:51:39+00:00">
                                                    {{ date('d', strtotime($blogs->date)) }}
                                                    <span class="month">
                                                        {{ date('F', strtotime($blogs->date)) }}
                                                    </span></time></span>
                                        </div><!-- post-meta end -->
                                        <div class="post-title featured-title">
                                            <h3><a
                                                    href="{{ route('blog-details', $blogs->slug) }}">{{ $blogs->title ?? 'Blog' }}</a>
                                            </h3>
                                        </div>
                                        <div class="post-desc featured-desc">
                                            <p>{{ \Illuminate\Support\Str::limit($blogs->description ?? 'No description found yet', 100) }}
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- featured-content end -->
                            </div><!-- featured-imagebox-post end -->
                        </div>
                    </div>
                @empty
                    <p>No Blog Found Yet!</p>
                @endforelse


            </div>
            <!-- row end -->
        </div>
    </section>
    <!--grid-section end-->


</div><!--site-main end-->