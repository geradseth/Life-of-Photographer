$(function(){
  $('form[name = post-form]').validate({
    rules: {
      //name attribute: attribute value;
    },
    messages: {
      //name attribute: message
    },
    submitHandler: function(form){
      form.submit();
    }
  });
});


$(document).ready(function(){
  $('#upload-form').on('submit',function(e){
    e.preventDefault();
    $.ajax({
      url: '../process/imageupload.php',
      type: 'post'
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function(){
        $('#err').fadeOut();
      },
      success: function(data){
        if (data=='invalid') {
          $('#err').html('upload a valid file please...!').fadeIn();
        }else{
          $('#preview').html(data).fadeIn();
          $('#upload-form')[0].reset();
        }
      },
      error: function(e){
        $('#err').html(e).fadeIn();
      }
    });
  });
});