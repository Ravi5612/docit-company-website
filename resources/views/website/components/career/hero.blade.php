<!-- Section 1: Hero Banner (Full-Width Edge-to-Edge with Rich Spacious Height) -->
<section class="career-hero-section p-0 m-0 w-100 position-relative overflow-hidden" style="background: #ffffff; width: 100%;">
    <div class="position-relative w-100 career-hero-wrapper">
        
        <!-- Background Graphic with Rich Spacious Height & Right-Aligned Team Focus -->
        <img src="{{ asset('website/images/career-hero-bg.jpg') }}?v={{ filemtime(public_path('website/images/career-hero-bg.jpg')) }}" 
             alt="Build Your Future With Dr IT Group" 
             class="w-100 career-hero-bg-img" 
             style="width: 100%; height: 100%; object-fit: cover; object-position: right center; display: block; margin: 0; padding: 0;">

        <!-- Breadcrumb Overlay (Top Left inside banner) -->
        <div class="position-absolute career-breadcrumb-overlay">
            <div class="d-flex align-items-center gap-2" style="font-size: 14px; font-weight: 600;">
                <span style="color: #dc2626; font-size: 15px;">📍</span>
                <a href="{{ route('home') }}" class="text-dark text-decoration-none fw-bold" style="color: #1e293b;">Home</a>
                <span class="text-muted" style="font-weight: 400;">&gt;</span>
                <span style="color: #dc2626; font-weight: 800;">Careers</span>
            </div>
        </div>

        <!-- Code-Rendered Crisp Typography & CTA Button -->
        <div class="position-absolute career-hero-content">
            <h1 class="career-hero-title mb-2">
                BUILD YOUR FUTURE<br>
                <span style="color: #dc2626;">WITH US</span>
            </h1>

            <div class="career-hero-tagline mb-3">
                <span>Grow.</span> <span style="color: #dc2626;">Innovate.</span> <span>Succeed.</span>
            </div>

            <p class="career-hero-desc mb-4">
                Join Dr IT Group and become part of a team that transforms possibilities into reality.
            </p>

            <a href="#current-openings" class="btn btn-danger career-hero-btn rounded-pill">
                <span>Explore Openings</span>
                <span class="ms-1">&rarr;</span>
            </a>
        </div>

    </div>
</section>

<style>
    /* Spacious Majestic Height on Desktop */
    .career-hero-wrapper {
        position: relative;
        width: 100%;
        height: 500px;
        overflow: hidden;
    }

    .career-hero-bg-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: right center;
    }

    .career-breadcrumb-overlay {
        top: 32px;
        left: 4.5%;
        z-index: 10;
    }

    .career-hero-content {
        top: 85px;
        left: 4.5%;
        max-width: 44%;
        z-index: 10;
    }

    .career-hero-title {
        font-size: clamp(26px, 3.4vw, 48px);
        font-weight: 900;
        line-height: 1.12;
        letter-spacing: -0.5px;
        color: #0f172a;
    }

    .career-hero-tagline {
        font-size: clamp(15px, 1.8vw, 24px);
        font-weight: 800;
        color: #0f172a;
        letter-spacing: 0.3px;
    }

    .career-hero-desc {
        font-size: clamp(13px, 1.15vw, 16px);
        line-height: 1.6;
        color: #334155;
        max-width: 440px;
        font-weight: 500;
    }

    .career-hero-btn {
        background: #dc2626 !important;
        border-color: #dc2626 !important;
        color: #ffffff !important;
        font-size: clamp(13px, 1.05vw, 15px) !important;
        font-weight: 700 !important;
        padding: 10px 28px !important;
        box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35) !important;
        transition: all 0.25s ease !important;
        text-decoration: none !important;
        display: inline-flex !important;
        align-items: center !important;
    }

    .career-hero-btn:hover {
        background: #b91c1c !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(220, 38, 38, 0.45) !important;
    }

    @media (min-width: 1400px) {
        .career-hero-wrapper {
            height: 540px;
        }
        .career-hero-content {
            top: 95px;
        }
    }

    @media (max-width: 991.98px) {
        .career-hero-wrapper {
            height: 400px;
        }
        .career-hero-content {
            top: 65px;
            max-width: 48%;
        }
    }

    /* Mobile Responsive */
    @media (max-width: 767.98px) {
        .career-hero-wrapper {
            height: auto !important;
        }

        .career-hero-bg-img {
            height: 240px !important;
            object-fit: cover !important;
        }

        .career-breadcrumb-overlay {
            position: relative !important;
            top: auto !important;
            left: auto !important;
            padding: 12px 16px !important;
            background: #f8fafc;
        }

        .career-hero-content {
            position: relative !important;
            top: auto !important;
            left: auto !important;
            max-width: 100% !important;
            padding: 24px 20px 30px !important;
            background: #ffffff;
        }

        .career-hero-title {
            font-size: 28px !important;
        }

        .career-hero-tagline {
            font-size: 18px !important;
        }

        .career-hero-desc {
            font-size: 14px !important;
            max-width: 100% !important;
        }

        .career-hero-btn {
            font-size: 13px !important;
            padding: 10px 26px !important;
        }
    }
</style>
