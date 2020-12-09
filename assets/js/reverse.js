$(document).ready(function(){
    $("#go").click(function(){
        $("#out").removeClass("d-none");
        start();
    });
    $("#shutdown").click(function(){
        $("#out").addClass("d-none");
        shutdown();
    });
});

function start(){
    jQuery.ajax({
        url: "../includes/pid.php",
        type: "POST",
        dataType: "json",
    });
}

function shutdown(){
    jQuery.ajax({
        url: "http://"+IP+":5555/shutdown",
        type: "POST",
        dataType: "json",
    });
}
