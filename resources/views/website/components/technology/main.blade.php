<div class="col-lg-8 content-area">
    <!-- post -->
    <article class="post cmt-blog-single clearfix">
        <!-- post-featured-wrapper -->
        <div class="cmt-post-featured-wrapper cmt-featured-wrapper">
            <div class="cmt-post-featured row">
                <div class="col-lg-6 ">
                    <img width="1200" height="800" class="img-fluid"
                        src="{{ $technology->image ? asset('storage/' . $technology->image) : asset('website/images/blog/blog-01-1200x800.jpg') }}"
                        alt="">
                </div>
                <div class="col-lg-6 ">
                    <img width="1200" height="800" class="img-fluid"
                        src="{{ $technology->image_2 ? asset('storage/' . $technology->image_2) : asset('website/images/blog/blog-01-1200x800.jpg') }}"
                        alt="">
                </div>

            </div>
        </div><!-- post-featured-wrapper end -->
        <!-- cmt-blog-classic-content -->
        <div class="cmt-blog-single-content">

            <div class="entry-content">
                <div class="cmt-box-desc-text">
                    <p >{{ $technology->description ?? 'No Description Found' }}</p>

                    <blockquote class="cmt-bgcolor-grey cmt-textcolor-darkgrey">
                        <div class="qoute-text">
                            <p>An excellent service management in the area of IT providing solutions. Highly efficient solutions for business growth.</p>

                        </div>
                    </blockquote>



                    <p >{{ $technology->overview ?? ' No Overview found' }}</p>



                </div>
            </div>
        </div><!-- cmt-blog-classic-content end -->

    </article><!-- post end -->
</div>