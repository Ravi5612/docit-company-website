@php
    $termsCondition = App\Models\TermsCondition::where('is_active', true)->first();
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
                            <h3>{{ $termsCondition->sub_title ?? ' Privacy Policy' }}</h3>
                            {{-- <h2 class="title">{{ $termsCondition->main_title ?? 'Privacy Policy' }}</h2> --}}
                        </div>
                        {{-- <div class="title-desc">
                            <p align="justify">{{ $termsCondition->description_1 ?? 'No Data Found Yet !!' }}</p>
                        </div> --}}


                        <div class="title-desc">

                           
                            <p align="justify">
                                DR IT welcomes you. Please read these Terms &amp; Conditions carefully as they
                                provide the rules and regulations for using this website. By visiting or using
                                this website in any form, you are considered to have given your consent to
                                these Terms &amp; Conditions. Do not use the website if you disagree with
                                anything contained in these Terms &amp; Conditions.
                            </p>

                            <p align="justify">
                                The following terminology defines the usage of words and phrases in this
                                document: <strong>"the Client," "You,"</strong> and <strong>"Your"</strong>
                                refer to the person visiting the website and agreeing to these Terms &amp;
                                Conditions. <strong>"The Company," "We," "Our,"</strong> and
                                <strong>"Us"</strong> refer to DR IT. <strong>"Party"</strong> or
                                <strong>"Parties"</strong> refer to both the Client and DR IT.
                            </p>

                            <h3>Cookies</h3>

                            <p align="justify">
                                We place cookies on our website. If you visit this website, you accept the use
                                of cookies in accordance with our Privacy Policy. Cookies help remember you as
                                a returning user and allow certain functions of the website to operate.
                                Our advertising or data analysis partners may also place cookies on your
                                computer.
                            </p>

                            <h3>License</h3>

                            <p align="justify">
                                Unless otherwise stated, DR IT owns the intellectual property rights to all
                                material published on this website. All such rights are reserved. You may
                                access the content for your own personal use, subject to the restrictions
                                set out in these Terms &amp; Conditions.
                            </p>

                            <p align="justify">You must not:</p>

                            <ol>
                                <li>Republish material from this website.</li>
                                <li>Sell, rent, or sub-license material from this website.</li>
                                <li>Reproduce, duplicate, or copy material from this website.</li>
                                <li>Redistribute content from this website.</li>
                            </ol>

                            <h3>iFrames</h3>

                            <p align="justify">
                                You may not create frames around our webpages or use framing techniques that
                                alter the visual presentation or appearance of this website without our prior
                                written approval.
                            </p>

                            <h3>Content Liability</h3>

                            <p align="justify">
                                We shall not be held responsible for any content that appears on your website
                                that links to ours. You agree to protect and defend us against any claims
                                arising from content on your website. No link on your website should be
                                interpreted as libelous, obscene, unlawful, or as infringing upon any
                                third-party rights.
                            </p>

                            <h3>Reservation of Rights</h3>

                            <p align="justify">
                                There may be situations where a request is made to remove a hyperlink to our
                                website. Such requests may result in our taking immediate action to stop
                                displaying the hyperlink at any time.
                            </p>

                            <p align="justify">
                                It would also be considered an obligation on your part not to oppose us if we
                                do not accept your complaint regarding a removed hyperlink. We can also make
                                changes to these Terms &amp; Conditions at our discretion at any point in time.
                            </p>

                            <p align="justify">
                                If you continue to visit or use our website, you confirm your acceptance of
                                any such changes and agree to abide by them.
                            </p>

                            <h3>Removal of Links from Our Website</h3>

                            <p align="justify">
                                When a customer reports a link that they find offensive, we are prepared to
                                consider removing the link. However, such removal is not always necessary,
                                nor are we required to acknowledge the removal to the person making the report.
                            </p>

                            <p align="justify">
                                We will make every effort to keep the information on this webpage as accurate
                                as possible. However, we cannot guarantee its completeness or timeliness, and
                                no assurances are given that the website will remain available at all times
                                from a legal or technical perspective.
                            </p>

                            <h3>Disclaimer</h3>

                            <p align="justify">
                                We do not represent or provide warranties or conditions regarding the use of
                                this website or its contents. Nothing in this disclaimer shall exclude or limit
                                our liability for death or personal injury caused by negligence, fraudulent
                                activity, misrepresentation, or any other liability that cannot be limited or
                                excluded under applicable law.
                            </p>

                            <p align="justify">
                                Since this website is provided to users free of charge, we are not responsible
                                for compensating you or repairing any losses or damages that you may incur
                                through your use of the website, to the extent permitted by applicable law.
                            </p>

                        </div>

                    </div><!-- section title end -->

                </div>
            </div>
        </div><!-- row end -->
    </div>
</section>