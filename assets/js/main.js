$(document).ready(function(){
    //$('#header').height($(window).height());    
});

$('#confirmModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
  });