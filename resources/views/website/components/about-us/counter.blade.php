<!--fid-section-->
<section class="cmt-row fid-section clearfix pt-0">
    <div class="container">
        <div class="row mt_15 mb_15">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <!-- cmt-fid -->
                <div class="cmt-fid inside cmt-fid-with-icon cmt-fid-view-lefticon style2">
                    <div class="cmt-fid-icon-wrapper">
                        <i class="flaticon-world"></i>
                    </div>
                    <div class="cmt-fid-contents">
                        <h4 class="cmt-fid-inner">
                            <span data-appear-animation="animateDigits" data-from="1" data-to="26" data-interval="1"
                                data-before="" data-before-style="sup" data-after="+" data-after-style="sub"
                                class="numinate">0
                            </span>
                            <span>+</span>
                        </h4>
                        <h3 class="cmt-fid-title">Years of Experience</h3>
                    </div>
                    <div class="cmt-fid-desc">
                        <p>Delivering reliable BPO and IT-enabled services with proven expertise and long-term client
                            partnerships.

                        </p>
                    </div>
                </div><!-- cmt-fid end -->
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <!-- cmt-fid -->
                <div class="cmt-fid inside cmt-fid-with-icon cmt-fid-view-lefticon style2">
                    <div class="cmt-fid-icon-wrapper">
                        <i class="flaticon-happy"></i>
                    </div>
                    <div class="cmt-fid-contents">
                        <h4 class="cmt-fid-inner">
                            <span data-appear-animation="animateDigits" data-from="0" data-to="98" data-interval="1"
                                data-before="" data-before-style="sup" data-after="+" data-after-style="sub"
                                class="numinate">0

                            </span>
                            <span>%</span>
                        </h4>
                        <h3 class="cmt-fid-title">Customer Satisfaction Rate</h3>
                    </div>
                    <div class="cmt-fid-desc">
                        <p>Consistently delivering high-quality services and exceptional client experiences.
                        </p>
                    </div>
                </div><!-- cmt-fid end -->
            </div>
           
            <div class="col-lg-4 col-md-6 col-sm-6">
                <!-- cmt-fid -->
                <div class="cmt-fid inside cmt-fid-with-icon cmt-fid-view-lefticon style2">
                    <div class="cmt-fid-icon-wrapper">
                        <i class="flaticon-award"></i>
                    </div>
                    <div class="cmt-fid-contents">
                        <h4 class="cmt-fid-inner">
                            <span data-appear-animation="animateDigits" data-from="0" data-to="24" data-interval="10"
                                data-before="" data-before-style="sup" data-after="+" data-after-style="sub"
                                class="numinate">0

                            </span>
                            <span>/7</span>
                        </h4>
                        <h3 class="cmt-fid-title">Support Availability</h3>
                    </div>
                    <div class="cmt-fid-desc">
                        <p>Round-the-clock support ensures uninterrupted business operations and customer service.
                        </p>
                    </div>
                </div><!-- cmt-fid end -->
            </div>
        </div><!-- row end -->
    </div>
</section>
<!--fid-section end-->

<script>
(function () {
    function initAboutCounters() {
        document.querySelectorAll('.fid-section .numinate[data-appear-animation="animateDigits"]').forEach(function (el) {
            if (el.dataset.counterDone) return;
            el.dataset.counterDone = '1';

            var from = parseInt(el.getAttribute('data-from')) || 0;
            var to = parseInt(el.getAttribute('data-to')) || 0;
            var duration = 2000;
            var steps = Math.ceil(duration / 16);
            var increment = (to - from) / steps;
            var current = from;

            function tick() {
                current += increment;
                if (current < to) {
                    el.textContent = Math.floor(current);
                    requestAnimationFrame(tick);
                } else {
                    el.textContent = to;
                }
            }

            requestAnimationFrame(tick);
        });
    }

    if ('IntersectionObserver' in window) {
        var section = document.querySelector('.fid-section');
        if (section) {
            var observer = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        initAboutCounters();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            observer.observe(section);
        }
    } else {
        initAboutCounters();
    }
})();
</script>