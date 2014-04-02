jQuery( document ).ready( function( $ ) {

   /* $(function() {
        $( "#dialog" ).dialog();
    });*/

    $('.edit-link').click(function(){
        $.ajax({
            type: "GET",
            url: $(this).attr('href')
        }).done(function(html_form) {
            $('#dialog').html(html_form);
            $('#dialog').dialog();

        });
        return false;
    });
} );
