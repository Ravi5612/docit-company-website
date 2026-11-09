<!-- Section: Explore Current Openings (Real-time Live Sync with HRMS) -->
<section id="current-openings" class="current-openings-section py-5" style="background: #f8fafc;">
    <div class="container py-4">
        
        <!-- Header with Title and View All Jobs -->
        <div class="d-flex align-items-center justify-content-between mb-5 flex-wrap gap-3">
            <div class="d-flex align-items-center gap-3">
                <span style="height: 2px; width: 45px; background: #dc2626; display: inline-block; border-radius: 2px;"></span>
                <h2 class="mb-0 fw-bold" style="font-size: 30px; font-weight: 800; color: #0f172a; letter-spacing: -0.3px;">
                    Explore <span style="color: #dc2626;">Current Openings</span>
                </h2>
                <span style="height: 2px; width: 45px; background: #dc2626; display: inline-block; border-radius: 2px;"></span>
            </div>
            <a href="#current-openings" class="btn btn-outline-danger btn-sm px-3.5 py-2 rounded-pill fw-bold d-inline-flex align-items-center gap-1.5"
               style="border-color: #dc2626; color: #dc2626; font-size: 13px; font-weight: 700; transition: all 0.2s ease;">
                <span>View All Jobs</span>
                <span>&rarr;</span>
            </a>
        </div>

        @php
            $portalUrl = env('HRMS_APP_URL', 'https://omnidesk.dritm.com');
            $backendBase = env('HRMS_BACKEND_URL', 'https://omnidesk.dritm.com');
            $activeJobs = (!empty($jobs) && is_array($jobs)) ? $jobs : [];
        @endphp

        <!-- Instagram Reel Style Job Grid: Live Sync with HRMS -->
        <div class="row g-4 justify-content-center">
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
                    $caption = trim(strip_tags($item['caption'] ?? $item['description'] ?? ''));

                    $posterSrc = null;
                    if (!empty($item['posterUrl'])) {
                        $posterSrc = \Illuminate\Support\Str::startsWith($item['posterUrl'], 'http')
                            ? $item['posterUrl']
                            : rtrim($backendBase, '/') . $item['posterUrl'];
                    }
                @endphp

                <div class="col-lg-4 col-md-6 col-12 mb-4">
                    <!-- Instagram Reel Card -->
                    <div class="insta-reel-card bg-white rounded-4 overflow-hidden border shadow-sm h-100 d-flex flex-column"
                         style="border-color: #e2e8f0; border-radius: 18px; box-shadow: 0 4px 20px rgba(0,0,0,0.06); transition: transform 0.25s ease, box-shadow 0.25s ease;">
                        
                        <!-- 1. Header (Instagram Profile Style) -->
                        <div class="p-3 d-flex align-items-center justify-content-between border-bottom" style="background: #ffffff;">
                            <div class="d-flex align-items-center gap-2.5">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white fw-bold shadow-xs" 
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
                                        {{ $deptName }} • 📍 {{ $location }}
                                    </span>
                                </div>
                            </div>
                            <span class="badge rounded-pill px-2.5 py-1 shrink-0" 
                                  style="background: #fef2f2; color: #dc2626; font-weight: 700; font-size: 11px; border: 1px solid #fecaca;">
                                🔥 {{ $openingsCount }} {{ $openingsCount > 1 ? 'Openings' : 'Opening' }}
                            </span>
                        </div>

                        <!-- 2. Instagram Reel Media (Official Poster Display) -->
                        <div class="insta-reel-media position-relative overflow-hidden" 
                             style="height: 380px; background: #0f172a; cursor: pointer;"
                             onclick="openReelLightbox({{ $index }})">
                            
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
                                    <p class="text-white-50 small mb-0">📍 {{ $location }} • {{ $exp }}</p>
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
                                    <p class="text-white-50 small mb-0">📍 {{ $location }} • {{ $exp }}</p>
                                </div>
                            @endif

                            <!-- Floating Bottom Overlay (Tap to Expand Hint) -->
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 d-flex justify-content-between align-items-center"
                                 style="background: linear-gradient(transparent, rgba(15,23,42,0.85)); pointer-events: none;">
                                <span class="text-white fw-bold d-flex align-items-center gap-1.5" style="font-size: 12px; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">
                                    🔍 Click for Full Screen
                                </span>
                                <span class="badge bg-white text-dark px-2.5 py-1 rounded-pill fw-bold" style="font-size: 10.5px;">
                                    Full Reel
                                </span>
                            </div>
                        </div>

                        <!-- 3. Details & Instagram Style Caption -->
                        <div class="p-3.5 d-flex flex-column flex-grow-1" style="background: #ffffff;">
                            
                            <!-- Job Title -->
                            <h4 class="fw-bold mb-2 text-truncate" style="font-size: 18px; color: #0f172a; font-weight: 800;" title="{{ $title }}">
                                {{ $title }}
                            </h4>

                            <!-- Meta Chips -->
                            <div class="d-flex flex-wrap gap-1.5 mb-2.5">
                                <span class="badge border px-2 py-1 rounded-pill" style="font-size: 11.5px; background: #f8fafc; color: #334155; border-color: #e2e8f0;">
                                    💼 {{ $exp }}
                                </span>
                                <span class="badge border px-2 py-1 rounded-pill" style="font-size: 11.5px; background: #f8fafc; color: #334155; border-color: #e2e8f0;">
                                    💰 {{ $salary }}
                                </span>
                                <span class="badge border px-2 py-1 rounded-pill" style="font-size: 11.5px; background: #f8fafc; color: #334155; border-color: #e2e8f0;">
                                    📍 {{ $location }}
                                </span>
                            </div>

                            <!-- Skills Chips -->
                            @if(!empty($skills))
                                <div class="d-flex flex-wrap gap-1 mb-3">
                                    @foreach(array_slice($skills, 0, 4) as $sk)
                                        <span class="badge rounded-pill" style="font-size: 10.5px; font-weight: 500; background: #f1f5f9; color: #475569;">
                                            #{{ str_replace(' ', '', $sk) }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Caption Preview if available -->
                            @if(!empty($caption))
                                <p class="text-secondary small mb-3 text-truncate-2" style="font-size: 12.5px; line-height: 1.5; color: #475569;">
                                    {{ $caption }}
                                </p>
                            @endif

                            <!-- 4. Action Buttons -->
                            <div class="mt-auto pt-2">
                                <a href="{{ $applyUrl }}" 
                                   @if($isDynamic) target="_blank" rel="noopener" @endif
                                   class="btn btn-danger w-100 py-2.5 rounded-pill fw-bold text-white d-flex align-items-center justify-content-center gap-2 shadow-xs"
                                   style="background: #dc2626; border: none; font-size: 13.5px; font-weight: 700; box-shadow: 0 4px 12px rgba(220,38,38,0.25);">
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
        <!-- Close Button -->
        <button type="button" class="reel-lightbox-close" onclick="closeReelLightbox()" title="Close (Esc)">
            &times;
        </button>

        <div class="reel-lightbox-inner">
            <!-- Left: Full-Screen Poster Media -->
            <div class="reel-lightbox-media">
                <img id="lbPosterImg" src="" alt="Job Poster" class="img-fluid lb-img">
            </div>

            <!-- Right: Instagram Sidebar Details -->
            <div class="reel-lightbox-sidebar">
                <!-- Header Profile -->
                <div class="p-3 border-bottom d-flex align-items-center justify-content-between bg-white">
                    <div class="d-flex align-items-center gap-2.5">
                        <div class="rounded-circle text-white d-flex align-items-center justify-content-center fw-bold"
                             style="width: 38px; height: 38px; background: #dc2626; font-size: 13.5px;">
                            DR
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-1">
                                <strong style="font-size: 14px; color: #0f172a;">Dr IT Group</strong>
                                <span class="badge bg-danger rounded-pill px-2 py-0.5" style="font-size: 9.5px;">Hiring</span>
                            </div>
                            <small id="lbLocationText" class="text-muted" style="font-size: 11px;">Gujarat</small>
                        </div>
                    </div>
                </div>

                <!-- Scrollable Body -->
                <div class="p-3.5 flex-grow-1 overflow-auto" style="max-height: 60vh;">
                    <h4 id="lbJobTitle" class="fw-bold mb-2" style="color: #0f172a; font-size: 20px;"></h4>
                    
                    <div class="d-flex flex-wrap gap-1.5 mb-3">
                        <span id="lbExpBadge" class="badge border bg-light text-dark px-2.5 py-1"></span>
                        <span id="lbSalaryBadge" class="badge border bg-light text-dark px-2.5 py-1"></span>
                        <span id="lbOpeningsBadge" class="badge bg-danger-subtle text-danger px-2.5 py-1 border border-danger-subtle"></span>
                    </div>

                    <div id="lbSkillsArea" class="d-flex flex-wrap gap-1 mb-3"></div>

                    <div class="border-top pt-2.5">
                        <h6 class="text-muted text-uppercase fw-bold" style="font-size: 11px; letter-spacing: 0.5px;">Job Requirements & Notes</h6>
                        <p id="lbCaptionText" class="text-secondary small mb-0" style="white-space: pre-line; line-height: 1.6;"></p>
                    </div>
                </div>

                <!-- Footer Apply CTA -->
                <div class="p-3 border-top bg-light">
                    <a id="lbApplyBtn" href="#" target="_blank" rel="noopener" 
                       class="btn btn-danger w-100 py-2.5 rounded-pill fw-bold text-white d-flex align-items-center justify-content-center gap-2"
                       style="background: #dc2626; border: none; font-size: 14px;">
                        <span>Apply Online Directly</span>
                        <span>&rarr;</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .insta-reel-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 16px 35px -4px rgba(0, 0, 0, 0.12) !important;
        border-color: #fca5a5 !important;
    }
    .insta-reel-card:hover .reel-poster-img {
        transform: scale(1.04);
    }

    /* Modal Lightbox */
    .reel-lightbox-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 999999;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .reel-lightbox-backdrop {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(15, 23, 42, 0.88);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
    .reel-lightbox-box {
        position: relative;
        z-index: 10;
        width: 100%;
        max-width: 950px;
        max-height: 90vh;
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.5);
    }
    .reel-lightbox-close {
        position: absolute;
        top: 14px;
        right: 18px;
        z-index: 20;
        background: rgba(0, 0, 0, 0.65);
        color: #ffffff;
        border: none;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        font-size: 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }
    .reel-lightbox-close:hover {
        background: #dc2626;
    }
    .reel-lightbox-inner {
        display: flex;
        flex-direction: row;
        max-height: 85vh;
    }
    .reel-lightbox-media {
        flex: 1.2;
        background: #0f172a;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .reel-lightbox-media img {
        max-height: 85vh;
        width: 100%;
        object-fit: contain;
    }
    .reel-lightbox-sidebar {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #ffffff;
    }

    @media (max-width: 768px) {
        .reel-lightbox-inner {
            flex-direction: column;
            max-height: 90vh;
            overflow-y: auto;
        }
        .reel-lightbox-media {
            max-height: 45vh;
        }
    }
</style>

<script>
    // Job Data for Lightbox Modal
    window.careerJobsData = @json($activeJobs);

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

        document.getElementById('lbPosterImg').src = posterSrc || '';
        document.getElementById('lbJobTitle').textContent = job.title || 'Job Opening';
        document.getElementById('lbLocationText').textContent = (job.department && job.department.name ? job.department.name + ' • ' : '') + '📍 ' + (job.location || 'Mohali');
        document.getElementById('lbExpBadge').textContent = '💼 ' + (job.experience || 'Full Time');
        document.getElementById('lbSalaryBadge').textContent = '💰 ' + (job.salaryRange || 'Competitive');
        document.getElementById('lbOpeningsBadge').textContent = '🔥 ' + (job.openings || 1) + ' Openings';
        
        var capText = job.caption || job.description || 'Join our innovative team at Dr IT Group. Apply online to get scheduled for an interview directly with our HR team.';
        document.getElementById('lbCaptionText').textContent = capText;

        // Skills
        var skillsArea = document.getElementById('lbSkillsArea');
        skillsArea.innerHTML = '';
        var skills = job.skills || [];
        if (typeof skills === 'string') {
            try { skills = JSON.parse(skills); } catch(e) { skills = [skills]; }
        }
        if (Array.isArray(skills)) {
            skills.forEach(function(sk) {
                var span = document.createElement('span');
                span.className = 'badge rounded-pill bg-light text-secondary border px-2 py-1';
                span.style.fontSize = '11px';
                span.textContent = '#' + sk.replace(/\s+/g, '');
                skillsArea.appendChild(span);
            });
        }

        var applyBtn = document.getElementById('lbApplyBtn');
        applyBtn.href = applyUrl;
        if (applyUrl === '#contact-form') {
            applyBtn.removeAttribute('target');
            applyBtn.onclick = function() {
                closeReelLightbox();
                var form = document.getElementById('contact-form');
                if (form) form.scrollIntoView({ behavior: 'smooth' });
            };
        } else {
            applyBtn.setAttribute('target', '_blank');
            applyBtn.onclick = null;
        }

        var modal = document.getElementById('reelLightboxModal');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeReelLightbox() {
        var modal = document.getElementById('reelLightboxModal');
        if (modal) modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeReelLightbox();
    });

    // Quick Apply scroll handler
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.quick-apply-pill').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                var href = this.getAttribute('href');
                if (href === '#contact-form') {
                    e.preventDefault();
                    var title = this.getAttribute('data-title');
                    var dept = this.getAttribute('data-dept');
                    
                    var designationInput = document.querySelector('input[name="designation"]');
                    var deptSelect = document.querySelector('select[name="department"]');
                    var specInput = document.querySelector('input[name="specialization"]');

                    if (designationInput && title) designationInput.value = title;
                    if (specInput && title) specInput.value = title;
                    if (deptSelect && dept) {
                        for (var i = 0; i < deptSelect.options.length; i++) {
                            if (deptSelect.options[i].text.toLowerCase().includes(dept.toLowerCase())) {
                                deptSelect.selectedIndex = i;
                                break;
                            }
                        }
                    }

                    var formElement = document.getElementById('contact-form') || document.querySelector('.query_form');
                    if (formElement) {
                        formElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        var nameInput = formElement.querySelector('input[name="name"]');
                        if (nameInput) setTimeout(function () { nameInput.focus(); }, 600);
                    }
                }
            });
        });
    });
</script>
