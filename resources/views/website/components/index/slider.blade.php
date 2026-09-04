@php
    use App\Models\HomeSlider;

    $homeSliders = HomeSlider::where('status', 'active')->get();
@endphp

<section class="drit-hero-slider">
    <div class="swiper dritSwiper">
        <div class="swiper-wrapper">

            @if($homeSliders->count() > 0)

                @foreach($homeSliders as $slider)
                    <div class="swiper-slide drit-slide">
                        <img
                            src="{{ asset('storage/' . $slider->image) }}"
                            alt="{{ $slider->title ?? 'Banner' }}"
                            class="drit-slide-image">
                    </div>
                @endforeach

            @else

                <!-- Fallback Slides -->

                <div class="swiper-slide drit-slide">
                    <img src="{{ asset('website/images/upload/main-01.jpeg') }}"
                        alt="Banner"
                        class="drit-slide-image">
                </div>

                <div class="swiper-slide drit-slide">
                    <img src="{{ asset('website/images/upload/main-02.jpeg') }}"
                        alt="Banner"
                        class="drit-slide-image">
                </div>

            @endif

        </div>

        <div class="drit-pagination swiper-pagination"></div>
    </div>
</section>