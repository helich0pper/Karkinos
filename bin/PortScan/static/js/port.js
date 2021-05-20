$(document).ready(function(){
    $("#shutdown").click(function(){
        $('#shutdownMsg').html("<span class='text-danger'>Server shutdown! Close tab.</span>");
        shutdown();
    });

    $("#copy").click(function () {
        copy()
    });

    $("#clear").click(function () {
        clear()
    });

    $('#download').click(function() {
        download($("#out").val(), "Report.txt")
    });

    $("#start").click(function () {
        const target = $("#target").val();
        const port = $("#port").val();
        const timeout = $("#timeout").val();

        if (target == "") {
            $('#startMsg').html("<span class='text-danger'>Target is required.</span>");
            return false
        }

        if (port == "") {
            $('#startMsg').html("<span class='text-danger'>Port is required.</span>");
            return false
        }

        $("#start").prop('disabled', true);
        $('#startMsg').html("<span class='text-success'>Started.</span> Check console for real-time finds. You can wait for the scan to complete for a full report.");
        start(target, port, timeout);
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

function start(target, port, timeout) {
    jQuery.ajax({
        url: "/start",
        type: "POST",
        data: {
            target: target,
            port: port,
            timeout: timeout
        },
        success: function (res) {
            $("#out").val(res)
            $("#start").removeAttr("disabled");
            $('#startMsg').html("<span class='text-success'>Done.</span>");
        }
    });
}

function copy(){
    output = document.getElementById("out");
    output.select();
    output.setSelectionRange(0, 99999);
    document.execCommand("copy");
    return false;
}

function clear() {
    $("#out").val("")
}

function download(textToWrite, fileNameToSaveAs) {
    var textFileAsBlob = new Blob([textToWrite], {type:'text/plain'});
    var downloadLink = document.createElement("a");
    downloadLink.download = fileNameToSaveAs;
    downloadLink.innerHTML = "Download File";
    if (window.webkitURL != null) {
        downloadLink.href = window.webkitURL.createObjectURL(textFileAsBlob);
    }
    else {
        downloadLink.href = window.URL.createObjectURL(textFileAsBlob);
        downloadLink.onclick = destroyClickedElement;
        downloadLink.style.display = "none";
        document.body.appendChild(downloadLink);
    }

    downloadLink.click();
}