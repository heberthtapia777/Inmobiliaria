function mySubmit(form) {
  // nothing happening here
};

// see http://stackoverflow.com/questions/34248898/how-to-validate-select-option-for-a-materialize-dropdown/38671029#38671029

// just a test to verify the validation
$.validator.setDefaults({
       ignore: []
});

$('form').validate({
  submitHandler: mySubmit,
  errorClass: "invalid form-error",
  errorElement: 'div',
  errorPlacement: function(error, element) {
    error.appendTo(element.parent());
  }
});

$(document).ready(function() {
  $('select').material_select();
});

function changeOption() {
  $('.all-options').hide();
  $('#' + $('#options').val()).show();
}
