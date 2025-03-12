 <script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  FWDR3DCovUtils.onReady(function(){
    new FWDR3DCov({

      // Main.
      instanceName:'fwdr3dcov0',
      coverflowHolderDivId:"coverflowWrap",
      coverflowDataListDivId:"coverflowData",
      displayType:"responsive",
      coverflowWidth:560,
      coverflowOffsetHeight:0,
      thumbnailResizeOffest:40,
      zIndex:10,
      mainFolderPath:"content",
      skinPath:"skin_dark",
      useVectorIcons:"yes",
      initializeOnlyWhenVisible:"yes",
      coverflowStartPosition:"center",
      coverflowXRotation:0,
      rightClickContextMenu:"default",
      enableMouseWheelScroll:"no",
      addKeyboardSupport:"no",
      useDragAndSwipe:"no",
      backgroundColor:"transparent",
      backgroundImage:"",
      backgroundImageRepeat:'no-repeat',
      backgroundImageSize:"auto",
      preloaderBackgroundColor:"transparent",
      preloaderFillColor:"transparent",

      // Thumbnails.
      thumbnailWidth:480,
      thumbnailHeight:240,
      thumbnailXOffset3D:20,
      thumbnailXSpace3D:20,
      thumbnailZOffset3D:120,
      thumbnailZSpace3D:40,
      thumbnailYAngle3D:0,
      thumbnailHoverOffset:0,
      thumbnailOffsetY:0,
      thumbnailBorderSize:0,
      thumbnailBackgroundColor:"transparent",
      thumbnailBorderColor1:"#FFFFFF",
      thumbnailBorderColor2:"#FFFFFF",
      numberOfThumbnailsToDisplayLeftAndRight:"1",
      infiniteLoop:"yes",
      transparentImages:"yes",
      showReflection:"no",
      reflectionHeight:25,
      reflectionDistance:0,
      reflectionOpacity:.4,
      showThumbnailsGradient:"yes",
      thumbnailGradientColor1:"rgba(0, 0, 0, 0)",
      thumbnailGradientColor2:"rgba(0, 0, 0, 1)",
      useVideo:"no",
      videoAutoPlay:"no",
      nextVideoAutoPlay:"no",
      videoAutoPlayText:"Click to unmute",
      volume:1,
      showLogo:"no",
      logoPath:"",
      logoLink:"",
      fillEntireVideoScreen:"yes",
      showDefaultControllerForVimeo:"yes",
      showScrubberWhenControllerIsHidden:"yes",
      showVolumeButton:"yes",
      showTime:"yes",
      showRewindButton:"no",
      showQualityButton:"no",
      showPlaybackRateButton:"yes",
      showChromecastButton:"yes",
      showFullScreenButton:"yes",
      showScrubberToolTipLabel:"yes",
      timeColor:"#B9B9B9",
      youtubeQualityButtonNormalColor:"#B9B9B9",
      youtubeQualityButtonSelectedColor:'#FFFFFF',
      scrubbersToolTipLabelBackgroundColor:'#FFFFFF',
      scrubbersToolTipLabelFontColor:'#5a5a5a',
      audioVisualizerLinesColor:'#D60E63',
      audioVisualizerCircleColor:'#FFFFFF',
      thumbnailsPreviewWidth:0,
      thumbnailsPreviewBackgroundColor:'transparent',
      thumbnailsPreviewBorderColor:'#414141',
      thumbnailsPreviewLabelBackgroundColor:'#414141',
      thumbnailsPreviewLabelFontColor:'#CCCCCC',
      skipToVideoText:"You can skip to video in: ",
      skipToVideoButtonText:"Skip Ad",

      // Controls.
      controlsMaxWidth:0,
      controlsOffset:0,
      showNextAndPrevButtons:"no",
      showNextAndPrevButtonsOnMobile:"no",
      nextAndPrevButtonsOffsetX:20,
      showLargeNextAndPrevButtons:"no",
      largeNextAndPrevButtonsMaxWidthPos:1610,
      showSlideshowButton:"no",
      slideshowAutoplay:"yes",
      slideshowDelay:8,
      slideshowPreloaderBackgroundColor:"transparent",
      slideshowPreloaderFillColor:"#FFFFFF",
      showScrollbar:"no",
      showScrollbarOnMobile:"yes",
      scrollbarHandlerWidth:200,
      scrollbarTextColorNormal:"#FFFFFF",
      scrollbarTextColorSelected:"#111111",
      showBulletsNavigation:"no",
      bulletsNormalColor:"#333333",
      bulletsSelectedColor:"#FFFFFF",
      bulletsNormalRadius:6,
      bulletsSelectedRadius:9,
      spaceBetweenBullets:18,
                    
      // Caption.
      showCaption:"yes",
      captionPosition:"in",
      captionAnimationType:"opacity",
      showCaptionOnTap:"no",
      showFullCaption:"yes",
    
      // Menu.
      showMenu:"no",
      startAtCategory:1,
      menuPosition:"topright",
      selectorLineColor:"#333333",
      selectorBackgroundColor:"#1F1F1F",
      selectorTextNormalColor:"#FFFFFF",
      selectorTextSelectedColor:"#FFFFFF",
      buttonBackgroundColor:"#1F1F1F",
      buttonTextNormalColor:"#8F8F8F",
      buttonTextSelectedColor:"#FFFFFF",
      menuHorizontalMargins:12,
      menuVerticalMargins:12,
                    
      // Lightbox.
      useLightbox:"no",
      rlUseDeepLinking:"yes",
      rlItemBackgroundColor:"transparent",
      rlDefaultItemWidth:1527,
      rlDefaultItemHeight:859,
      rlItemOffsetHeight:0,
      rlItemOffsetHeightButtonsTop:47,
      rlItemBorderSize:0,
      rlItemBorderColor:"#FFFFFF",
      rlMaxZoom:1.2,
      rlPreloaderBkColor:"#2e2e2e",
      rlPreloaderFillColor:"#FFFFFF",
      rlButtonsAlignment:"in",
      rlButtonsHideDelay:5,
      rlMediaLazyLoading:"yes",
      rlUseDrag:"yes",
      rlUseAsModal:"no",
      rlShowSlideShowButton:"yes",
      rlShowSlideShowAnimation:"yes",
      rlSlideShowAutoPlay:"no",
      rlSlideShowAutoStop:"no",
      rlSlideShowDelay:6,
      rlSlideShowBkColor:"transparent",
      rlSlideShowFillColor:"#FFFFFF",
      rlUseKeyboard:"yes",
      rlUseDoubleClick:"yes",
      rlShowCloseButton:"yes",
      rlShowFullscreenButton:"yes",
      rlShowZoomButton:"yes",
      rlShowCounter:"yes",
      rlShowNextAndPrevBtns:"yes",
      rlSpaceBetweenBtns:8,
      rlButtonsOffsetIn:10,
      rlButtonsOffsetOut:10,
      rlBackgroundColor:"transparent",
      rlShareButtons:['facebook', 'twitter', 'linkedin', 'tumblr', 'pinterest', 'reddit', 'buffer', 'digg','blogger'],
      rlShareText:"Share on",
      rlSharedURL:"deeplink",
      rlShareMainBackgroundColor:"rgba(0,0,0,.4)",
      rlShareBackgroundColor:"#FFFFFF",
      rlShowThumbnails:"yes",
      rlShowThumbnailsIcon:"yes",
      rlThumbnailsHeight:80,
      rlThumbnailsOverlayColor:"rgba(0,0,0,.4)",
      rlThumbnailsBorderSize:2,
      rlThumbnailsBorderColor:"#FFFFFF",
      rlSpaceBetweenThumbnailsAndItem:10,
      rlThumbnailsOffsetBottom:10,
      rlSpaceBetweenThumbnails:5,
      rlShowCaption:"yes",
      rlCaptionPosition:"bottomout",
      rlShowCaptionOnSmallScreens:"no",
      rlCaptionAnimationType:"motion",
      rlUseVideo:"yes",
      rlFillEntireScreenWithPoster:"yes",
      rlVolume:1,
      rlVideoAutoPlay:"no",
      rlNextVideoAutoPlay:"no",
      rlVideoAutoPlayText:"Click to unmute",
      rlShowLogo:"yes",
      rlLogoPath:"content/rl/content/evp/skin/logo.png",
      rlLogoLink:"",
      rlShowDefaultControllerForVimeo:"yes",
      rlShowScrubberWhenControllerIsHidden:"yes",
      rlShowRewindButton:"yes",
      rlShowVolumeButton:"yes",
      rlShowChromecastButton:"yes",
      rlShowPlaybackRateButton:"no",
      rlShowQualityButton:"yes",
      rlShowFullScreenButton:"yes",
      rlShowScrubberToolTipLabel:"yes",
      rlShowTime:"yes",
      rlTimeColor:"#B9B9B9",
      rlYoutubeQualityButtonNormalColor:"#B9B9B9",
      rlYoutubeQualityButtonSelectedColor:"#FFFFFF",
      rlScrubbersToolTipLabelBackgroundColor:"#FFFFFF",
      rlScrubbersToolTipLabelFontColor:"#5a5a5a",
      rlAudioVisualizerLinesColor:"#D60E63",
      rlAudioVisualizerCircleColor:"#FFFFFF",
      rlThumbnailsPreviewWidth:198,
      rlThumbnailsPreviewBackgroundColor:"#2e2e2e",
      rlThumbnailsPreviewBorderColor:"#414141",
      rlThumbnailsPreviewLabelBackgroundColor:"#414141",
      rlThumbnailsPreviewLabelFontColor:"#CCCCCC",
      rlSkipToVideoText:"You can skip to video in: ",
      rlSkipToVideoButtonText:"Skip Ad"
    });   
  });
</script>


<script nonce="<?php echo esc_attr(CSP_NONCE); ?>">
  FWDR3DCovUtils.onReady(function(){
    new FWDR3DCov({

      // Main.
      instanceName:'fwdr3dcov0',
      coverflowHolderDivId:"coverflowWrapv2",
      coverflowDataListDivId:"coverflowDatav2",
      displayType:"responsive",
      coverflowWidth:560,
      coverflowOffsetHeight:0,
      thumbnailResizeOffest:40,
      zIndex:10,
      mainFolderPath:"content",
      skinPath:"skin_dark",
      useVectorIcons:"yes",
      initializeOnlyWhenVisible:"yes",
      coverflowStartPosition:"center",
      coverflowXRotation:0,
      rightClickContextMenu:"default",
      enableMouseWheelScroll:"no",
      addKeyboardSupport:"no",
      useDragAndSwipe:"no",
      backgroundColor:"transparent",
      backgroundImage:"",
      backgroundImageRepeat:'no-repeat',
      backgroundImageSize:"auto",
      preloaderBackgroundColor:"transparent",
      preloaderFillColor:"transparent",

      // Thumbnails.
      thumbnailWidth:480,
      thumbnailHeight:240,
      thumbnailXOffset3D:20,
      thumbnailXSpace3D:20,
      thumbnailZOffset3D:120,
      thumbnailZSpace3D:40,
      thumbnailYAngle3D:0,
      thumbnailHoverOffset:0,
      thumbnailOffsetY:0,
      thumbnailBorderSize:0,
      thumbnailBackgroundColor:"transparent",
      thumbnailBorderColor1:"#FFFFFF",
      thumbnailBorderColor2:"#FFFFFF",
      numberOfThumbnailsToDisplayLeftAndRight:"1",
      infiniteLoop:"yes",
      transparentImages:"yes",
      showReflection:"no",
      reflectionHeight:25,
      reflectionDistance:0,
      reflectionOpacity:.4,
      showThumbnailsGradient:"yes",
      thumbnailGradientColor1:"rgba(0, 0, 0, 0)",
      thumbnailGradientColor2:"rgba(0, 0, 0, 1)",
      useVideo:"no",
      videoAutoPlay:"no",
      nextVideoAutoPlay:"no",
      videoAutoPlayText:"Click to unmute",
      volume:1,
      showLogo:"no",
      logoPath:"",
      logoLink:"",
      fillEntireVideoScreen:"yes",
      showDefaultControllerForVimeo:"yes",
      showScrubberWhenControllerIsHidden:"yes",
      showVolumeButton:"yes",
      showTime:"yes",
      showRewindButton:"no",
      showQualityButton:"no",
      showPlaybackRateButton:"yes",
      showChromecastButton:"yes",
      showFullScreenButton:"yes",
      showScrubberToolTipLabel:"yes",
      timeColor:"#B9B9B9",
      youtubeQualityButtonNormalColor:"#B9B9B9",
      youtubeQualityButtonSelectedColor:'#FFFFFF',
      scrubbersToolTipLabelBackgroundColor:'#FFFFFF',
      scrubbersToolTipLabelFontColor:'#5a5a5a',
      audioVisualizerLinesColor:'#D60E63',
      audioVisualizerCircleColor:'#FFFFFF',
      thumbnailsPreviewWidth:0,
      thumbnailsPreviewBackgroundColor:'transparent',
      thumbnailsPreviewBorderColor:'#414141',
      thumbnailsPreviewLabelBackgroundColor:'#414141',
      thumbnailsPreviewLabelFontColor:'#CCCCCC',
      skipToVideoText:"You can skip to video in: ",
      skipToVideoButtonText:"Skip Ad",

      // Controls.
      controlsMaxWidth:0,
      controlsOffset:0,
      showNextAndPrevButtons:"no",
      showNextAndPrevButtonsOnMobile:"no",
      nextAndPrevButtonsOffsetX:20,
      showLargeNextAndPrevButtons:"no",
      largeNextAndPrevButtonsMaxWidthPos:1610,
      showSlideshowButton:"no",
      slideshowAutoplay:"yes",
      slideshowDelay:8,
      slideshowPreloaderBackgroundColor:"transparent",
      slideshowPreloaderFillColor:"#FFFFFF",
      showScrollbar:"no",
      showScrollbarOnMobile:"yes",
      scrollbarHandlerWidth:200,
      scrollbarTextColorNormal:"#FFFFFF",
      scrollbarTextColorSelected:"#111111",
      showBulletsNavigation:"no",
      bulletsNormalColor:"#333333",
      bulletsSelectedColor:"#FFFFFF",
      bulletsNormalRadius:6,
      bulletsSelectedRadius:9,
      spaceBetweenBullets:18,
                    
      // Caption.
      showCaption:"yes",
      captionPosition:"in",
      captionAnimationType:"opacity",
      showCaptionOnTap:"no",
      showFullCaption:"yes",
    
      // Menu.
      showMenu:"no",
      startAtCategory:1,
      menuPosition:"topright",
      selectorLineColor:"#333333",
      selectorBackgroundColor:"#1F1F1F",
      selectorTextNormalColor:"#FFFFFF",
      selectorTextSelectedColor:"#FFFFFF",
      buttonBackgroundColor:"#1F1F1F",
      buttonTextNormalColor:"#8F8F8F",
      buttonTextSelectedColor:"#FFFFFF",
      menuHorizontalMargins:12,
      menuVerticalMargins:12,
                    
      // Lightbox.
      useLightbox:"no",
      rlUseDeepLinking:"yes",
      rlItemBackgroundColor:"transparent",
      rlDefaultItemWidth:1527,
      rlDefaultItemHeight:859,
      rlItemOffsetHeight:0,
      rlItemOffsetHeightButtonsTop:47,
      rlItemBorderSize:0,
      rlItemBorderColor:"#FFFFFF",
      rlMaxZoom:1.2,
      rlPreloaderBkColor:"#2e2e2e",
      rlPreloaderFillColor:"#FFFFFF",
      rlButtonsAlignment:"in",
      rlButtonsHideDelay:5,
      rlMediaLazyLoading:"yes",
      rlUseDrag:"yes",
      rlUseAsModal:"no",
      rlShowSlideShowButton:"yes",
      rlShowSlideShowAnimation:"yes",
      rlSlideShowAutoPlay:"no",
      rlSlideShowAutoStop:"no",
      rlSlideShowDelay:6,
      rlSlideShowBkColor:"transparent",
      rlSlideShowFillColor:"#FFFFFF",
      rlUseKeyboard:"yes",
      rlUseDoubleClick:"yes",
      rlShowCloseButton:"yes",
      rlShowFullscreenButton:"yes",
      rlShowZoomButton:"yes",
      rlShowCounter:"yes",
      rlShowNextAndPrevBtns:"yes",
      rlSpaceBetweenBtns:8,
      rlButtonsOffsetIn:10,
      rlButtonsOffsetOut:10,
      rlBackgroundColor:"transparent",
      rlShareButtons:['facebook', 'twitter', 'linkedin', 'tumblr', 'pinterest', 'reddit', 'buffer', 'digg','blogger'],
      rlShareText:"Share on",
      rlSharedURL:"deeplink",
      rlShareMainBackgroundColor:"rgba(0,0,0,.4)",
      rlShareBackgroundColor:"#FFFFFF",
      rlShowThumbnails:"yes",
      rlShowThumbnailsIcon:"yes",
      rlThumbnailsHeight:80,
      rlThumbnailsOverlayColor:"rgba(0,0,0,.4)",
      rlThumbnailsBorderSize:2,
      rlThumbnailsBorderColor:"#FFFFFF",
      rlSpaceBetweenThumbnailsAndItem:10,
      rlThumbnailsOffsetBottom:10,
      rlSpaceBetweenThumbnails:5,
      rlShowCaption:"yes",
      rlCaptionPosition:"bottomout",
      rlShowCaptionOnSmallScreens:"no",
      rlCaptionAnimationType:"motion",
      rlUseVideo:"yes",
      rlFillEntireScreenWithPoster:"yes",
      rlVolume:1,
      rlVideoAutoPlay:"no",
      rlNextVideoAutoPlay:"no",
      rlVideoAutoPlayText:"Click to unmute",
      rlShowLogo:"yes",
      rlLogoPath:"content/rl/content/evp/skin/logo.png",
      rlLogoLink:"",
      rlShowDefaultControllerForVimeo:"yes",
      rlShowScrubberWhenControllerIsHidden:"yes",
      rlShowRewindButton:"yes",
      rlShowVolumeButton:"yes",
      rlShowChromecastButton:"yes",
      rlShowPlaybackRateButton:"no",
      rlShowQualityButton:"yes",
      rlShowFullScreenButton:"yes",
      rlShowScrubberToolTipLabel:"yes",
      rlShowTime:"yes",
      rlTimeColor:"#B9B9B9",
      rlYoutubeQualityButtonNormalColor:"#B9B9B9",
      rlYoutubeQualityButtonSelectedColor:"#FFFFFF",
      rlScrubbersToolTipLabelBackgroundColor:"#FFFFFF",
      rlScrubbersToolTipLabelFontColor:"#5a5a5a",
      rlAudioVisualizerLinesColor:"#D60E63",
      rlAudioVisualizerCircleColor:"#FFFFFF",
      rlThumbnailsPreviewWidth:198,
      rlThumbnailsPreviewBackgroundColor:"#2e2e2e",
      rlThumbnailsPreviewBorderColor:"#414141",
      rlThumbnailsPreviewLabelBackgroundColor:"#414141",
      rlThumbnailsPreviewLabelFontColor:"#CCCCCC",
      rlSkipToVideoText:"You can skip to video in: ",
      rlSkipToVideoButtonText:"Skip Ad"
    });   
  });
</script>



     <div class="cards-section">
      <div class="inner-wrap-1200">

      <div class="header-cards">
                            <h2 class="scale-36-30-24">
        <?php the_field('cards_title'); ?>
      </h2>
      <p class="scale-21-21-18">
        <?php the_field('cards_text'); ?>
      </p>
      </div>
        <div class="card-grid">

     <div class="div1-cards div1-main">
                  <h3 class="section-bullet-title scale-32-24-21"><?php the_field('card_title_one'); ?></h3>
          <p class=" section-bullet-text scale-18-18-16"><?php the_field('card_text_one'); ?></p>
      <div class="cards-bullets-point">


        <div class="cards-point-one">
          <h3 class="bullets-title scale-18-18-16"><?php the_field('cards_bullet_one_title'); ?></h3>
          <p class=" bullets-text fixed-16"><?php the_field('cards_bullet_one_text'); ?></p>

        </div>
        <div class="cards-point-two">
          <h3 class="bullets-title scale-18-18-16"><?php the_field('cards_bullet_two_title'); ?></h3>
          <p class="bullets-text fixed-16"><?php the_field('cards_bullet_two_text'); ?></p>
        </div>

      </div>
     </div>
         <div class="div2-cards">
      <div>
      <!-- div used as a holder for the coverflow -->
        <div id="coverflowWrap"></div>
        <!-- coverflow data -->
        <div id="coverflowData" style="display: none;">

          <!-- category  -->
          <div data-cat="Array by AppLovin">

            <?php if( have_rows('cards_carousel_slides') ): ?>
            <?php while( have_rows('cards_carousel_slides') ): the_row(); ?>
            <ul class="letsee">
            <li data-rl-src=""></li>
            <li data-thumb-src="<?php the_sub_field('cards_slide_image'); ?>" alt="<?php the_sub_field('cards_slide_text'); ?>"></li>
            <li data-thumb-caption="" data-thumb-caption-offset="70">
              <div class="upper-cards">
               <a href="<?php the_sub_field('cards_url'); ?>" class="fwdr3dcov-desc"><?php pll_e('View case study'); ?></a>
             </div>


            </li>
            </ul>
            <?php endwhile; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
       </div>
       </div>


       <div class="card-grid card-grid-2">
                 <div class="div2-cards">
      <div>
      <!-- div used as a holder for the coverflow -->
        <div id="coverflowWrapv2"></div>
        <!-- coverflow data -->
        <div id="coverflowDatav2" style="display: none;">

          <!-- category  -->
          <div data-cat="Array by AppLovin">

            <?php if( have_rows('cards_carousel_slides_two') ): ?>
            <?php while( have_rows('cards_carousel_slides_two') ): the_row(); ?>
            <ul class="letsee">
            <li data-rl-src=""></li>
            <li data-thumb-src="<?php the_sub_field('cards_slide_image_two'); ?>" alt="<?php the_sub_field('cards_slide_text'); ?>"></li>
            <li data-thumb-caption="" data-thumb-caption-offset="70">
              <div class="upper-cards">
               <a href="<?php the_sub_field('cards_url_two'); ?>" class="fwdr3dcov-desc"><?php pll_e('View case study'); ?></a>
             </div>


            </li>
            </ul>
            <?php endwhile; ?>
            <?php endif; ?>

          </div>
        </div>
      </div>
       </div>

     <div class="div1-cards">

      <div class="cards-bullets-point">
        <div class="cards-point">
          <h3 class="section-bullet-title scale-32-24-21"><?php the_field('card_title'); ?></h3>
          <p class="section-bullet-text scale-18-18-16"><?php the_field('card_text'); ?></p>

        </div>

      </div>
     </div>

       </div>














  </div>
</div>
</div>    
