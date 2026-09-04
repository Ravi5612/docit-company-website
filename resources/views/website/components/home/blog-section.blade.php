@php
    $blogs = App\Models\Blog::where('status', 'active')->latest()->take(4)->get();
@endphp
<section class="cmt-row blog-section  mt_0 res-991-mt-20 clearfix">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="section-title title-style-center_text">
                    <div class="title-header">
                        <h3>Quick Facts</h3>
                        <h2 class="title">Believe in Spreading Knowledge</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb_15">

            {{-- First 2 Blogs (Big Cards) --}}
            @foreach($blogs->take(2) as $blog)
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="featured-imagebox featured-imagebox-post style4">
                        <div class="featured-thumbnail">
                            <img class="img-fluid blog-image"
                                src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('website/images/blog/blog-01-370x200.jpg') }}"
                                alt="">


                        </div>

                        <div class="featured-content">
                            <div class="featured-content-inner">
                                <div class="post-header">
                                    <div class="post-meta">
                                        <span class="cmt-meta-line post-date">
                                            <i class="icon-calendar"></i>
                                            <time>
                                                On {{ \Carbon\Carbon::parse($blog->date)->format('M d, Y') }}
                                            </time>
                                        </span>
                                    </div>

                                    <div class="post-title featured-title">
                                        <h3>
                                            <a href="{{ route('blog-details', $blog->slug) }}">
                                                {{ $blog->title }}
                                            </a>
                                        </h3>
                                    </div>

                                    <div class="cmt-blogbox-footer-readmore">
                                        <a class="cmt-btn btn-inline cmt-icon-btn-right cmt-btn-size-md cmt-btn-color-skincolor"
                                            href="{{ route('blog-details', $blog->slug) }}">
                                            read more <i class="icon-right"></i>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


            {{-- Last 2 Blogs (Right Side List) --}}
            <div class="col-lg-4">
                <div class="post-list pb-15 res-991-mt_15">

                    @foreach($blogs->skip(2)->take(2) as $blog)
                        <div class="featured-imagebox featured-imagebox-post style1">
                            <div class="featured-content">

                                <div class="post-meta">
                                    <span class="cmt-meta-line post-date">
                                        <i class="icon-calendar"></i>
                                        <time>
                                            On {{ \Carbon\Carbon::parse($blog->date)->format('M d, Y') }}
                                        </time>
                                    </span>
                                </div>

                                <div class="featured-title">
                                    <h3>
                                        <a href="{{ route('blog-details', $blog->slug) }}">
                                            {{ $blog->title }}
                                        </a>
                                    </h3>
                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>

                <a class="cmt-btn btn-default cmt-icon-btn-left cmt-btn-size-md cmt-btn-color-dark"
                    href="{{ route('our-blogs') }}">
                    <i class="icon-right"></i>
                    <span>view more</span>
                </a>

            </div>

        </div>
    </div>
</section>
