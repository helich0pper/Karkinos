$(document).ready(function(){
    $("#go").click(function(){
        $("#out").html("Listening server: <a href='http://127.0.0.1:5555/' target='_blank'>http://localhost:5555/</a>");
        start();
    });
    $("#shutdown").click(function(){
        $("#out").html("<p></p>");
        shutdown();
    });
});

function start(){
    jQuery.ajax({
        url: "../includes/pid.php",
        type: "POST",
        dataType: "json",
        success: function(res){
            console.log(res);
        }
    });
}

function shutdown(){
    jQuery.ajax({
        url: "http://127.0.0.1:5555/shutdown",
        type: "POST",
        dataType: "json",
        success: function(res){
        }
    });
}