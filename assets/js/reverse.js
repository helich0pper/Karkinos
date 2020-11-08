$(document).ready(function(){
    $("#go").click(function(){
        $("#out").html("Listening server: <a href='http://localhost:5555/' target='_blank'>http://localhost:5555/</a>");
        start();
    });
    $("#reset").click(function(){
        reset();
    });
});

function start(){
    jQuery.ajax({
        url: "reverse.php",
        type: "POST",
        dataType: "json",
        success: function(res){
        }
    });
}

function reset(){
    jQuery.ajax({
        url: "restart.php",
        type: "POST",
        dataType: "json",
        success: function(res){
            
        }
    });
}