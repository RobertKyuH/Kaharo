<?php
/**
 * Created by PhpStorm.
 * User: Pietro Falco
 * Date: 19/12/2017
 * Time: 21:06
 */

namespace MusexPress\Converter\Utils;

/**
 * Class Php_Converter: converter utilities for php
 * @package MusexPress\Converter\Utils
 */
class Php_Converter {

	/**
	 * Preg pattern to find php scripts
	 * @since 3.2.0
	 */
	const PATTERN = <<<'LOD'
~

#definitions
(?(DEFINE)
    (?<sq> '(?>[^'\\]+|\\.)*+(?>'|\z) ) # content inside simple quotes
    (?<dq> "(?>[^"\\]+|\\.)*+(?>"|\z) ) # content inside double quotes
    (?<vn> [a-zA-Z_]\w*+ ) # variable name
    (?<crlf> \r?\n ) # CRLF
    (?<hndoc> <<< (["']?) (\g<vn>) \g{-2} \g<crlf> # content inside here/nowdoc
              (?> [^\r\n]+ | \R+ (?!\g{-1}; $) )*+
              (?: \g<crlf> \g{-1}; \g<crlf> | \z )
    )
    (?<cmt> /\*                      # multiline comments
             (?> [^*]+ | \* (?!/) )*+
             \*/
    )
)

#pattern
<\?php \s+
(?> [^"'?/<]+ | \?+(?!>) | \g<sq> | \g<dq> | \g<hndoc> | \g<cmt> | [</]+ )*+
(?: \?> | \z )

~xsm
LOD;

	/**
	 * MusexPress Placeholder
	 * @since 3.2.0
	 */
	const PLACEHOLDER_PATTERN = '/\[MUSEGAIN-CODE\#([\d]+)\]/';

	/**
	 * Wp Head script
	 * @since 3.2.0
	 */
	const WP_HEAD = <<<EOT
<?php
wp_enqueue_script("jquery");
wp_head();
?>
EOT;

	/**
	 * Wp Footer script
	 * @since 3.2.0
	 */
	const WP_FOOTER = <<<EOT
<?php
wp_footer();
?>
EOT;

	/**
	 * PHP script found
	 * @var
	 * @since 3.2.0
	 */
	private $matches;

	/**
	 * Php_Converter constructor.
	 */
	public function __construct() {

	}

	/**
	 * Returns get permalink php code
	 *
	 * @param $slug
	 *
	 * @return string
	 *
	 * @since 3.2.0
	 */
	public static function get_permalink( $slug ) {
		return "<?php echo get_permalink( mxp_get_page_by_slug( '$slug' ) ); ?>";
	}

	/**
	 * Returns php code for css rule background: url()
	 * for featured image
	 *
	 * @return string
	 *
	 * @since 3.2.0
	 */
	public static function background_image() {
		return '<?php $url = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); echo "background-image: url(".$url.");" ;?>';
	}

	/**
	 * Returns body classes php code
	 *
	 * @return string
	 * @since 3.2.0
	 */
	public static function body_classes() {
		return '<?php echo implode(" ", get_body_class()); ?>';
	}

	/**
	 * @param $php_page
	 * @param $root_path
	 * @param $original_page_name
	 *
	 * @return string
	 */
	public static function setup_template_file( $php_page, $root_path, $original_page_name ) {
		$template_name = str_replace( $root_path, '', $original_page_name );
		$template_name = str_replace( '/', '-', $template_name );
		$template_name = str_replace( '.html', '', $template_name );

		$add_template_setup_code = <<<EOT
/* Template Name: $template_name */ 
EOT;

		return <<<EOT
<?php
$add_template_setup_code
?>
$php_page
EOT;
	}

	/**
	 * Wraps an element inside Start and End
	 * @param $elem
	 * @param $start
	 * @param $end
	 *
	 * @since 3.2.0
	 */
	public static function wrap_element( $elem, $start, $end ) {
		$elem->innertext = $start . $elem->innertext. $end;
	}


	/**
	 * Replaces [mxp_php_open] and [mxp_php close] tags. For resolving issue with some php tags not being parsed correctly
	 *
	 * @param $php_page
	 * @return string;
	 * @since 3.2.0
	 */
	public static function convert_mxp_php_tags( $php_page ) {

		$php_page = str_replace( '[mxp_php_open]', '<?php', $php_page );
		$php_page = str_replace( '[mxp_php_close]', '?>', $php_page );

		return $php_page;

	}

	/**
	 * Replaces PHP tags with [MUSEGAIN-CODE#*] placeholder
	 *
	 * @param $page
	 *
	 * @return mixed
	 * @since 3.2.0
	 */
	public function replace_php_tags( $page ) {
		$this->matches = array();

		return preg_replace_callback( self::PATTERN, function ( $match ) {
			global $matches;
			$matches[] = $match;

			return '[MUSEGAIN-CODE#' . max( array_keys( $matches ) ) . ']';
		}, $page );

	}

	/**
	 * Replaces [MUSEGAIN-CODE#*] placeholder with PHP tags
	 *
	 * @param $page
	 *
	 * @since 3.2.0
	 * @return mixed
	 */
	public function replace_placeholder_pattern( $page ) {
		$matches = $this->matches;

		return preg_replace_callback( self::PLACEHOLDER_PATTERN, function ( $match ) use ( $matches ) {
			global $matches;

			return $matches[ $match[1] ][0];
		}, $page );
	}

	/**
	 * @return mixed
	 * @since 3.2.0
	 */
	public function getMatches() {
		return $this->matches;
	}

	/**
	 * Injects wp_head() code;
	 *
	 * @param $page_parse
	 *
	 * @since 3.2.0
	 */
	public function insert_wp_head( $page_parse ) {
		$page_parse->find( 'head', 0 )->innertext = $page_parse->find( 'head', 0 )->innertext . Php_Converter::WP_HEAD;
	}

	/**
	 * Injects wp_footer() code;
	 *
	 * @param $page_parse
	 *
	 * @since 3.2.0
	 */
	public function insert_wp_footer( $page_parse ) {
		$page_parse->find( 'body', 0 )->innertext = $page_parse->find( 'body', 0 )->innertext . Php_Converter::WP_FOOTER;
	}

	/**
	 * Wraps element inside a setup postdata function
	 * @param $elem
	 * @param $post
	 *
	 * @since 3.2.0
	 */
	public static function wrap_inside_setup_postdata( $elem, $post ){
		$start_script = '<?php if(isset(' . $post . ')) : ?><?php global $post; $post = ' . $post . '; setup_postdata(' . $post . '); ?>';
		$end_script   = '<?php wp_reset_postdata(); ?><?php endif; ?>';

		self::wrap_element($elem,$start_script,$end_script);
	}
}