jQuery( document ).ready( function( $ ) {

    $(function() {
        $( "#dialog-succes" ).dialog({modal: true, title : 'Succès'});
    });

    $('.edit-link').click(function(){
        $.ajax({
            type: "GET",
            url: $(this).attr('href')
        }).done(function(html_form) {
            $('#dialog').html(html_form);
            $('#dialog').dialog({width : 1000, modal : true, title : "Modification"});

        });
        return false;
    });
} );
