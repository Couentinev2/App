<section class="cares-form-module" id="cares-form-module">
    <div class="signup-wrapper">
        <div class="signup-container">
            <div class="form-con">
                <div class="!p-[60px] max-w-[560px] m-auto bg-white rounded-[8px]">
                    <form id="custom-hubspot-form" class="text-left grid gap-[30px]">

                        <!-- First and Last Name Fields Start -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-[30px]">
                            <div class="grid gap-[10px]">
                                <div class="flex items-center">
                                    <label class="pr-[2px]" for="firstname">First Name:</label>
                                    <span class="hs-form-required">*</span>
                                </div>
                                <input type="text" id="firstname" name="firstname" required />
                            </div>

                            <div class="grid gap-[10px]">
                                <div class="flex items-center">
                                    <label class="pr-[2px] " for="lastname">Last Name:</label>
                                    <span class="hs-form-required">*</span>
                                </div>
                                <input type="text" id="lastname" name="lastname" required />
                            </div>
                        </div>
                        <!-- First and Last Name Fields End -->

                        <!-- Status Field Start -->
                        <div class="grid gap-[14px]">
                            <div class="flex items-center">
                                <label class="pr-[2px] ">Status:</label>
                                <span class="hs-form-required">*</span>
                            </div>
                            <div class="grid gap-[10px]">
                                <div class="flex gap-[10px]">
                                    <input type="radio" id="status_employee" name="status_" value="AppLovin employee" required />
                                    <label class="" for="status_employee">AppLovin employee</label>
                                </div>
                                <div class="flex gap-[10px]">
                                    <input type="radio" id="status_non_employee" name="status_" value="Non AppLovin employee" required />
                                    <label class="" for="status_non_employee">Non AppLovin employee</label>
                                </div>
                            </div>
                        </div>
                        <!-- Status Field End -->

                        <!-- Email Field Start -->
                        <div class="grid gap-[10px]">
                            <div class="flex items-center">
                                <label class="pr-[2px] " for="email">Email:</label>
                                <span class="hs-form-required">*</span>
                            </div>
                            <input type="email" id="email" name="email" required />
                        </div>
                        <!-- Email Field End -->

                        <!-- Phone Field Start -->
                        <div class="grid gap-[10px]">
                            <div class="flex items-center">
                                <label class="pr-[2px] " for="phone">Phone Number:</label>
                                <span class="hs-form-required">*</span>
                            </div>
                            <input type="tel" id="phone" name="phone" />
                        </div>
                        <!-- Phone Field End -->

                        <!-- Non-Profit Organization Fields Start -->
                        <div class="grid gap-[10px]">
                            <div class="flex items-center">
                                <label class="pr-[2px] " for="name_of_non_profit_organization">Name of Non-Profit Organization:</label>
                                <span class="hs-form-required">*</span>
                            </div>
                            <input type="text" id="name_of_non_profit_organization" name="name_of_non_profit_organization" required />
                        </div>
                        <!-- Non-Profit Organization Fields End -->

                        <!-- URL for Non-Profit Organization Field Start -->
                        <div class="grid gap-[10px]">
                            <div class="flex items-center">
                                <label class="pr-[2px] " for="url_for_non_profit_organization">URL for Non-Profit Organization:</label>
                                <span class="hs-form-required">*</span>
                            </div>
                            <input type="url" id="url_for_non_profit_organization" name="url_for_non_profit_organization" required />
                        </div>
                        <!-- URL for Non-Profit Organization Field End -->

                        <!-- Amount Requested Field Start -->
                        <div class="grid gap-[10px]">
                            <div class="flex items-center">
                                <label class="pr-[2px] " for="amount_requested">Amount Requested:</label>
                                <span class="hs-form-required">*</span>
                            </div>
                            <input type="text" id="amount_requested" name="amount_requested" required />
                        </div>
                        <!-- Amount Requested Field End -->

                        <!-- Description of the Purpose Field Start -->
                        <div class="grid gap-[10px]">
                            <div class="flex items-center">
                                <label class="pr-[2px] " for="description_of_the_purpose_for_which_the_donation_is_requested_">Description of the Purpose:</label>
                                <span class="hs-form-required">*</span>
                            </div>
                            <textarea id="description_of_the_purpose_for_which_the_donation_is_requested_" name="description_of_the_purpose_for_which_the_donation_is_requested_" required></textarea>
                        </div>
                        <!-- Description of the Purpose Field End -->

                        <!-- Brief Description of the Organization Field Start -->
                        <div class="grid gap-[10px]">
                            <div class="flex items-center">
                                <label class="pr-[2px] " for="brief_description_of_the_organization__the_impact_it_is_making__and_why_this_organization">Brief Description of the Organization:</label>
                                <span class="hs-form-required">*</span>
                            </div>
                            <textarea id="brief_description_of_the_organization__the_impact_it_is_making__and_why_this_organization" name="brief_description_of_the_organization__the_impact_it_is_making__and_why_this_organization" required></textarea>
                        </div>
                        <!-- Brief Description of the Organization Field End -->

                        <!-- File Upload Fields Start -->
                        <div class="grid gap-[10px]">
                            <label class="pr-[2px] " for="videos_or_promotional_material__if_applicable_">Videos or Promotional Material:</label>
                            <input type="file" id="videos_or_promotional_material__if_applicable_" name="videos_or_promotional_material__if_applicable_" />
                        </div>
                        <!-- File Upload Fields End -->

                        <!-- File Upload Fields Start -->
                        <div class="grid gap-[10px]">
                            <label class="pr-[2px]  custom-file-upload" for="proof_of_registered_501_c__3__non_profit_status__">Proof of Registered 501(c)(3) Non-Profit Status:</label>
                            <input type="file" id="proof_of_registered_501_c__3__non_profit_status__" name="proof_of_registered_501_c__3__non_profit_status__" />
                        </div>
                        <!-- File Upload Fields End -->

                        <!-- Submit Button Start -->
                        <button type="submit" class="primary-gradient-btn !w-full">
                            <span>Send</span>
                        </button>
                        <!-- Submit Button End -->

                    </form>


                </div>

            </div>
        </div>
</section>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    document.getElementById('custom-hubspot-form').addEventListener('submit', async function(event) {
        event.preventDefault();

        const formData = new FormData(this);

        const data = {
            fields: [{
                    name: 'firstname',
                    value: formData.get('firstname')
                },
                {
                    name: 'lastname',
                    value: formData.get('lastname')
                },
                {
                    name: 'status_',
                    value: formData.get('status_')
                },
                {
                    name: 'email',
                    value: formData.get('email')
                },
                {
                    name: 'phone',
                    value: formData.get('phone')
                },
                {
                    name: 'name_of_non_profit_organization',
                    value: formData.get('name_of_non_profit_organization')
                },
                {
                    name: 'url_for_non_profit_organization',
                    value: formData.get('url_for_non_profit_organization')
                },
                {
                    name: 'amount_requested',
                    value: formData.get('amount_requested')
                },
                {
                    name: 'description_of_the_purpose_for_which_the_donation_is_requested_',
                    value: formData.get('description_of_the_purpose_for_which_the_donation_is_requested_')
                },
                {
                    name: 'brief_description_of_the_organization__the_impact_it_is_making__and_why_this_organization',
                    value: formData.get('brief_description_of_the_organization__the_impact_it_is_making__and_why_this_organization')
                }
            ],
            context: {
                pageUri: window.location.href, // Capture the URL of the page where the form is submitted
                pageName: document.title // Capture the title of the page where the form is submitted
            }
        };

        // Handle file fields if they are provided
        if (formData.get('videos_or_promotional_material__if_applicable_')) {
            data.files = [{
                    name: 'videos_or_promotional_material__if_applicable_',
                    value: formData.get('videos_or_promotional_material__if_applicable_')
                },
                {
                    name: 'proof_of_registered_501_c__3__non_profit_status__',
                    value: formData.get('proof_of_registered_501_c__3__non_profit_status__')
                }
            ];
        }

        const response = await fetch('https://api.hsforms.com/submissions/v3/integration/submit/5209470/c118f439-c589-402a-b3f6-eb5348c71cdb', {
            method: 'POST',
            body: JSON.stringify(data),
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (response.ok) {
            alert('Form submitted successfully!');
        } else {
            alert('There was an error submitting the form.');
        }
    });
</script>