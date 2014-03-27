jQuery( document ).ready( function( $ ) {

    $("#province-select").change(function(){
        alert("On change province triggered");
    });

    $("#category-select").change(function(){
        alert("On change category triggered");

        updateRate()
    });

    function updateRate(){
        $.post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "setting_name": $( '#setting_name' ).val(),
                "setting_value": $( '#setting_value' ).val()
            },
            function( data ) {
                //do something with data/response returned by server
            },
            'json'
        );

        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;

    }
    /*$( '#form-add-setting' ).on( 'submit', function() {

        //.....
        //show some spinner etc to indicate operation in progress
        //.....

        $.post(
            $( this ).prop( 'action' ),
            {
                "_token": $( this ).find( 'input[name=_token]' ).val(),
                "setting_name": $( '#setting_name' ).val(),
                "setting_value": $( '#setting_value' ).val()
            },
            function( data ) {
                //do something with data/response returned by server
            },
            'json'
        );

        //.....
        //do anything else you might want to do
        //.....

        //prevent the form from actually submitting in browser
        return false;
    } );
*/
} );