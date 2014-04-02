jQuery( document ).ready( function( $ ) {

    $(function() {
        $( "#dialog-succes" ).dialog( {modal : true, title : "Succès!",open: function(){
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
            $('#dialog').dialog({width : 1000, modal : true, title : "Modification"});

        });
        return false;
    });

    $(function(){
        $("#tableExpense").tablesorter(
            {
                theme : 'bootstrap',

                sortList : [[1,0],[2,0],[3,0],[4,0]],

                // header layout template; {icon} needed for some themes
                headerTemplate : '{content}{icon}',

                // initialize column styling of the table
                widgets : ["columns"],
                widgetOptions : {
                    // change the default column class names
                    // primary is the first column sorted, secondary is the second, etc
                    columns : [ "primary", "secondary", "tertiary" ]
                }
            });
    });

    $('.datepicker').datepicker();
} );
