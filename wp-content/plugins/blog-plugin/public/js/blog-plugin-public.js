(function( $ ) {

    $(document).ready(function () {

       $('body').on('click','[mxp-link]',function(){
            var link = $(this).attr('mxp-link');
            window.location.href = link;
        });

    });


})( jQuery );
