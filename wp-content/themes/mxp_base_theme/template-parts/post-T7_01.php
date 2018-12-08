<div class=" clearfix grpelem" id="u21775"><!-- group -->
       <a href="<?php echo get_the_permalink(); ?>"><div class="  museBGSize rounded-corners grpelem" id="u21776"style="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>"><!-- simple frame --></div></a>
       <div class="clearfix grpelem" id="pu21774-4"><!-- column -->
        <!-- m_editable region-id="editable-static-tag-U21774-BP_infinity" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
        <div class=" clearfix colelem" id="u21774-4" data-muse-uid="U21774" data-muse-type="txt_frame"><?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
        <!-- /m_editable -->
        <div class="colelem" id="u21779"><!-- simple frame --></div>
        <!-- m_editable region-id="editable-static-tag-U21778-BP_infinity" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
        <div class=" clearfix colelem" id="u21778-4" data-muse-uid="U21778" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php the_excerpt();?></div>
        <!-- /m_editable -->
        <div class="clearfix colelem" id="pbuttonu21772"><!-- group -->
         <a href="<?php the_permalink(); ?>" ><div class="Button  rounded-corners clearfix grpelem" id="buttonu21772"><!-- container box -->
          <!-- m_editable region-id="editable-static-tag-U21773-BP_infinity" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
          <div class="clearfix grpelem" id="u21773-4" data-muse-uid="U21773" data-muse-type="txt_frame"><!-- content -->
           <p>Read More</p>
          </div>
          <!-- /m_editable -->
         </div></a>
         <div class="size_fixed grpelem" id="u21770"><!-- custom html -->
          
<?php global $post;
				$post_id=$post->ID;

				$post_url = get_the_permalink($post_id);

				$post_title = get_the_title($post_id);


				$urlu21770 = '';

				switch('facebook'){

					case 'facebook':
							$urlu21770 = sprintf('https://www.facebook.com/sharer/sharer.php?u=%1$s&t=%2$s', $post_url, $post_title);
							break;
					case 'googleplus':
							$urlu21770 = sprintf('https://plus.google.com/share?url=%1$s', $post_url);
							break;

					case 'twitter':
						$urlu21770 = sprintf('https://www.twitter.com/intent/tweet?text=%2$s&url=%1$s', $post_url, $post_title);
						break;
						}

				?>
	<a  href="<?php echo $urlu21770; ?>"><img src="http://kaharo.pl/wp-content/themes/mxp_base_theme/mxp_theme/assets/u888.png"/></a>

         </div>
        </div>
       </div>
      </div>