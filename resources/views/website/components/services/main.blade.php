<div class="col-lg-8 content-area">
    <div class="cmt-service-single-content-area">
        <div class="cmt-service-description">
            <h3>{{ $service->title ?? 'No Title Found Yet' }}</h3>
            <p >{{ $service->description ?? 'No Description Found Yet !!' }}</p>
            <!-- post-featured-wrapper -->
            <div class="cmt-post-featured-wrapper cmt-featured-wrapper">
                <div class="cmt-post-featured row">
                    <div class="col-lg-6"> <img width="1200" height="800" class="img-fluid"
                        src="{{ $service->image ? asset('storage/' . $service->image) : asset('website/images/blog/blog-01-1200x800.jpg') }}"
                        alt=""></div>
                    <div class="col-lg-6"> <img width="1200" height="800" class="img-fluid"
                        src="{{ $service->image_2 ? asset('storage/' . $service->image_2) : asset('website/images/blog/blog-01-1200x800.jpg') }}"
                        alt=""></div>
                   
                </div>
            </div>


        </div>
        <div class="cmt-service-description">
            <p >{{ $service->overview ?? 'No Overview Found Yet !!' }}</p>

        </div>

    </div>
</div>