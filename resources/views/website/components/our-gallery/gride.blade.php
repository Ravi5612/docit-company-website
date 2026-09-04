@php
    use App\Models\GalleryImages;

    $galleryImages = GalleryImages::where('status', 'active')->latest()->paginate(12);
@endphp

<style>
    .gallery-grid .featured-thumbnail { width: 100%; overflow: hidden; position: relative; }
    .gallery-grid .featured-thumbnail img { width: 100%; height: 280px; object-fit: cover; }
    @media (max-width: 767px) { .gallery-grid .featured-thumbnail img { height: 220px; } }

    .gallery-grid .preview-overlay {
        position: absolute;
        inset: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(0, 0, 0, 0.5);
        opacity: 0;
        transition: opacity 0.3s ease;
        z-index: 2;
    }
    .gallery-grid .featured-thumbnail:hover .preview-overlay { opacity: 1; }
    .gallery-grid .preview-icon {
        width: 80px;
        height: 80px;
        border: none;
        border-radius: 50%;
        background: #fff;
        color: #333;
        font-size: 22px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transform: scale(0.6);
        opacity: 0;
        transition: all 0.3s ease;
    }
    .gallery-grid .featured-thumbnail:hover .preview-icon { transform: scale(1); opacity: 1; }
    .gallery-grid .preview-icon:hover { background: #ffd400; color: #fff; }

    #galleryModal { z-index: 20000 !important; }
    #galleryModal + .modal-backdrop { z-index: 19999 !important; }
    #galleryModal .modal-body img { max-height: 85vh; width: auto; margin: 0 auto; }
</style>

<section class="cmt-row padding_bottom_zero-section clearfix">
    <div class="container">
        <div class="row m-0 gallery-grid">

            @if($galleryImages->count() > 0)
                @foreach($galleryImages as $image)
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                        <div class=" featured-imagebox-portfolio style2">
                            <div class="featured-thumbnail img-thumbnail">
                                <img
                                    src="{{ asset('storage/' . $image->image) }}"
                                    class="img-fluid"
                                    alt="{{ $image->title ?? 'Gallery Image' }}">
                                <div class="preview-overlay">
                                    <button type="button" class="preview-icon"
                                        data-gallery-img="{{ asset('storage/' . $image->image) }}"
                                        data-gallery-title="{{ $image->title ?? 'Gallery Image' }}"
                                        aria-label="Preview">
                                        <i class="icon-search-1"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="pagination-wrapper text-center">
                        {{ $galleryImages->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @else

                <!-- Fallback Images -->

                <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" src="{{ asset('website/images/upload/gallery-09.png') }}" alt="">
                            <div class="preview-overlay">
                                <button type="button" class="preview-icon"
                                    data-gallery-img="{{ asset('website/images/upload/gallery-09.png') }}"
                                    data-gallery-title="Gallery Image" aria-label="Preview">
                                    <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" src="{{ asset('website/images/upload/gallery-10.png') }}" alt="">
                            <div class="preview-overlay">
                                <button type="button" class="preview-icon"
                                    data-gallery-img="{{ asset('website/images/upload/gallery-10.png') }}"
                                    data-gallery-title="Gallery Image" aria-label="Preview">
                                    <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" src="{{ asset('website/images/upload/sm-03.png') }}" alt="">
                            <div class="preview-overlay">
                                <button type="button" class="preview-icon"
                                    data-gallery-img="{{ asset('website/images/upload/sm-03.png') }}"
                                    data-gallery-title="Gallery Image" aria-label="Preview">
                                    <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-6 col-sm-6 mb-2">
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" src="{{ asset('website/images/upload/lg-01.png') }}" alt="">
                            <div class="preview-overlay">
                                <button type="button" class="preview-icon"
                                    data-gallery-img="{{ asset('website/images/upload/lg-01.png') }}"
                                    data-gallery-title="Gallery Image" aria-label="Preview">
                                    <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" src="{{ asset('website/images/upload/sm-01.png') }}" alt="">
                            <div class="preview-overlay">
                                <button type="button" class="preview-icon"
                                    data-gallery-img="{{ asset('website/images/upload/sm-01.png') }}"
                                    data-gallery-title="Gallery Image" aria-label="Preview">
                                    <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-6 mb-2">
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" src="{{ asset('website/images/upload/sm-02.png') }}" alt="">
                            <div class="preview-overlay">
                                <button type="button" class="preview-icon"
                                    data-gallery-img="{{ asset('website/images/upload/sm-02.png') }}"
                                    data-gallery-title="Gallery Image" aria-label="Preview">
                                    <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-6 col-sm-6 mb-2">
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" src="{{ asset('website/images/upload/lg-02.png') }}" alt="">
                            <div class="preview-overlay">
                                <button type="button" class="preview-icon"
                                    data-gallery-img="{{ asset('website/images/upload/lg-02.png') }}"
                                    data-gallery-title="Gallery Image" aria-label="Preview">
                                    <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-6 co    l-sm-6 mb-2">
                    <div class="featured-imagebox featured-imagebox-portfolio style2">
                        <div class="featured-thumbnail">
                            <img class="img-fluid" src="{{ asset('website/images/upload/lg-03.png') }}" alt="">
                            <div class="preview-overlay">
                                <button type="button" class="preview-icon"
                                    data-gallery-img="{{ asset('website/images/upload/lg-03.png') }}"
                                    data-gallery-title="Gallery Image" aria-label="Preview">
                                    <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            @endif

        </div>
    </div>
</section>

<!-- Gallery Preview Modal -->
<div class="modal fade" id="galleryModal" tabindex="-1" aria-labelledby="galleryModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="galleryModalTitle">Gallery Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <img src="" class="img-fluid" id="galleryModalImage" alt="Gallery Image">
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let modalEl = document.getElementById('galleryModal');

        if (!modalEl || !bootstrap) return;

        document.body.appendChild(modalEl);

        const modalImage = document.getElementById('galleryModalImage');
        const modalTitle = document.getElementById('galleryModalTitle');
        const modal = new bootstrap.Modal(modalEl);

        document.addEventListener('click', function (e) {
            const button = e.target.closest('.preview-icon');
            if (!button) return;

            const img = button.getAttribute('data-gallery-img');
            const title = button.getAttribute('data-gallery-title');

            modalImage.setAttribute('src', img);
            modalImage.setAttribute('alt', title || 'Gallery Image');
            modalTitle.textContent = title || 'Gallery Image';

            modal.show();
        });
    });
</script>