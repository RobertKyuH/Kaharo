<?php
/* Template Name: wpis-kaharo */ 
?>
<!DOCTYPE html>
<html class="nojs html" lang="en-US">
 <head>

  <meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>
  <meta name="generator" content="2018.1.0.386"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  
  <script type="text/javascript">if( window.jQuery ){ var $ = jQuery.noConflict(); } 
   // Update the 'nojs'/'js' class on the html node
document.documentElement.className = document.documentElement.className.replace(/\bnojs\b/g, 'js');

// Check that all required assets are uploaded and up-to-date
if(typeof Muse == "undefined") window.Muse = {}; window.Muse.assets = {"required":["museutils.js", "museconfig.js", "jquery.musemenu.js", "jquery.musepolyfill.bgsize.js", "jquery.watch.js", "webpro.js", "musewpslideshow.js", "jquery.museoverlay.js", "touchswipe.js", "jquery.museresponsive.js", "require.js", "wpis-kaharo.css"], "outOfDate":[]};
</script>
  
  <link rel="shortcut icon" href="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blog-master-favicon.ico?crc=363172812"/>
  
  <!-- CSS -->
  <link rel="stylesheet" type="text/css" href="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/css/site_global.css?crc=3960078276"/>
  <link rel="stylesheet" type="text/css" href="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/css/master_blog-master.css?crc=157143699"/>
  <link rel="stylesheet" type="text/css" href="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/css/wpis-kaharo.css?crc=350199484" id="pagesheet"/>
  <!-- IE-only CSS -->
  <!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="css/nomq_preview_master_blog-master.css?crc=3801503643"/>
  <link rel="stylesheet" type="text/css" href="css/nomq_wpis-kaharo.css?crc=295048994" id="nomq_pagesheet"/>
  <![endif]-->
  <!-- Other scripts -->
  <script type="text/javascript">if( window.jQuery ){ var $ = jQuery.noConflict(); } 
   var __adobewebfontsappname__ = "muse";
</script>
  <!-- JS includes -->
  <script src="//webfonts.creativecloud.com/bebas-neue:n4:default;raleway:n7:default.js" type="text/javascript">if( window.jQuery ){ var $ = jQuery.noConflict(); } </script>
  <!--[if lt IE 9]>
  <script src="scripts/html5shiv.js?crc=4241844378" type="text/javascript"></script>
  <![endif]-->
    <!--custom head HTML-->
  <style> html, body { max-width: 100%; overflow-x: hidden; } </style>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/smoothscroll/1.4.4/SmoothScroll.min.js">if( window.jQuery ){ var $ = jQuery.noConflict(); } </script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">if( window.jQuery ){ var $ = jQuery.noConflict(); } </script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js">if( window.jQuery ){ var $ = jQuery.noConflict(); } </script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.1/animate.min.css">
  <!--HTML Widget code-->
  
    <script>if( window.jQuery ){ var $ = jQuery.noConflict(); } 
		<?php 	global $post;
            $post_id=$post->ID;

            $post_author = get_the_author_meta ('display_name',$post->post_author);

            $author_id =  get_the_author_meta ('ID',$post->post_author);

						$author_url = get_avatar_url( $author_id );

						?>
     </script>

	 <style>
	.MusexPress-Post-Author-Image {
     border-radius: 50px;
     border-width: 1px;
     border-color: rgb(235,235,235);
		 width: 50px;
		 height: 49px;
 }
	 </style>
    
    <script>if( window.jQuery ){ var $ = jQuery.noConflict(); } 
		<?php global $post;
            $post_id=$post->ID;

            $post_author = get_the_author_meta ('display_name',$post->post_author);

            $author_id =  get_the_author_meta ('ID',$post->post_author);


						?>
     </script>


    
        <script>if( window.jQuery ){ var $ = jQuery.noConflict(); } 
        <?php

        global $post;

        $post_id=$post->ID;

        $post_content =  apply_filters('the_content', get_post_field('post_content', $post_id));
        ?>
        </script>

        <style>


        #page{
            min-height: 0px;
        }

        .MusexPress-Post-Author-Name a{
            color:inherit;
            text-decoration:inherit;
        }

        .MusexPress-Post-Category-List a{
            color:inherit;
            text-decoration:inherit;
        }

        .MusexPress-Post-Tag-List a{
           color:inherit;
           text-decoration:inherit;
        }

        #u22967{
            max-width:100vw;
            min-height: 0px;
        }
        #u22967 div.postContent, #u22967 div.postContent div, #u22967 div.postContent p, #u22967 div.postContent pre, #u22967 div.postContent blockquote, #u22967 div.postContent ul, #u22967 div.postContent li, #u22967 div.postContent a{
            max-width:100%;
            box-sizing:border-box;
            -moz-box-sizing:border-box;
            -webkit-box-sizing:border-box;
        }
        #u22967 div.postContent{
            width:100%;
            max-width:100%;
            padding:0em 0em;
        }

        /*TYPOGRAPHY*/
        #u22967 div.postContent	h1{
        font-size: 2.5em;
        margin-bottom: 0.5em;
        color:  #000000;
        font-family: 'Sofia light';
        font-weight: normal;
        font-style: normal;
        line-height: 1em;
        }
        #u22967 div.postContent	h2{
        font-size: 2em;
        margin-bottom: 0.5em;
        color:  #000000;
        font-family: 'Sofia light';
        font-weight: normal;
        font-style: normal;
        line-height: 1em;
        }
        #u22967 div.postContent	h3{
        font-size: 1.75em;
        margin-bottom: 0.5em;
        color:  #000000;
        font-family: 'Sofia extralight';
        font-weight: normal;
        font-style: normal;
        line-height: 1em;
        }
        #u22967 div.postContent	h4{
        font-size: 1.5em;
        margin-bottom: 0.5em;
        color:  #000000;
        font-family: 'Sofia extralight';
        font-weight: normal;
        font-style: normal;
        line-height: 1em;
        }
        #u22967 div.postContent	h5{
        font-size: 1.25em;
        margin-bottom: 0.5em;
        color:  #000000;
        font-family: 'Sofia extralight';
        font-weight: normal;
        font-style: normal;
        line-height: 1em;
        }
        #u22967 div.postContent	h6{
        font-size: 1em;
        margin-bottom: 0.5em;
        color:  #000000;
        font-family: 'Sofia extralight';
        font-weight: normal;
        font-style: normal;
        line-height: 1em;
        }
        #u22967 div.postContent	p{

        margin-bottom: 0.5em;

        }
        /*TYPOGRAPHY*/

        #u22967 div.postContent strong, #u22967 div.postContent b{
            font-weight:bold;
        }
        #u22967 div.postContent em, #u22967 div.postContent i{
            font-style: italic;
        }
        #u22967 div.postContent del{
            text-decoration: line-through;
        }
        #u22967 div.postContent ul {
            list-style: disc inside none;
            margin: 1em 0px;
        }
        #u22967 div.postContent ol {
            list-style: decimal inside none;
            margin: 1em 0px;
        }
        #u22967 div.postContent ul ul, #u22967 div.postContent ol ul {
            list-style: circle inside none;
            margin-left: 1em;
        }
        #u22967 div.postContent ol ol, #u22967 div.postContent ul ol {
            list-style: lower-latin inside none;
            margin-left: 1em;
        }
        #u22967 div.postContent li{
            list-style:inherit;
            margin: 0.2em 0px;
        }
        #u22967 div.postContent pre{
            border:solid 1px #BBBBBB;
            margin:1em 0px;
            margin-left: 0;
            margin-right: 0;
            padding:1em;
            background:#EEEEEE;
            color:#777777;
        }
        #u22967 div.postContent blockquote{
            border-left:solid 3px #333333;
            margin:1em 0px;
            margin-left: 0;
            margin-right: 0;
            padding:1em;
            font-style: italic;
            font-size: 1.2em;
            background:#FFFFFF;
            color:#555555;
        }
        #u22967 div.postContent img{
            border-style: none;
            max-width: 100%;
            vertical-align: bottom;
            height: auto;
        }
        #u22967 div.postContent .alignleft{
            display: block;
            margin-left:0;
            margin-right:15px;
            text-align:left;
            float:left;
        }
        #u22967 div.postContent .aligncenter {
            text-align: center;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        #u22967 div.postContent .alignright{
            display: block;
            margin-right:0;
            margin-left:15px;
            text-align:right;
            float:right;
        }
        #u22967 div.postContent img:after {
            content: '';
            display: block;
            clear: both;
        }
        #u22967 div.postContent hr{
            max-width: 90%;
            border:none;
            border-top-style: solid;
            border-width: 1px;
            border-color: #CCCCCC;
            margin: 0.5em 0px;
            margin-left: 0;
            margin-right: 0;
        }
        </style>

        <style>
            .alignleft {
                float: left;
                margin: 0.375em 1.75em 1.75em 0;
            }

            .alignright {
                float: right;
                margin: 0.375em 0 1.75em 1.75em;
            }

            .aligncenter {
                clear: both;
                display: block;
                margin: 0 auto 1.75em;
            }

            blockquote.alignleft {
                margin: 0.3157894737em 1.4736842105em 1.473684211em 0;
            }

            blockquote.alignright {
                margin: 0.3157894737em 0 1.473684211em 1.4736842105em;
            }

            blockquote.aligncenter {
                margin-bottom: 1.473684211em;
            }
        </style>

        <style>
            .wp-caption {
                margin-bottom: 1.75em;
                max-width: 100%;
            }

            .wp-caption img[class*="wp-image-"] {
                display: block;
                margin: 0 !important;
            }

            .wp-caption .wp-caption-text {
                font-style: italic;
                line-height: 1.5;
                padding-top: 0.5em;
            }
        </style>

        <style>
            #u22967 .wp-caption .wp-caption-text {
                color: #686868;
                font-size: 13px;
            }
        </style>

		<style>
			.gallery {
                margin-bottom: 1.75em;
			}

			.gallery * {
    			-webkit-box-sizing: border-box;
    			-moz-box-sizing: border-box;
    			box-sizing: border-box;
			}

            .gallery-item {
                display: inline-block;
                margin: 0;
                max-width: 33.33%;
                padding: 0 1% 2%;
                text-align: center;
                vertical-align: top;
                width: 100%;
            }

			.gallery-columns-1 .gallery-item {
                max-width: 100%;
			}

			.gallery-columns-2 .gallery-item {
                max-width: 50%;
			}

			.gallery-columns-4 .gallery-item {
                max-width: 25%;
			}

			.gallery-columns-5 .gallery-item {
                max-width: 20%;
			}

			.gallery-columns-6 .gallery-item {
                max-width: 16.66%;
			}

			.gallery-columns-7 .gallery-item {
                max-width: 14.28%;
			}

			.gallery-columns-8 .gallery-item {
                max-width: 12.5%;
			}

			.gallery-columns-9 .gallery-item {
                max-width: 11.11%;
			}

			.gallery-icon img {
                display: block;
                margin: 0 auto !important;
			}

			.gallery-caption {
    			display: block;
    			font-style: italic;
    			line-height: 1.5;
    			padding-top: 0.5em;
			}

			.gallery-columns-6 .gallery-caption,
			.gallery-columns-7 .gallery-caption,
			.gallery-columns-8 .gallery-caption,
			.gallery-columns-9 .gallery-caption {
			         display: none;
			}
		</style>

        <style>
            #u22967 .gallery-caption {
                color: #686868;
                font-size: 13px;
            }
        </style>

        <style>
            blockquote::before,
            blockquote::after {
                content: '';
                display: table;
            }

            blockquote::after {
                clear: both;
            }
        </style>

		<style>
			.mfp-bg,.mfp-wrap{position:fixed;left:0;top:0}.mfp-bg,.mfp-container,.mfp-wrap{height:100%;width:100%}.mfp-arrow:after,.mfp-arrow:before,.mfp-container:before,.mfp-figure:after{content:''}.mfp-bg{z-index:1042;overflow:hidden;background:#0b0b0b;opacity:.8}.mfp-wrap{z-index:1043;outline:0!important;-webkit-backface-visibility:hidden}.mfp-container{text-align:center;position:absolute;left:0;top:0;padding:0 8px;box-sizing:border-box}.mfp-container:before{display:inline-block;height:100%;vertical-align:middle}.mfp-align-top .mfp-container:before{display:none}.mfp-content{position:relative;display:inline-block;vertical-align:middle;margin:0 auto;text-align:left;z-index:1045}.mfp-ajax-holder .mfp-content,.mfp-inline-holder .mfp-content{width:100%;cursor:auto}.mfp-ajax-cur{cursor:progress}.mfp-zoom-out-cur,.mfp-zoom-out-cur .mfp-image-holder .mfp-close{cursor:-moz-zoom-out;cursor:-webkit-zoom-out;cursor:zoom-out}.mfp-zoom{cursor:pointer;cursor:-webkit-zoom-in;cursor:-moz-zoom-in;cursor:zoom-in}.mfp-auto-cursor .mfp-content{cursor:auto}.mfp-arrow,.mfp-close,.mfp-counter,.mfp-preloader{-webkit-user-select:none;-moz-user-select:none;user-select:none}.mfp-loading.mfp-figure{display:none}.mfp-hide{display:none!important}.mfp-preloader{color:#CCC;position:absolute;top:50%;width:auto;text-align:center;margin-top:-.8em;left:8px;right:8px;z-index:1044}.mfp-preloader a{color:#CCC}.mfp-close,.mfp-preloader a:hover{color:#FFF}.mfp-s-error .mfp-content,.mfp-s-ready .mfp-preloader{display:none}button.mfp-arrow,button.mfp-close{overflow:visible;cursor:pointer;background:0 0;border:0;-webkit-appearance:none;display:block;outline:0;padding:0;z-index:1046;box-shadow:none;touch-action:manipulation}.mfp-figure:after,.mfp-iframe-scaler iframe{box-shadow:0 0 8px rgba(0,0,0,.6);position:absolute;left:0}button::-moz-focus-inner{padding:0;border:0}.mfp-close{width:44px;height:44px;line-height:44px;position:absolute;right:0;top:0;text-decoration:none;text-align:center;opacity:.65;padding:0 0 18px 10px;font-style:normal;font-size:28px;font-family:Arial,Baskerville,monospace}.mfp-close:focus,.mfp-close:hover{opacity:1}.mfp-close:active{top:1px}.mfp-close-btn-in .mfp-close{color:#333}.mfp-iframe-holder .mfp-close,.mfp-image-holder .mfp-close{color:#FFF;right:-6px;text-align:right;padding-right:6px;width:100%}.mfp-counter{position:absolute;top:0;right:0;color:#CCC;font-size:12px;line-height:18px;white-space:nowrap}.mfp-figure,img.mfp-img{line-height:0}.mfp-arrow{position:absolute;opacity:.65;margin:-55px 0 0;top:50%;padding:0;width:90px;height:110px;-webkit-tap-highlight-color:transparent}.mfp-arrow:active{margin-top:-54px}.mfp-arrow:focus,.mfp-arrow:hover{opacity:1}.mfp-arrow:after,.mfp-arrow:before{display:block;width:0;height:0;position:absolute;left:0;top:0;margin-top:35px;margin-left:35px;border:inset transparent}.mfp-arrow:after{border-top-width:13px;border-bottom-width:13px;top:8px}.mfp-arrow:before{border-top-width:21px;border-bottom-width:21px;opacity:.7}.mfp-arrow-left{left:0}.mfp-arrow-left:after{border-right:17px solid #FFF;margin-left:31px}.mfp-arrow-left:before{margin-left:25px;border-right:27px solid #3F3F3F}.mfp-arrow-right{right:0}.mfp-arrow-right:after{border-left:17px solid #FFF;margin-left:39px}.mfp-arrow-right:before{border-left:27px solid #3F3F3F}.mfp-iframe-holder{padding-top:40px;padding-bottom:40px}.mfp-iframe-holder .mfp-content{line-height:0;width:100%;max-width:900px}.mfp-image-holder .mfp-content,img.mfp-img{max-width:100%}.mfp-iframe-holder .mfp-close{top:-40px}.mfp-iframe-scaler{width:100%;height:0;overflow:hidden;padding-top:56.25%}.mfp-iframe-scaler iframe{display:block;top:0;width:100%;height:100%;background:#000}.mfp-figure:after,img.mfp-img{width:auto;height:auto;display:block}img.mfp-img{box-sizing:border-box;padding:40px 0;margin:0 auto}.mfp-figure:after{top:40px;bottom:40px;right:0;z-index:-1;background:#444}.mfp-figure small{color:#BDBDBD;display:block;font-size:12px;line-height:14px}.mfp-figure figure{margin:0}.mfp-bottom-bar{margin-top:-36px;position:absolute;top:100%;left:0;width:100%;cursor:auto}.mfp-title{text-align:left;line-height:18px;color:#F3F3F3;word-wrap:break-word;padding-right:36px}.mfp-gallery .mfp-image-holder .mfp-figure{cursor:pointer}@media screen and (max-width:800px) and (orientation:landscape),screen and (max-height:300px){.mfp-img-mobile .mfp-image-holder{padding-left:0;padding-right:0}.mfp-img-mobile img.mfp-img{padding:0}.mfp-img-mobile .mfp-figure:after{top:0;bottom:0}.mfp-img-mobile .mfp-figure small{display:inline;margin-left:5px}.mfp-img-mobile .mfp-bottom-bar{background:rgba(0,0,0,.6);bottom:0;margin:0;top:auto;padding:3px 5px;position:fixed;box-sizing:border-box}.mfp-img-mobile .mfp-bottom-bar:empty{padding:0}.mfp-img-mobile .mfp-counter{right:5px;top:3px}.mfp-img-mobile .mfp-close{top:0;right:0;width:35px;height:35px;line-height:35px;background:rgba(0,0,0,.6);position:fixed;text-align:center;padding:0}}@media all and (max-width:900px){.mfp-arrow{-webkit-transform:scale(.75);transform:scale(.75)}.mfp-arrow-left{-webkit-transform-origin:0;transform-origin:0}.mfp-arrow-right{-webkit-transform-origin:100%;transform-origin:100%}.mfp-container{padding-left:6px;padding-right:6px}}
		</style>

		<style>
            .mfp-bg.u22967 {
                background: #0B0B0B;
                opacity: .8;
            }

			.mfp-wrap.u22967 .mfp-arrow::before {
				content: none;
			}
		</style>

        <style>
            .wp-audio-shortcode,
            .wp-video,
            .wp-playlist.wp-audio-playlist {
            	margin-top: 0;
            	margin-bottom: 1.75em !important;
            }

            .wp-playlist.wp-audio-playlist {
            	padding-bottom: 0;
            }

            .wp-playlist .wp-playlist-tracks {
            	margin-top: 0;
            }

            .wp-playlist-item .wp-playlist-caption {
            	border-bottom: 0;
            	padding: .8em 0;
            }

            .wp-playlist-caption {
                max-width: 88% !important;
            }

            .wp-playlist-caption:hover {
                text-decoration: none !important;
            }

            .wp-playlist-item .wp-playlist-item-length {
            	top: .8em;
            }

            .wp-playlist .wp-playlist-current-item img {
                border: 0 !important;
                height: auto !important;
                margin-right: 10px !important;
                max-width: 60px !important;
            }

            .wp-playlist .mejs-container {
                width: 100% !important;
            }

            .wp-playlist-dark .wp-playlist-caption {
                color: #dedede !important;
            }

            .mejs-container .mejs-controls .mejs-time {
                -moz-box-sizing: content-box !important;
                -webkit-box-sizing: content-box !important;
                box-sizing: content-box !important;
            }

            .wp-audio-shortcode {
                visibility: visible !important;
            }

            #u22967 .wp-audio-shortcode {
                width: 350px !important;
            }

            #u22967 .wp-playlist.wp-audio-playlist {
                background-color: #FFFFFF;
                border-color: #CCCCCC;
                border-width: 1px;
                width: 350px;
            }

            #u22967 .wp-playlist.wp-audio-playlist .wp-playlist-playing {
                background-color: #FFFFFF;
            }

            #u22967 .wp-audio-shortcode.mejs-audio .mejs-controls {
                background-color: #222222;
            }

            #u22967 .wp-audio-shortcode.mejs-audio .mejs-currenttime {
                color: #FFFFFF;
            }

            #u22967 .wp-audio-shortcode.mejs-audio .mejs-duration {
                color: #FFFFFF;
            }

            #u22967 .wp-audio-shortcode.mejs-audio .mejs-time-total {
                background-color: #6B6B6B;
            }

            #u22967 .wp-audio-shortcode.mejs-audio .mejs-time-loaded {
                background-color: #FFFFFF;
            }

            #u22967 .wp-audio-shortcode.mejs-audio .mejs-time-current {
                background-color: #0073AA;
            }

            #u22967 .wp-audio-shortcode.mejs-audio .mejs-horizontal-volume-total {
                background-color: #6B6B6B;
            }

            #u22967 .wp-audio-shortcode.mejs-audio .mejs-horizontal-volume-current {
                background-color: #FFFFFF;
            }

            #u22967 .wp-audio-playlist .mejs-audio .mejs-controls {
                background-color: #222222;
            }

            #u22967 .wp-audio-playlist .mejs-audio .mejs-currenttime {
                color: #FFFFFF;
            }

            #u22967 .wp-audio-playlist .mejs-audio .mejs-duration {
                color: #FFFFFF;
            }

            #u22967 .wp-audio-playlist .mejs-audio .mejs-time-total {
                background-color: #6B6B6B;
            }

            #u22967 .wp-audio-playlist .mejs-audio .mejs-time-loaded {
                background-color: #FFFFFF;
            }

            #u22967 .wp-audio-playlist .mejs-audio .mejs-time-current {
                background-color: #0073AA;
            }

            #u22967 .wp-audio-playlist .mejs-audio .mejs-horizontal-volume-total {
                background-color: #6B6B6B;
            }

            #u22967 .wp-audio-playlist .mejs-audio .mejs-horizontal-volume-current {
                background-color: #FFFFFF;
            }

            #u22967 .wp-video {
                width: 100%px !important;
                width: 100% !important;
            }

            #u22967 .wp-video .mejs-video .mejs-controls {
                background-color: #222222;
            }

            #u22967 .wp-video .mejs-video .mejs-currenttime {
                color: #FFFFFF;
            }

            #u22967 .wp-video .mejs-video .mejs-duration {
                color: #FFFFFF;
            }

            #u22967 .wp-video .mejs-video .mejs-time-total {
                background-color: #6B6B6B;
            }

            #u22967 .wp-video .mejs-video .mejs-time-loaded {
                background-color: #FFFFFF;
            }

            #u22967 .wp-video .mejs-video .mejs-time-current {
                background-color: #0073AA;
            }

            #u22967 .wp-video-playlist {
                width: 350px;
            }

            #u22967 .wp-video-playlist,
            #u22967 .wp-video-playlist .wp-playlist-playing {
                background-color: #FFFFFF;
            }

            #u22967 .wp-video-playlist .mejs-video .mejs-controls {
                background-color: #222222;
            }

            #u22967 .wp-video-playlist .mejs-video .mejs-currenttime {
                color: #FFFFFF;
            }

            #u22967 .wp-video-playlist .mejs-video .mejs-duration {
                color: #FFFFFF;
            }

            #u22967 .wp-video-playlist .mejs-video .mejs-time-total {
                background-color: #6B6B6B;
            }

            #u22967 .wp-video-playlist .mejs-video .mejs-time-loaded {
                background-color: #FFFFFF;
            }

            #u22967 .wp-video-playlist .mejs-video .mejs-time-current {
                background-color: #0073AA;
            }

            .wp-video {
                height: auto;
            	max-width: 100% !important;
            }

            video.wp-video-shortcode {
                display: inline-block;
            	max-width: 100%;
            }
        </style>

        <style>
            #u22967 form,
            #u22967 form * {
                box-sizing: border-box !important;
            }

            #u22967 {
                height: auto !important;
            }

            #u22967 form input[type="date"],
            #u22967 form input[type="email"],
            #u22967 form input[type="number"],
            #u22967 form input[type="password"],
            #u22967 form input[type="tel"],
            #u22967 form input[type="text"],
            #u22967 form input[type="url"],
            #u22967 form select,
            #u22967 form textarea {
                background-clip: padding-box !important;
                background-color: #FFFFFF !important;
                background-image: none !important;
                border: 1px solid #D9D9D9 !important;
                border-radius: 3px !important;
                color: #55595C !important;
                display: block !important;
                font-size: 1rem !important;
                line-height: 1.25 !important;
                margin-bottom: 1rem !important;
                padding: .5rem .75rem !important;
                width: 100% !important;

                -webkit-background-clip: padding-box !important;
            }

            #u22967 form input[type="date"]:focus,
            #u22967 form input[type="email"]:focus,
            #u22967 form input[type="number"]:focus,
            #u22967 form input[type="password"]:focus,
            #u22967 form input[type="tel"]:focus,
            #u22967 form input[type="text"]:focus,
            #u22967 form input[type="url"]:focus,
            #u22967 form select:focus,
            #u22967 form textarea:focus {
                background-color: #FFFFFF !important;
                border-color: #66AFE9 !important;
                color: #55595C !important;
                outline: 0 !important;
            }

            #u22967 form input[type="file"],
            #u22967 form input[type="range"] {
                display: block !important;
            }

            #u22967 form button,
            #u22967 form input[type="submit"] {
                background-color: #0275D8;
                border: 1px solid transparent !important;
                border-color: #0275D8 !important;
                border-radius: 3px !important;
                color: #FFFFFF !important;
                cursor: pointer !important;
                display: inline-block !important;
                font-size: 1rem !important;
                font-weight: 400 !important;
                line-height: 1.25 !important;
                margin-bottom: 1rem !important;
                padding: .5rem 1rem !important;
                text-align: center !important;
                user-select: none !important;
                vertical-align: middle !important;
                white-space: nowrap !important;

                -webkit-user-select: none !important;
                -moz-user-select: none !important;
                -ms-user-select: none !important;
            }

            #u22967 form button:focus,
            #u22967 form button:hover,
            #u22967 form input[type="submit"]:focus,
            #u22967 form input[type="submit"]:hover {
                text-decoration: none !important;
            }

            #u22967 form button:active,
            #u22967 form button:focus,
            #u22967 form button:hover,
            #u22967 form input[type="submit"]:active,
            #u22967 form input[type="submit"]:focus,
            #u22967 form input[type="submit"]:hover {
                background-color: #025AA5 !important;
                border-color: #01549B !important;
                color: #FFFFFF !important;
            }

            #u22967 form button:active,
            #u22967 form input[type="submit"]:active {
                background-image: none !important;
                outline: 0 !important;
            }

            #u22967 form input[type="checkbox"] {
                margin-bottom: .75rem !important;
                -webkit-appearance: checkbox !important;
            }

            #u22967 form label {
                display: block !important;
                margin-bottom: .5rem !important;
            }

            #u22967 form textarea {
                resize: vertical !important;
            }

            .MusexPress-Post-Navigation{
                clear: both;
                margin: auto;
            }
        </style>

        

                        <style>
                            #u22967 .wp-video-playlist {
                                border-color: #CCCCCC;
                                border-width: 1px;
                            }
                        </style>
                        

                        <style>
                            #u22967 .wp-audio-playlist .wp-playlist-current-item .wp-playlist-item-title {
                                color: #333333;
                                font-size: 14px;
                            }
                        </style>
                        

                        <style>
                            .mfp-wrap.u22967 .mfp-arrow-left::after {
                                border-right-color: #FFFFFF;
                            }
                            .mfp-wrap.u22967 .mfp-arrow-right::after {
                                border-left-color: #FFFFFF;
                            }
                        </style>
                        

                        <style>
                            .mfp-wrap.u22967 .mfp-counter {
                                color: #CCCCCC;
                            }
                        </style>
                        

                        <style>
                            .mfp-wrap.u22967 .mfp-close {
                                color: #CCCCCC;
                            }
                        </style>
                        

                        <style>
                            #u22967 .wp-audio-playlist .wp-playlist-current-item .wp-playlist-item-album {
                                color: #333333;
                                font-size: 14px;
                            }
                        </style>
                        

                        <style>
                            #u22967 .wp-audio-playlist .wp-playlist-current-item .wp-playlist-item-artist {
                                color: #333333;
                                font-size: 14px;
                            }
                        </style>
                        

                        <style>
                            #u22967 .wp-video-playlist .wp-playlist-item {
                                border-color: #CCCCCC;
                                border-bottom-width: 1px;
                            }

                            #u22967 .wp-video-playlist .wp-playlist-item:last-child {
                                border: none;
                            }
                        </style>
                        

                        <style>
                            #u22967 .wp-audio-playlist .wp-playlist-item {
                                border-color: #CCCCCC;
                                border-bottom-width: 1px;
                            }

                            #u22967 .wp-audio-playlist .wp-playlist-item:last-child {
                                border: none;
                            }
                        </style>
                        

	<style>



		#u22959{
			max-width:100vw;
			min-height:0;
      height: auto;
		}
		#u22959 div.mxPostComments, #u22959 div.mxPostComments div, #u22959 div.mxPostComments p, #u22959 div.mxPostComments img{
			max-width:100%;
			box-sizing:border-box;
			-moz-box-sizing:border-box;
			-webkit-box-sizing:border-box;
		}
		#u22959 div.mxPostComments{
			width:100%;
			max-width:100%;
			padding:0em 0em;
		}
		#u22959 div.mxPostComments ol{
			display:block;
			list-style: none;
			margin: 0;
			padding: 0;
		}
		#u22959 div.mxPostComments li{
			list-style: none;
			display: list-item;
			text-align: -webkit-match-parent;
		}
		#u22959 div.mxPostComments article{
			border-top: 1px solid #D1D1D1;
			padding: 1.8em 0;
			text-align:left;
		}
		#u22959 div.mxPostComments footer{
			display:block;
		}
		#u22959 div.mxPostComments .mxAuthor{
			display:block;
			color: #1A1A1A;
			margin-bottom: 0em;
		}
		#u22959 div.mxPostComments .avatar{
			border-radius: 50%;
			float: left;
			width: 45px;
			height: auto;
			max-width: 100%;
			margin-right: 0.9em;
			position: relative;
			vertical-align: middle;
			border:0;
		}
		#u22959 div.mxPostComments b.fn{
			vertical-align: middle;
			clear: both;
			font-size:1.2em;
		}
		#u22959 div.mxPostComments a{
			color: #FF6D2C;
			text-decoration: none;
		}
		#u22959 div.mxPostComments a:hover{
			color: #333333;
			text-decoration: none;
		}
		#u22959 div.mxPostComments .mxMetadata{
			display:block;
			margin-bottom: 0.5em;
			color: #686868;
			font-size: 0.9em;
		}
		#u22959 div.mxPostComments .mxCommentContent{
			display:block;
			box-sizing:border-box;
			-moz-box-sizing:border-box;
			-webkit-box-sizing:border-box;

			padding:0em;
			font-size:1em;
			color:#1A1A1A;
			background:#FFFFFF;
			border-radius:0px;
		}
		#u22959 div.mxPostComments .mxCommentContent:after {
			clear: both;
		}
		#u22959 div.mxPostComments .mxCommentContent b, #u22959 div.mxPostComments .mxCommentContent strong{
			font-weight:bold;
		}
		</style>

                <style>
	 	#u22959 div.mxPostCommentForm, #u22959 div.mxPostCommentForm form, #u22959 div.mxPostCommentForm input, #u22959 div.mxPostCommentForm textarea, #u22959 div.mxPostCommentForm p{
			max-width:100%;

			box-sizing:border-box;
			-moz-box-sizing:border-box;
			-webkit-box-sizing:border-box;
		}
		#u22959 div.mxPostCommentForm{
			width:100%;
			max-width:100%;
			padding:0em 0em;
		}
		#u22959 div.mxPostCommentForm .mx-comment-notes{
			display:{param_displayCommentNotes};
			font-size:{param_commentNotesSieze}em;
			margin-bottom:{param_commentNotesMarginBottom}em;
			color:#{param_commentNotesColor};
		}
		#u22959 div.mxPostCommentForm input, #u22959 div.mxPostCommentForm textarea{
			display:block;
			width:100%;
			max-width:100%;
			font-size:1em;
			color:#1A1A1A;
			background:#F4F4F4;
			margin-bottom:0.5em;
			padding:1em;
			border:solid 1px #DBDBDB;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px;

			box-sizing:border-box;
			-moz-box-sizing:border-box;
			-webkit-box-sizing:border-box;
		}
		#u22959 div.mxPostCommentForm label{
			display:inline-block;
			font-size:0.9em;
			color:#333333;
			margin-bottom:0em;
		}
		#u22959 div.mxPostCommentForm .submit{
			width:auto;
			display:block;
			margin:0 auto;
			margin-top:1em;
			cursor:pointer;

			font-size:1em;
			color:#FFFFFF;
			font-weight:bold;
			background:#FF6D2C;
			padding:1em;
			border:solid 0px #007ACC;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px;
		}
		#u22959 div.mxPostCommentForm .submit:hover{
			color:#FFFFFF;
			background:#005A97;
		}
		#u22959 div.mxPostCommentForm .mx_comment_submit_msg{
			width:100%;
			max-width:100%;

			margin:{param_confirmationMargin}em 0;

			text-align:center;
			font-size:{param_confirmationFontSize}em;
			color:#{param_confirmationFontColor};
			font-weight:{param_confirmationFontWeight};
			background:#{param_confirmationBg};
			padding:{param_confirmationInnerSpace}em;
			border:{param_confirmationBorderStyle} {param_confirmationBorderSize}px #{param_confirmationBorderColor};
			-webkit-border-radius: {param_confirmationBorderRadius}px;
			-moz-border-radius: {param_confirmationBorderRadius}px;
			border-radius: {param_confirmationBorderRadius}px;

			box-sizing:border-box;
			-moz-box-sizing:border-box;
			-webkit-box-sizing:border-box;
		}
	 </style>

    
 <?php
wp_enqueue_script("jquery");
wp_head();
?></head>
 <body class=" <?php echo implode(" ", get_body_class()); ?>"><script>if( window.jQuery ){ var $ = jQuery.noConflict(); }</script>

  <div class="breakpoint active" id="bp_infinity" data-min-width="1201"><!-- responsive breakpoint node -->
   <div class="clearfix" id="page"><!-- group -->
    <div class="clearfix grpelem" id="pu18610"><!-- group -->
     <div class="browser_width shared_content" id="u18610-bw" data-content-guid="u18610-bw_content">
      <div id="u18610"><!-- simple frame --></div>
     </div>
     <nav class="MenuBar clearfix" id="menuu18560"><!-- horizontal box -->
      <div class="MenuItemContainer clearfix grpelem" id="u18561"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u18564" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#home" data-href="anchor:U82:U4919"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u18566" alt="HOME" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u18568"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u18569" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#about" data-href="anchor:U82:U4926"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u18572" alt="O NAS" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u18603"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u18604" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#services" data-href="anchor:U82:U4933"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u18607" alt="KOLEJNA WYPRAWA" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u18582"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u18583" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#story" data-href="anchor:U82:U4947"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u18584" alt="HISTORIA" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u18596"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u18597" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#work" data-href="anchor:U82:U4954"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u18598" alt="POPRZEDNIA WYPRAWA" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u18589"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u18592" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#blog" data-href="anchor:U82:U4968"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u18593" alt="BLOG" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem" id="u18575"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem" id="u18578" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#contact" data-href="anchor:U82:U4975"><!-- horizontal box --><img class="MenuItemLabel NoWrap grpelem" id="u18581" alt="KONTAKT" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
      </div>
     </nav>
     <div class="clip_frame shared_content" id="u18611" data-content-guid="u18611_content"><!-- svg -->
      <img class="svg temp_no_img_src" id="u18612" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/logo-1.svg?crc=3908199870" width="55" height="65" alt="" data-mu-svgfallback="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/logo%201_poster_.png?crc=4094796956" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
     </div>
    </div>
    <div class="clearfix grpelem" id="ppu18553"><!-- column -->
     <div class="clearfix colelem shared_content" id="pu18553" data-content-guid="pu18553_content"><!-- group -->
      <div class="grpelem" id="u18553"><!-- custom html -->
       <div id="fb-root"></div>
<script>if( window.jQuery ){ var $ = jQuery.noConflict(); } (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
      </div>
      <div class="browser_width grpelem" id="u19389-bw">
       <div class="museBGSize" id="u19389"><!-- group -->
        <div class="clearfix" id="u19389_align_to_page">
         <!-- m_editable region-id="editable-static-tag-U19386-BP_infinity" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
         <div class="effect clearfix grpelem" id="u19386-9" data-muse-uid="U19386" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><!-- content -->
          <h3 id="u19386-3"><span id="u19386">nasz</span><span id="u19386-2"></span></h3>
          <h3 id="u19386-5">BLOG</h3>
          <h3 id="u19386-7">POST</h3>
         </div>
         <!-- /m_editable -->
        </div>
       </div>
      </div>
     </div>
     <div class="clearfix colelem shared_content" id="pu22957" data-content-guid="pu22957_content"><!-- group -->
      <div class="browser_width grpelem" id="u22957-bw">
       <div class="museBGSize " id="u22957"style="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>"><!-- simple frame --></div>
      </div>
      <div class="browser_width grpelem" id="u22958-bw">
       <div class="rgba-background" id="u22958"><!-- group -->
        <div class="clearfix" id="u22958_align_to_page">
         <!-- m_editable region-id="editable-static-tag-U23553-BP_infinity" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
         <div class="MusexPress-Post-Title clearfix grpelem" id="u23553-4" data-muse-uid="U23553" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><!-- content -->
          <h1 id="u23553-2"><?php echo get_the_title(); ?></h1>
         </div>
         <!-- /m_editable -->
        </div>
       </div>
      </div>
     </div>
     <div class="clearfix colelem shared_content" id="pu22965" data-content-guid="pu22965_content"><!-- group -->
      <div class="size_fixed grpelem shared_content" id="u22965" data-content-guid="u22965_content"><!-- custom html -->
       
	<a href="<?php echo get_author_posts_url( $author_id ); ?>"><div class="MusexPress-Post-Author-Image" style="background: url(<?php echo $author_url; ?>) no-repeat center center; background-size: cover;" ></div></a>

      </div>
      <div class="size_fixed grpelem shared_content" id="u22966" data-content-guid="u22966_content"><!-- custom html -->
       
	<a  href="<?php echo get_author_posts_url( $author_id ); ?>"><p><?php echo $post_author; ?></p></a>

      </div>
      <!-- m_editable region-id="editable-static-tag-U22961-BP_infinity" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
      <div class="MusexPress-Post-Date clearfix grpelem shared_content" id="u22961-4" data-muse-uid="U22961" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc" data-content-guid="u22961-4_content"><!-- content -->
       <p><?php echo get_the_date( "", '', '', true ); ?></p>
      </div>
      <!-- /m_editable -->
     </div>
     <!-- m_editable region-id="editable-static-tag-U23556-BP_infinity" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <div class="MusexPress-Post-Category-List ts-Default-Link-Style--copy clearfix colelem shared_content" id="u23556-4" data-muse-uid="U23556" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc" data-content-guid="u23556-4_content"><?php echo get_the_category_list(" - "); ?></div>
     <!-- /m_editable -->
     <div class="size_fixed colelem shared_content" id="u22967" data-content-guid="u22967_content"><!-- custom html -->
      
        <div class="postContent"><?php echo $post_content; ?></div>
        
     </div>
     <div class="clearfix colelem shared_content" id="u22968" data-content-guid="u22968_content"><!-- group -->
      <div class="rounded-corners MusexPress-Post-Navigation clearfix grpelem" id="u22970"><!-- group -->
       <!-- m_editable region-id="editable-static-tag-U22971-BP_infinity" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
       <?php $prev = get_permalink(get_adjacent_post(false,"",false)); if ($prev != get_permalink()) { ?><a href="<?php echo $prev; ?>"><div class="MusexPress-Post-Prev-Link clearfix grpelem" id="u22971-4" data-muse-uid="U22971" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><!-- content -->
        <p id="u22971-2">Previous</p>
       </div></a><?php } ?>
       <!-- /m_editable -->
       <!-- m_editable region-id="editable-static-tag-U22969-BP_infinity" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
       <?php $next = get_permalink(get_adjacent_post(false,"",true)); if ($next != get_permalink()) { ?><a href="<?php echo $next; ?>"><div class="MusexPress-Post-Next-Link clearfix grpelem" id="u22969-4" data-muse-uid="U22969" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><!-- content -->
        <p id="u22969-2">Next</p>
       </div></a><?php } ?>
       <!-- /m_editable -->
      </div>
     </div>
     <!-- m_editable region-id="editable-static-tag-U23557-BP_infinity" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <div class="MusexPress-Post-Tag-List clearfix colelem shared_content" id="u23557-4" data-muse-uid="U23557" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc" data-content-guid="u23557-4_content"><?php echo get_the_tag_list(""," , "); ?></div>
     <!-- /m_editable -->
     <!-- m_editable region-id="editable-static-tag-U23555-BP_infinity" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <div class="MusexPress-Post-Comments clearfix colelem shared_content" id="u23555-4" data-muse-uid="U23555" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc" data-content-guid="u23555-4_content"><!-- content -->
      <p><?php if(comments_open()) {
          echo get_comments_number();
           }
           else
             echo __("Comments are closed.");
           ?></p>
     </div>
     <!-- /m_editable -->
     <div class="size_fixed colelem shared_content" id="u22959" data-content-guid="u22959_content"><!-- custom html -->
      
<div class="mxPostComments mxPostCommentForm">
        <?php comments_template(); ?>
</div>

     </div>
     <div class="colelem shared_content" id="u24121" data-content-guid="u24121_content"><!-- custom html -->
      <iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2FKa-Ha-Ro-1663516287033207%2F%3Fnotif_id%3D1508842835960610%26notif_t%3Dpage_fan&width=78&height=65&layout=box_count&size=large&show_faces=true&appId=333211160470273" width="78" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
     </div>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18566-a.png?crc=220961419" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18572-a.png?crc=158333931" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18607-a.png?crc=244290495" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18584-a.png?crc=3922044352" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18598-a.png?crc=71723526" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18593-a.png?crc=4013252567" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18581-a.png?crc=202910839" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_1200" data-min-width="1001" data-max-width="1200"><!-- responsive breakpoint node -->
   <div class="clearfix temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="ppu18553"><!-- column -->
     <span class="clearfix colelem placeholder" data-placeholder-for="pu18553_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="pu22957_content"><!-- placeholder node --></span>
     <div class="clearfix colelem" id="pu22961-4"><!-- group -->
      <!-- m_editable region-id="editable-static-tag-U22961-BP_1200" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
      <span class="MusexPress-Post-Date clearfix grpelem placeholder" data-placeholder-for="u22961-4_content"><?php echo get_the_date( "", '', '', true ); ?></span>
      <!-- /m_editable -->
      <span class="size_fixed grpelem placeholder" data-placeholder-for="u22965_content"><!-- placeholder node --></span>
      <span class="size_fixed grpelem placeholder" data-placeholder-for="u22966_content"><!-- placeholder node --></span>
     </div>
     <!-- m_editable region-id="editable-static-tag-U23556-BP_1200" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Category-List ts-Default-Link-Style--copy clearfix colelem placeholder" data-placeholder-for="u23556-4_content"><?php echo get_the_category_list(" < "); ?></span>
     <!-- /m_editable -->
     <span class="size_fixed colelem placeholder" data-placeholder-for="u22967_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u22968_content"><!-- placeholder node --></span>
     <!-- m_editable region-id="editable-static-tag-U23557-BP_1200" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Tag-List clearfix colelem placeholder" data-placeholder-for="u23557-4_content"><?php echo get_the_tag_list(""," < "); ?></span>
     <!-- /m_editable -->
     <!-- m_editable region-id="editable-static-tag-U23555-BP_1200" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Comments clearfix colelem placeholder" data-placeholder-for="u23555-4_content"><?php if(comments_open()) {
          echo get_comments_number();
           }
           else
             echo __("Comments are closed.");
           ?></span>
     <!-- /m_editable -->
     <span class="size_fixed colelem placeholder" data-placeholder-for="u22959_content"><!-- placeholder node --></span>
     <span class="colelem placeholder" data-placeholder-for="u24121_content"><!-- placeholder node --></span>
    </div>
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu18610"><!-- group -->
     <span class="browser_width placeholder" data-placeholder-for="u18610-bw_content"><!-- placeholder node --></span>
     <nav class="MenuBar clearfix temp_no_id" data-orig-id="menuu18560"><!-- horizontal box -->
      <div class="MenuItemContainer clearfix grpelem temp_no_id" data-orig-id="u18561"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#home" data-href="anchor:U82:U4919" data-orig-id="u18564"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u18566-4"><!-- content --><p id="u18566-2"><span class="temp_no_id" data-orig-id="u18566">HOME</span></p></div></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem temp_no_id" data-orig-id="u18568"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#about" data-href="anchor:U82:U4926" data-orig-id="u18569"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u18572-4"><!-- content --><p id="u18572-2"><span class="temp_no_id" data-orig-id="u18572">O NAS</span></p></div></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem temp_no_id" data-orig-id="u18603"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#services" data-href="anchor:U82:U4933" data-orig-id="u18604"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u18607-4"><!-- content --><p id="u18607-2"><span class="temp_no_id" data-orig-id="u18607">KOLEJNA WYPRAWA</span></p></div></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem temp_no_id" data-orig-id="u18582"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#story" data-href="anchor:U82:U4947" data-orig-id="u18583"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u18584-4"><!-- content --><p id="u18584-2"><span class="temp_no_id" data-orig-id="u18584">HISTORIA</span></p></div></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem temp_no_id" data-orig-id="u18596"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#work" data-href="anchor:U82:U4954" data-orig-id="u18597"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u18598-4"><!-- content --><p id="u18598-2"><span class="temp_no_id" data-orig-id="u18598">POPRZEDNIA WYPRAWA</span></p></div></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem temp_no_id" data-orig-id="u18589"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#blog" data-href="anchor:U82:U4968" data-orig-id="u18592"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u18593-4"><!-- content --><p id="u18593-2"><span class="temp_no_id" data-orig-id="u18593">BLOG</span></p></div></a>
      </div>
      <div class="MenuItemContainer clearfix grpelem temp_no_id" data-orig-id="u18575"><!-- vertical box -->
       <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix colelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#contact" data-href="anchor:U82:U4975" data-orig-id="u18578"><!-- horizontal box --><div class="MenuItemLabel NoWrap clearfix grpelem" id="u18581-4"><!-- content --><p id="u18581-2"><span class="temp_no_id" data-orig-id="u18581">KONTAKT</span></p></div></a>
      </div>
     </nav>
     <span class="clip_frame placeholder" data-placeholder-for="u18611_content"><!-- placeholder node --></span>
    </div>
   </div>
  </div>
  <div class="breakpoint" id="bp_1000" data-min-width="761" data-max-width="1000"><!-- responsive breakpoint node -->
   <div class="clearfix temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="ppu18553"><!-- column -->
     <span class="clearfix colelem placeholder" data-placeholder-for="pu18553_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="pu22957_content"><!-- placeholder node --></span>
     <div class="clearfix colelem temp_no_id" data-orig-id="pu22961-4"><!-- group -->
      <!-- m_editable region-id="editable-static-tag-U22961-BP_1000" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
      <span class="MusexPress-Post-Date clearfix grpelem placeholder" data-placeholder-for="u22961-4_content"><?php echo get_the_date( "", '', '', true ); ?></span>
      <!-- /m_editable -->
      <span class="size_fixed grpelem placeholder" data-placeholder-for="u22965_content"><!-- placeholder node --></span>
      <span class="size_fixed grpelem placeholder" data-placeholder-for="u22966_content"><!-- placeholder node --></span>
     </div>
     <!-- m_editable region-id="editable-static-tag-U23556-BP_1000" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Category-List ts-Default-Link-Style--copy clearfix colelem placeholder" data-placeholder-for="u23556-4_content"><?php echo get_the_category_list(" < "); ?></span>
     <!-- /m_editable -->
     <span class="size_fixed colelem placeholder" data-placeholder-for="u22967_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u22968_content"><!-- placeholder node --></span>
     <!-- m_editable region-id="editable-static-tag-U23557-BP_1000" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Tag-List clearfix colelem placeholder" data-placeholder-for="u23557-4_content"><?php echo get_the_tag_list(""," < "); ?></span>
     <!-- /m_editable -->
     <!-- m_editable region-id="editable-static-tag-U23555-BP_1000" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Comments clearfix colelem placeholder" data-placeholder-for="u23555-4_content"><?php if(comments_open()) {
          echo get_comments_number();
           }
           else
             echo __("Comments are closed.");
           ?></span>
     <!-- /m_editable -->
     <span class="size_fixed colelem placeholder" data-placeholder-for="u22959_content"><!-- placeholder node --></span>
     <span class="colelem placeholder" data-placeholder-for="u24121_content"><!-- placeholder node --></span>
    </div>
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu18610"><!-- group -->
     <span class="browser_width placeholder" data-placeholder-for="u18610-bw_content"><!-- placeholder node --></span>
     <span class="clip_frame placeholder" data-placeholder-for="u18611_content"><!-- placeholder node --></span>
     <div class="PamphletWidget clearfix widget_invisible" id="pamphletu18613" data-islightbox="true"><!-- none box -->
      <div class="popup_anchor" id="u18623popup" data-lightbox="true">
       <div class="ContainerGroup clearfix" id="u18623"><!-- stack box -->
        <div class="Container clearfix grpelem" id="u18624"><!-- group -->
         <nav class="MenuBar clearfix grpelem" id="menuu18625"><!-- vertical box -->
          <div class="MenuItemContainer clearfix colelem" id="u18647"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u18648" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>" data-href="page:U93"><!-- vertical box --><img class="MenuItemLabel colelem" id="u18651" alt="Home" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem" id="u18661"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u18664" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#about" data-href="anchor:U82:U4926"><!-- vertical box --><img class="MenuItemLabel colelem" id="u18667" alt="O Nas" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem" id="u18654"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u18655" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#services" data-href="anchor:U82:U4933"><!-- vertical box --><img class="MenuItemLabel colelem" id="u18658" alt="Kolejna wyprawa" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem" id="u18626"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u18627" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#story" data-href="anchor:U82:U4947"><!-- vertical box --><img class="MenuItemLabel colelem" id="u18628" alt="Historia" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem" id="u18640"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u18641" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#work" data-href="anchor:U82:U4954"><!-- vertical box --><img class="MenuItemLabel colelem" id="u18642" alt="Poprzednia wyprawa" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem" id="u18633"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u18636" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#blog" data-href="anchor:U82:U4968"><!-- vertical box --><img class="MenuItemLabel colelem" id="u18637" alt="Blog" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem" id="u18668"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem" id="u18669" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#contact" data-href="anchor:U82:U4975"><!-- vertical box --><img class="MenuItemLabel colelem" id="u18670" alt="Kontakt" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/><!-- state-based BG images --></a>
          </div>
         </nav>
        </div>
       </div>
      </div>
      <div class="ThumbGroup clearfix grpelem" id="u18616"><!-- none box -->
       <div class="popup_anchor" id="u18617popup">
        <div class="Thumb popup_element clearfix" id="u18617"><!-- group -->
         <div class="grpelem shared_content" id="u18618" data-content-guid="u18618_content"><!-- state-based BG images --></div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18651-r.png?crc=4064358082" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18651-a.png?crc=4064358082" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18667-r.png?crc=3821083450" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18667-a.png?crc=3821083450" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18658-r.png?crc=4005297800" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18658-a.png?crc=4005297800" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18628-r.png?crc=4285114174" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18628-a.png?crc=4285114174" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18642-r.png?crc=493449355" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18642-a.png?crc=493449355" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18637-r.png?crc=3801810654" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18637-a.png?crc=3801810654" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18670-r.png?crc=4059178189" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18670-a.png?crc=4059178189" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u5209-u18618-r.png?crc=4192326935" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u5209-a-u18618-a.png?crc=3935099781" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_760" data-min-width="521" data-max-width="760"><!-- responsive breakpoint node -->
   <div class="clearfix temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="ppu18553"><!-- column -->
     <span class="clearfix colelem placeholder" data-placeholder-for="pu18553_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="pu22957_content"><!-- placeholder node --></span>
     <div class="clearfix colelem temp_no_id" data-orig-id="pu22961-4"><!-- group -->
      <!-- m_editable region-id="editable-static-tag-U22961-BP_760" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
      <span class="MusexPress-Post-Date clearfix grpelem placeholder" data-placeholder-for="u22961-4_content"><?php echo get_the_date( "", '', '', true ); ?></span>
      <!-- /m_editable -->
      <span class="size_fixed grpelem placeholder" data-placeholder-for="u22965_content"><!-- placeholder node --></span>
      <span class="size_fixed grpelem placeholder" data-placeholder-for="u22966_content"><!-- placeholder node --></span>
     </div>
     <!-- m_editable region-id="editable-static-tag-U23556-BP_760" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Category-List ts-Default-Link-Style--copy clearfix colelem placeholder" data-placeholder-for="u23556-4_content"><?php echo get_the_category_list(" < "); ?></span>
     <!-- /m_editable -->
     <span class="size_fixed colelem placeholder" data-placeholder-for="u22967_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u22968_content"><!-- placeholder node --></span>
     <!-- m_editable region-id="editable-static-tag-U23557-BP_760" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Tag-List clearfix colelem placeholder" data-placeholder-for="u23557-4_content"><?php echo get_the_tag_list(""," < "); ?></span>
     <!-- /m_editable -->
     <!-- m_editable region-id="editable-static-tag-U23555-BP_760" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Comments clearfix colelem placeholder" data-placeholder-for="u23555-4_content"><?php if(comments_open()) {
          echo get_comments_number();
           }
           else
             echo __("Comments are closed.");
           ?></span>
     <!-- /m_editable -->
     <span class="size_fixed colelem placeholder" data-placeholder-for="u22959_content"><!-- placeholder node --></span>
     <span class="colelem placeholder" data-placeholder-for="u24121_content"><!-- placeholder node --></span>
    </div>
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu18610"><!-- group -->
     <span class="browser_width placeholder" data-placeholder-for="u18610-bw_content"><!-- placeholder node --></span>
     <span class="clip_frame placeholder" data-placeholder-for="u18611_content"><!-- placeholder node --></span>
     <div class="PamphletWidget clearfix widget_invisible temp_no_id" data-islightbox="true" data-orig-id="pamphletu18613"><!-- none box -->
      <div class="popup_anchor temp_no_id" data-lightbox="true" data-orig-id="u18623popup">
       <div class="ContainerGroup clearfix temp_no_id" data-orig-id="u18623"><!-- stack box -->
        <div class="Container clearfix grpelem temp_no_id" data-orig-id="u18624"><!-- group -->
         <nav class="MenuBar clearfix grpelem temp_no_id" data-orig-id="menuu18625"><!-- vertical box -->
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18647"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>" data-href="page:U93" data-orig-id="u18648"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Home" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18651"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18661"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#about" data-href="anchor:U82:U4926" data-orig-id="u18664"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="O Nas" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18667"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18654"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#services" data-href="anchor:U82:U4933" data-orig-id="u18655"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Kolejna wyprawa" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18658"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18626"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#story" data-href="anchor:U82:U4947" data-orig-id="u18627"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Historia" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18628"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18640"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#work" data-href="anchor:U82:U4954" data-orig-id="u18641"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Poprzednia wyprawa" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18642"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18633"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#blog" data-href="anchor:U82:U4968" data-orig-id="u18636"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Blog" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18637"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18668"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#contact" data-href="anchor:U82:U4975" data-orig-id="u18669"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Kontakt" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18670"/><!-- state-based BG images --></a>
          </div>
         </nav>
        </div>
       </div>
      </div>
      <div class="ThumbGroup clearfix grpelem temp_no_id" data-orig-id="u18616"><!-- none box -->
       <div class="popup_anchor temp_no_id" data-orig-id="u18617popup">
        <div class="Thumb popup_element clearfix temp_no_id" data-orig-id="u18617"><!-- group -->
         <span class="grpelem placeholder" data-placeholder-for="u18618_content"><!-- placeholder node --></span>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18651-r.png?crc=4064358082" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18651-a.png?crc=4064358082" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18667-r.png?crc=3821083450" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18667-a.png?crc=3821083450" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18658-r.png?crc=4005297800" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18658-a.png?crc=4005297800" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18628-r.png?crc=4285114174" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18628-a.png?crc=4285114174" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18642-r.png?crc=493449355" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18642-a.png?crc=493449355" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18637-r.png?crc=3801810654" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18637-a.png?crc=3801810654" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18670-r.png?crc=4059178189" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18670-a.png?crc=4059178189" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u5209-u18618-r.png?crc=4192326935" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u5209-a-u18618-a.png?crc=3935099781" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <div class="breakpoint" id="bp_520" data-max-width="520"><!-- responsive breakpoint node -->
   <div class="clearfix temp_no_id" data-orig-id="page"><!-- group -->
    <div class="clearfix grpelem temp_no_id" data-orig-id="ppu18553"><!-- column -->
     <span class="clearfix colelem placeholder" data-placeholder-for="pu18553_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="pu22957_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="pu22965_content"><!-- placeholder node --></span>
     <!-- m_editable region-id="editable-static-tag-U23556-BP_520" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Category-List ts-Default-Link-Style--copy clearfix colelem placeholder" data-placeholder-for="u23556-4_content"><?php echo get_the_category_list(" < "); ?></span>
     <!-- /m_editable -->
     <span class="size_fixed colelem placeholder" data-placeholder-for="u22967_content"><!-- placeholder node --></span>
     <span class="clearfix colelem placeholder" data-placeholder-for="u22968_content"><!-- placeholder node --></span>
     <!-- m_editable region-id="editable-static-tag-U23557-BP_520" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Tag-List clearfix colelem placeholder" data-placeholder-for="u23557-4_content"><?php echo get_the_tag_list(""," < "); ?></span>
     <!-- /m_editable -->
     <!-- m_editable region-id="editable-static-tag-U23555-BP_520" template="wpis-kaharo.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
     <span class="MusexPress-Post-Comments clearfix colelem placeholder" data-placeholder-for="u23555-4_content"><?php if(comments_open()) {
          echo get_comments_number();
           }
           else
             echo __("Comments are closed.");
           ?></span>
     <!-- /m_editable -->
     <span class="size_fixed colelem placeholder" data-placeholder-for="u22959_content"><!-- placeholder node --></span>
     <div class="colelem" id="u23938"><!-- custom html -->
      <iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2FKa-Ha-Ro-1663516287033207%2F%3Fnotif_id%3D1508842835960610%26notif_t%3Dpage_fan&width=78&height=65&layout=box_count&size=large&show_faces=true&appId=333211160470273" width="78" height="65" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
     </div>
    </div>
    <div class="clearfix grpelem temp_no_id" data-orig-id="pu18610"><!-- group -->
     <span class="browser_width placeholder" data-placeholder-for="u18610-bw_content"><!-- placeholder node --></span>
     <span class="clip_frame placeholder" data-placeholder-for="u18611_content"><!-- placeholder node --></span>
     <div class="PamphletWidget clearfix widget_invisible temp_no_id" data-islightbox="true" data-orig-id="pamphletu18613"><!-- none box -->
      <div class="popup_anchor temp_no_id" data-lightbox="true" data-orig-id="u18623popup">
       <div class="ContainerGroup clearfix temp_no_id" data-orig-id="u18623"><!-- stack box -->
        <div class="Container clearfix grpelem temp_no_id" data-orig-id="u18624"><!-- group -->
         <nav class="MenuBar clearfix grpelem temp_no_id" data-orig-id="menuu18625"><!-- vertical box -->
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18647"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>" data-href="page:U93" data-orig-id="u18648"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Home" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18651"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18661"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#about" data-href="anchor:U82:U4926" data-orig-id="u18664"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="O Nas" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18667"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18654"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#services" data-href="anchor:U82:U4933" data-orig-id="u18655"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Kolejna wyprawa" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18658"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18626"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#story" data-href="anchor:U82:U4947" data-orig-id="u18627"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Historia" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18628"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18640"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#work" data-href="anchor:U82:U4954" data-orig-id="u18641"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Poprzednia wyprawa" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18642"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18633"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#blog" data-href="anchor:U82:U4968" data-orig-id="u18636"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Blog" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18637"/><!-- state-based BG images --></a>
          </div>
          <div class="MenuItemContainer clearfix colelem temp_no_id" data-orig-id="u18668"><!-- horizontal box -->
           <a class="nonblock nontext MenuItem MenuItemWithSubMenu clearfix grpelem temp_no_id" href="<?php echo get_permalink( mxp_get_page_by_slug( 'index' ) ); ?>#contact" data-href="anchor:U82:U4975" data-orig-id="u18669"><!-- vertical box --><img class="MenuItemLabel colelem temp_no_id" alt="Kontakt" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903" data-orig-id="u18670"/><!-- state-based BG images --></a>
          </div>
         </nav>
        </div>
       </div>
      </div>
      <div class="ThumbGroup clearfix grpelem temp_no_id" data-orig-id="u18616"><!-- none box -->
       <div class="popup_anchor temp_no_id" data-orig-id="u18617popup">
        <div class="Thumb popup_element clearfix temp_no_id" data-orig-id="u18617"><!-- group -->
         <span class="grpelem placeholder" data-placeholder-for="u18618_content"><!-- placeholder node --></span>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class="preload_images">
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18651-r.png?crc=4064358082" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18651-a.png?crc=4064358082" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18667-r.png?crc=3821083450" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18667-a.png?crc=3821083450" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18658-r.png?crc=4005297800" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18658-a.png?crc=4005297800" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18628-r.png?crc=4285114174" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18628-a.png?crc=4285114174" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18642-r.png?crc=493449355" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18642-a.png?crc=493449355" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18637-r.png?crc=3801810654" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18637-a.png?crc=3801810654" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18670-r.png?crc=4059178189" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u18670-a.png?crc=4059178189" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u5209-u18618-r.png?crc=4192326935" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
    <img class="preload temp_no_img_src" data-orig-src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/u5209-a-u18618-a.png?crc=3935099781" alt="" src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/images/blank.gif?crc=4208392903"/>
   </div>
  </div>
  <!-- JS includes -->
  <script type="text/javascript">if( window.jQuery ){ var $ = jQuery.noConflict(); } 
   
</script>
  <script type="text/javascript">if( window.jQuery ){ var $ = jQuery.noConflict(); } 
   
</script>
  <!-- Other scripts -->
  <script type="text/javascript">if( window.jQuery ){ var $ = jQuery.noConflict(); } 
   // Decide whether to suppress missing file error or not based on preference setting
var suppressMissingFileError = true
</script>
  <script type="text/javascript">if( window.jQuery ){ var $ = jQuery.noConflict(); } 
   window.Muse.assets.check=function(c){if(!window.Muse.assets.checked){window.Muse.assets.checked=!0;var b={},d=function(a,b){if(window.getComputedStyle){var c=window.getComputedStyle(a,null);return c&&c.getPropertyValue(b)||c&&c[b]||""}if(document.documentElement.currentStyle)return(c=a.currentStyle)&&c[b]||a.style&&a.style[b]||"";return""},a=function(a){if(a.match(/^rgb/))return a=a.replace(/\s+/g,"").match(/([\d\,]+)/gi)[0].split(","),(parseInt(a[0])<<16)+(parseInt(a[1])<<8)+parseInt(a[2]);if(a.match(/^\#/))return parseInt(a.substr(1),
16);return 0},f=function(f){for(var g=document.getElementsByTagName("link"),j=0;j<g.length;j++)if("text/css"==g[j].type){var l=(g[j].href||"").match(/\/?css\/([\w\-]+\.css)\?crc=(\d+)/);if(!l||!l[1]||!l[2])break;b[l[1]]=l[2]}g=document.createElement("div");g.className="version";g.style.cssText="display:none; width:1px; height:1px;";document.getElementsByTagName("body")[0].appendChild(g);for(j=0;j<Muse.assets.required.length;){var l=Muse.assets.required[j],k=l.match(/([\w\-\.]+)\.(\w+)$/),i=k&&k[1]?
k[1]:null,k=k&&k[2]?k[2]:null;switch(k.toLowerCase()){case "css":i=i.replace(/\W/gi,"_").replace(/^([^a-z])/gi,"_$1");g.className+=" "+i;i=a(d(g,"color"));k=a(d(g,"backgroundColor"));i!=0||k!=0?(Muse.assets.required.splice(j,1),"undefined"!=typeof b[l]&&(i!=b[l]>>>24||k!=(b[l]&16777215))&&Muse.assets.outOfDate.push(l)):j++;g.className="version";break;case "js":j++;break;default:throw Error("Unsupported file type: "+k);}}c?c().jquery!="1.8.3"&&Muse.assets.outOfDate.push("jquery-1.8.3.min.js"):Muse.assets.required.push("jquery-1.8.3.min.js");
g.parentNode.removeChild(g);if(Muse.assets.outOfDate.length||Muse.assets.required.length)g="Some files on the server may be missing or incorrect. Clear browser cache and try again. If the problem persists please contact website author.",f&&Muse.assets.outOfDate.length&&(g+="\nOut of date: "+Muse.assets.outOfDate.join(",")),f&&Muse.assets.required.length&&(g+="\nMissing: "+Muse.assets.required.join(",")),suppressMissingFileError?(g+="\nUse SuppressMissingFileError key in AppPrefs.xml to show missing file error pop up.",console.log(g)):alert(g)};location&&location.search&&location.search.match&&location.search.match(/muse_debug/gi)?
setTimeout(function(){f(!0)},5E3):f()}};
var muse_init=function(){require.config({baseUrl:"//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/"});require(["jquery","museutils","whatinput","jquery.musemenu","jquery.musepolyfill.bgsize","jquery.watch","webpro","musewpslideshow","jquery.museoverlay","touchswipe","jquery.museresponsive"],function(c){var $ = c;$(document).ready(function(){try{
window.Muse.assets.check($);/* body */
Muse.Utils.transformMarkupToFixBrowserProblemsPreInit();/* body */
Muse.Utils.prepHyperlinks(true);/* body */
Muse.Utils.resizeHeight('.browser_width');/* resize height */
Muse.Utils.requestAnimationFrame(function() { $('body').addClass('initialized'); });/* mark body as initialized */
Muse.Utils.makeButtonsVisibleAfterSettingMinWidth();/* body */
Muse.Utils.initWidget('.MenuBar', ['#bp_infinity', '#bp_1200', '#bp_1000', '#bp_760', '#bp_520'], function(elem) { return $(elem).museMenu(); });/* unifiedNavBar */
Muse.Utils.initWidget('#pamphletu18613', ['#bp_1000', '#bp_760', '#bp_520'], function(elem) { return new WebPro.Widget.ContentSlideShow(elem, {contentLayout_runtime:'lightbox',event:'click',deactivationEvent:'none',autoPlay:false,displayInterval:3000,transitionStyle:'vertical',transitionDuration:500,hideAllContentsFirst:false,triggersOnTop:true,shuffle:false,enableSwipe:false,resumeAutoplay:true,resumeAutoplayInterval:4600,playOnce:false,autoActivate_runtime:false,isResponsive:false}); });/* #pamphletu18613 */
$( '.breakpoint' ).registerBreakpoint();/* Register breakpoints */
Muse.Utils.transformMarkupToFixBrowserProblems();/* body */
}catch(b){if(b&&"function"==typeof b.notify?b.notify():Muse.Assert.fail("Error calling selector function: "+b),false)throw b;}})})};

</script>
  <!-- RequireJS script -->
  <script src="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/scripts/require.js?crc=7928878" type="text/javascript" async data-main="//kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/scripts/museconfig.js?crc=310584261" onload="if (requirejs) requirejs.onError = function(requireType, requireModule) { if (requireType && requireType.toString && requireType.toString().indexOf && 0 <= requireType.toString().indexOf('#scripterror')) window.Muse.assets.check(); }" onerror="window.Muse.assets.check();">if( window.jQuery ){ var $ = jQuery.noConflict(); } </script>
  
  <!--HTML Widget code-->
  


        <script>if( window.jQuery ){ var $ = jQuery.noConflict(); } 

    		$(function(){

    		function addGoogleFont(FontsName) {
    				var Fonts = '';
    				$.each(FontsName,function(index){
    						if(index==0){
    						Fonts += FontsName[index].replace(' ','+');
    						}
    						Fonts += '|'+FontsName[index].replace(' ','+');
    				});

        		$("head").append("<link href='//fonts.googleapis.com/css?family=" + Fonts + "' rel='stylesheet' type='text/css'>");
    			}

          var fonts = [];
          if("'Sofia light'"!='inherit'){
            fonts.push('Sofia light');
          }
          if("'Sofia light'"!='inherit'){
            fonts.push('Sofia light');
          }
          if("'Sofia extralight'"!='inherit'){
            fonts.push('Sofia extralight');
          }
          if("'Sofia extralight'"!='inherit'){
            fonts.push('Sofia extralight');
          }
          if("'Sofia extralight'"!='inherit'){
            fonts.push('Sofia extralight');
          }
          if("'Sofia extralight'"!='inherit'){
            fonts.push('Sofia extralight');
          }
          if(fonts.length>0){
    				addGoogleFont(fonts);
    			}

    		});

    </script>
        <script>if( window.jQuery ){ var $ = jQuery.noConflict(); } 
	        /*! Magnific Popup - v1.1.0 - 2016-02-20
	        * //dimsemenov.com/plugins/magnific-popup/
	        * Copyright (c) 2016 Dmitry Semenov; */
	        !function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):window.jQuery||window.Zepto)}(function(a){var b,c,d,e,f,g,h="Close",i="BeforeClose",j="AfterClose",k="BeforeAppend",l="MarkupParse",m="Open",n="Change",o="mfp",p="."+o,q="mfp-ready",r="mfp-removing",s="mfp-prevent-close",t=function(){},u=!!window.jQuery,v=a(window),w=function(a,c){b.ev.on(o+a+p,c)},x=function(b,c,d,e){var f=document.createElement("div");return f.className="mfp-"+b,d&&(f.innerHTML=d),e?c&&c.appendChild(f):(f=a(f),c&&f.appendTo(c)),f},y=function(c,d){b.ev.triggerHandler(o+c,d),b.st.callbacks&&(c=c.charAt(0).toLowerCase()+c.slice(1),b.st.callbacks[c]&&b.st.callbacks[c].apply(b,a.isArray(d)?d:[d]))},z=function(c){return c===g&&b.currTemplate.closeBtn||(b.currTemplate.closeBtn=a(b.st.closeMarkup.replace("%title%",b.st.tClose)),g=c),b.currTemplate.closeBtn},A=function(){a.magnificPopup.instance||(b=new t,b.init(),a.magnificPopup.instance=b)},B=function(){var a=document.createElement("p").style,b=["ms","O","Moz","Webkit"];if(void 0!==a.transition)return!0;for(;b.length;)if(b.pop()+"Transition"in a)return!0;return!1};t.prototype={constructor:t,init:function(){var c=navigator.appVersion;b.isLowIE=b.isIE8=document.all&&!document.addEventListener,b.isAndroid=/android/gi.test(c),b.isIOS=/iphone|ipad|ipod/gi.test(c),b.supportsTransition=B(),b.probablyMobile=b.isAndroid||b.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),d=a(document),b.popupsCache={}},open:function(c){var e;if(c.isObj===!1){b.items=c.items.toArray(),b.index=0;var g,h=c.items;for(e=0;e<h.length;e++)if(g=h[e],g.parsed&&(g=g.el[0]),g===c.el[0]){b.index=e;break}}else b.items=a.isArray(c.items)?c.items:[c.items],b.index=c.index||0;if(b.isOpen)return void b.updateItemHTML();b.types=[],f="",c.mainEl&&c.mainEl.length?b.ev=c.mainEl.eq(0):b.ev=d,c.key?(b.popupsCache[c.key]||(b.popupsCache[c.key]={}),b.currTemplate=b.popupsCache[c.key]):b.currTemplate={},b.st=a.extend(!0,{},a.magnificPopup.defaults,c),b.fixedContentPos="auto"===b.st.fixedContentPos?!b.probablyMobile:b.st.fixedContentPos,b.st.modal&&(b.st.closeOnContentClick=!1,b.st.closeOnBgClick=!1,b.st.showCloseBtn=!1,b.st.enableEscapeKey=!1),b.bgOverlay||(b.bgOverlay=x("bg").on("click"+p,function(){b.close()}),b.wrap=x("wrap").attr("tabindex",-1).on("click"+p,function(a){b._checkIfClose(a.target)&&b.close()}),b.container=x("container",b.wrap)),b.contentContainer=x("content"),b.st.preloader&&(b.preloader=x("preloader",b.container,b.st.tLoading));var i=a.magnificPopup.modules;for(e=0;e<i.length;e++){var j=i[e];j=j.charAt(0).toUpperCase()+j.slice(1),b["init"+j].call(b)}y("BeforeOpen"),b.st.showCloseBtn&&(b.st.closeBtnInside?(w(l,function(a,b,c,d){c.close_replaceWith=z(d.type)}),f+=" mfp-close-btn-in"):b.wrap.append(z())),b.st.alignTop&&(f+=" mfp-align-top"),b.fixedContentPos?b.wrap.css({overflow:b.st.overflowY,overflowX:"hidden",overflowY:b.st.overflowY}):b.wrap.css({top:v.scrollTop(),position:"absolute"}),(b.st.fixedBgPos===!1||"auto"===b.st.fixedBgPos&&!b.fixedContentPos)&&b.bgOverlay.css({height:d.height(),position:"absolute"}),b.st.enableEscapeKey&&d.on("keyup"+p,function(a){27===a.keyCode&&b.close()}),v.on("resize"+p,function(){b.updateSize()}),b.st.closeOnContentClick||(f+=" mfp-auto-cursor"),f&&b.wrap.addClass(f);var k=b.wH=v.height(),n={};if(b.fixedContentPos&&b._hasScrollBar(k)){var o=b._getScrollbarSize();o&&(n.marginRight=o)}b.fixedContentPos&&(b.isIE7?a("body, html").css("overflow","hidden"):n.overflow="hidden");var r=b.st.mainClass;return b.isIE7&&(r+=" mfp-ie7"),r&&b._addClassToMFP(r),b.updateItemHTML(),y("BuildControls"),a("html").css(n),b.bgOverlay.add(b.wrap).prependTo(b.st.prependTo||a(document.body)),b._lastFocusedEl=document.activeElement,setTimeout(function(){b.content?(b._addClassToMFP(q),b._setFocus()):b.bgOverlay.addClass(q),d.on("focusin"+p,b._onFocusIn)},16),b.isOpen=!0,b.updateSize(k),y(m),c},close:function(){b.isOpen&&(y(i),b.isOpen=!1,b.st.removalDelay&&!b.isLowIE&&b.supportsTransition?(b._addClassToMFP(r),setTimeout(function(){b._close()},b.st.removalDelay)):b._close())},_close:function(){y(h);var c=r+" "+q+" ";if(b.bgOverlay.detach(),b.wrap.detach(),b.container.empty(),b.st.mainClass&&(c+=b.st.mainClass+" "),b._removeClassFromMFP(c),b.fixedContentPos){var e={marginRight:""};b.isIE7?a("body, html").css("overflow",""):e.overflow="",a("html").css(e)}d.off("keyup"+p+" focusin"+p),b.ev.off(p),b.wrap.attr("class","mfp-wrap").removeAttr("style"),b.bgOverlay.attr("class","mfp-bg"),b.container.attr("class","mfp-container"),!b.st.showCloseBtn||b.st.closeBtnInside&&b.currTemplate[b.currItem.type]!==!0||b.currTemplate.closeBtn&&b.currTemplate.closeBtn.detach(),b.st.autoFocusLast&&b._lastFocusedEl&&a(b._lastFocusedEl).focus(),b.currItem=null,b.content=null,b.currTemplate=null,b.prevHeight=0,y(j)},updateSize:function(a){if(b.isIOS){var c=document.documentElement.clientWidth/window.innerWidth,d=window.innerHeight*c;b.wrap.css("height",d),b.wH=d}else b.wH=a||v.height();b.fixedContentPos||b.wrap.css("height",b.wH),y("Resize")},updateItemHTML:function(){var c=b.items[b.index];b.contentContainer.detach(),b.content&&b.content.detach(),c.parsed||(c=b.parseEl(b.index));var d=c.type;if(y("BeforeChange",[b.currItem?b.currItem.type:"",d]),b.currItem=c,!b.currTemplate[d]){var f=b.st[d]?b.st[d].markup:!1;y("FirstMarkupParse",f),f?b.currTemplate[d]=a(f):b.currTemplate[d]=!0}e&&e!==c.type&&b.container.removeClass("mfp-"+e+"-holder");var g=b["get"+d.charAt(0).toUpperCase()+d.slice(1)](c,b.currTemplate[d]);b.appendContent(g,d),c.preloaded=!0,y(n,c),e=c.type,b.container.prepend(b.contentContainer),y("AfterChange")},appendContent:function(a,c){b.content=a,a?b.st.showCloseBtn&&b.st.closeBtnInside&&b.currTemplate[c]===!0?b.content.find(".mfp-close").length||b.content.append(z()):b.content=a:b.content="",y(k),b.container.addClass("mfp-"+c+"-holder"),b.contentContainer.append(b.content)},parseEl:function(c){var d,e=b.items[c];if(e.tagName?e={el:a(e)}:(d=e.type,e={data:e,src:e.src}),e.el){for(var f=b.types,g=0;g<f.length;g++)if(e.el.hasClass("mfp-"+f[g])){d=f[g];break}e.src=e.el.attr("data-mfp-src"),e.src||(e.src=e.el.attr("href"))}return e.type=d||b.st.type||"inline",e.index=c,e.parsed=!0,b.items[c]=e,y("ElementParse",e),b.items[c]},addGroup:function(a,c){var d=function(d){d.mfpEl=this,b._openClick(d,a,c)};c||(c={});var e="click.magnificPopup";c.mainEl=a,c.items?(c.isObj=!0,a.off(e).on(e,d)):(c.isObj=!1,c.delegate?a.off(e).on(e,c.delegate,d):(c.items=a,a.off(e).on(e,d)))},_openClick:function(c,d,e){var f=void 0!==e.midClick?e.midClick:a.magnificPopup.defaults.midClick;if(f||!(2===c.which||c.ctrlKey||c.metaKey||c.altKey||c.shiftKey)){var g=void 0!==e.disableOn?e.disableOn:a.magnificPopup.defaults.disableOn;if(g)if(a.isFunction(g)){if(!g.call(b))return!0}else if(v.width()<g)return!0;c.type&&(c.preventDefault(),b.isOpen&&c.stopPropagation()),e.el=a(c.mfpEl),e.delegate&&(e.items=d.find(e.delegate)),b.open(e)}},updateStatus:function(a,d){if(b.preloader){c!==a&&b.container.removeClass("mfp-s-"+c),d||"loading"!==a||(d=b.st.tLoading);var e={status:a,text:d};y("UpdateStatus",e),a=e.status,d=e.text,b.preloader.html(d),b.preloader.find("a").on("click",function(a){a.stopImmediatePropagation()}),b.container.addClass("mfp-s-"+a),c=a}},_checkIfClose:function(c){if(!a(c).hasClass(s)){var d=b.st.closeOnContentClick,e=b.st.closeOnBgClick;if(d&&e)return!0;if(!b.content||a(c).hasClass("mfp-close")||b.preloader&&c===b.preloader[0])return!0;if(c===b.content[0]||a.contains(b.content[0],c)){if(d)return!0}else if(e&&a.contains(document,c))return!0;return!1}},_addClassToMFP:function(a){b.bgOverlay.addClass(a),b.wrap.addClass(a)},_removeClassFromMFP:function(a){this.bgOverlay.removeClass(a),b.wrap.removeClass(a)},_hasScrollBar:function(a){return(b.isIE7?d.height():document.body.scrollHeight)>(a||v.height())},_setFocus:function(){(b.st.focus?b.content.find(b.st.focus).eq(0):b.wrap).focus()},_onFocusIn:function(c){return c.target===b.wrap[0]||a.contains(b.wrap[0],c.target)?void 0:(b._setFocus(),!1)},_parseMarkup:function(b,c,d){var e;d.data&&(c=a.extend(d.data,c)),y(l,[b,c,d]),a.each(c,function(c,d){if(void 0===d||d===!1)return!0;if(e=c.split("_"),e.length>1){var f=b.find(p+"-"+e[0]);if(f.length>0){var g=e[1];"replaceWith"===g?f[0]!==d[0]&&f.replaceWith(d):"img"===g?f.is("img")?f.attr("src",d):f.replaceWith(a("<img>").attr("src",d).attr("class",f.attr("class"))):f.attr(e[1],d)}}else b.find(p+"-"+c).html(d)})},_getScrollbarSize:function(){if(void 0===b.scrollbarSize){var a=document.createElement("div");a.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(a),b.scrollbarSize=a.offsetWidth-a.clientWidth,document.body.removeChild(a)}return b.scrollbarSize}},a.magnificPopup={instance:null,proto:t.prototype,modules:[],open:function(b,c){return A(),b=b?a.extend(!0,{},b):{},b.isObj=!0,b.index=c||0,this.instance.open(b)},close:function(){return a.magnificPopup.instance&&a.magnificPopup.instance.close()},registerModule:function(b,c){c.options&&(a.magnificPopup.defaults[b]=c.options),a.extend(this.proto,c.proto),this.modules.push(b)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&#215;</button>',tClose:"Close (Esc)",tLoading:"Loading...",autoFocusLast:!0}},a.fn.magnificPopup=function(c){A();var d=a(this);if("string"==typeof c)if("open"===c){var e,f=u?d.data("magnificPopup"):d[0].magnificPopup,g=parseInt(arguments[1],10)||0;f.items?e=f.items[g]:(e=d,f.delegate&&(e=e.find(f.delegate)),e=e.eq(g)),b._openClick({mfpEl:e},d,f)}else b.isOpen&&b[c].apply(b,Array.prototype.slice.call(arguments,1));else c=a.extend(!0,{},c),u?d.data("magnificPopup",c):d[0].magnificPopup=c,b.addGroup(d,c);return d};var C,D,E,F="inline",G=function(){E&&(D.after(E.addClass(C)).detach(),E=null)};a.magnificPopup.registerModule(F,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){b.types.push(F),w(h+"."+F,function(){G()})},getInline:function(c,d){if(G(),c.src){var e=b.st.inline,f=a(c.src);if(f.length){var g=f[0].parentNode;g&&g.tagName&&(D||(C=e.hiddenClass,D=x(C),C="mfp-"+C),E=f.after(D).detach().removeClass(C)),b.updateStatus("ready")}else b.updateStatus("error",e.tNotFound),f=a("<div>");return c.inlineElement=f,f}return b.updateStatus("ready"),b._parseMarkup(d,{},c),d}}});var H,I="ajax",J=function(){H&&a(document.body).removeClass(H)},K=function(){J(),b.req&&b.req.abort()};a.magnificPopup.registerModule(I,{options:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},proto:{initAjax:function(){b.types.push(I),H=b.st.ajax.cursor,w(h+"."+I,K),w("BeforeChange."+I,K)},getAjax:function(c){H&&a(document.body).addClass(H),b.updateStatus("loading");var d=a.extend({url:c.src,success:function(d,e,f){var g={data:d,xhr:f};y("ParseAjax",g),b.appendContent(a(g.data),I),c.finished=!0,J(),b._setFocus(),setTimeout(function(){b.wrap.addClass(q)},16),b.updateStatus("ready"),y("AjaxContentAdded")},error:function(){J(),c.finished=c.loadError=!0,b.updateStatus("error",b.st.ajax.tError.replace("%url%",c.src))}},b.st.ajax.settings);return b.req=a.ajax(d),""}}});var L,M=function(c){if(c.data&&void 0!==c.data.title)return c.data.title;var d=b.st.image.titleSrc;if(d){if(a.isFunction(d))return d.call(b,c);if(c.el)return c.el.attr(d)||""}return""};a.magnificPopup.registerModule("image",{options:{markup:'<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',cursor:"mfp-zoom-out-cur",titleSrc:"title",verticalFit:!0,tError:'<a href="%url%">The image</a> could not be loaded.'},proto:{initImage:function(){var c=b.st.image,d=".image";b.types.push("image"),w(m+d,function(){"image"===b.currItem.type&&c.cursor&&a(document.body).addClass(c.cursor)}),w(h+d,function(){c.cursor&&a(document.body).removeClass(c.cursor),v.off("resize"+p)}),w("Resize"+d,b.resizeImage),b.isLowIE&&w("AfterChange",b.resizeImage)},resizeImage:function(){var a=b.currItem;if(a&&a.img&&b.st.image.verticalFit){var c=0;b.isLowIE&&(c=parseInt(a.img.css("padding-top"),10)+parseInt(a.img.css("padding-bottom"),10)),a.img.css("max-height",b.wH-c)}},_onImageHasSize:function(a){a.img&&(a.hasSize=!0,L&&clearInterval(L),a.isCheckingImgSize=!1,y("ImageHasSize",a),a.imgHidden&&(b.content&&b.content.removeClass("mfp-loading"),a.imgHidden=!1))},findImageSize:function(a){var c=0,d=a.img[0],e=function(f){L&&clearInterval(L),L=setInterval(function(){return d.naturalWidth>0?void b._onImageHasSize(a):(c>200&&clearInterval(L),c++,void(3===c?e(10):40===c?e(50):100===c&&e(500)))},f)};e(1)},getImage:function(c,d){var e=0,f=function(){c&&(c.img[0].complete?(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("ready")),c.hasSize=!0,c.loaded=!0,y("ImageLoadComplete")):(e++,200>e?setTimeout(f,100):g()))},g=function(){c&&(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("error",h.tError.replace("%url%",c.src))),c.hasSize=!0,c.loaded=!0,c.loadError=!0)},h=b.st.image,i=d.find(".mfp-img");if(i.length){var j=document.createElement("img");j.className="mfp-img",c.el&&c.el.find("img").length&&(j.alt=c.el.find("img").attr("alt")),c.img=a(j).on("load.mfploader",f).on("error.mfploader",g),j.src=c.src,i.is("img")&&(c.img=c.img.clone()),j=c.img[0],j.naturalWidth>0?c.hasSize=!0:j.width||(c.hasSize=!1)}return b._parseMarkup(d,{title:M(c),img_replaceWith:c.img},c),b.resizeImage(),c.hasSize?(L&&clearInterval(L),c.loadError?(d.addClass("mfp-loading"),b.updateStatus("error",h.tError.replace("%url%",c.src))):(d.removeClass("mfp-loading"),b.updateStatus("ready")),d):(b.updateStatus("loading"),c.loading=!0,c.hasSize||(c.imgHidden=!0,d.addClass("mfp-loading"),b.findImageSize(c)),d)}}});var N,O=function(){return void 0===N&&(N=void 0!==document.createElement("p").style.MozTransform),N};a.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(a){return a.is("img")?a:a.find("img")}},proto:{initZoom:function(){var a,c=b.st.zoom,d=".zoom";if(c.enabled&&b.supportsTransition){var e,f,g=c.duration,j=function(a){var b=a.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),d="all "+c.duration/1e3+"s "+c.easing,e={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},f="transition";return e["-webkit-"+f]=e["-moz-"+f]=e["-o-"+f]=e[f]=d,b.css(e),b},k=function(){b.content.css("visibility","visible")};w("BuildControls"+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.content.css("visibility","hidden"),a=b._getItemToZoom(),!a)return void k();f=j(a),f.css(b._getOffset()),b.wrap.append(f),e=setTimeout(function(){f.css(b._getOffset(!0)),e=setTimeout(function(){k(),setTimeout(function(){f.remove(),a=f=null,y("ZoomAnimationEnded")},16)},g)},16)}}),w(i+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.st.removalDelay=g,!a){if(a=b._getItemToZoom(),!a)return;f=j(a)}f.css(b._getOffset(!0)),b.wrap.append(f),b.content.css("visibility","hidden"),setTimeout(function(){f.css(b._getOffset())},16)}}),w(h+d,function(){b._allowZoom()&&(k(),f&&f.remove(),a=null)})}},_allowZoom:function(){return"image"===b.currItem.type},_getItemToZoom:function(){return b.currItem.hasSize?b.currItem.img:!1},_getOffset:function(c){var d;d=c?b.currItem.img:b.st.zoom.opener(b.currItem.el||b.currItem);var e=d.offset(),f=parseInt(d.css("padding-top"),10),g=parseInt(d.css("padding-bottom"),10);e.top-=a(window).scrollTop()-f;var h={width:d.width(),height:(u?d.innerHeight():d[0].offsetHeight)-g-f};return O()?h["-moz-transform"]=h.transform="translate("+e.left+"px,"+e.top+"px)":(h.left=e.left,h.top=e.top),h}}});var P="iframe",Q="//about:blank",R=function(a){if(b.currTemplate[P]){var c=b.currTemplate[P].find("iframe");c.length&&(a||(c[0].src=Q),b.isIE8&&c.css("display",a?"block":"none"))}};a.magnificPopup.registerModule(P,{options:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',srcAction:"iframe_src",patterns:{youtube:{index:"youtube.com",id:"v=",src:"//www.youtube.com/embed/%id%?autoplay=1"},vimeo:{index:"vimeo.com/",id:"/",src:"//player.vimeo.com/video/%id%?autoplay=1"},gmaps:{index:"//maps.google.",src:"%id%&output=embed"}}},proto:{initIframe:function(){b.types.push(P),w("BeforeChange",function(a,b,c){b!==c&&(b===P?R():c===P&&R(!0))}),w(h+"."+P,function(){R()})},getIframe:function(c,d){var e=c.src,f=b.st.iframe;a.each(f.patterns,function(){return e.indexOf(this.index)>-1?(this.id&&(e="string"==typeof this.id?e.substr(e.lastIndexOf(this.id)+this.id.length,e.length):this.id.call(this,e)),e=this.src.replace("%id%",e),!1):void 0});var g={};return f.srcAction&&(g[f.srcAction]=e),b._parseMarkup(d,g,c),b.updateStatus("ready"),d}}});var S=function(a){var c=b.items.length;return a>c-1?a-c:0>a?c+a:a},T=function(a,b,c){return a.replace(/%curr%/gi,b+1).replace(/%total%/gi,c)};a.magnificPopup.registerModule("gallery",{options:{enabled:!1,arrowMarkup:'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',preload:[0,2],navigateByImgClick:!0,arrows:!0,tPrev:"Previous (Left arrow key)",tNext:"Next (Right arrow key)",tCounter:"%curr% of %total%"},proto:{initGallery:function(){var c=b.st.gallery,e=".mfp-gallery";return b.direction=!0,c&&c.enabled?(f+=" mfp-gallery",w(m+e,function(){c.navigateByImgClick&&b.wrap.on("click"+e,".mfp-img",function(){return b.items.length>1?(b.next(),!1):void 0}),d.on("keydown"+e,function(a){37===a.keyCode?b.prev():39===a.keyCode&&b.next()})}),w("UpdateStatus"+e,function(a,c){c.text&&(c.text=T(c.text,b.currItem.index,b.items.length))}),w(l+e,function(a,d,e,f){var g=b.items.length;e.counter=g>1?T(c.tCounter,f.index,g):""}),w("BuildControls"+e,function(){if(b.items.length>1&&c.arrows&&!b.arrowLeft){var d=c.arrowMarkup,e=b.arrowLeft=a(d.replace(/%title%/gi,c.tPrev).replace(/%dir%/gi,"left")).addClass(s),f=b.arrowRight=a(d.replace(/%title%/gi,c.tNext).replace(/%dir%/gi,"right")).addClass(s);e.click(function(){b.prev()}),f.click(function(){b.next()}),b.container.append(e.add(f))}}),w(n+e,function(){b._preloadTimeout&&clearTimeout(b._preloadTimeout),b._preloadTimeout=setTimeout(function(){b.preloadNearbyImages(),b._preloadTimeout=null},16)}),void w(h+e,function(){d.off(e),b.wrap.off("click"+e),b.arrowRight=b.arrowLeft=null})):!1},next:function(){b.direction=!0,b.index=S(b.index+1),b.updateItemHTML()},prev:function(){b.direction=!1,b.index=S(b.index-1),b.updateItemHTML()},goTo:function(a){b.direction=a>=b.index,b.index=a,b.updateItemHTML()},preloadNearbyImages:function(){var a,c=b.st.gallery.preload,d=Math.min(c[0],b.items.length),e=Math.min(c[1],b.items.length);for(a=1;a<=(b.direction?e:d);a++)b._preloadItem(b.index+a);for(a=1;a<=(b.direction?d:e);a++)b._preloadItem(b.index-a)},_preloadItem:function(c){if(c=S(c),!b.items[c].preloaded){var d=b.items[c];d.parsed||(d=b.parseEl(c)),y("LazyLoad",d),"image"===d.type&&(d.img=a('<img class="mfp-img" />').on("load.mfploader",function(){d.hasSize=!0}).on("error.mfploader",function(){d.hasSize=!0,d.loadError=!0,y("LazyLoadError",d)}).attr("src",d.src)),d.preloaded=!0}}}});var U="retina";a.magnificPopup.registerModule(U,{options:{replaceSrc:function(a){return a.src.replace(/\.\w+$/,function(a){return"@2x"+a})},ratio:1},proto:{initRetina:function(){if(window.devicePixelRatio>1){var a=b.st.retina,c=a.ratio;c=isNaN(c)?c():c,c>1&&(w("ImageHasSize."+U,function(a,b){b.img.css({"max-width":b.img[0].naturalWidth/c,width:"100%"})}),w("ElementParse."+U,function(b,d){d.src=a.replaceSrc(d,c)}))}}}}),A()});
	    </script>
		<script>if( window.jQuery ){ var $ = jQuery.noConflict(); } 
			$(document).ready(function () {
                var gallery = $('#u22967 .gallery');

				gallery.magnificPopup({
                    closeBtnInside: false,
                    delegate: 'a',
                    gallery: {
                        enabled: true
                    },
                    image: {
                        cursor: null
                    },
                    mainClass: "u22967",
					type: 'image'
				});

                gallery.find('a').each(function () {
                    var self = $(this);

                    if (self.attr('href').indexOf('attachment_id') !== -1) {
                        self.attr('href', self.children().attr('src'));
                    }
                });
			});
		</script>
        
	<script>if( window.jQuery ){ var $ = jQuery.noConflict(); } 
   jQuery(function(){

	 if(true){
	 	jQuery('.comments-title').hide();
	 }

	 });

	</script>
	
   <?php
wp_footer();
?></body>
</html>
