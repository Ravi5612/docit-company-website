@php
    $privacyPolicy = App\Models\PrivacyPolicy::where('is_active', true)->first();
@endphp
<section class="cmt-row about-section clearfix">
    <div class="container">
        <!-- row -->
        <div class="row align-items-center">

            <div class="col-xl-12">
                <div class="pl-20 res-1199-pt-40 mb-20 res-1199-mb-0 res-1199-pl-0">
                    <!-- section title -->
                    <div class="section-title">
                        <div class="title-header">
                            <h3>{{ $privacyPolicy->sub_title ?? ' Privacy Policy' }}</h3>
                            {{-- <h2 class="title">{{ $privacyPolicy->main_title ?? 'Privacy Policy' }}</h2> --}}
                        </div>
                        {{-- <div class="title-desc">
                            <p align="justify">{{ $privacyPolicy->description_1 ?? 'No Data Found Yet !!' }}</p>
                        </div> --}}

                        <div class="title-desc">

                            <p align="justify">
                                DR IT respects privacy and is devoted to privacy protection. The Privacy Policy here details the ways we handle the information while you interact with the website.
                            </p>

                            <h3>Website Covered by This Policy</h3>

                            <p align="justify">
                                The Privacy Policy here will only be applicable to this website and not the others that are linked from here and you are supposed to refer those sites' privacy policies separately for knowing their privacy practices.
                            </p>

                            <h3>Visiting Our Website</h3>

                            <p align="justify">
                                You are entitled to browse our website without having to provide any information that could identify you personally. Some pages use cookies to enable our server to track your connection while a session is ongoing. Cookies stored on the browser by the server may be accepted, rejected, or deleted via browser options. If necessary, we might request some particular pieces of information from you to handle your inquiries or to confirm your identity when you apply for online access details.
                            </p>

                            <h3>Personal Information</h3>

                            <p align="justify">
                                The only personal data you should submit to this website are examples including your name, home or office address, email address, phone number or professional profile. Submitting this information is entirely your choice. We implement suitable measures for the safety and confidentiality of any personal information you disclose.
                            </p>

                            <h3>Site Visitor Data</h3>

                            <p align="justify">
                                We may also collect general site visitor data that does not contain personal information. This is done to gather statistics on the number of visitors to the website and to analyze how the website is used, so that we can improve it. Aggregated data from such analysis may be shared with advertising or analytics partners.
                            </p>

                            <h3>Disclosure of Information</h3>

                            <p align="justify">
                                We could share personal data with subsidiaries, third-party partners, who will be agents or vendors and who must have such data to help us out. We shall not reveal your personally identifiable data to the unaffiliated parties without your consent unless this disclosure is necessary for us to comply with legal or regulatory requirements of whatever country where your data is being processed.
                            </p>

                            <h3>Policy Updates</h3>

                            <p align="justify">
                                We have kept ourselves in a position to amend its contents at anytime. If new changes take place, then these updates will be posted on this page and they will be effective as soon as they are made public.
                            </p>

                        </div>

                    </div><!-- section title end -->

                </div>
            </div>
        </div><!-- row end -->
    </div>
</section>