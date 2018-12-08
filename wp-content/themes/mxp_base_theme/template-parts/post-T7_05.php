<div class=" clearfix grpelem" id="u22788"><!-- group -->
        <a href="<?php echo get_the_permalink(); ?>"><div class="  museBGSize rounded-corners grpelem" id="u22787"style="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>"><!-- simple frame --></div></a>
        <div class="clearfix grpelem" id="pu22792-4"><!-- column -->
         <!-- m_editable region-id="editable-static-tag-U22792-BP_520" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
         <div class=" clearfix colelem" id="u22792-4" data-muse-uid="U22792" data-muse-type="txt_frame"><?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
         <!-- /m_editable -->
         <div class="colelem" id="u22783"><!-- simple frame --></div>
         <!-- m_editable region-id="editable-static-tag-U22785-BP_520" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
         <div class=" clearfix colelem" id="u22785-4" data-muse-uid="U22785" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php the_excerpt();?></div>
         <!-- /m_editable -->
         <div class="clearfix colelem" id="pbuttonu22790"><!-- group -->
          <a href="<?php the_permalink(); ?>" ><div class="Button  rounded-corners clearfix grpelem" id="buttonu22790"><!-- container box -->
           <!-- m_editable region-id="editable-static-tag-U22791-BP_520" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
           <div class="clearfix grpelem" id="u22791-4" data-muse-uid="U22791" data-muse-type="txt_frame"><!-- content -->
            <p>Read More</p>
           </div>
           <!-- /m_editable -->
          </div></a>
          <div class="size_fixed grpelem" id="u22786"><!-- custom html -->
           
<?php global $post;
				$post_id=$post->ID;

				$post_url = get_the_permalink($post_id);

				$post_title = get_the_title($post_id);


				$urlu22786 = '';

				switch('facebook'){

					case 'facebook':
							$urlu22786 = sprintf('https://www.facebook.com/sharer/sharer.php?u=%1$s&t=%2$s', $post_url, $post_title);
							break;
					case 'googleplus':
							$urlu22786 = sprintf('https://plus.google.com/share?url=%1$s', $post_url);
							break;

					case 'twitter':
						$urlu22786 = sprintf('https://www.twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title);
						break;
						}

				?>
	<a  href="<?php echo $urlu22786; ?>"><img src="http://kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/assets/u888.png"/></a>

          </div>
         </div>
        </div>
       </div>