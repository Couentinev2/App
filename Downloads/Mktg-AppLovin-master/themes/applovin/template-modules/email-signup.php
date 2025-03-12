<section class="signup-module">
    <div class="signup-wrapper">
        <div class="signup-container">
            <div class="form-con">
                <?php 
                    $current_language = pll_current_language();

                    $dev_source_page_id = 17153; 
                    $dev_source_page_id_for_current_language = pll_get_post($dev_source_page_id, $current_language);
                    $dev_source_page_url = get_permalink($dev_source_page_id_for_current_language);

                    if ($current_language == 'en') {
                        echo '<div id="signupTitle" class="signup-title">';
                        echo pll__('Send the latest industry news and company updates to my <span>inbox</span>.');
                        echo '</div>';
                    } else {
                        echo '<div id="signupTitle" class="signup-title">';
                        echo pll__('Send the latest industry news and company updates to my inbox.');
                        echo '</div>';
                    } 
                ?>


                <?php 
                    if ($current_language == 'en' || $current_language == 'ko' || $current_language == 'ja') {
                        echo '<div class="form">
                                <form id="myCustomForm">
                                    <input type="text" name="email" placeholder="' . pll__('Enter email address') . '" required>
                                    <!-- Hidden fields -->
                                    <input type="hidden" name="utm_campaign">
                                    <input type="hidden" name="utm_content">
                                    <input type="hidden" name="utm_medium">
                                    <input type="hidden" name="utm_keyword">
                                    <input type="hidden" name="utm_source">
                                    <input type="hidden" name="hs_context" id="hs_context">
                                    <button class="submit-btn" type="submit">' . pll__('Subscribe now') . '</button>
                                </form>';

                                if ($current_language == 'en') {
                                    echo '<div id="privacyMessage">The information you provide will be used in accordance with our <a href="https://applovin.com/policies/" target="_blank">Privacy Policy</a>. You may unsubscribe at any time.</div>
                                            <div id="formMessage" style="display: none;">
                                                <img src="' . get_template_directory_uri() . '/images/Communication.svg" alt="">
                                                <div class="title">Thanks for signing up!</div>
                                                <p>Check your inbox for a link to confirm your email address and complete your subscription.</p>
                                            </div>';
                                } else if ($current_language == 'ko') {
                                    echo '<div id="privacyMessage">귀하가 제공한 정보는 <a href="https://applovin.com/policies/" target="_blank">개인정보처리방침</a>에 따라 사용될 것입니다. 언제든지 구독 해지가 가능합니다.</div>
                                          <div id="formMessage" style="display: none;">
                                                <img src="' . get_template_directory_uri() . '/images/Communication.svg" alt="">
                                                <div class="title">가입해주셔서 감사합니다!</div>
                                                <p>이메일 주소를 확인하고 구독을 완료하려면 받은 편지함에서 링크를 확인하세요.</p>
                                          </div>';
                                } else if ($current_language == 'ja') {
                                    echo '<div id="privacyMessage">ご提供いただいた情報は、<a href="https://applovin.com/policies/" target="_blank">プライバシーポリシー</a>に従って使用されます。いつでも購読を解除することができます。</div>
                                          <div id="formMessage" style="display: none;">
                                                <img src="' . get_template_directory_uri() . '/images/Communication.svg" alt="">
                                                <div class="title">ご登録ありがとうございます!</div>
                                                <p>受信箱のメールのリンクをクリックして、メールアドレスを確認し、購読を完了してください。</p>
                                          </div>';
                                }

                        echo ' </div>';
                    } else if ($current_language == 'cn') {
                        $template_directory_uri = get_template_directory_uri(); 
                        echo '<div class="form">
                                <div class="qr-con">
                                    <div class="qr-code">
                                        <img src="' . $template_directory_uri . '/images/qr-code-1.png" alt="">
                                        <p class="qr-content">关注微信公众号，随时了解最新产品动态和行业活动等。</p>
                                    </div>
                                    <div class="qr-code">
                                        <img src="' . $template_directory_uri . '/images/qr-code-2.png" alt="">
                                        <p class="qr-content">订阅newsletter，将最新的行业新闻和公司动态发送至您的邮箱。</p>
                                    </div>
                                </div>
                            </div>';
                    }
                ?>

            </div>
            <div class="blurb-con">
                <div class="blurb">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Product Documentation.svg" alt="">
                    <div class="blurb-title"><?php echo pll__('Product Documentation') ?></div>
                    <div class="blurb-content"><?php echo pll__('Show me how to get started with MAX and AppDiscovery.') ?></div>
                    <?php if ($current_language == 'en') {
                        echo '<div class="blurb-btn"><a href="https://developers.applovin.com/" target="_blank"><span>' . pll__('Learn more') . '</span> <img src="' . get_template_directory_uri() . '/images/icon_arrow_links_black.svg" alt=""></a></div>';
                    } else if ($current_language == 'ko') {
                        echo '<div class="blurb-btn"><a href="https://support.applovin.com/hc/ko" target="_blank"><span>' . pll__('Learn more') . '</span> <img src="' . get_template_directory_uri() . '/images/icon_arrow_links_black.svg" alt=""></a></div>';
                    } else if ($current_language == 'ja') {
                        echo '<div class="blurb-btn"><a href="https://support.applovin.com/hc/ja" target="_blank"><span>' . pll__('Learn more') . '</span> <img src="' . get_template_directory_uri() . '/images/icon_arrow_links_black.svg" alt=""></a></div>';
                    } else if ($current_language == 'cn') {
                        echo '<div class="blurb-btn"><a href="https://support.applovin.com/hc/zh-cn" target="_blank"><span>' . pll__('Learn more') . '</span> <img src="' . get_template_directory_uri() . '/images/icon_arrow_links_black.svg" alt=""></a></div>';
                    } ?>

                </div>
                <div class="blurb">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Dev_Source.svg" alt="">
                    <div class="blurb-title"><?php echo pll__('Dev_Source') ?></div>
                    <div class="blurb-content"><?php echo pll__('Connect me with other developers and learn to build better apps.') ?></div>
                    <div class="blurb-btn">
                        <a href="<?php echo $dev_source_page_url; ?>">
                            <span><?php echo pll__('Learn more'); ?></span> 
                            <img src="<?php echo get_template_directory_uri(); ?>/images/icon_arrow_links_black.svg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>

    #formMessage .title {
        font-size: 32px;
        font-family: var(--font-wt-Medium);
        line-height: 40px;
        padding-bottom: 16px;
    }

    #formMessage p {
        font-size: 21px;
        font-family: var(--font-wt-light);
        line-height: 32px;
    }

    #formMessage img {
        width: 64px;
        margin-bottom: 40px;
    }

    #myCustomForm {
        display: flex;
        justify-content: space-between;
        padding-bottom: 25px;
        border-bottom: 1px solid #000;
        margin-bottom: 20px;
    }

    #privacyMessage {
        font-family: var(--font-wt-Light);
        font-size: 14px;
        line-height: 21px;
        margin: auto;
        color: #999;
    }

    #privacyMessage a {
        color: #999;
        text-decoration: underline;
    }

    #myCustomForm input {
        width: 45%;
        border: none;
        background-color: transparent;
    }

    #myCustomForm input:focus {
        outline: none;
    }

    #myCustomForm input::placeholder {
        color: #000!important;
        font-family: var(--font-wt-Light);
        font-size: 18px;
    }


    .submit-btn {
        border: none;
        background-color: transparent;
        font-size: 18px;
        font-family: var(--font-wt-Heavy);
        cursor: pointer;
        color: #000;
    }

    .signup-wrapper {
        max-width: 1200px;
        margin: auto;
        padding: 64px 32px 64px 32px;
    }

    .signup-module {
        background-color: #F7F8FC;
    }

    .signup-container {
        display: block;
    }

    .blurb-con {
        display: block;

    }

    .blurb-con .blurb {
        display: flex;
        flex-direction: column;
        border-top: 1px solid rgba(130, 155, 196, 0.20);
    }

    .blurb-con > :first-child {
        padding: 32px 0 32px 0;
    }

    .blurb-con > :last-child {
        padding: 32px 0 0 0;
    }

    .form-con {
        padding: 0 0 64px 0;
    }

    .blurb-con .blurb .blurb-content {
        flex: 1;
        font-size: 14px;
        font-family: var(--font-wt-Light);
        line-height: 21px;
        margin-bottom: 27px;
    }

    .form-con .signup-title {
        font-size: 21px;
        font-family: var(--font-wt-Light);
        margin-bottom: 64px;
    }

    .form-con .signup-title span {
        font-family: var(--font-wt-Heavy);
    }

    .blurb-con .blurb img {
        margin-bottom: 27px;
        width: 24px;
    }

    .form .qr-con {
        display: block;
        max-width: 300px;
        margin: auto;
    }

    @media only screen and (min-width : 600px) {

        .signup-wrapper {
            padding: 80px 56px 80px 56px;
        }

        .blurb-con {
            display: flex;
        }

        .blurb-con .blurb {
            display: flex;
            flex-direction: column;
            border-left: 1px solid rgba(130, 155, 196, 0.20);
            border-top: none;
        }

        .form-con {
            padding: 0 0 89px 0;
        }


        .form-con .signup-title {
            font-size: 32px;
            line-height: 40px;
        }

        .blurb-con .blurb img {
            margin-bottom: 12px;
        }

        .blurb-con > :first-child {
            padding: 0 32px 32px 32px;
        }

        .blurb-con > :last-child {
            padding: 0 32px 32px 32px;
        }

        .form .qr-con {
            display: flex;
            gap: 40px;
            max-width: 100%;
        }

        #myCustomForm input {
            width: 65%;
            border: none;
            background-color: transparent;
        }

    }

    @media only screen and (min-width : 900px) {

        .signup-wrapper {
            padding: 0 32px 96px 32px;
        }

        .signup-container {
            display: flex;
            justify-content: space-between;
        }

        .form-con {
            width: 50%;
            padding: 96px 32px 0 0;
        }

        .blurb-con {
            width: 50%;
            display: flex;
    
        }

        .blurb-con .blurb {
            display: flex;
            flex-direction: column;
            border-left: 1px solid rgba(130, 155, 196, 0.20);
        }

        .form-con {
            max-width: 520px;
        }

        .blurb-con > :first-child {
            padding: 162px 64px 16px 32px;
        }

        .blurb-con > :last-child {
            padding: 162px 0 16px 32px;
        }

    }

    .form .qr-con img {
        width: 105px;
        padding: 8px;
        background-color: #E3E7F2;
        margin: auto;
        margin-bottom: 16px;
        border-radius: 8px;
    }

    .form .qr-con .qr-content {
        text-align: center;
        font-size: 14px;
    }

    .blurb-con .blurb .blurb-title {
        font-size: 14px;
        font-family: var(--font-wt-Heavy);
        line-height: 21px;
        margin-bottom: 9px;
    }

    .blurb-con .blurb .blurb-btn a {
        display: flex;
        font-family: var(--font-wt-Heavy);
        color: #000;
        align-items: center;
    }

    .blurb-con .blurb .blurb-btn a span {
       padding-top: 2px;
    }

    .blurb-con .blurb .blurb-btn a img {
        height: 10px;
        margin: auto 5px;
        transition: transform 0.3s ease;
    }

    .blurb-con .blurb .blurb-btn a:hover img {
        transform: translateX(3px);
    }

</style>

<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
    document.addEventListener('DOMContentLoaded', function() {
        var form = document.getElementById('myCustomForm'); // Get the form element

        // Function to get URL parameters
        function getURLParameters(name) {
            return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search) || [null, ''])[1].replace(/\+/g, '%20')) || null;
        }

        // Set UTM parameters from the URL to the hidden fields in the form
        form.elements['utm_campaign'].value = getURLParameters('utm_campaign');
        form.elements['utm_content'].value = getURLParameters('utm_content');
        form.elements['utm_medium'].value = getURLParameters('utm_medium');
        form.elements['utm_keyword'].value = getURLParameters('utm_keyword');
        form.elements['utm_source'].value = getURLParameters('utm_source');

        // Set the data privacy consent information
        var hs_context = {
            "hutk": document.cookie.match(/hubspotutk=(.*?);/)?.[1] || '', // Capture the HubSpot cookie if available
            "pageUri": window.location.href,
            "pageName": document.title,
            "legalConsentOptions": {
                "consent": {
                    "consentToProcess": true,
                    "text": "I agree to allow AppLovin to store and process my personal data.",
                    "communications": [
                        {
                            "value": true,
                            "subscriptionTypeId": 5598230,
                            "text": "I agree to receive other communications from AppLovin."
                        }
                    ]
                }
            }
        };

        // Set the hidden input field value
        document.getElementById('hs_context').value = JSON.stringify(hs_context);

        // Determine the current language set by Polylang
        var currentLang = document.documentElement.lang; // Get language code from the <html lang=".."> attribute
        
        // Define HubSpot API endpoints for different languages
        var hubSpotAPIs = {
            "en-US": "https://api.hsforms.com/submissions/v3/integration/submit/5209470/0027d4ec-e52f-4a2d-94a8-5a15e6b61f56", // English endpoint
            "ko-KR": "https://api.hsforms.com/submissions/v3/integration/submit/5209470/f9edee61-2211-4009-ae13-57a6b65883b7", // Korean endpoint
            "ja": "https://api.hsforms.com/submissions/v3/integration/submit/5209470/7ca0aeab-5795-484d-b4fc-b6a9a2668e73", // Japanese endpoint
            // Add more languages and their corresponding endpoints here
        };

        // Select the API endpoint based on the current language, default to English if undefined
        var apiEndpoint = hubSpotAPIs[currentLang] || hubSpotAPIs["en-US"];

        // Log the selected API endpoint to the console, for debugging purposes
        console.log("Current HubSpot API endpoint:", apiEndpoint);

        form.addEventListener('submit', function(e) {
            e.preventDefault(); // Prevent the default form submission

            // Capture form data
            var formData = new FormData(this);
            var formProps = [];
            formData.forEach(function(value, key) {
                formProps.push({name: key, value: value});
            });

            // Add the hidden hs_context field to formProps
            formProps.push({name: 'hs_context', value: document.getElementById('hs_context').value});

            // Construct the payload
            var payload = {
                fields: formProps,
                context: {
                    "hutk": document.cookie.match(/hubspotutk=(.*?);/)?.[1] || '', // Capture the HubSpot cookie if available
                    "pageUri": window.location.href,
                    "pageName": document.title
                },
                legalConsentOptions: hs_context.legalConsentOptions
            };

            // Log the payload to the console for debugging
            console.log("Payload:", payload);

            // Send data to the selected HubSpot API endpoint
            fetch(apiEndpoint, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(payload)
            })
            .then(response => response.json())
            .then(data => {
                // Log the response data to the console for debugging
                console.log("Response data:", data);
                form.style.display = 'none';
                var privacyMessage = document.getElementById('privacyMessage');
                privacyMessage.style.display = 'none';
                var signupTitle = document.getElementById('signupTitle');
                signupTitle.style.display = 'none';
                var formMessage = document.getElementById('formMessage');
                formMessage.style.display = 'block';
            })
            .catch(error => {
                // Log the error to the console for debugging
                console.error('Error submitting form:', error);
                form.style.display = 'none';
                var privacyMessage = document.getElementById('privacyMessage');
                privacyMessage.style.display = 'none';
                var formMessage = document.getElementById('formMessage');
                formMessage.style.display = 'block';
                formMessage.innerHTML = 'There was an error submitting the form. Please try again.';
            });
        });
    });
</script>


