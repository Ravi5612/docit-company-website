<!-- Section: Our Work Culture (Crisp High-Res Background with Code-Rendered Typography & Button) -->
<section class="work-culture-section py-4 my-3" style="background: #ffffff;">
    <div class="container">
        <div class="work-culture-card position-relative overflow-hidden" 
             style="border-radius: 20px; border: 1px solid #e2e8f0; background: #ffffff; box-shadow: 0 8px 30px rgba(0,0,0,0.06);">
            
            <!-- Crisp High-Res Designer Background Graphic -->
            <img src="{{ asset('website/images/work-culture-bg.jpg') }}?v={{ filemtime(public_path('website/images/work-culture-bg.jpg')) }}" 
                 alt="Our Work Culture - Dr IT Group" 
                 class="w-100 d-block culture-bg-img" 
                 style="width: 100%; height: auto; display: block; border-radius: 20px;">

            <!-- Left Content: Code-Rendered Crisp Typography & Button (Never Blurry!) -->
            <div class="position-absolute culture-overlay-content">
                <h2 class="culture-heading mb-2">
                    Our <span style="color: #dc2626;">Work Culture</span>
                </h2>
                <p class="culture-description mb-3">
                    At Dr IT Group, we believe in creating an environment where ideas thrive, innovation leads, and people grow. 
                    From learning opportunities to team outings, we make sure our employees feel valued and inspired.
                </p>
                <a href="{{ route('about-us') }}" class="btn btn-danger culture-action-btn rounded-pill">
                    <span>Know More</span>
                    <span class="ms-1">&rarr;</span>
                </a>
            </div>

            <!-- Dr IT Group Wall Logo in First Slanted Office Photo -->
            <div class="position-absolute culture-wall-logo-wrap text-center">
                <img src="{{ asset('website/images/main-logo.png') }}" 
                     alt="Dr IT Group" 
                     class="img-fluid culture-wall-logo"
                     style="max-width: 100%; height: auto; opacity: 0.92; filter: contrast(1.05);">
            </div>

        </div>
    </div>
</section>

<style>
    /* Overlay Positions on Desktop */
    .culture-overlay-content {
        top: 14%;
        left: 4.5%;
        max-width: 30%;
        z-index: 10;
    }

    .culture-heading {
        font-size: clamp(20px, 2.5vw, 34px);
        font-weight: 800;
        color: #0f172a;
        line-height: 1.15;
        letter-spacing: -0.3px;
    }

    .culture-description {
        font-size: clamp(10.5px, 1.1vw, 13.5px);
        line-height: 1.6;
        color: #475569;
        font-weight: 500;
        max-width: 320px;
    }

    .culture-action-btn {
        background: #dc2626 !important;
        border-color: #dc2626 !important;
        color: #ffffff !important;
        font-size: clamp(10.5px, 1.05vw, 13px) !important;
        font-weight: 700 !important;
        padding: 6px 20px !important;
        box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3) !important;
        transition: all 0.25s ease !important;
        text-decoration: none !important;
        display: inline-flex !important;
        align-items: center !important;
    }

    .culture-action-btn:hover {
        background: #b91c1c !important;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(220, 38, 38, 0.4) !important;
    }

    /* Logo placed onto the white office reception wall */
    .culture-wall-logo-wrap {
        left: 38%;
        top: 36%;
        width: 8.5%;
        z-index: 8;
        pointer-events: none;
    }

    /* Mobile Responsive Stack */
    @media (max-width: 767.98px) {
        .culture-overlay-content {
            position: relative !important;
            top: auto !important;
            left: auto !important;
            max-width: 100% !important;
            padding: 24px 20px !important;
            background: #ffffff;
        }

        .culture-heading {
            font-size: 24px !important;
        }

        .culture-description {
            font-size: 13.5px !important;
            max-width: 100% !important;
        }

        .culture-action-btn {
            font-size: 13px !important;
            padding: 8px 22px !important;
        }

        .culture-wall-logo-wrap {
            left: 38% !important;
            top: 35% !important;
            width: 11% !important;
        }
    }
</style>
