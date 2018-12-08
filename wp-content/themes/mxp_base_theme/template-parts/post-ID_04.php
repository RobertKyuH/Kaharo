<div class=" rounded-corners clearfix grpelem" id="u20544"><!-- group -->
        <div class="clearfix grpelem" id="pu20543"><!-- column -->
         <a href="<?php echo get_the_permalink(); ?>"><div class="  museBGSize rounded-corners colelem" id="u20543"style="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>"><!-- simple frame --></div></a>
         <div class="clearfix colelem" id="pu20549-4"><!-- group -->
          <!-- m_editable region-id="editable-static-tag-U20549-BP_760" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20549-4" data-muse-uid="U20549" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><div><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ));?>"><?php the_author(); ?></a></div></div>
          <!-- /m_editable -->
          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><div class=" museBGSize rounded-corners grpelem" id="u20546"style="<?php $author_url = get_avatar_url( get_the_author_meta( 'ID' ) ); echo "background-image: url(".$author_url.");" ;?>"><!-- simple frame --></div></a>
          <!-- m_editable region-id="editable-static-tag-U20550-BP_760" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20550-4" data-muse-uid="U20550" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php echo get_the_date( "", '', '', true ); ?></div>
          <!-- /m_editable -->
         </div>
         <div class="clearfix colelem" id="pbuttonu20547"><!-- group -->
          <a href="<?php the_permalink(); ?>" ><div class="Button  rounded-corners clearfix grpelem" id="buttonu20547"><!-- container box -->
           <!-- m_editable region-id="editable-static-tag-U20548-BP_760" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
           <div class="clearfix grpelem" id="u20548-4" data-muse-uid="U20548" data-muse-type="txt_frame"><!-- content -->
            <p>Read More</p>
           </div>
           <!-- /m_editable -->
          </div></a>
          <!-- m_editable region-id="editable-static-tag-U20545-BP_760" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20545-4" data-muse-uid="U20545" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php the_excerpt();?></div>
          <!-- /m_editable -->
          <!-- m_editable region-id="editable-static-tag-U20542-BP_760" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
          <div class=" clearfix grpelem" id="u20542-4" data-muse-uid="U20542" data-muse-type="txt_frame"><?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
          <!-- /m_editable -->
         </div>
        </div>
       </div>