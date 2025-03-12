<!-- This template is made with tailwind, do not edit the template. Instead copy this template and use it on the base you're working on. -->
<!-- Lightbox Button -->
<button onclick="openLightbox()" class="secondary-white-btn">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
        <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58 0 0 3.58 0 8C0 12.42 3.58 16 8 16C12.42 16 16 12.42 16 8C16 3.58 12.42 0 8 0ZM10.7 8.43L7 10.57C6.67 10.76 6.25 10.52 6.25 10.13V5.87C6.25 5.48 6.67 5.24 7 5.43L10.7 7.57C11.03 7.76 11.03 8.24 10.7 8.43Z" fill="white" />
    </svg>
    <span>Watch how we work</span>
</button>
<!-- Lightbox Button End -->

<!-- Lightbox -->
<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-75 flex justify-center items-center hidden z-[1000]">
    <div class="bg-white rounded-lg p-[20px] relative w-11/12 md:w-3/4 h-auto">
        <button onclick="closeLightbox()" class="absolute top-2 right-2 text-black p-0">
        <svg width="15px" height="15px" viewBox="0 0 28 29" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns">
            <g id="Page-1" stroke="none" stroke-width="1" fill="#000000" fill-rule="evenodd" sketch:type="MSPage">
                <path d="M13.5,15.7032761 L1.59555621,27.6077198 L0.181342653,26.1935063 L12.0857864,14.2890625 L0.0663307188,2.26960678 L1.48054428,0.855393219 L13.5,12.8748489 L25.5194557,0.855393219 L26.9336693,2.26960678 L14.9142136,14.2890625 L26.8186573,26.1935063 L25.4044438,27.6077198 L13.5,15.7032761 Z" id="Path-2" fill="#000000" sketch:type="MSShapeGroup"></path>
            </g>
        </svg>
        </button>
        <div class="aspect-w-16 aspect-h-9">
            <script src="https://fast.wistia.com/embed/medias/ani3v9r25z.jsonp" async></script>
            <script src="https://fast.wistia.com/assets/external/E-v1.js" async></script>
            <div class="wistia_responsive_padding" style="padding:56.25% 0 0 0;position:relative;">
                <div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;">
                    <div class="wistia_embed wistia_async_ani3v9r25z seo=true videoFoam=true" style="height:100%;position:relative;width:100%">
                        <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/ani3v9r25z/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Lightbox End -->

<!-- Lightbox Script -->
<?php wp_enqueue_script('light-script', get_template_directory_uri() . '/js/lightbox.js', array('jquery'), null, true); ?>
<!-- Lightbox Script End -->