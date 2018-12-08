<div class=" rounded-corners clearfix grpelem" id="u20409"><!-- group -->
        <div class="clearfix grpelem" id="pu20408"><!-- column -->
         <a href="<?php echo get_the_permalink(); ?>"><div class="  museBGSize rounded-corners colelem" id="u20408"style="<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>"><!-- simple frame --></div></a>
         <div class="clearfix colelem" id="pu20414-4"><!-- group -->
          <!-- m_editable region-id="editable-static-tag-U20414-BP_1000" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20414-4" data-muse-uid="U20414" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><div><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' ));?>"><?php the_author(); ?></a></div></div>
          <!-- /m_editable -->
          <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><div class=" museBGSize rounded-corners grpelem" id="u20411"style="<?php $author_url = get_avatar_url( get_the_author_meta( 'ID' ) ); echo "background-image: url(".$author_url.");" ;?>"><!-- simple frame --></div></a>
          <!-- m_editable region-id="editable-static-tag-U20415-BP_1000" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20415-4" data-muse-uid="U20415" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php echo get_the_date( "", '', '', true ); ?></div>
          <!-- /m_editable -->
         </div>
         <!-- m_editable region-id="editable-static-tag-U20407-BP_1000" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
         <div class=" clearfix colelem" id="u20407-4" data-muse-uid="U20407" data-muse-type="txt_frame"><?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?></div>
         <!-- /m_editable -->
         <div class="clearfix colelem" id="pbuttonu20412"><!-- group -->
          <a href="<?php the_permalink(); ?>" ><div class="Button  rounded-corners clearfix grpelem" id="buttonu20412"><!-- container box -->
           <!-- m_editable region-id="editable-static-tag-U20413-BP_1000" template="blog.html" data-type="html" data-ice-options="disableImageResize,link" -->
           <div class="clearfix grpelem" id="u20413-4" data-muse-uid="U20413" data-muse-type="txt_frame"><!-- content -->
            <p>Read More</p>
           </div>
           <!-- /m_editable -->
          </div></a>
          <!-- m_editable region-id="editable-static-tag-U20410-BP_1000" template="blog.html" data-type="html" data-ice-options="disableImageResize,link,txtStyleTarget" -->
          <div class=" clearfix grpelem" id="u20410-4" data-muse-uid="U20410" data-muse-type="txt_frame" data-ibe-flags="txtStyleSrc"><?php the_excerpt();?></div>
          <!-- /m_editable -->
         </div>
        </div>
       </div>