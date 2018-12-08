<div class=" clearfix grpelem" id="u22612"><!-- group -->
        <a href="<?php echo get_the_permalink(); ?>"><div class="  museBGSize rounded-corners grpelem" id="u22611"style="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>"><!-- simple frame --></div></a>
        <div class="clearfix grpelem" id="pu22616-4"><!-- column -->
         <!-- m_editable region-id="editable-static-tag-U22616-BP_760" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
         <div class=" clearfix colelem" id="u22616-4" data-muse-uid="U22616" data-muse-type="txt_frame"><?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
         <!-- /m_editable -->
         <div class="colelem" id="u22607"><!-- simple frame --></div>
         <!-- m_editable region-id="editable-static-tag-U22609-BP_760" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
         <div class=" clearfix colelem" id="u22609-4" data-muse-uid="U22609" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php the_excerpt();?></div>
         <!-- /m_editable -->
         <div class="clearfix colelem" id="pbuttonu22614"><!-- group -->
          <a href="<?php the_permalink(); ?>" ><div class="Button  rounded-corners clearfix grpelem" id="buttonu22614"><!-- container box -->
           <!-- m_editable region-id="editable-static-tag-U22615-BP_760" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
           <div class="clearfix grpelem" id="u22615-4" data-muse-uid="U22615" data-muse-type="txt_frame"><!-- content -->
            <p>Read More</p>
           </div>
           <!-- /m_editable -->
          </div></a>
          <div class="size_fixed grpelem" id="u22610"><!-- custom html -->
           
<?php global $post;
				$post_id=$post->ID;

				$post_url = get_the_permalink($post_id);

				$post_title = get_the_title($post_id);


				$urlu22610 = '';

				switch('facebook'){

					case 'facebook':
							$urlu22610 = sprintf('https://www.facebook.com/sharer/sharer.php?u=%1$s&t=%2$s', $post_url, $post_title);
							break;
					case 'googleplus':
							$urlu22610 = sprintf('https://plus.google.com/share?url=%1$s', $post_url);
							break;

					case 'twitter':
						$urlu22610 = sprintf('https://www.twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title);
						break;
						}

				?>
	<a  href="<?php echo $urlu22610; ?>"><img src="http://kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/assets/u888.png"/></a>

          </div>
         </div>
        </div>
       </div>