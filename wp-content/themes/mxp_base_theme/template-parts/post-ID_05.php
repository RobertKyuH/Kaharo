<div class=" rounded-corners clearfix grpelem" id="u20679"><!-- group -->
        <div class="clearfix grpelem" id="pu20678"><!-- column -->
         <a href="<?php echo get_the_permalink(); ?>"><div class="  museBGSize rounded-corners colelem" id="u20678"style="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>"><!-- simple frame --></div></a>
         <div class="clearfix colelem" id="pbuttonu20682"><!-- group -->
          <a href="<?php the_permalink(); ?>" ><div class="Button  rounded-corners clearfix grpelem" id="buttonu20682"><!-- container box -->
           <!-- m_editable region-id="editable-static-tag-U20683-BP_520" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
           <div class="clearfix grpelem" id="u20683-4" data-muse-uid="U20683" data-muse-type="txt_frame"><!-- content -->
            <p>Read More</p>
           </div>
           <!-- /m_editable -->
          </div></a>
          <!-- m_editable region-id="editable-static-tag-U20684-BP_520" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20684-4" data-muse-uid="U20684" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><div><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ));?>"><?php the_author(); ?></a></div></div>
          <!-- /m_editable -->
          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><div class=" museBGSize rounded-corners grpelem" id="u20681"style="<?php $author_url = get_avatar_url( get_the_author_meta( 'ID' ) ); echo "background-image: url(".$author_url.");" ;?>"><!-- simple frame --></div></a>
          <!-- m_editable region-id="editable-static-tag-U20680-BP_520" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20680-4" data-muse-uid="U20680" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php the_excerpt();?></div>
          <!-- /m_editable -->
          <!-- m_editable region-id="editable-static-tag-U20685-BP_520" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20685-4" data-muse-uid="U20685" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php echo get_the_date( "", '', '', true ); ?></div>
          <!-- /m_editable -->
          <!-- m_editable region-id="editable-static-tag-U20677-BP_520" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
          <div class=" clearfix grpelem" id="u20677-4" data-muse-uid="U20677" data-muse-type="txt_frame"><?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
          <!-- /m_editable -->
         </div>
        </div>
       </div>