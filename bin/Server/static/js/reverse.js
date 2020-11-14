$(document).ready(function(){
    $("#shutdown").click(function(){
        $('#shutdownMsg').html("Server shutdown! Close tab.");
        shutdown();
    });


});



function shutdown(){
    jQuery.ajax({
        url: "http://127.0.0.1:5555/shutdown",
        type: "POST",
        dataType: "json",
        success: function(res){
        }
    });
}