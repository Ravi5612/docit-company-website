<div class="col-lg-8 content-area">
    <!-- post -->
    <article class="post cmt-blog-single clearfix">
        <!-- post-featured-wrapper -->
        <div class="cmt-post-featured-wrapper cmt-featured-wrapper">
            <div class="cmt-post-featured">
                <img width="1200" height="800" class="img-fluid"
                    src="{{ $blogs->imagen ? asset('storage/'.$blogs->image) : asset('website/images/blog/blog-01-1200x800.jpg') }}" alt="">
            </div>
        </div><!-- post-featured-wrapper end -->
        <!-- cmt-blog-classic-content -->
        <div class="cmt-blog-single-content">
            <div class="cmt-post-entry-header">
                <div class="post-meta">
                    <span class="cmt-meta-line date"><i class="icon-calendar"></i><time class="entry-date published"
                            datetime="2022-01-11T06:51:39+00:00"> {{ date('d', strtotime($blogs->date)) }}
                            <span class="month">
                                {{ date('F', strtotime($blogs->date)) }}
                            </span></time></span>
                    <span class="cmt-meta-line category"><i class="icon-user-1"></i><a href="#"> {{ $blogs->author ?? 'Admin' }}</a></span>
                    <span class="cmt-meta-line comment"><i class="icon-comment-empty"></i><a href="#">{{ random_int(0,10) }}
                            Comments</a></span>
                </div>
            </div>
            <div class="entry-content">
                <div class="cmt-box-desc-text">
                    <p align="justify">{{ $blogs->description ?? 'No Description Found Yet' }}</p>

                    <blockquote class="cmt-bgcolor-grey cmt-textcolor-darkgrey">
                        <div class="qoute-text">
                            <p>An excellent service management in the area of IT providing solutions. High level
                                efficient solution to businesses growth</p>

                        </div>
                    </blockquote>



                   
                     </div>
                </div>
            </div><!-- cmt-blog-classic-content end -->

    </article><!-- post end -->
</div>