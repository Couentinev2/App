/**
 * Easy Video Player PACKAGED v8.3
 * IMA SDK plugin.
 *
 * @author Tibi - FWDesign [https://webdesign-flash.ro/]
 * Copyright © 2006 All Rights Reserved.
 */
(function (window){
var FWDEVPIMA = function(
		prt
		){
	
		'use strict';

		var _s = this;
		var prototype = FWDEVPIMA.prototype;
		_s.controller_do = prt.controller_do;
		_s.isStopped = true;
		_s.videoScreen_do = prt.videoScreen_do;
		_s.isReady = false;
		_s.isMobile_bl = FWDEVPUtils.isMobile;
	

		//##########################################//
		/* initialize  */
		//##########################################//
		_s.init = function(){
			_s.resizeAndPosition();
		};
		

		/*
		 * Setup IMA.
		 * ------------------------------------------------------
		*/
		_s.setUpIMA = function(){
			google.ima.settings.setDisableCustomPlaybackForIOS10Plus(true);
			if(!_s.adContainer){
				_s.adContainer =  new FWDEVPDO("div");
				_s.adContainer.style().position = 'relative';
				_s.addChild(_s.adContainer);
			
				prt.main_do.addChildAt(_s, prt.main_do.getChildIndex(prt.dClk_do));
				
				_s.video_el = _s.videoScreen_do.video_el;
			}
			
			// Create the ad display container.
			_s.adDisplayContainer = new google.ima.AdDisplayContainer(_s.adContainer.screen, _s.video_el);

			// Create ads loader.
			_s.setVisible(true);
			_s.adsLoader = new google.ima.AdsLoader(_s.adDisplayContainer);
			_s.adsLoader.getSettings().setDisableCustomPlaybackForIOS10Plus(true);
			_s.adsLoader.addEventListener(google.ima.AdsManagerLoadedEvent.Type.ADS_MANAGER_LOADED, _s.onAdsManagerLoaded,false);
			_s.adsLoader.addEventListener(google.ima.AdErrorEvent.Type.AD_ERROR,_s.onAdError,false);

			if(prt._d.autoPlay_bl || prt.isThumbClick_bl){
				prt.hideLargePlayButton();
			}
		}
		
		_s.onAdsManagerLoaded = function(e){
			
			// Get the ads manager.
			var adsRenderingSettings = new google.ima.AdsRenderingSettings();
			adsRenderingSettings.restoreCustomPlaybackStateOnAdBreakComplete = true;
		
			// videoContent should be set to the content video element.
			_s.adsManager = e.getAdsManager(_s.video_el);
			
			// Add listeners to the required events.
			_s.adsManager.addEventListener(google.ima.AdErrorEvent.Type.AD_ERROR, _s.onAdError);
			_s.adsManager.addEventListener(google.ima.AdEvent.Type.LOADED, _s.onAdLoaded);
			_s.adsManager.addEventListener(google.ima.AdEvent.Type.CONTENT_PAUSE_REQUESTED, _s.onContentPauseRequested);
			_s.adsManager.addEventListener(google.ima.AdEvent.Type.CONTENT_RESUME_REQUESTED, _s.onContentResumeRequested);
			_s.adsManager.addEventListener(google.ima.AdEvent.Type.AD_PROGRESS, _s.onContentProgress);
			_s.adsManager.addEventListener(google.ima.AdEvent.Type.STARTED, _s.onContentPlay);
			_s.adsManager.addEventListener(google.ima.AdEvent.Type.RESUMED, _s.onContentPlay);
			_s.adsManager.addEventListener(google.ima.AdEvent.Type.PAUSED, _s.onContentPaused);
			_s.adsManager.addEventListener(google.ima.AdEvent.Type.ALL_ADS_COMPLETED, _s.onAllAdsComplete);
			_s.adsManager.addEventListener(google.ima.AdEvent.Type.CLICK, _s.onClick);
			
			_s.isReady = true;
			if(prt._d.autoPlay_bl){
				prt.setupAPT();
			}
			if(prt.hider) prt.hider.stop();
			if(prt._d.autoPlay_bl || prt.isThumbClick_bl && FWDEVPPassword.isCorect) _s.play(e);
		}
		
		_s.onAdError = function(e){
			console.log('IMA ERROR - ' + e.getError());
			prt.isIMA = false;
			_s.stop();
	
			prt.videoPoster_do.hide(true);
			_s.videoScreen_do.play();
			if(prt.hider) prt.hider.start();		
		}
		
		_s.onAdLoaded = function(e){
			_s.isLinear = e.getAd().isLinear();
			_s.resizeAndPosition();
			if(!_s.isLinear) _s.videoScreen_do.play();
		}
		
		_s.onContentPauseRequested = function(e){
			_s.started = true;
			_s.isLinear = e.getAd().isLinear();
			_s.resizeAndPosition();
			prt.subtitle_do.stopToLoadSubtitle();
			prt.dClk_do.setX(-8000);
			
			if(_s.controller_do){
				_s.controller_do.isIMA = true;
				_s.controller_do.hideAdsLines();
				_s.controller_do.disableAtbButton();
				_s.controller_do.disableRewindButton();
				_s.controller_do.disableSubtitleButton();
				if(window['FWDEVPCC']) FWDEVPCC.disableButton();
				_s.controller_do.disableMainScrubber();
				_s.controller_do.updateHexColorForScrubber(true);
				_s.controller_do.disablePlaybackRateButton();
				_s.controller_do.disableQualtyButton();
			}
			_s.videoScreen_do.pause();
			// This function is where you should setup UI for showing ads (e.g.
			// display ad timer countdown, disable seeking etc.)
			// setupUIForAds();
		}

		_s.onContentResumeRequested = function(){
			_s.started = false;
			_s.isPlaying = false;
			prt.dClk_do.setX(0);
			prt.videoPoster_do.hide(true);
			if(prt.hider) prt.hider.start();
			

			if(_s.controller_do){
				_s.controller_do.isIMA = false;
				_s.controller_do.positionAdsLines(_s.videoScreen_do.video_el.duration);
				_s.controller_do.enableAtbButton();
				_s.controller_do.enableRewindButton();
				if(window['FWDEVPCC']) FWDEVPCC.enableButton();
				if(_s.controller_do.ccBtn_do) _s.controller_do.ccBtn_do.enable();
				_s.controller_do.enableMainScrubber();
				_s.controller_do.updateHexColorForScrubber(false);
				_s.controller_do.enablePlaybackRateButton();
				_s.controller_do.enableQualtyButton();
			}
			
			if(prt._d.subtitlePath_str) prt.loadSubtitle(prt._d.subtitlePath_str);
			_s.cuepointsId_to = setTimeout(_s.setupCuepoints, 500);

			_s.videoScreen_do.play();
			prt.setVolume(prt.volume)
			
		  // This function is where you should ensure that your UI is ready
		  // to play content. It is the responsibility of the Publisher to
		  // implement _s function when necessary.
		  // setupUIForContent();
		}
		
		_s.onContentProgress = function(e){
			var curTime;
			var totalTime;
			var curTimeInSeconds;
			var totalTimeInSeconds;
			var d = e.getAdData();
	
			curTimeInSeconds = Math.round(d.currentTime);
			totalTimeInSeconds = Math.round(d.duration);
			curTime = FWDEVPUtils.formatTime(d.currentTime);
			totalTime = FWDEVPUtils.formatTime(totalTimeInSeconds);
			
			prt.videoScreenUpdateTimeHandler({curTime: curTime, totalTime:totalTime, seconds:curTimeInSeconds, totalTimeInSeconds:totalTimeInSeconds});
			prt.videoScreenUpdateHandler({percent:curTimeInSeconds/totalTimeInSeconds});
		}
		
		_s.onContentPlay = function(e){
			_s.isPlaying = true;
			prt.videoScreenPlayHandler();
			_s.setVisible(true);
		}
		
		_s.onContentPaused = function(e){
			_s.isPlaying = false;
			prt.videoScreenPauseHandler(); 
		}
		
		_s.onAllAdsComplete = function(){
			if(_s.hasPostRoll){
				_s.hasPostRoll = false;
				prt.videoScreenPlayCompleteHandler();
				_s.clearAllCuepointsLines();
			}
			_s.setVisible(false);
		}
		
		_s.onClick = function(){
			_s.pause();
		}
		

		/*
		 * Destroy IMA.
		 * ------------------------------------------------------
		*/
		_s.destroyIMA = function(){
			if(!_s.adsLoader) return;
			if(_s.adDisplayContainer){
				_s.adDisplayContainer.destroy();
			}
			if(_s.adsLoader){
				_s.adsLoader.destroy();
			}
			_s.adsLoader = null;
			
			if(_s.adsManager){
				_s.adsManager.destroy();
			}
			_s.adDisplayContainer = _s.adsManager = null;
		}
		

		/*
		 * Setup quepoints.
		 * ------------------------------------------------------
		*/
		_s.setupCuepoints = function(){
			_s.curpointsData = _s.adsManager.getCuePoints();
			
			if(!_s.curpointsData || !_s.controller_do) return
			
			if(!_s.ads_ar){
				_s.cuePointsIma = _s.curpointsData;
				_s.ads_ar = [];
				
				for(var i=0; i<_s.cuePointsIma.length; i++){
					var cp = _s.cuePointsIma[i];
					if(cp == -1){
						cp = _s.videoScreen_do.video_el.duration; 
						_s.hasPostRoll = true;
					}
					_s.ads_ar[i] = {timeStart:cp}
					
				}
			}
		
			_s.controller_do.setupAdsLines(_s.ads_ar, 0,0, true);
			_s.controller_do.positionAdsLines(_s.videoScreen_do.video_el.duration);
		}
		
		_s.updateCuepointLines = function(t){
			if(_s.started || !_s.curpointsData) return;	
			if(_s.controller_do){
				var ad;
				var line;
				for(var i=0; i<_s.ads_ar.length; i++){
					ad = _s.ads_ar[i];
					line = _s.controller_do.line_ar[i];
					if(t > ad.timeStart && !ad.played_bl){
						ad.played_bl = true;
						_s.controller_do.line_ar[i].setVisible(false);
						_s.controller_do.line_ar[i].isUsed_bl = true;
						break;
					}
				}		
			}
		}

		_s.clearAllCuepointsLines = function(){
			if(_s.controller_do && _s.ads_ar){
				var line;
				for(var i=0; i<_s.ads_ar.length; i++){
					line = _s.controller_do.line_ar[i];
					_s.controller_do.line_ar[i].setVisible(false);
					_s.controller_do.line_ar[i].isUsed_bl = true;
				}		
			}
		}
		

		/*
		 * Resize and position
		 * ------------------------------------------------------
		*/
		_s.resizeAndPosition = function(){
			
			var offsetY = 0;
			if(prt.controller_do){
				if(!_s.isLinear) offsetY = _s.controller_do.sH;
			}
		
			_s.sW = prt.tempVidStageWidth;
			_s.sH = prt.tempVidStageHeight;
			_s.setWidth(_s.sW);
			_s.setHeight(_s.sH);
			_s.setY(-offsetY);
			if(_s.adContainer){
				_s.adContainer.setWidth(_s.sW);
				_s.adContainer.setHeight(_s.sH);
			}
			if(_s.adsManager) _s.adsManager.resize(_s.sW, _s.sH, google.ima.ViewMode.NORMAL);
			if(_s.controller_do){
				_s.controller_do.positionAdsLines(_s.videoScreen_do.video_el.duration);
			}
		}
		 

		/*
		 * Set source.
		 * ------------------------------------------------------
		*/
		_s.setSource = function(source){
			_s.source = source;
			_s.stop();
			_s.setVisible(true);
			_s.videoScreen_do.initVideo();
			_s.videoScreen_do.video_el.load();
			prt.videoScreenUpdateHandler({percent:0});
			prt.dClk_do.setX(-8000);
			if(_s.controller_do){
				_s.controller_do.disablePlaybackRateButton();
			}
			_s.setUpIMA();
	
			var adsRequest = new google.ima.AdsRequest();
			adsRequest.adTagUrl = source;
			
			// Specify the linear and nonlinear slot sizes. This helps the SDK to
			// select the correct creative if multiple are returned.
			adsRequest.linearAdSlotWidth = prt.tempVidStageWidth;
			adsRequest.linearAdSlotHeight = prt.tempVidStageHeight;
			adsRequest.nonLinearAdSlotWidth = prt.tempVidStageWidth;
			adsRequest.nonLinearAdSlotHeight = prt.tempVidStageHeight;
			_s.adsLoader.requestAds(adsRequest);
		}
		

		/*
		 * Control methods.
		 * ------------------------------------------------------
		*/
		_s.play =  function(e){
			if(!_s.isReady) return;
		
			// Initialize the container. Must be done via a user action on mobile devices.
			if(_s.isStopped){
				_s.adDisplayContainer.initialize();
				try{
					// Initialize the ads manager. Ad rules playlist will start at _s time.
					_s.adsManager.init(640, 360, google.ima.ViewMode.NORMAL);

					// Call play to start showing the ad. Single video and overlay ads will
					// start at _s time; the call will be ignored for ad rules.
					_s.resizeAndPosition();
					_s.adsManager.start();
					_s.isStopped = false;
				}catch (adError) {
					console.log(adError);
					// An error may be thrown if there was a problem with the VAST response.
					_s.videoScreen_do.play();
				}
			}else{
				if(_s.started){
					_s.adsManager.resume();
				}else{
					_s.videoScreen_do.play();
				}
			}
		}
		
		_s.pause = function(){
			if(!_s.isReady) return;
			if(_s.started){
				_s.adsManager.pause();
			}else{
				_s.videoScreen_do.pause();
			}
		}
		
		_s.togglePlayPause = function(){
			if(_s.isPlaying){
				_s.pause();
			}else{
				_s.play();
			}
		}
		
		_s.setVolume = function(vol){
			if(vol != undefined) _s.volume = vol;
			if(_s.adsManager){
				_s.adsManager.setVolume(_s.volume);
			}
		};
		
		_s.playPostRoll =  function(){
			_s.adsLoader.contentComplete();
		}
		
		_s.stop = function(){
			if(!_s.adDisplayContainer) return;
			_s.isReady = false;
			_s.started = false;
			_s.isPlaying = false;
			_s.isStopped = true;
			_s.isLinear = true;
			_s.hasPostRoll = false;

			clearTimeout(_s.cuepointsId_to);
			_s.setWidth(0);
			_s.ads_ar = _s.curpointsData = null;
			if(_s.adsManager) _s.adsManager.stop();
			if(_s.controller_do && prt){
				if(_s.controller_do.ccBtn_do) _s.controller_do.ccBtn_do.enable();
				_s.controller_do.updateHexColorForScrubber(false);
				_s.controller_do.createdAdsOnce_bl = false;
				_s.controller_do.hideAdsLines();
				_s.controller_do.resetsAdsLines(true);
			}
			prt.dClk_do.setX(0);
			_s.destroyIMA();
			_s.setVisible(false);
		}
	
		_s.init();
	};
	
	
	/* set prototype */
	FWDEVPIMA.setPrototype = function(){
		FWDEVPIMA.prototype = null;
		FWDEVPIMA.prototype = new FWDEVPDO("div");
	};
	FWDEVPIMA.prototype = null;
	window.FWDEVPIMA = FWDEVPIMA;
}(window));