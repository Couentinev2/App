<!-- Jobs Section Start -->
<section id="job-board" aria-labelledby="jobs-section-title">
    <div class="wrapper grid gap-[64px] md:gap-[80px] lg:gap-[96px] !max-w-[1112px]">
        <?php

        $legal_text_section = get_field('legal_text_section');

        if ($legal_text_section) {
            $eeo_rights_url = $legal_text_section['eeo_rights_url'];
            $cal_civil_rights_url = $legal_text_section['cal_civil_rights_url'];
        

        ?>
        <div class="grid gap-[40px]">
            <div class="grid gap-[15px] lg:gap-[18px]">
                <div class=" avenir-black text-black text-center text-[30px] lg:text-[36px]" id="jobs-section-title">All Open Positions</div>
                <div class="scale-21-21-18 avenir-light text-black text-center">Interested in joining our team? We’d love to meet you!</div>
            </div>
            <div class="alert-warning">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="16" cy="16" r="16" fill="#FC326C"></circle>
                    <mask id="mask0_2723_2237" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="4" y="4" width="24" height="25">
                        <rect x="4" y="4.28906" width="24" height="24" fill="#D9D9D9"></rect>
                    </mask>
                    <g mask="url(#mask0_2723_2237)">
                        <path d="M16 20.2895C16.2833 20.2895 16.5208 20.1936 16.7125 20.002C16.9042 19.8103 17 19.5728 17 19.2895C17 19.0061 16.9042 18.7686 16.7125 18.577C16.5208 18.3853 16.2833 18.2895 16 18.2895C15.7167 18.2895 15.4792 18.3853 15.2875 18.577C15.0958 18.7686 15 19.0061 15 19.2895C15 19.5728 15.0958 19.8103 15.2875 20.002C15.4792 20.1936 15.7167 20.2895 16 20.2895ZM16 16.2895C16.2833 16.2895 16.5208 16.1936 16.7125 16.002C16.9042 15.8103 17 15.5728 17 15.2895V12.2895C17 12.0061 16.9042 11.7686 16.7125 11.577C16.5208 11.3853 16.2833 11.2895 16 11.2895C15.7167 11.2895 15.4792 11.3853 15.2875 11.577C15.0958 11.7686 15 12.0061 15 12.2895V15.2895C15 15.5728 15.0958 15.8103 15.2875 16.002C15.4792 16.1936 15.7167 16.2895 16 16.2895ZM16 26.1895C15.8833 26.1895 15.775 26.1811 15.675 26.1645C15.575 26.1478 15.475 26.1228 15.375 26.0895C13.125 25.3395 11.3333 23.952 10 21.927C8.66667 19.902 8 17.7228 8 15.3895V10.6645C8 10.2478 8.12083 9.87279 8.3625 9.53945C8.60417 9.20612 8.91667 8.96445 9.3 8.81445L15.3 6.56445C15.5333 6.48112 15.7667 6.43945 16 6.43945C16.2333 6.43945 16.4667 6.48112 16.7 6.56445L22.7 8.81445C23.0833 8.96445 23.3958 9.20612 23.6375 9.53945C23.8792 9.87279 24 10.2478 24 10.6645V15.3895C24 17.7228 23.3333 19.902 22 21.927C20.6667 23.952 18.875 25.3395 16.625 26.0895C16.525 26.1228 16.425 26.1478 16.325 26.1645C16.225 26.1811 16.1167 26.1895 16 26.1895Z" fill="white"></path>
                    </g>
                </svg>
                <p>AppLovin has become aware of a scam targeting jobseekers with fake “app optimization” and similar roles. We do not ask our candidates to download apps or make any form of payment(s). AppLovin works with applicants through our Jobs page and <a href="https://applovin.com">applovin.com</a> email addresses. If you are contacted through other unofficial channels (such as WhatsApp or Telegram) or asked to download an app or make a payment, these contacts are not legitimate. Confirm the information <a href="/jobs">here</a> and <a href="mailto:jobs@applovin.com">contact us</a> us directly with any questions.</p>
            </div>
        </div>

        <div class="">
            <div id="fetching-jobs">
                <!-- The loading text will be injected here by JavaScript -->
            </div>

            <div id="intern-message">
                <!-- The loading text will be injected here by JavaScript -->
            </div>

            <div id="filter-form">
                <div class="wrapper-dropdown" id="department-dropdown">
                    <span class="selected-display" id="department"><!-- Populated by populateDropdown function --></span>
                    <svg class="arrow" id="department-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 14.5l5-5 5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <ul class="dropdown" id="department-options">
                        <!-- Options will be populated by JavaScript -->
                    </ul>
                </div>

                <div class="wrapper-dropdown" id="location-dropdown">
                    <span class="selected-display" id="location"><!-- Populated by populateDropdown function --></span>
                    <svg class="arrow" id="location-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 14.5l5-5 5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <ul class="dropdown" id="location-options">
                        <!-- Options will be populated by JavaScript -->
                    </ul>
                </div>

                <div class="wrapper-dropdown" id="work-sub-type-dropdown">
                    <span class="selected-display" id="work-sub-type"><!-- Populated by populateDropdown function --></span>
                    <svg class="arrow" id="work-sub-type-arrow" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 14.5l5-5 5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                    <ul class="dropdown" id="work-sub-type-options">
                        <!-- Options will be populated by JavaScript -->
                    </ul>
                </div>

                <div id="reset-filters">Reset</div>
            </div>

            <div class="job-controls-con">
                <div id="job-counter"></div>
            </div>

            <div id="job-listings">
                <!-- The loading text will be injected here by JavaScript -->
            </div>


            <div class="disclaimer pt-[64px] md:pt-[80px] lg:pt-[96px]">
                <div class="text-center max-w-[640px] m-auto grid gap-[48px]">
                    <div>
                        <p class="jobs-footer-copy fixed-14">AppLovin works with applicants through this Careers page and applovin.com email addresses. If someone reaches out to you through other means, please confirm the information here and contact us directly with any questions.</p>
                        <p class="jobs-footer-copy fixed-14">AppLovin is proud to be an equal opportunity employer that is committed to inclusion and diversity. All applicants will be considered for employment without attention to race, color, religion, sex, sexual orientation, gender identity, national origin, veteran or disability status, or other legally protected characteristics. <a href="<?php echo esc_url($eeo_rights_url); ?>" rel="noreferrer" target="_blank">Learn more about EEO rights as an applicant here</a>.</p>
                        <p class="jobs-footer-copy fixed-14 m-0">If you need assistance and/or a reasonable accommodation due to a disability during the application or recruiting process, please send us a request at <a href="mailto:accommodations@applovin.com">accommodations@applovin.com</a>.</p> 
                    </div> 
                    <p class="jobs-footer-copy fixed-14 m-0">AppLovin will consider for employment all qualified applicants with criminal histories in a manner consistent with applicable law. If you’re applying for a position in California, <a href="<?php echo esc_url($cal_civil_rights_url); ?>" rel="noreferrer" target="_blank">learn more here</a>.</p>
                    <p class="jobs-footer-copy fixed-14 m-0">Read our <a href="/global-applicant-privacy-notice/">Global Applicant Privacy Notice</a> to learn more about how AppLovin processes your personal information.</p>
                    <p class="jobs-footer-copy fixed-14 m-0"><a href="https://www.cigna.com/legal/compliance/machine-readable-files" target="_blank" rel="noreferrer">This link</a> leads to the machine-readable files that are made available in response to the federal Transparency in Coverage Rule and includes negotiated service rates and out-of-network allowed amounts between health plans and healthcare providers. The machine-readable files are formatted to allow researchers, regulators, and application developers to more easily access and analyze data.</p>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</section>
<!-- Jobs Section End -->