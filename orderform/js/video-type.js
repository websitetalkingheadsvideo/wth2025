// JavaScript Document
$(document).ready(function () {
    var type;
  $("#videoType").change(function () {
    typeChange();
  });

  function typeChange() {
      type = $("#videoType"); 
      console.log("change= " + type.val());
    switch (type.val()) {
      case "Basic Video":
        $("#video-background").removeClass('hidden');
        $("#website-field").attr('class', 'hidden');
        break;
      case "Green Screen Video":
        $("#video-background").attr('class', 'hidden');
        $("#website-field").attr('class', 'hidden');
        break;
      case "Website Spokesperson":
        $("#video-background").attr('class', 'hidden');
        $("#website-field").removeClass('hidden');
        $("#website-field").attr('class', 'form-group row');
        break;
    }
  }
});
