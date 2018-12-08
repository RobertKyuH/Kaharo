jQuery(document).ready(function () {

    var $form = jQuery('form[id="post"]');

    var $post_type = $form.find('input#post_type').val();

    if ($post_type == 'page') {
        jQuery('.edit-slug').hide();
    }


});
