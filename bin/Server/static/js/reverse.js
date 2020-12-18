$(document).ready(function(){
    $("#shutdown").click(function(){
        $('#shutdownMsg').html("Server shutdown! Close tab.");
        shutdown();
    });
    $("#start").click(function(){
        $('#startMsg').html("Waiting for incoming connections...");
    });
});

function shutdown(){
    jQuery.ajax({
        url: "/shutdown",
        type: "POST",
        dataType: "json",
        success: function(res){
        }
    });
}