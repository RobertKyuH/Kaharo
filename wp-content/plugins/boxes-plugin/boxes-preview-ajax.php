<?php
header('Access-Control-Allow-Origin: *');

require_once("../../../wp-load.php");      

$the_page = get_page_by_path($_GET['page_slug'], OBJECT, 'mxp_box');

$wpautop = $_GET['wpautop'];

if($the_page == NULL){
    
    echo 'error_box_slug_01';
    
}else{
    
    if($wpautop == 'true'){
        $page_content = do_shortcode(wpautop($the_page->post_content));    
    }else{
        $page_content = do_shortcode($the_page->post_content);    
    }    

    echo $page_content;
}
?>