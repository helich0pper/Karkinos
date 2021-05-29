var totalHashes;

$(document).ready(function(){

    $("#crackButton").click(function(){
        $("#crackForm").removeClass("d-none");
        $("#hashForm").addClass("d-none");
    })
    $("#hashButton").click(function(){
        $("#hashForm").removeClass("d-none");
        $("#crackForm").addClass("d-none");
    })

    $("#crack").click(function(){
        $("#crack").prop('disabled', true);
        let hashes = $("#crackHashes").val().split(",");
        const merge = $("#merge").prop("checked");
        if(merge){
            hashes = cleanDuplicates(hashes);
        }
        totalHashes = hashes.length;
        $("#loading").html("Cracking... " + totalHashes + " left");
        for(hash in hashes){
            post(hashes[hash].toLowerCase(), totalHashes);
        }
    });
    
    $("#hash").click(function(){
        $("#hash").prop('disabled', true);
        let hashes = $("#hashHashes").val().split(" ");
        hashes = cleanDuplicates(hashes)
        let hashMethod = $('input[name="hashMethod"]:checked').val();
        for(hash in hashes){
            postHash(hashes[hash], hashMethod);
        }
    });
});

function post(hash){
    jQuery.ajax({
        url: "../includes/crack.php",
        type: "POST",
        data: {
            hash: hash,
            action: "crack",
        },
        dataType: "json",
        success: function(res){
            totalHashes--;
            $("#loading").html("Cracking... " + totalHashes + " left");
            if(totalHashes === 0){
                $("#loading").html("");
                $("#crack").removeAttr("disabled");
            }
            $('#out > tbody:last-child').append("<tr>");
            for(i in res){
                $('#out > tbody:last-child').append("<td scope='row'>" + res[i] + "</td>");
            }
            $('#out > tbody:last-child').append("</tr>");
        }
    });
}

function postHash(hash, hashMethod){
    jQuery.ajax({
        url: "../includes/crack.php",
        type: "POST",
        data: {
            hash: hash,
            action: "hash",
            hashMethod: hashMethod,
        },
        dataType: "json",
        success: function(res){
            $('#outHashes > tbody:last-child').append("<tr>");
            for(i in res){
                $('#outHashes > tbody:last-child').append("<td scope='row'>" + res[i] + "</td>");
            }
            $('#outHashes > tbody:last-child').append("</tr>");
        }
    });
}

function cleanDuplicates(hashes){
    var ret = [];
    $.each(hashes, function(i, h){
        if($.inArray(h, ret) === -1)
            ret.push(h);
    });
    return ret;
}