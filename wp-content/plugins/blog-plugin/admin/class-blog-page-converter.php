<?php

class Blog_Page_Converter {
	private $page_parse;
	private $base_theme_root_path;
	private $user_theme_root_path;
	private $page_name;
	private $matches;


	public function __construct( $page_parse, $base_theme_root_path, $user_theme_root_path, $page_name,$matches) {

		require_once MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_PATH . 'includes/class-blog-utility.php';
		require_once MUSEXPRESS_BLOG_PLUGIN_DIRECTORY_PATH . 'includes/class-mxp-blog-error-handler.php';

		$this->page_parse = $page_parse;
		$this->base_theme_root_path = $base_theme_root_path;
		$this->user_theme_root_path = $user_theme_root_path;
		
		$this->page_name = $page_name;
		$this->matches = $matches;


	}
	
	public function create_template(){
		//Update posts_per_page
		if ( $this->page_parse->find( '.mxp_posts_per_page ', 0 ) ) {

			$attrs = $this->page_parse->find( '.mxp_posts_per_page ', 0 )->attr;
			foreach ( $attrs as $key => $value ) {

				if ( $key == 'data-mxp' && $value == 'true' ) {
					$posts_per_page = intval( $this->page_parse->find( '.mxp_posts_per_page', 0 )->innertext );
					update_option( 'posts_per_page', $posts_per_page );
				}
			}

		}


		//Crea una pagina template per ogni post grid
		$id = array();

		foreach ( $this->page_parse->find( '.musegain_container' ) as $container ) {

			array_push( $id, $container->id );

		}

		$blog_grid_templates = $this->page_parse->find( '.MusexPress-Blog-Grid' );
		foreach ( $blog_grid_templates as $canvas ) {


			$id =   Blog_utility::get_string_between( $canvas->find( '.MusexPress-Blog-Title ', 0 )->innertext, '[', ']' );


			if ( strlen( (string) $canvas ) > 0 ) {

				if ( strlen( $id ) > 0 ) {
					$this->create_post_template( $canvas, $id, $this->base_theme_root_path, $this->matches);
				}
			}

			if ( strlen( $id ) == 0 ) {

				$breakpoint_id = '';

				$breakpoints = $this->page_parse->find('.breakpoint');
				foreach ( $breakpoints as $breakpoint){
					if(!empty($breakpoint->find('#' . $canvas->id)[0])){
						$breakpoint_id = $breakpoint->id;
					}
				}

				$error_msg ='Please check your Muse Theme. ';
				if($breakpoint_id==''){
					$error_msg.='Converter found: ';
					$error_msg.= '<strong>'.count($breakpoints).' Breakpoints </strong>';
					$error_msg.='and <strong>'.count($blog_grid_templates).' Post Templates</strong>.';
					$error_msg.='<br>Be sure to have same number of Breakpoints and Post templates. ';
				}else{
					$error_msg.='There is a problem in ' . Mxp_blog_error_handler::musexpress_breakpoint_pretty_name($breakpoint_id);
				}

				$error_msg.='<p>It may depend on one of the following issues:</p>';
				$error_msg.='<ul>';
				$error_msg.='<li><strong>You used a system font that got exported as an image:</strong> all fonts you use with blog widgets need to be a web font or a typekit font;</li>';
				$error_msg.='<li><strong>The page doesn’t have the same breakpoints as the related Master:</strong> just create the same breakpoints you have in the Master or use a different Master;</li>';
				$error_msg.='<li><strong>The rectangle that should contain all your content has been deleted:</strong> be sure that your post content is wrapped inside a rectangle that has the graphic style “MusexPress Blog Grid” attached;</li>';
				$error_msg.='<li><strong>ID is not present or not included inside square brackets, (e.g: [ID_01]):</strong> be sure to open and close the square brackets correctly.</li>';
				$error_msg.='</ul>';
				$error_msg.='<br><div style="text-align: center;">Don\'t forget to take a look at our Documentation and Videotutorials.</div>';

				Mxp_blog_error_handler::musexpress_error('Ops, there is an error in the "'.$this->page_name.'" page', $error_msg );


			}

			$canvas->outertext = '';


		}

		foreach ($this->page_parse->find('.MusexPress-Posts-Template') as $elem ){

			$the_post = $this->find_id_posts_template($elem);
			if($the_post!==''){
				$this->convert_posts_template($elem,$the_post);
			}else{

				$this->remove_classes($elem);
			}

		}





		foreach ( $this->page_parse->find( '.MusexPress-Blog-Next-Button' ) as $elem ) {


			$elem->outertext = '<?php if(get_next_posts_link()!=null):?><?php echo str_replace("</a>","",get_next_posts_link( " " )); ?>' . $elem . '</a><?php endif; ?>';

		}

		foreach ( $this->page_parse->find( '.MusexPress-Blog-Previous-Button' ) as $elem ) {


			$elem->outertext = '<?php if(get_previous_posts_link()!=null):?><?php echo str_replace("</a>","",get_previous_posts_link( " " )); ?>' . $elem . '</a><?php endif; ?>';

		}


		foreach ( $this->page_parse->find( '.MusexPress-Blog-Numbers' ) as $elem ) {


			$elem->last_child()->innertext = '  <?php echo paginate_links( array(
\'mid_size\'           => 1,
\'prev_next\'          => true,
\'prev_text\'          => " ",
\'next_text\'          => " "

)); ?>';
		}

		foreach ( $this->page_parse->find( '.MusexPress-Post-Title' ) as $elem ) {


			$last_child = $elem->last_child();
			if(!empty($last_child->last_child())){

				$last_child->last_child()->innertext = '<?php echo get_the_title(); ?>';
			}
			else{
				$last_child->innertext = '<?php echo get_the_title(); ?>';
			}

		}


		foreach ( $this->page_parse->find( '.MusexPress-Post-Date' ) as $post_date ) {


			$post_date->last_child()->innertext = '<?php echo get_the_date( "", \'\', \'\', true ); ?>';
		}

		foreach ( $this->page_parse->find( '.MusexPress-Post-Comments' ) as $comments_number ) {


			$comments_number->last_child()->innertext = '<?php if(comments_open()) {
          echo get_comments_number();
           }
           else
             echo __("Comments are closed.");
           ?>';
		}

		foreach ( $this->page_parse->find( '.MusexPress-Post-Category-List' ) as $category_link ) {


			$sep_matches = array();
			preg_match( '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $category_link->last_child()->innertext, $sep_matches );
			$separator = ' ';
			if ( isset( $sep_matches[0] ) ) {
				$separator = $sep_matches[0];
			}
			$category_link->innertext = '<?php echo get_the_category_list(" ' . $separator . ' "); ?>';

		}

		foreach ( $this->page_parse->find( '.MusexPress-Post-Tag-List' ) as $tag_link ) {


			$sep_matches = array();
			preg_match( '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $tag_link->last_child()->innertext, $sep_matches );
			$separator = ' ';
			if ( isset( $sep_matches[0] ) ) {
				$separator = $sep_matches[0];
			}
			$tag_link->innertext = '<?php echo get_the_tag_list(""," ' . $separator . ' "); ?>';

		}
		foreach ( $this->page_parse->find( '.MusexPress-Post-Image' ) as $image ) {

			$image->attr['class'] = str_replace( 'MusexPress-Post-Image', '', $image->attr['class'] );
            $image->attr['style'] = '<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>';

		}

		foreach ( $this->page_parse->find('.MusexPress-Post-Main-Category') as $main_cat ){

			if ( ! empty( $main_cat ) ) {

				$last_child = $main_cat->last_child();
				if(!empty($last_child->last_child())){

					$last_child->last_child()->innertext = '<?php $cat_id = get_post_meta("", "_mxp_main_blog_category", true); if(!empty($cat_id)){ echo get_cat_name($cat_id);} ?>';
				}
				else{
					$last_child->innertext = '<?php if(!empty($cat_id)){ echo get_cat_name($cat_id);} ?>';
				}
				$main_cat->attr['href'] = '<?php echo $cat_link; ?>';
				$main_cat->outertext = '<?php $cat_id = get_post_meta(get_the_ID(), "_mxp_main_blog_category", true); $cat_link = get_category_link($cat_id); ?>' . $main_cat ;

			}

		}

		foreach ( $this->page_parse->find( '.MusexPress-Post-Prev-Link' ) as $prev_link ){

			$prev_href = '<?php $prev = get_permalink(get_adjacent_post(false,"",false)); if ($prev != get_permalink()) { ?><a href="<?php echo $prev; ?>">' . $prev_link . '</a><?php } ?>';

			$prev_link->outertext = $prev_href;
		}

		foreach ( $this->page_parse->find( '.MusexPress-Post-Next-Link' ) as $next_link ){

			$next_href = '<?php $next = get_permalink(get_adjacent_post(false,"",true)); if ($next != get_permalink()) { ?><a href="<?php echo $next; ?>">' . $next_link . '</a><?php } ?>';

			$next_link->outertext = $next_href;
		}


		foreach ( $this->page_parse->find( '.MusexPress-Blog-NoContent' ) as $no_content ){

			$no_content->outertext = '<?php if(!have_posts()) : ?>'.$no_content.'<?php endif; ?>';
		}

	}
	


	function create_post_template($canvas, $id, $base_theme_root_path, $matches){


		$canvas->attr['class'] = str_replace( 'MusexPress-Blog-Grid', '', $canvas->attr['class'] );
		//test
		//$canvas->attr['style'] = 'width:100%; left:0;';

		foreach ( $canvas->find( '.MusexPress-Blog-Author-Name' ) as $author_name ) {


			if ( ! empty( $author_name ) ) {

				$author_name->attr['class'] = str_replace( 'MusexPress-Blog-Author-Name', '', $author_name->attr['class'] );

				$author_name->innertext = '<div><a href="<?php echo get_author_posts_url(get_the_author_meta( \'ID\' ));?>"><?php the_author(); ?></a></div>';

			}

		}


		foreach ( $canvas->find( '.MusexPress-Blog-Title' ) as $post_title ) {


			if ( ! empty( $post_title ) ) {


				$post_title->attr['class'] = str_replace( 'MusexPress-Blog-Title', '', $post_title->attr['class'] );

				$post_title->innertext = '<?php the_title( \'<h2><a href="\' . esc_url( get_permalink() ) . \'" rel="bookmark">\', \'</a></h2>\' ); ?>';

			}

		}


		foreach ( $canvas->find( '.MusexPress-Blog-Date' ) as $post_date ) {


			if ( ! empty( $post_date ) ) {

				$post_date->attr['class'] = str_replace( 'MusexPress-Blog-Date', '', $post_date->attr['class'] );

				$post_date->innertext = '<?php echo get_the_date( "", \'\', \'\', true ); ?>';

			}

		}


		foreach ( $canvas->find( '.MusexPress-Blog-Body' ) as $post_excerpt ) {


			if ( ! empty( $post_excerpt ) ) {


				$post_excerpt->attr['class'] = str_replace( 'MusexPress-Blog-Body', '', $post_excerpt->attr['class'] );

				$post_excerpt->innertext = '<?php the_excerpt();?>';

			}
		}


		foreach ( $canvas->find( '.MusexPress-Blog-Link' ) as $post_link ) {


			if ( ! empty( $post_link ) ) {


				$post_link->attr['class'] = str_replace( 'MusexPress-Blog-Link', '', $post_link->attr['class'] );


				$post_link->outertext = '<a href="<?php the_permalink(); ?>" >' . $post_link . '</a>';

			}

		}


		foreach ( $canvas->find( '.MusexPress-Blog-Category-List' ) as $category_link ) {

			if ( ! empty( $category_link ) ) {

				$sep_matches = array();
				preg_match( '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $category_link->last_child()->innertext, $sep_matches );
				$separator = ' ';
				if ( isset( $sep_matches[0] ) ) {
					$separator = $sep_matches[0];
				}

				$category_link->attr['class'] = str_replace( 'MusexPress-Blog-Category-List', '', $category_link->attr['class'] );

				$category_link->innertext = '<?php echo get_the_category_list("' . $separator . ' "); ?>';

			}
		}


		foreach ( $canvas->find( '.MusexPress-Blog-Tag-List' ) as $tag_link ) {

			if ( ! empty( $tag_link ) ) {
				$sep_matches = array();
				preg_match( '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $tag_link->last_child()->innertext, $sep_matches );
				$separator = ' ';
				if ( isset( $sep_matches[0] ) ) {
					$separator = $sep_matches[0];
				}


				$tag_link->attr['class'] = str_replace( 'MusexPress-Blog-Tag-List', '', $tag_link->attr['class'] );

				$tag_link->innertext = '<?php echo get_the_tag_list("","' . $separator . ' "); ?>';

			}
		}


		foreach ( $canvas->find( '.MusexPress-Blog-Comments' ) as $comments_number ) {


			if ( ! empty( $comments_number ) ) {


				$comments_number->attr['class'] = str_replace( 'MusexPress-Blog-Comments', '', $comments_number->attr['class'] );

				$comments_number->last_child()->innertext = '<?php echo get_comments_number(); ?>';

			}
		}


		foreach ( $canvas->find( '.MusexPress-Blog-Author-Image' ) as $author_image ) {


			if ( ! empty( $author_image ) ) {

				$attrs = $author_image->attr;

				$author_image->attr['class'] = str_replace( 'MusexPress-Blog-Author-Image', '', $attrs['class'] );

				$author_image->attr['style'] = '<?php $author_url = get_avatar_url( get_the_author_meta( \'ID\' ) ); echo "background-image: url(".$author_url.");" ;?>';
				$author_image->outertext = '<a href="<?php echo get_author_posts_url( get_the_author_meta( \'ID\' ) ); ?>">'.$author_image.'</a>';

			}
		}


		foreach ( $canvas->find( '.MusexPress-Blog-Image' ) as $image ) {

			if ( ! empty( $image ) ) {


				$attrs = $image->attr;

				$image->attr['class'] = str_replace( 'MusexPress-Blog-Image', ' ', $attrs['class'] );
				$image->attr['style'] = '<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); echo "background-image: url(".$url.");";?>';

				$image->outertext = '<a href="<?php echo get_the_permalink(); ?>">'.$image.'</a>';
			}

		}



		$pattern    = '/\[MUSEGAIN-CODE\#([\d]+)\]/';

		$php_canvas = preg_replace_callback( $pattern, function ( $match ) use ( $matches ) {
			global $matches;
			return $matches[ $match[1] ][0];
		}, $canvas );


		file_put_contents( $base_theme_root_path . '/template-parts/post-' . $id . '.php', $php_canvas );

	}


	function convert_posts_template($elem, $the_post){


		foreach ( $elem->find( '.MusexPress-Posts-Title' ) as $post_title ) {


			if ( ! empty( $post_title ) ) {

				$last_child = $post_title->last_child();
				if(!empty($last_child->last_child())){

					$last_child->last_child()->innertext = '<?php echo get_the_title(); ?>';
				}
				else{
					$last_child->innertext = '<?php echo get_the_title(); ?>';
				}

				$post_title->attr['href'] = '<?php echo get_the_permalink(); ?>';
				$post_title->attr['class'] = str_replace( 'MusexPress-Posts-Title', '', $post_title->attr['class'] );

			}

		}

		foreach ( $elem->find('.MusexPress-Posts-Image') as $image ) {
			if ( ! empty( $image ) ) {

				$style = '<?php $url = wp_get_attachment_url( get_post_thumbnail_id('.$the_post.'->ID) ); echo "background-image: url(".$url.");";?>';
				$image->attr['style'] = $style;
				$orig_id = $image->attr['id'];
				$the_link = '<?php echo get_the_permalink('.$the_post.'); ?>';
				$image->attr['mxp-link'] = $the_link;

				foreach ( $this->page_parse->find('[data-orig-id="'.$orig_id.'"]') as $other_img ){
					$other_img->attr['style'] = $style;
					$other_img->attr['mxp-link'] = $the_link;
				}
				$image->attr['class'] = str_replace( 'MusexPress-Posts-Image', '', 	$image->attr['class'] );
			}
		}


		foreach ( $elem->find( '.MusexPress-Posts-Excerpt' ) as $post_excerpt ) {


			if ( ! empty( $post_excerpt ) ) {

				$post_excerpt->innertext = '<?php echo get_the_excerpt(); ?>';
				$post_excerpt->attr['class'] = str_replace( 'MusexPress-Posts-Excerpt', '', $post_excerpt->attr['class'] );

			}
		}


		foreach ( $elem->find( '.MusexPress-Posts-Link' ) as $post_link ) {


			if ( ! empty( $post_link ) ) {

				$post_link->attr['href'] = '<?php echo get_the_permalink(); ?>';
				$post_link->attr['class'] = str_replace( 'MusexPress-Posts-Link', '', $post_link->attr['class'] );
				$orig_id = $post_link->attr['id'];
				$the_link = '<?php echo get_the_permalink('.$the_post.'); ?>';

				foreach ( $this->page_parse->find('[data-orig-id="'.$orig_id.'"]') as $other_links ){
					$other_links->attr['href'] = $the_link;
				}

			}

		}

		foreach ($elem->find('.MusexPress-Posts-Main-Category') as $main_cat ){

			if ( ! empty( $main_cat ) ) {

				$last_child = $main_cat->last_child();
				if(!empty($last_child->last_child())){

					$last_child->last_child()->innertext = '<?php if(!empty($cat_id)){ echo get_cat_name($cat_id);} ?>';
				}
				else{
					$last_child->innertext = '<?php if(!empty($cat_id)){ echo get_cat_name($cat_id);} ?>';
				}
				$main_cat->attr['href'] = '<?php echo $cat_link; ?>';
				$main_cat->outertext = '<?php $cat_id = get_post_meta('.$the_post.'->ID, "_mxp_main_blog_category", true); $cat_link = get_category_link($cat_id); ?>' . $main_cat;
				$main_cat->attr['class'] = str_replace( 'MusexPress-Posts-Main-Category', '', $main_cat->attr['class'] );


			}

		}

		foreach ( $elem->find( '.MusexPress-Posts-Date' ) as $post_date ) {


			if ( ! empty( $post_date ) ) {

				$post_date->innertext = '<?php echo get_the_date( get_option(\'date_format\')); ?>';
				$post_date->attr['class'] = str_replace( 'MusexPress-Posts-Date', '', $post_date->attr['class'] );

			}

		}
		foreach ( $elem->find( '.MusexPress-Posts-Comments' ) as $comments_number ) {


			if ( ! empty( $comments_number ) ) {

				$comments_number->last_child()->innertext = '<?php echo get_comments_number(); ?>';
				$comments_number->attr['class'] = str_replace( 'MusexPress-Posts-Comments', '', $comments_number->attr['class'] );

			}
		}


		foreach ( $elem->find( '.MusexPress-Posts-Author-Name' ) as $author_name ) {

			if ( ! empty( $author_name ) ) {

				$author_name->attr['href'] = '<?php $post_author_id = get_post_field( \'post_author\' ); echo get_author_posts_url( $post_author_id );?>';

				$author_name->innertext = '<?php echo get_the_author_meta( "nicename", $post_author_id  ); ?>';

				$author_name->attr['class'] = str_replace( 'MusexPress-Posts-Author-Name', '', $author_name->attr['class'] );

			}

		}

		foreach ( $elem->find( '.MusexPress-Posts-Author-Image' ) as $author_image ) {


			if ( ! empty( $author_image ) ) {

				$style = '<?php $post_author_id = get_post_field( \'post_author\', '.$the_post.'->ID ); $author_url = get_avatar_url( $post_author_id ); echo "background-image: url(".$author_url.");" ;?>';
				$the_link = '<?php $post_author_id = get_post_field( \'post_author\', '.$the_post.'->ID ); echo get_author_posts_url( $post_author_id ); ?>';

				$author_image->attr['style'] = $style;
				$author_image->attr['href'] = $the_link;
				$orig_id = $author_image->attr['id'];
				$author_image->attr['class'] = str_replace( 'MusexPress-Posts-Author-Image', '', $author_image->attr['class'] );

				foreach ( $this->page_parse->find('[data-orig-id="'.$orig_id.'"]') as $other_img ){
					$other_img->attr['style'] = $style;
					$other_img->attr['href'] = $the_link;
				}
			}
		}


		foreach ( $elem->find( '.MusexPress-Posts-Category-List' ) as $category_link ) {


			$sep_matches = array();
			preg_match( '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $category_link->last_child()->innertext, $sep_matches );
			$separator = ' ';
			if ( isset( $sep_matches[0] ) ) {
				$separator = $sep_matches[0];
			}
			$category_link->innertext = '<?php echo get_the_category_list(" ' . $separator . ' "); ?>';
			$category_link->attr['class'] = str_replace( 'MusexPress-Posts-Category-List', '', $category_link->attr['class'] );

		}

		foreach ( $elem->find( '.MusexPress-Posts-Tag-List' ) as $tag_link ) {

			$sep_matches = array();
			preg_match( '/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $tag_link->last_child()->innertext, $sep_matches );
			$separator = ' ';
			if ( isset( $sep_matches[0] ) ) {
				$separator = $sep_matches[0];
			}
			$tag_link->innertext = '<?php echo get_the_tag_list(""," ' . $separator . ' "); ?>';
			$tag_link->attr['class'] = str_replace( 'MusexPress-Posts-Tag-List', '', $tag_link->attr['class'] );

		}


		$start_check_script = '<?php if(isset('.$the_post.')) : ?><?php global $post; $post = '.$the_post.'; setup_postdata('.$the_post.'); ?>';
		$end_script = '<?php wp_reset_postdata(); ?><?php endif; ?>';
		$elem->innertext = $start_check_script . $elem->innertext . $end_script;

		$orig_container_id = $elem->attr['id'];

		foreach ( $this->page_parse->find('[data-orig-id="'.$orig_container_id.'"]') as $other_containers ){
			$other_containers->innertext = $start_check_script . $other_containers->innertext . $end_script;
			$other_containers->attr['class'] = str_replace( 'MusexPress-Posts-Template', 'MusexPress-Posts-Template-Container', $other_containers->attr['class'] );

		}

		$elem->attr['style'] = $elem->attr['style'] .' <?php echo isset('.$the_post.') ? "" : "; display: none;" ;?> ';
		$elem->attr['class'] = str_replace( 'MusexPress-Posts-Template', 'MusexPress-Posts-Template-Container', $elem->attr['class'] );

	}

	function find_id_posts_template($elem){
		$id = Blog_utility::get_string_between( $elem->find( '.MusexPress-Posts-Title ', 0 )->innertext, '[', ']' );

		if(!empty($id)){
			return '$posts_'.str_replace('_','[',$id).'-1]';
		}
		return '';
	}

	function remove_classes($elem){


		$innertext = $elem->innertext;

		$classes_to_remove = array ('MusexPress-Posts-Title','MusexPress-Posts-Image','MusexPress-Posts-Excerpt',
			'MusexPress-Posts-Link','MusexPress-Posts-Main-Category','MusexPress-Posts-Tag-List','MusexPress-Posts-Date',
			'MusexPress-Posts-Comments',
			'MusexPress-Posts-Author-Name','MusexPress-Posts-Author-Image','MusexPress-Posts-Category-List');

		foreach ( $classes_to_remove as $class ){
			$innertext = str_replace($class,'',$innertext);
		}

		$innertext = str_replace( 'MusexPress-Posts-Template', 'MusexPress-Posts-Template-Container', $innertext );

        $elem->innertext = $innertext;


	}


}