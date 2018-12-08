(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	$(document).ready(function(){

		var mxp_tools;

		mxp_tools = [
            [
                'bold',
                'italic',
                'link',
                'align-left',
                'align-center',
                'align-right',
                'unordered-list',
                'ordered-list',
                'line-break',
                'undo',
                'redo',
                'video'
            ]
        ];

        var breakpoint;

        var editor = ContentTools.EditorApp.get();

        editor.init('[mxp-data-editable]', 'mxp-data-name');

        editor.toolbox().tools(mxp_tools);

        editor.addEventListener('start', function (ev) {
            $('.mxp-wp-media-btn').show();
            breakpoint = $('.breakpoint').not('.breakpoint.active');
            breakpoint.detach();
        });

        editor.addEventListener('stop', function (ev) {
            $('.mxp-wp-media-btn').hide();
            if(breakpoint){
                breakpoint.insertAfter('.breakpoint.active');
            }
        });

        editor.addEventListener('saved', function (ev) {

            var name, payload, regions, xhr;

            // Check that something changed
            regions = ev.detail().regions;
            if (Object.keys(regions).length == 0 && $('[mxp-fee-wp-image-id]').length == 0 && $('[mxp-fee-wp-video-id]').length == 0) {
                return;
            }

            // Set the editor as busy while we save our changes
            this.busy(true);

            // Collect the contents of each region into a FormData instance
            payload = {};
            for (name in regions) {
                if (regions.hasOwnProperty(name)) {
                    // payload[name]= regions[name];
                    var post_id = $('[mxp-data-name="' + name + '"]').attr('mxp-frontend-editor-postid');
                    payload[post_id] = regions[name];
                }
            }

            // Send the update content to the server to be saved
            function onStateChange(ev) {
                // Check if the request is finished
				editor.busy(false);
				if (ev) {
					// Save was successful, notify the user with a flash
					new ContentTools.FlashUI('ok');
				} else {
					// Save failed, notify the user with a flash
					new ContentTools.FlashUI('no');
				}
            };

            var wp_images = {};
            $('[mxp-fee-wp-image-id]').each(function (i,el) {
                var mxp_fee_postid = $(el).attr('mxp-frontend-editor-postid');
                wp_images[mxp_fee_postid] = $(el).attr('mxp-fee-wp-image-id');
            });

            var wp_videos = {};
            $('[mxp-fee-wp-video-id]').each(function (i,el) {
                var mxp_fee_postid = $(el).attr('mxp-frontend-editor-postid');
                wp_videos[mxp_fee_postid] = $(el).attr('mxp-fee-wp-video-id');
            });

            var data = {
                'action': 'mxp_save_content_editable',
                'payload': payload,     // We pass php values differently!
                'images' : wp_images,
                'videos' : wp_videos
            };

            $.post(ajax_object.ajax_url, data, function(response) {
				onStateChange(response);
            });

            if(breakpoint){
                breakpoint.insertAfter('.breakpoint.active');
            }

        });

        var file_frame; // variable for the wp.media file_frame
        var img_btn;

        // attach a click event (or whatever you want) to some element on your page
        $( 'body' ).on( 'click', '.mxp-wp-media-btn', function( event ) {

            img_btn = $(this);
            var media_type = img_btn.attr('media-type');

            event.preventDefault();

            // if the file_frame has already been created, just reuse it
            // if (file_frame) {
            //     file_frame.open();
            //     return;
            // }

            if(media_type == 'image') {
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: $(this).data('uploader_title'),
                    button: {
                        text: $(this).data('uploader_button_text'),
                    },
                    multiple: false, // set this to true for multiple file selection
                    library: {
                        type: ['image']
                    }
                });
            }else{
                file_frame = wp.media.frames.file_frame = wp.media({
                    title: $(this).data('uploader_title'),
                    button: {
                        text: $(this).data('uploader_button_text'),
                    },
                    multiple: false, // set this to true for multiple file selection
                    library: {
                        type: ['video']
                    }
                });
            }

            file_frame.on( 'select', function() {
                var attachment = file_frame.state().get('selection').first().toJSON();

                if(attachment.type == 'image') {

                    var item_id;

                    var custom_class = img_btn.parent().attr('mxp-custom-class');

                    if(typeof custom_class !== typeof undefined && custom_class !== false){
                        item_id = img_btn.closest('.'+custom_class).attr('id');
                        //img_btn.closest('.'+custom_class).css('background-image', 'url(' + attachment.url + ')');
                    }else{
                        item_id = img_btn.closest('.museBGSize').attr('id');
                        //img_btn.closest('.museBGSize').css('background-image', 'url(' + attachment.url + ')');
                    }
                    img_btn.parent().attr('mxp-fee-wp-image-id', attachment.id);

                    $('#'+item_id+',[data-orig-id="'+item_id+'"]').each(function (i,e) {
                        $(e).css('background-image', 'url(' + attachment.url + ')');
                    })
                }

                if(attachment.type == 'video') {
                    img_btn.closest('.mxp-frontend-editor-video').find('source').attr('src', attachment.url);
                    img_btn.closest('.mxp-frontend-editor-video').find('video')[0].load();
                    img_btn.parent().attr('mxp-fee-wp-video-id', attachment.id);
                }

            });

            file_frame.open();
        });

	});

})( jQuery );
