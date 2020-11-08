$(document).ready(function(){
    $("#encryptButton").click(function(){
        $("#encrypt").removeClass("d-none");
        $("#decrypt").addClass("d-none");
    })
    $("#decryptButton").click(function(){
        $("#decrypt").removeClass("d-none");
        $("#encrypt").addClass("d-none");
    })

    $("#encryptSubmit").click(function(){
        let data = "";
        let isFile = false;
        if($("#encryptUploadFile").get(0).files.length === 0){
             data = $("#encryptData").val();
        }else{
            data = $("#encryptUploadFile").val();
            isFile = true;
        }
        const password = $("#encryptPassword").val();
        const IV = $("#encryptIv").val();
        crypto(0, data, password, IV, isFile);
    });

    $("#decryptSubmit").click(function(){
        let data = "";
        let isFile = false;
        if($("#decryptUploadFile").get(0).files.length === 0){
            data = $("#decryptData").val();    
        }else{
            data = $("#decryptUploadFile").val();
            isFile = true;
        }
        const password = $("#decryptPassword").val();
        const IV = $("#decryptIv").val();
        crypto(1, data, password, IV, isFile);
    });
});

function crypto(method, data, password, IV, isFile){
    jQuery.ajax({
        url: "../includes/crypto.php",
        type: "POST",
        data: {
            data: data,
            password: password,
            IV: IV,
            method: method,
            isFile: isFile,
        },
        dataType: "json",
        success: function(res){
            object = res;
            errorLength = object.errors.length;
            if(errorLength != 0){
                let ret = "";
                for(let i = 0; i < errorLength; i++){
                    ret += object.errors[i] + "<br>";
                }
                $("#errors").html(ret);
            }
            else{
                $("#out").html(object.out);
                $("#errors").html("");
            }
        }
    });
}

// Copies to clipboard from Output box
function copy(){
    output = document.getElementById("out");
    output.select();
    output.setSelectionRange(0, 99999);
    document.execCommand("copy");
    return false;
}