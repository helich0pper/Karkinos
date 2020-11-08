// Displays
function encodeDisplay(e){
    const element = $(e).closest('.row').attr('id');
    const encodeVar = document.getElementById(element + "-encode");
    const decodeVar = document.getElementById(element + "-decode");
    encodeVar.style.display = "block";
    decodeVar.style.display = "none";
}

function decodeDisplay(e){
    const element = $(e).closest('.row').attr('id');
    const encodeVar = document.getElementById(element + "-encode");
    const decodeVar = document.getElementById(element + "-decode");
    encodeVar.style.display = "none";
    decodeVar.style.display = "block";
}

// Functions
// Copies from Output box
function copy(e){
    const element = getId(e);
    const output = document.getElementById(element + "-output");
    output.select();
    output.setSelectionRange(0, 99999);
    document.execCommand("copy");
    return false;
}

// Gets ID of current docoding/encoding element
function getId(e){
    const element = $(e).closest('.row').attr('id');
    return element;
}

function encode(e){
    const id = getId(e);
    console.log(id);
    const input = document.getElementById(id + "-input-encode");
    const output = document.getElementById(id + "-output");
    jQuery.ajax({
        url: "../includes/encode.php",
        type: "POST",
        data: {
            input: input.value,
            type: id,
            method: 0,
        },
        dataType: "json",
        success: function(res){
            output.value = res;
        }
    });

    return false;
}

function decode(e){
    const id = getId(e);
    console.log(id);
    const input = document.getElementById(id + "-input-decode");
    const output = document.getElementById(id + "-output");

    jQuery.ajax({
        url: "../includes/encode.php",
        type: "POST",
        data: {
            input: input.value,
            type: id,
            method: 1,
        },
        dataType: "json",
        success: function(res){
            output.value = res;
        }
    });

    return false;
}
