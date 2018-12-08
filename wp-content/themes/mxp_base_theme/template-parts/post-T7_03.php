<div class=" clearfix grpelem" id="u22260"><!-- group -->
        <a href="<?php echo get_the_permalink(); ?>"><div class="  museBGSize rounded-corners grpelem" id="u22259"style="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>"><!-- simple frame --></div></a>
        <div class="clearfix grpelem" id="pu22264-4"><!-- column -->
         <!-- m_editable region-id="editable-static-tag-U22264-BP_1000" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
         <div class=" clearfix colelem" id="u22264-4" data-muse-uid="U22264" data-muse-type="txt_frame"><?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
         <!-- /m_editable -->
         <div class="colelem" id="u22255"><!-- simple frame --></div>
         <!-- m_editable region-id="editable-static-tag-U22257-BP_1000" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
         <div class=" clearfix colelem" id="u22257-4" data-muse-uid="U22257" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php the_excerpt();?></div>
         <!-- /m_editable -->
         <div class="clearfix colelem" id="pbuttonu22262"><!-- group -->
          <a href="<?php the_permalink(); ?>" ><div class="Button  rounded-corners clearfix grpelem" id="buttonu22262"><!-- container box -->
           <!-- m_editable region-id="editable-static-tag-U22263-BP_1000" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
           <div class="clearfix grpelem" id="u22263-4" data-muse-uid="U22263" data-muse-type="txt_frame"><!-- content -->
            <p id="u22263-2">Read More</p>
           </div>
           <!-- /m_editable -->
          </div></a>
          <div class="size_fixed grpelem" id="u22258"><!-- custom html -->
           
<?php global $post;
				$post_id=$post->ID;

				$post_url = get_the_permalink($post_id);

				$post_title = get_the_title($post_id);


				$urlu22258 = '';

				switch('facebook'){

					case 'facebook':
							$urlu22258 = sprintf('https://www.facebook.com/sharer/sharer.php?u=%1$s&t=%2$s', $post_url, $post_title);
							break;
					case 'googleplus':
							$urlu22258 = sprintf('https://plus.google.com/share?url=%1$s', $post_url);
							break;

					case 'twitter':
						$urlu22258 = sprintf('https://www.twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title);
						break;
						}

				?>
	<a  href="<?php echo $urlu22258; ?>"><img src="http://kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/assets/u888.png"/></a>

          </div>
         </div>
        </div>
       </div>