@extends('website.layout.app')
@section('title', 'Home | Dr IT Group')
@section('content')
    @include('website.components.index.slider')
    @include('website.components.index.certification-marquee')
    @include('website.components.index.about-us')

   

    @include('website.components.index.services-section')
    @include('website.components.home.work-section')

    @php
        $socialFeed = \App\Models\SocialFeed::where('is_active', 1)->first();
    @endphp

    @if($socialFeed)
        <section class="govSocialSection">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title title-style-center_text">
                        <div class="title-header">
                            <h3>Connect With Us</h3>
                            <h2 class="title">Stay Updated Through Our Social Channels</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="govSocialContainer container">

                <!-- Facebook -->
                <div class="govSocialCard">
                    <h3 class="govSocialTitle">Facebook</h3>

                    <div class="govSocialFrame">
                        <div id="fb-root"></div>

                        @php
                            $facebookPage = $socialFeed->facebook_page ?? 'https://www.facebook.com/DrITMCX';
                        @endphp

                        <div class="fb-page" data-href="{{ $facebookPage }}" data-tabs="timeline" data-width="500"
                            data-height="700" data-small-header="false" data-adapt-container-width="true"
                            data-hide-cover="false" data-show-facepile="true">

                            <blockquote cite="{{ $facebookPage }}" class="fb-xfbml-parse-ignore">
                                <a href="{{ $facebookPage }}">Facebook Page</a>
                            </blockquote>

                        </div>
                    </div>
                </div>

                <div class="govSocialCard">
                    <h3 class="govSocialTitle">Instagram</h3>

                    <div class="govSocialFrame">

                        {!! $socialFeed->instagram_embed ?? '
                                    <blockquote class="instagram-media"
                                        data-instgrm-permalink="https://www.instagram.com/p/DYPAFPZk5b8/"
                                        data-instgrm-version="14">
                                    </blockquote>
                                ' !!}

                    </div>
                </div>

                <div class="govSocialCard">
                    <h3 class="govSocialTitle">LinkedIn</h3>

                    <div class="govSocialFrame">

                        {!! $socialFeed->linkedin_embed ??
                            '<iframe src="https://www.linkedin.com/embed/feed/update/urn:li:share:7457761617812815873?collapsed=1"
                            height="669"
                            width="504"
                            frameborder="0"
                            allowfullscreen
                            title="Embedded post">
                        </iframe>' !!}

                    </div>
                </div>

            </div>
        </section>
    @endif








    @include('website.components.about-us.why-choose-us-section')
    @include('website.components.index.cta')
    @include('website.components.index.testimonial')
    @include('website.components.index.industries-serve')


@endsection
@push('scripts')
    <div id="fb-root"></div>

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v23.0">
    </script>

    <script async src="//www.instagram.com/embed.js"></script>

    <script>
        window.addEventListener('load', function () {
            if (window.instgrm) {
                window.instgrm.Embeds.process();
            }
        });
    </script>

    <script>


        document.addEventListener("DOMContentLoaded", function () {

            const counters = document.querySelectorAll(".numinate");

            const startCounter = (counter) => {
                const target = parseInt(counter.getAttribute("data-to"));
                const duration = 2000; // 2 seconds
                const increment = target / (duration / 16);

                let current = 0;

                const updateCounter = () => {
                    current += increment;

                    if (current < target) {
                        counter.textContent = Math.floor(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.textContent = target;
                    }
                };

                updateCounter();
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        startCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            counters.forEach(counter => {
                observer.observe(counter);
            });

        });



        document.addEventListener("DOMContentLoaded", () => {

            const modal = document.getElementById("dritPopupModal");

            const popup = new bootstrap.Modal(modal, {
                keyboard: true,
                backdrop: true
            });

            popup.show();

            modal.addEventListener("hidden.bs.modal", function () {
                document.querySelectorAll(".modal-backdrop").forEach(e => e.remove());
                document.body.classList.remove("modal-open");
                document.body.style = "";
            });

            setTimeout(() => {
                popup.hide();
            }, 3000);

        });


    </script>

@endpush