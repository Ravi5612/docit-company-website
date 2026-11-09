<!-- ============================================== -->
<!-- SECTION: Explore Current Openings (Real-time Live Sync with HRMS) -->
<!-- ============================================== -->
<section id="current-openings" class="current-openings-section py-5" style="background: #f8fafc;">
    <div class="container py-4">
        
        <!-- Section Header -->
        <div class="text-center mb-5">
            <div class="d-inline-flex align-items-center gap-2 mb-2">
                <span style="display: inline-block; width: 35px; height: 2px; background: #dc2626;"></span>
                <h2 class="section-title fw-bold m-0" style="font-size: 32px; color: #0f172a; letter-spacing: -0.5px;">
                    Explore <span style="color: #dc2626;">Current Openings</span>
                </h2>
                <span style="display: inline-block; width: 35px; height: 2px; background: #dc2626;"></span>
            </div>
            <p class="text-muted mx-auto" style="max-width: 600px; font-size: 14.5px;">
                Find your next career move at Dr IT Group. Real-time vacancies with fast-track interviews.
            </p>
        </div>

        <!-- Openings Reel Grid -->
        <div class="row gx-4 gy-4 justify-content-center career-cards-row">
            @php
                $portalUrl = env('HRMS_APP_URL', 'https://omnidesk.dritm.com');
                $backendBase = env('HRMS_BACKEND_URL', 'https://omnidesk.dritm.com');
                $activeJobs = (!empty($jobs) && is_array($jobs)) ? $jobs : [];
            @endphp

            @forelse($activeJobs as $index => $item)
                @php
                    $isDynamic = isset($item['shareSlug']) && !empty($item['shareSlug']);
                    $applyUrl = $isDynamic ? ($portalUrl . '/careers/' . $item['shareSlug']) : '#contact-form';
                    $title = $item['title'] ?? 'Opening';
                    $location = $item['location'] ?? 'Gujarat';
                    $exp = $item['experience'] ?? '0-2 Years';
                    $salary = $item['salaryRange'] ?? 'Competitive';
                    $openingsCount = $item['openings'] ?? 1;
                    $deptName = $item['department']['name'] ?? 'HR & Recruitment';
                    $skills = $item['skills'] ?? [];
                    if (is_string($skills)) {
                        $skills = json_decode($skills, true) ?: [$skills];
                    }

                    $posterSrc = null;
                    if (!empty($item['posterUrl'])) {
                        $posterSrc = \Illuminate\Support\Str::startsWith($item['posterUrl'], 'http')
                            ? $item['posterUrl']
                            : rtrim($backendBase, '/') . $item['posterUrl'];
                    }
                @endphp

                <div class="col-lg-4 col-md-6 col-12 d-flex insta-reel-col">
                    <!-- Instagram Reel Card -->
                    <div class="insta-reel-card bg-white rounded-4 overflow-hidden border shadow-sm w-100 d-flex flex-column"
                         style="border-color: #e2e8f0; border-radius: 18px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); transition: transform 0.25s ease, box-shadow 0.25s ease;">
                        
                        <!-- 1. Header (Instagram Profile Style) -->
                        <div class="p-3 d-flex align-items-center justify-content-between border-bottom" style="background: #ffffff;">
                            <div class="d-flex align-items-center gap-2.5 overflow-hidden">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-xs shrink-0" 
                                     style="width: 38px; height: 38px; background: linear-gradient(135deg, #dc2626, #991b1b); font-size: 13.5px; flex-shrink: 0;">
                                    DR
                                </div>
                                <div class="overflow-hidden">
                                    <div class="d-flex align-items-center gap-1">
                                        <span class="fw-bold text-truncate" style="font-size: 13.5px; color: #0f172a; font-weight: 700;">
                                            Dr IT Group
                                        </span>
                                        <svg style="width: 14px; height: 14px; fill: #0284c7; flex-shrink: 0;" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                    <span class="text-muted d-block text-truncate" style="font-size: 11px;">
                                        {{ $deptName }} &bull; 📍 {{ $location }}
                                    </span>
                                </div>
                            </div>
                            <span class="badge rounded-pill px-2.5 py-1 shrink-0" 
                                  style="background: #fef2f2; color: #dc2626; font-weight: 700; font-size: 11px; border: 1px solid #fecaca; white-space: nowrap;">
                                🔥 {{ $openingsCount }} {{ $openingsCount > 1 ? 'Openings' : 'Opening' }}
                            </span>
                        </div>

                        <!-- 2. Instagram Reel Media (Official Poster Display) -->
                        <div class="insta-reel-media position-relative overflow-hidden" 
                             style="height: 430px; background: #0f172a; cursor: pointer;"
                             onclick="openReelLightbox({{ $index }})"
                             title="Click to view full poster">
                            
                            @if($posterSrc)
                                <img src="{{ $posterSrc }}" 
                                     alt="{{ $title }} Hiring Poster" 
                                     class="w-100 h-100 reel-poster-img"
                                     style="object-fit: cover; object-position: top center; display: block; transition: transform 0.35s ease;"
                                     onerror="this.style.display='none'; this.nextElementSibling.classList.remove('d-none');">
                                
                                <!-- Fallback Branded Card if poster fails to load -->
                                <div class="fallback-poster w-100 h-100 d-none flex-column align-items-center justify-content-center p-4 text-center text-white"
                                     style="background: linear-gradient(135deg, #1e293b, #0f172a);">
                                    <div class="rounded-circle p-3 mb-3" style="background: rgba(220,38,38,0.2);">
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2">
                                            <rect x="2" y="7" width="20" height="14" rx="2"></rect>
                                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                        </svg>
                                    </div>
                                    <span class="badge bg-danger rounded-pill px-3 py-1 mb-2">WE ARE HIRING</span>
                                    <h4 class="fw-bold text-white mb-2">{{ $title }}</h4>
                                    <p class="text-white-50 small mb-0">📍 {{ $location }} &bull; {{ $exp }}</p>
                                </div>
                            @else
                                <!-- Branded Default Card -->
                                <div class="w-100 h-100 d-flex flex-column align-items-center justify-content-center p-4 text-center text-white"
                                     style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);">
                                    <div class="rounded-circle p-3 mb-3" style="background: rgba(220,38,38,0.2); border: 1px solid rgba(220,38,38,0.4);">
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2">
                                            <rect x="2" y="7" width="20" height="14" rx="2"></rect>
                                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                        </svg>
                                    </div>
                                    <span class="badge bg-danger rounded-pill px-3 py-1 mb-2 fw-bold" style="font-size: 11px;">WE ARE HIRING</span>
                                    <h4 class="fw-bold text-white mb-2" style="font-size: 20px;">{{ $title }}</h4>
                                    <p class="text-white-50 small mb-0">📍 {{ $location }} &bull; {{ $exp }}</p>
                                </div>
                            @endif

                            <!-- Floating Top-Right Zoom Pill (Clean & Non-intrusive) -->
                            <div class="position-absolute top-0 end-0 m-2.5 d-flex align-items-center gap-1.5 px-2.5 py-1 rounded-pill"
                                 style="background: rgba(15,23,42,0.72); backdrop-filter: blur(4px); color: #ffffff; font-size: 11px; font-weight: 600; pointer-events: none; z-index: 2;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    <line x1="11" y1="8" x2="11" y2="14"></line>
                                    <line x1="8" y1="11" x2="14" y2="11"></line>
                                </svg>
                                <span>Tap to Zoom</span>
                            </div>
                        </div>

                        <!-- 3. Details & Uniform Meta Information -->
                        <div class="d-flex flex-column flex-grow-1" style="background: #ffffff; padding: 22px 20px 20px;">
                            
                            <!-- Job Title -->
                            <h4 class="fw-bold mb-2 text-truncate" style="font-size: 18px; color: #0f172a; font-weight: 800; text-transform: capitalize;" title="{{ $title }}">
                                {{ $title }}
                            </h4>

                            <!-- Meta Chips -->
                            <div class="d-flex flex-wrap gap-1.5 mb-2.5">
                                <span class="badge border px-2.5 py-1.5 rounded-pill" style="font-size: 11.5px; background: #f8fafc; color: #334155; border-color: #e2e8f0; font-weight: 600;">
                                    💼 {{ $exp }}
                                </span>
                                <span class="badge border px-2.5 py-1.5 rounded-pill" style="font-size: 11.5px; background: #f8fafc; color: #334155; border-color: #e2e8f0; font-weight: 600;">
                                    💰 {{ $salary }}
                                </span>
                                <span class="badge border px-2.5 py-1.5 rounded-pill" style="font-size: 11.5px; background: #f8fafc; color: #334155; border-color: #e2e8f0; font-weight: 600;">
                                    📍 {{ $location }}
                                </span>
                            </div>

                            <!-- Skills Chips -->
                            @if(!empty($skills))
                                <div class="d-flex flex-wrap gap-1 mb-3">
                                    @foreach(array_slice($skills, 0, 4) as $sk)
                                        <span class="badge rounded-pill" style="font-size: 10.5px; font-weight: 600; background: #f1f5f9; color: #475569;">
                                            #{{ str_replace(' ', '', $sk) }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- 4. Action Button (Always Anchored at Bottom) -->
                            <div class="mt-auto pt-2">
                                <a href="{{ $applyUrl }}" 
                                   @if($isDynamic) target="_blank" rel="noopener" @endif
                                   class="btn btn-danger w-100 py-2.5 rounded-pill fw-bold text-white d-flex align-items-center justify-content-center gap-2 shadow-xs"
                                   style="background: #dc2626; border: none; font-size: 14px; font-weight: 700; box-shadow: 0 4px 12px rgba(220,38,38,0.25);">
                                    <span>Apply Online Directly</span>
                                    <span>&rarr;</span>
                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            @empty
                <!-- Empty State: When HR closes all jobs or none active -->
                <div class="col-12 text-center py-5">
                    <div class="p-5 bg-white rounded-4 border shadow-xs mx-auto" style="max-width: 540px; border-radius: 20px;">
                        <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3"
                             style="width: 64px; height: 64px; background: #fee2e2; color: #dc2626;">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#dc2626" stroke-width="2">
                                <rect x="2" y="7" width="20" height="14" rx="2"></rect>
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                            </svg>
                        </div>
                        <h4 class="fw-bold mb-2" style="color: #0f172a; font-size: 20px;">No Active Openings Right Now</h4>
                        <p class="text-muted small mb-4" style="font-size: 13px; line-height: 1.6;">
                            All current job openings have been filled or closed by our recruitment team. Feel free to submit your resume in our talent pool below for future openings!
                        </p>
                        <a href="#contact-form" class="btn btn-danger px-4 py-2.5 rounded-pill fw-bold text-white shadow-xs"
                           style="background: #dc2626; border: none; font-size: 13.5px;">
                            Submit Resume for Future Openings &darr;
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
</section>

<!-- ============================================== -->
<!-- FULL SCREEN INSTAGRAM REEL / POST LIGHTBOX MODAL -->
<!-- ============================================== -->
<div id="reelLightboxModal" class="reel-lightbox-overlay" style="display: none;">
    <div class="reel-lightbox-backdrop" onclick="closeReelLightbox()"></div>
    
    <div class="reel-lightbox-box">
        <div class="reel-lightbox-inner">
            <!-- Left: Full-Screen Poster Media -->
            <div class="reel-lightbox-media">
                <img id="lbPosterImg" src="" alt="Job Poster" class="img-fluid lb-img">
            </div>

            <!-- Right: Premium Job Details Sidebar -->
            <div class="reel-lightbox-sidebar">
                <!-- Header Profile with Clean Close Button -->
                <div class="p-3 px-4 border-bottom d-flex align-items-center justify-content-between bg-white position-relative">
                    <div class="d-flex align-items-center gap-2.5 overflow-hidden">
                        <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold shadow-xs shrink-0"
                             style="width: 40px; height: 40px; background: linear-gradient(135deg, #dc2626, #991b1b); font-size: 13.5px; flex-shrink: 0;">
                            DR
                        </div>
                        <div class="overflow-hidden">
                            <div class="d-flex align-items-center gap-1.5">
                                <strong style="font-size: 14.5px; color: #0f172a; font-weight: 800;">Dr IT Group</strong>
                                <svg style="width: 14px; height: 14px; fill: #0284c7; flex-shrink: 0;" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                                <span class="badge rounded-pill px-2 py-0.5" style="font-size: 9.5px; background: #ecfdf5; color: #059669; border: 1px solid #a7f3d0; font-weight: 700;">Active</span>
                            </div>
                            <small id="lbLocationText" class="text-muted text-truncate d-block" style="font-size: 11.5px; font-weight: 500;">Gujarat</small>
                        </div>
                    </div>
                    <!-- Close Button -->
                    <button type="button" class="btn-close-custom" onclick="closeReelLightbox()" title="Close (Esc)">
                        &times;
                    </button>
                </div>

                <!-- Scrollable Body with Rich Visual Highlights -->
                <div class="p-3 px-4 flex-grow-1 overflow-auto" style="max-height: 60vh;">
                    <!-- Job Title -->
                    <div class="mb-3">
                        <span class="text-danger fw-bold text-uppercase" style="font-size: 10.5px; letter-spacing: 0.8px;">Open Designation</span>
                        <h3 id="lbJobTitle" class="fw-bold m-0" style="color: #0f172a; font-size: 20px; font-weight: 800; text-transform: capitalize; line-height: 1.3;"></h3>
                    </div>

                    <!-- 2x2 Key Highlights Grid -->
                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <div class="p-2.5 rounded-3 border" style="background: #f8fafc; border-color: #e2e8f0;">
                                <span class="text-muted d-block" style="font-size: 10px; text-transform: uppercase; font-weight: 600;">Experience</span>
                                <strong id="lbExpText" class="d-block text-truncate" style="font-size: 13px; color: #1e293b;">0-2 Years</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2.5 rounded-3 border" style="background: #f8fafc; border-color: #e2e8f0;">
                                <span class="text-muted d-block" style="font-size: 10px; text-transform: uppercase; font-weight: 600;">Salary Budget</span>
                                <strong id="lbSalaryText" class="d-block text-truncate" style="font-size: 13px; color: #16a34a;">Competitive</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2.5 rounded-3 border" style="background: #f8fafc; border-color: #e2e8f0;">
                                <span class="text-muted d-block" style="font-size: 10px; text-transform: uppercase; font-weight: 600;">Vacancies</span>
                                <strong id="lbOpeningsText" class="d-block text-truncate" style="font-size: 13px; color: #dc2626;">1 Opening</strong>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-2.5 rounded-3 border" style="background: #f8fafc; border-color: #e2e8f0;">
                                <span class="text-muted d-block" style="font-size: 10px; text-transform: uppercase; font-weight: 600;">Location</span>
                                <strong id="lbLocationGridText" class="d-block text-truncate" style="font-size: 13px; color: #1e293b;">Gujarat</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Key Skills Required -->
                    <div class="mb-3">
                        <h6 class="text-uppercase fw-bold text-muted mb-2" style="font-size: 10.5px; letter-spacing: 0.5px;">Skills Required</h6>
                        <div id="lbSkillsArea" class="d-flex flex-wrap gap-1.5"></div>
                    </div>

                    <!-- Fast-Track Interview Highlight -->
                    <div class="p-2.5 px-3 rounded-3 mb-3" style="background: #fef2f2; border: 1px dashed #fca5a5;">
                        <div class="d-flex align-items-center gap-1.5 mb-1">
                            <span class="badge bg-danger rounded-pill px-2 py-0.5" style="font-size: 9.5px;">Fast-Track</span>
                            <strong style="font-size: 12px; color: #991b1b;">Direct Interview Scheduling</strong>
                        </div>
                        <p class="text-muted small m-0" style="font-size: 11px; line-height: 1.4; color: #7f1d1d !important;">
                            Applications submitted here go straight to our HR recruitment desk. Fast-track screening within 24 hours.
                        </p>
                    </div>

                    <!-- Job Notes & Description -->
                    <div class="border-top pt-2.5">
                        <h6 class="text-muted text-uppercase fw-bold mb-1" style="font-size: 10.5px; letter-spacing: 0.5px;">Role Overview & Notes</h6>
                        <p id="lbCaptionText" class="text-secondary small mb-0" style="white-space: pre-line; line-height: 1.5; font-size: 12px;"></p>
                    </div>
                </div>

                <!-- Sticky Footer Apply CTA -->
                <div class="p-3 px-4 border-top bg-light mt-auto">
                    <a id="lbApplyBtn" href="#" target="_blank" rel="noopener" 
                       class="btn btn-danger w-100 py-2.5 rounded-pill fw-bold text-white d-flex align-items-center justify-content-center gap-2 shadow-xs"
                       style="background: #dc2626; border: none; font-size: 14.5px; font-weight: 700; box-shadow: 0 4px 14px rgba(220,38,38,0.25);">
                        <span>Apply Online Directly</span>
                        <span>&rarr;</span>
                    </a>
                    <small class="text-muted text-center d-block mt-1.5" style="font-size: 10.5px;">
                        ⚡ Direct HRMS Submission &bull; Verified Opening
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .insta-reel-col {
        padding-left: 18px !important;
        padding-right: 18px !important;
        margin-bottom: 24px !important;
    }
    .insta-reel-card {
        border-radius: 20px !important;
        border: 1px solid #e2e8f0 !important;
        box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06) !important;
        transition: transform 0.25s ease, box-shadow 0.25s ease, border-color 0.25s ease !important;
    }
    .insta-reel-card:hover {
        transform: translateY(-6px) !important;
        box-shadow: 0 20px 35px -5px rgba(220, 38, 38, 0.12), 0 10px 10px -5px rgba(0, 0, 0, 0.04) !important;
        border-color: #fca5a5 !important;
    }

    .insta-reel-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 35px -4px rgba(0, 0, 0, 0.12) !important;
        border-color: #fca5a5 !important;
    }
    .insta-reel-card:hover .reel-poster-img {
        transform: scale(1.03);
    }

    /* Modal Lightbox - Top Level Fix */
    .reel-lightbox-overlay {
        position: fixed !important;
        top: 0 !important;
        left: 0 !important;
        right: 0 !important;
        bottom: 0 !important;
        width: 100vw !important;
        height: 100vh !important;
        z-index: 2147483647 !important; /* Maximum possible z-index to stay above fixed site header */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
        box-sizing: border-box;
    }
    .reel-lightbox-backdrop {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(15, 23, 42, 0.92);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
    .reel-lightbox-box {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 960px;
        max-height: 88vh;
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.6);
        display: flex;
        flex-direction: column;
    }
    .btn-close-custom {
        background: #f1f5f9;
        color: #475569;
        border: none;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        font-size: 22px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
        line-height: 1;
        flex-shrink: 0;
    }
    .btn-close-custom:hover {
        background: #fee2e2;
        color: #dc2626;
        transform: rotate(90deg);
    }
    .reel-lightbox-close {
        position: absolute;
        top: 14px;
        right: 14px;
        z-index: 50;
        background: rgba(15, 23, 42, 0.75);
        color: #ffffff;
        border: 1px solid rgba(255, 255, 255, 0.2);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        font-size: 22px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    .reel-lightbox-close:hover {
        background: #dc2626;
        border-color: #dc2626;
        transform: rotate(90deg);
    }
    .reel-lightbox-inner {
        display: flex;
        flex-direction: row;
        height: 100%;
        max-height: 88vh;
        overflow: hidden;
    }
    .reel-lightbox-media {
        flex: 1.25;
        background: #0f172a;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        padding: 16px;
        min-height: 350px;
    }
    .reel-lightbox-media img {
        max-height: 82vh;
        max-width: 100%;
        object-fit: contain;
        border-radius: 10px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    .reel-lightbox-sidebar {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #ffffff;
        min-width: 320px;
        border-left: 1px solid #e2e8f0;
    }

    @media (max-width: 820px) {
        .reel-lightbox-overlay {
            padding: 12px;
        }
        .reel-lightbox-box {
            max-height: 94vh;
        }
        .reel-lightbox-inner {
            flex-direction: column;
            overflow-y: auto;
            max-height: 94vh;
        }
        .reel-lightbox-media {
            flex: none;
            height: 48vh;
            padding: 10px;
        }
        .reel-lightbox-media img {
            max-height: 44vh;
        }
        .reel-lightbox-sidebar {
            min-width: 100%;
            border-left: none;
            border-top: 1px solid #e2e8f0;
        }
    }
</style>

<script>
    // Job Data for Lightbox Modal
    window.careerJobsData = @json($activeJobs);

    // Auto-mount modal directly to document.body to break out of any section stacking context
    document.addEventListener('DOMContentLoaded', function () {
        var modal = document.getElementById('reelLightboxModal');
        if (modal && modal.parentElement !== document.body) {
            document.body.appendChild(modal);
        }
    });

    function openReelLightbox(index) {
        var job = window.careerJobsData[index];
        if (!job) return;

        var portalUrl = "{{ env('HRMS_APP_URL', 'https://omnidesk.dritm.com') }}";
        var backendBase = "{{ env('HRMS_BACKEND_URL', 'https://omnidesk.dritm.com') }}";

        var posterSrc = '';
        if (job.posterUrl) {
            posterSrc = job.posterUrl.startsWith('http') ? job.posterUrl : (backendBase.replace(/\/$/, '') + job.posterUrl);
        }

        var applyUrl = job.shareSlug ? (portalUrl + '/careers/' + job.shareSlug) : '#contact-form';

        var posterImg = document.getElementById('lbPosterImg');
        posterImg.src = posterSrc || '';
        posterImg.style.display = posterSrc ? 'block' : 'none';

        document.getElementById('lbJobTitle').textContent = job.title || 'Job Opening';
        document.getElementById('lbLocationText').textContent = (job.department && job.department.name ? job.department.name + ' • ' : '') + '📍 ' + (job.location || 'Mohali');
        document.getElementById('lbExpText').textContent = job.experience || '0-2 Years';
        document.getElementById('lbSalaryText').textContent = job.salaryRange || 'Competitive';
        document.getElementById('lbOpeningsText').textContent = (job.openings || 1) + ' Vacanc' + ((job.openings > 1) ? 'ies' : 'y');
        document.getElementById('lbLocationGridText').textContent = job.location || 'Mohali';

        var skillsArea = document.getElementById('lbSkillsArea');
        skillsArea.innerHTML = '';
        var skills = job.skills || [];
        if (typeof skills === 'string') {
            try { skills = JSON.parse(skills); } catch(e) { skills = [skills]; }
        }
        if (Array.isArray(skills)) {
            skills.forEach(function (sk) {
                var span = document.createElement('span');
                span.className = 'badge rounded-pill bg-light text-secondary border';
                span.style.fontSize = '11px';
                span.textContent = '#' + sk.replace(/\s+/g, '');
                skillsArea.appendChild(span);
            });
        }

        // Clean caption / notes (filter out social media hashtag template if present)
        var rawDesc = job.description || '';
        var cleanNote = 'Join our innovative team at Dr IT Group. Apply online to get scheduled for an interview directly with our HR team.';
        if (rawDesc && !rawDesc.includes('🚀 We are hiring') && !rawDesc.includes('#Hiring')) {
            cleanNote = rawDesc;
        }
        document.getElementById('lbCaptionText').textContent = cleanNote;

        // Apply Button
        var lbBtn = document.getElementById('lbApplyBtn');
        var fullApplyUrl = job.shareSlug ? (portalUrl + '/careers/' + job.shareSlug) : '#contact-form';
        lbBtn.href = fullApplyUrl;

        // Display Modal
        var modal = document.getElementById('reelLightboxModal');
        if (modal.parentElement !== document.body) {
            document.body.appendChild(modal);
        }
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeReelLightbox() {
        var modal = document.getElementById('reelLightboxModal');
        if (modal) {
            modal.style.display = 'none';
        }
        document.body.style.overflow = '';
    }

    // Close on Escape Key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeReelLightbox();
        }
    });
</script>
