function w3_close(id){
  document.getElementById(id).style.display='none';
}

function m_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function m_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

function showGrouped(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show"; 
    x.previousElementSibling.className += " w3-red";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-red", "");
  }
}

openMail("message","AG Photos","+255764098179","default","No Customer Yet Contacted Us");
function openMail(personName,cname,ccont,dt,cmsg) {
  var i;
  var x = document.getElementsByClassName("person");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x = document.getElementsByClassName("test");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" w3-light-grey", "");
  }
  document.getElementById(personName).style.display = "block";
  document.getElementById('customecont').innerHTML = "Customer Contact: "+ccont;
  document.getElementById('customename').innerHTML = "From: "+cname+", "+dt;
  document.getElementById('msg').innerHTML = cmsg;
  document.getElementById('custname1').innerHTML = "Best Regards, "+cname;
}

$('#nevt').click(function(event){
  $('#event-form').trigger('reset');
});

$(document).on('submit', '#event-form', function(event){
  event.preventDefault();
  var valid = '';
  var vald = new Array(
                       $('#etype'),
                       $('#edate'),
                       $('#jina'),
                       $('#ecapt')
                       );
  var data = new Array(vald.length);
  for (var i = 0; i < vald.length; i++) {
    if(vald[i].val().length==0){
      document.getElementById('id01').style.display='block';
      vald[i].parent().parent().addClass('has-error');
      console.log('error');
    }
    else{
      vald[i].parent().parent().removeClass('has-error');
      data[i]=vald[i].val();
      valid+=i;
    }
  }
  if(valid=='0123'){
    $.ajax({
      url: '../process/addEvent.php',
      type: 'post',
      dataType: 'json',
      data:{data: JSON.stringify(data)},
      success: function(event){
        if(event.success){
          document.getElementById('id01').style.display='none';
          document.getElementById('msgBox').style.display='block';
          $('#msgBox').find('.modal-body').text(event.msg);
          $('#event-form').trigger('reset');
        }
      },
      error: function(){
        alert("Something Went Wrong try again");
      }
    });
  }else alert("Please fill all Mandatory fields");

});

$('#aimg').click(function(){
  $('#image-form').trigger('reset');
})

$(document).ready(function(){
    $('#upload_files').on('change',function(){
        $('#image_upload_form').ajaxForm({           
            target:'#images_preview',
            beforeSubmit:function(e){
                $('.image_uploading').show();
            },
            success:function(e){
                $('.image_uploading').hide();
            },
            error:function(e){
            }
        }).submit();
    });
});