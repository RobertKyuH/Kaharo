<div class=" rounded-corners clearfix grpelem" id="u20163"><!-- group -->
        <div class="clearfix grpelem" id="pu20162"><!-- column -->
         <a href="<?php echo get_the_permalink(); ?>"><div class="  museBGSize rounded-corners colelem" id="u20162"style="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>"><!-- simple frame --></div></a>
         <div class="clearfix colelem" id="pu20165"><!-- group -->
          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><div class=" museBGSize rounded-corners grpelem" id="u20165"style="<?php $author_url = get_avatar_url( get_the_author_meta( 'ID' ) ); echo "background-image: url(".$author_url.");" ;?>"><!-- simple frame --></div></a>
          <!-- m_editable region-id="editable-static-tag-U20168-BP_1200" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20168-4" data-muse-uid="U20168" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><div><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ));?>"><?php the_author(); ?></a></div></div>
          <!-- /m_editable -->
          <!-- m_editable region-id="editable-static-tag-U20169-BP_1200" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20169-4" data-muse-uid="U20169" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php echo get_the_date( "", '', '', true ); ?></div>
          <!-- /m_editable -->
         </div>
         <!-- m_editable region-id="editable-static-tag-U20161-BP_1200" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
         <div class=" clearfix colelem" id="u20161-4" data-muse-uid="U20161" data-muse-type="txt_frame"><?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
         <!-- /m_editable -->
         <!-- m_editable region-id="editable-static-tag-U20164-BP_1200" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
         <div class=" clearfix colelem" id="u20164-4" data-muse-uid="U20164" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php the_excerpt();?></div>
         <!-- /m_editable -->
         <a href="<?php the_permalink(); ?>" ><div class="Button  rounded-corners clearfix colelem" id="buttonu20166"><!-- container box -->
          <!-- m_editable region-id="editable-static-tag-U20167-BP_1200" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
          <div class="clearfix grpelem" id="u20167-4" data-muse-uid="U20167" data-muse-type="txt_frame"><!-- content -->
           <p>Read More</p>
          </div>
          <!-- /m_editable -->
         </div></a>
        </div>
       </div>