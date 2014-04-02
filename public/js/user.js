jQuery( document ).ready( function( $ ) {

    $(function() {
        $( "#dialog-succes" ).dialog({modal: true, title : 'Succès',open: function(){
            var closeBtn = $('.ui-dialog-titlebar-close');
            closeBtn.append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span><span class="ui-button-text">close</span>');
        }});
    });

    $('.edit-link').click(function(){
        $.ajax({
            type: "GET",
            url: $(this).attr('href')
        }).done(function(html_form) {
            $('#dialog').html(html_form);
            $('#dialog').dialog({width : 1000, modal : true, title : "Modification",open: function(){
                var closeBtn = $('.ui-dialog-titlebar-close');
                closeBtn.append('<span class="ui-button-icon-primary ui-icon ui-icon-closethick"></span><span class="ui-button-text">close</span>');
            }});

        });
        return false;
    });
} );
