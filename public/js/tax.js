jQuery( document ).ready( function( $ ) {
    var rateId;
    $("#province-select").change(function(){
        getRate();
    });

    $("#category-select").change(function(){
        getRate();
    });
    $("#type-select").change(function(){
        getRate();
    });

    $("#updateRate").click(function(){
        updateRate();

    });

    function getRate(){

        var province =  $("#province-select option:selected").val();
        var category = $("#category-select option:selected").val();
        var type = $("#type-select option:selected").val();


        if(province != "" && category != "" && type != ""){

            $.ajax({
                type: "POST",
                url: 'taxInfo',
                data: { province:province, category:category, type:type}
            }).done(function( msg ) {
                //println( msg );
                //console.log(msg[0]['tax']);
                if(msg != ""){
                    $("#taxInput").val(msg[0]['tax']);
                    rateId = msg[0]['id'];
                   // alert(rateId);
                }else{
                    $("#taxInput").val("");
                    rateId = "";
                }

            });
        }

        //prevent the form from actually submitting in browser
        return false;

    }



    function updateRate(){

        var province =  $("#province-select option:selected").val();
        var category = $("#category-select option:selected").val();
        var type = $("#type-select option:selected").val();
        var tax = $("#taxInput").val();


        if(province != null && category != null && type != null){

            $.ajax({
                type: "POST",
                url: 'taxUpdate',
                data: { province:province, category:category, type:type, tax:tax, rateId:rateId}
            }).done(function( msg ) {

                if(msg == "1"){
                    $(function() {
                        $( "#dialog-succes" ).dialog({modal: true, title : 'Succès!'});
                        $( "#dialog-succes" ).html("La taxe à été mise-à-jour!");
                    });
                }else{

                    $(function() {
                        $( "#dialog-succes" ).dialog({modal: true, title : 'Erreur!'});
                        $( "#dialog-succes" ).html("Veuillez contacter l'administrateur");
                    });
                }

            });
        }else {
            $(function() {
                $( "#dialog-succes" ).dialog({modal: true, title : 'Erreur!'});
                $( "#dialog-succes" ).html("Vous devez choisir toutes les options de tax");
            });
        }

        //prevent the form from actually submitting in browser
        return false;

    }
} );