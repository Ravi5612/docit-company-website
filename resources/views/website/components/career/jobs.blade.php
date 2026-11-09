<section class="cmt-row job-openings-section bg-base-grey py-5" style="background-color: #f8fafc;">
    <div class="container">
        <!-- Section Header -->
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <div class="section-title">
                    <div class="title-header">
                        <span class="badge px-3 py-1 mb-2 rounded-pill shadow-xs" 
                              style="background: #e11d48; color: #fff; font-size: 12px; letter-spacing: 1px; font-weight: 700; text-transform: uppercase;">
                            ⚡ We Are Hiring
                        </span>
                        <h2 class="title" style="font-size: 34px; font-weight: 800; color: #0f172a; margin-top: 10px;">
                            Explore Current Opportunities
                        </h2>
                    </div>
                    <div class="title-desc">
                        <p class="text-muted" style="font-size: 15px; max-width: 650px; margin: 0 auto;">
                            Click on any job poster to view full-screen details, official requirements, and apply directly to our recruitment team.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Instagram / Social Reel Style Job Cards Grid -->
        <div class="row justify-content-center g-4">
            @forelse($jobs as $index => $job)
                @php
                    $portalUrl = env('HRMS_APP_URL', 'https://omnidesk.dritm.com');
                    $applyUrl = $portalUrl . '/careers/' . ($job['shareSlug'] ?? '');
                    
                    $backendBase = env('HRMS_BACKEND_URL', 'http://localhost:3001');
                    $posterSrc = null;
                    if (!empty($job['posterUrl'])) {
                        $posterSrc = \Illuminate\Support\Str::startsWith($job['posterUrl'], 'http')
                            ? $job['posterUrl']
                            : rtrim($backendBase, '/') . $job['posterUrl'];
                    }

                    // Format caption text
                    $rawCaption = $job['caption'] ?? $job['description'] ?? '';
                    $cleanCaption = trim(strip_tags($rawCaption));
                @endphp

                <div class="col-lg-5 col-md-6 col-sm-12 mb-4">
                    <!-- Instagram Reel / Social Post Card -->
                    <div class="insta-job-card shadow-sm rounded-4 overflow-hidden bg-white border" 
                         style="border-color: #e2e8f0; border-radius: 18px; box-shadow: 0 4px 20px -2px rgba(0,0,0,0.06); transition: transform 0.25s ease, box-shadow 0.25s ease;">
                        
                        <!-- Header (Instagram Profile Style) -->
                        <div class="p-3 d-flex align-items-center justify-content-between border-bottom" style="background: #ffffff;">
                            <div class="d-flex align-items-center gap-2.5">
                                <div class="rounded-circle d-flex align-items-center justify-content-center text-white font-weight-bold shadow-xs" 
                                     style="width: 40px; height: 40px; background: linear-gradient(135deg, #e11d48, #be123c); font-size: 15px;">
                                    DR
                                </div>
                                <div>
                                    <div class="d-flex align-items-center gap-1">
                                        <span class="font-weight-bold" style="font-size: 14px; color: #0f172a; font-weight: 700;">
                                            Dr IT Group
                                        </span>
                                        <svg style="width: 15px; height: 15px; fill: #0284c7;" viewBox="0 0 24 24">
                                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                                        </svg>
                                    </div>
                                    <span class="text-muted d-block" style="font-size: 11px;">
                                        {{ $job['department']['name'] ?? 'HR & Recruitment' }} • 📍 {{ $job['location'] ?? 'Mohali' }}
                                    </span>
                                </div>
                            </div>
                            <span class="badge rounded-pill px-2.5 py-1" 
                                  style="background: #fef2f2; color: #e11d48; font-weight: 700; font-size: 11px; border: 1px solid #fecaca;">
                                🔥 {{ $job['openings'] ?? 1 }} {{ ($job['openings'] ?? 1) > 1 ? 'Openings' : 'Opening' }}
                            </span>
                        </div>

                        <!-- Full Screen Reel Poster Image -->
                        @if($posterSrc)
                            <div class="insta-poster-wrapper position-relative text-center overflow-hidden" 
                                 style="background: #0f172a; cursor: pointer;"
                                 onclick="openReelModal({{ $index }})">
                                <img src="{{ $posterSrc }}" 
                                     alt="{{ $job['title'] ?? 'Job Poster' }}" 
                                     class="w-100 img-fluid insta-poster-img"
                                     style="max-height: 520px; object-fit: contain; width: 100%; display: block; margin: 0 auto; background: #0f172a;"
                                     onerror="var p = this.closest('.insta-poster-wrapper'); if(p) p.style.display='none';">
                                
                                <!-- Floating Fullscreen Badge Overlay -->
                                <div class="poster-overlay-hint position-absolute bottom-0 start-0 end-0 p-3 d-flex justify-content-between align-items-center"
                                     style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); pointer-events: none;">
                                    <span class="text-white small font-weight-bold" style="font-size: 12px; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">
                                        🔍 Click for Full Screen
                                    </span>
                                    <span class="badge bg-white text-dark shadow-sm px-2.5 py-1 rounded-pill" style="font-size: 11px; font-weight: 600;">
                                        Full Poster
                                    </span>
                                </div>
                            </div>
                        @endif

                        <!-- Instagram Style Caption & Action Footer -->
                        <div class="p-3" style="background: #ffffff;">
                            <!-- Call to Action Banner (Like Instagram 'Apply Now' CTA button) -->
                            <div class="mb-3">
                                <a href="{{ $applyUrl }}" target="_blank" rel="noopener" 
                                   class="btn w-100 py-2.5 text-white font-weight-bold shadow-xs rounded-3 d-flex align-items-center justify-content-center gap-2"
                                   style="background: linear-gradient(135deg, #e11d48, #be123c); font-size: 14px; font-weight: 700; border: none; letter-spacing: 0.3px;">
                                    <span>Apply Online Directly</span>
                                    <svg style="width: 16px; height: 16px; fill: currentColor;" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>

                            <!-- Job Title & Badges -->
                            <div class="mb-2">
                                <h4 class="font-weight-bold mb-1" style="font-size: 19px; color: #0f172a; font-weight: 800;">
                                    {{ $job['title'] ?? 'Job Opening' }}
                                </h4>
                                <div class="d-flex flex-wrap gap-2 text-muted" style="font-size: 12.5px;">
                                    <span class="badge bg-light text-dark border px-2 py-1">💼 {{ $job['experience'] ?? '0-2 Years' }}</span>
                                    <span class="badge bg-light text-dark border px-2 py-1">💰 {{ $job['salaryRange'] ?? 'Competitive' }}</span>
                                    <span class="badge bg-light text-dark border px-2 py-1">📍 {{ $job['location'] ?? 'Mohali' }}</span>
                                </div>
                            </div>

                            <!-- Skills Tags -->
                            @if(!empty($job['skills']) && is_array($job['skills']))
                                <div class="d-flex flex-wrap gap-1 mb-2">
                                    @foreach(array_slice($job['skills'], 0, 5) as $skill)
                                        <span class="badge rounded-pill" style="font-size: 11px; font-weight: 500; background: #f1f5f9; color: #475569;">
                                            #{{ str_replace(' ', '', $skill) }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif

                            <!-- Caption Body (Instagram Style Text) -->
                            <div class="caption-container mt-2 pt-2 border-top">
                                <p class="caption-text text-secondary mb-0" 
                                   id="caption-text-{{ $index }}" 
                                   style="font-size: 13px; line-height: 1.6; white-space: pre-line; color: #334155;">
                                    {{ $cleanCaption }}
                                </p>
                            </div>

                            <!-- Quick Apply Trigger -->
                            <div class="mt-3 pt-2 text-end">
                                <button type="button" 
                                        class="btn btn-link text-muted p-0 quick-apply-btn" 
                                        data-title="{{ $job['title'] ?? '' }}" 
                                        data-dept="{{ $job['department']['name'] ?? '' }}"
                                        style="font-size: 12px; text-decoration: underline; color: #64748b;">
                                    Or submit resume in form below &darr;
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="p-5 bg-white rounded-4 border shadow-xs" style="max-width: 550px; margin: 0 auto;">
                        <span style="font-size: 40px;">💼</span>
                        <h4 class="mt-3 mb-2 font-weight-bold" style="color: #0f172a;">No Current Openings</h4>
                        <p class="text-muted text-sm mb-4">We are always looking for great talent. Feel free to submit your resume using the application form below.</p>
                        <a href="#contact-form" class="btn btn-danger px-4 py-2 rounded-pill font-weight-bold" style="background: #e11d48; border: none;">
                            Submit Your Resume &darr;
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- ========================================== -->
<!-- FULL SCREEN INSTAGRAM REEL / POST LIGHTBOX -->
<!-- ========================================== -->
<div id="reelModal" class="reel-fullscreen-modal" style="display: none;">
    <div class="reel-modal-backdrop" onclick="closeReelModal()"></div>
    <div class="reel-modal-container">
        <!-- Close Button -->
        <button type="button" class="reel-close-btn" onclick="closeReelModal()" title="Close (Esc)">
            &times;
        </button>

        <div class="reel-modal-content-grid">
            <!-- Left / Center: Fullscreen Poster Image -->
            <div class="reel-image-area">
                <img id="reelModalImage" src="" alt="Job Poster" class="reel-modal-img">
            </div>

            <!-- Right: Caption & Apply Panel (Instagram Style) -->
            <div class="reel-info-sidebar">
                <!-- Header -->
                <div class="reel-sidebar-header">
                    <div class="d-flex align-items-center gap-2">
                        <div class="rounded-circle text-white d-flex align-items-center justify-content-center font-weight-bold"
                             style="width: 36px; height: 36px; background: #e11d48; font-size: 13px;">
                            DR
                        </div>
                        <div>
                            <div class="d-flex align-items-center gap-1">
                                <strong id="reelModalCompany" style="font-size: 14px; color: #0f172a;">Dr IT Group</strong>
                                <span class="badge bg-danger rounded-pill" style="font-size: 10px;">Hiring</span>
                            </div>
                            <small id="reelModalLocation" class="text-muted" style="font-size: 11px;">Mohali</small>
                        </div>
                    </div>
                </div>

                <!-- Scrollable Caption Body -->
                <div class="reel-sidebar-body">
                    <h5 id="reelModalTitle" style="font-weight: 800; color: #0f172a; margin-bottom: 8px;"></h5>
                    
                    <div class="d-flex flex-wrap gap-1.5 mb-3">
                        <span id="reelModalExp" class="badge bg-light text-dark border px-2 py-1"></span>
                        <span id="reelModalSalary" class="badge bg-light text-dark border px-2 py-1"></span>
                        <span id="reelModalOpenings" class="badge bg-danger-subtle text-danger border border-danger-subtle px-2 py-1"></span>
                    </div>

                    <div class="reel-caption-content">
                        <p id="reelModalCaption" style="white-space: pre-line; line-height: 1.6; font-size: 13px; color: #334155;"></p>
                    </div>
                </div>

                <!-- Footer CTA -->
                <div class="reel-sidebar-footer">
                    <a id="reelModalApplyBtn" href="#" target="_blank" rel="noopener" 
                       class="btn w-100 py-2.5 text-white font-weight-bold shadow-xs rounded-3 d-flex align-items-center justify-content-center gap-2"
                       style="background: #e11d48; font-size: 14px; font-weight: 700; border: none;">
                        <span>Apply Online Directly</span>
                        &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- STYLES FOR INSTAGRAM REEL FULL SCREEN -->
<style>
    .insta-job-card {
        transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.25s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .insta-job-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 30px -4px rgba(0, 0, 0, 0.12) !important;
    }
    .insta-poster-wrapper:hover .poster-overlay-hint {
        background: linear-gradient(transparent, rgba(0,0,0,0.9)) !important;
    }

    /* Fullscreen Modal Backdrop */
    .reel-fullscreen-modal {
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
    .reel-modal-backdrop {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(15, 23, 42, 0.85);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
    }
    .reel-modal-container {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 950px;
        max-height: 90vh;
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.5);
        display: flex;
        flex-direction: column;
    }
    .reel-close-btn {
        position: absolute;
        top: 14px;
        right: 18px;
        z-index: 10;
        background: rgba(0, 0, 0, 0.6);
        color: #ffffff;
        border: none;
        width: 34px;
        height: 34px;
        border-radius: 50%;
        font-size: 24px;
        line-height: 1;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }
    .reel-close-btn:hover {
        background: rgba(0, 0, 0, 0.9);
    }
    .reel-modal-content-grid {
        display: flex;
        flex-direction: row;
        height: 85vh;
        max-height: 850px;
    }
    .reel-image-area {
        flex: 1.3;
        background: #0f172a;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        overflow: hidden;
    }
    .reel-modal-img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }
    .reel-info-sidebar {
        flex: 1;
        background: #ffffff;
        display: flex;
        flex-direction: column;
        border-left: 1px solid #e2e8f0;
    }
    .reel-sidebar-header {
        padding: 16px 20px;
        border-bottom: 1px solid #e2e8f0;
    }
    .reel-sidebar-body {
        padding: 20px;
        flex: 1;
        overflow-y: auto;
    }
    .reel-sidebar-footer {
        padding: 16px 20px;
        border-top: 1px solid #e2e8f0;
        background: #f8fafc;
    }

    @media (max-width: 768px) {
        .reel-modal-content-grid {
            flex-direction: column;
            height: 90vh;
        }
        .reel-image-area {
            flex: 1;
            max-height: 45vh;
        }
        .reel-info-sidebar {
            flex: 1;
            max-height: 45vh;
        }
    }
</style>

<!-- JAVASCRIPT LOGIC -->
<script>
    var currentJobsData = @json($jobs);

    function openReelModal(index) {
        var job = currentJobsData[index];
        if (!job) return;

        var backendBase = "{{ env('HRMS_BACKEND_URL', 'http://localhost:3001') }}";
        var portalUrl = "{{ env('HRMS_APP_URL', 'https://omnidesk.dritm.com') }}";
        var applyUrl = portalUrl + '/careers/' + (job.shareSlug || '');

        var posterSrc = '';
        if (job.posterUrl) {
            posterSrc = job.posterUrl.startsWith('http') 
                ? job.posterUrl 
                : backendBase.replace(/\/+$/, '') + job.posterUrl;
        }

        document.getElementById('reelModalImage').src = posterSrc || '';
        document.getElementById('reelModalTitle').innerText = job.title || 'Job Opening';
        document.getElementById('reelModalLocation').innerText = (job.department ? job.department.name + ' • ' : '') + '📍 ' + (job.location || 'Mohali');
        document.getElementById('reelModalExp').innerText = '💼 ' + (job.experience || '0-2 Years');
        document.getElementById('reelModalSalary').innerText = '💰 ' + (job.salaryRange || 'Competitive');
        document.getElementById('reelModalOpenings').innerText = '🔥 ' + (job.openings || 1) + ' Openings';
        
        var captionText = job.caption || job.description || 'No additional caption available.';
        document.getElementById('reelModalCaption').innerText = captionText;

        document.getElementById('reelModalApplyBtn').href = applyUrl;

        var modal = document.getElementById('reelModal');
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeReelModal() {
        var modal = document.getElementById('reelModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close on Escape Key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeReelModal();
        }
    });

    // Quick Apply scroll handler
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.quick-apply-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
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
            });
        });
    });
</script>
