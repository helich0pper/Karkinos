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
        var formData = new FormData();
        let isFile = 0;
        formData.append('method', 0);

        if(!$("#encryptUploadFile").val()){
             formData.append('data', $("#encryptData").val());
        }else{
            isFile = 1;
        }
        formData.append('password', $("#encryptPassword").val());
        formData.append('IV', $("#encryptIv").val());

        if(isFile === 1){
            formData.append('file', $('#encryptUploadFile')[0].files[0]);
            cryptoFile(formData);
        }
        else{
            crypto(formData);
        }
    });

    $("#decryptSubmit").click(function(){
        var formData = new FormData();
        let isFile = 0;
        formData.append('method', 1);

        if(!$("#decryptUploadFile").val()){
             formData.append('data', $("#decryptData").val());
        }else{
            isFile = 1;
        }
        formData.append('password', $("#decryptPassword").val());
        formData.append('IV', $("#decryptIv").val());

        if(isFile === 1){
            formData.append('file', $('#decryptUploadFile')[0].files[0]);
            cryptoFile(formData);
        }
        else{
            crypto(formData);
        }
    });
});


function crypto(formData){
    formData.append('isFile', "false");
    jQuery.ajax({
        url: "../includes/crypto.php",
        type: "POST",
        processData: false,
        contentType: false,
        data: formData,
        success: function(res){
            const obj = jQuery.parseJSON(res);
            if(obj.errors.length === 0){
                $("#out").html(obj.out);
                $("#errors").html("");
            }
            else{
                let ret = "";
                for(i in obj.errors){
                    ret += obj.errors[i] + "<br>";
                }
                $("#errors").html(ret);
            }
        }
    });
}

function cryptoFile(formData){
    formData.append('isFile', "true");
    jQuery.ajax({
        url: "../includes/crypto.php",
        type: "POST",
        processData: false,
        contentType: false,
        data: formData,
        success: function(res){
            const obj = jQuery.parseJSON(res);
            if(obj.errors.length === 0){
                $("#out").html(obj.out);
                $("#errors").html("");
            }
            else{
                let ret = "";
                for(i in obj.errors){
                    ret += obj.errors[i] + "<br>";
                }
                $("#errors").html(ret);
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