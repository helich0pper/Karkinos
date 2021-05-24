$(document).ready(function(){
    $("#go").click(function(){
        $("#out").removeClass("d-none");
        start();
    });

    $("#shutdown").click(function(){
        $("#out").addClass("d-none");
        shutdown();
    });

    $("#back").click(function(){
        window.location.replace("../modules.php")
    });
});

function start(){
    $("#go").prop('disabled', true);
    jQuery.ajax({
        url: "../../includes/pid.php",
        type: "POST",
        dataType: "json",
        data: {
            method: "reverse"
        }
    });
}

function shutdown(){
    $("#go").removeAttr("disabled");
    jQuery.ajax({
        url: "http://"+IP+":5555/shutdown",
        type: "POST",
        dataType: "json",
    });
}
