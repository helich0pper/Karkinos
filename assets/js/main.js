$(document).ready(function(){
    $("#scroller").click(function() {
        $('html, body').animate({
            scrollTop: $("#menu").offset().top
        }, 0);
    });
});

$('#confirmModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });