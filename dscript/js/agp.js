/*
*data contacted by customer in web
#Record sent to the db via ajax
*/

$(document).on('submit','#req', function(event){
	event.preventDefault();
	var validate = '';
	var inf = new Array(
		$('.cname'),
		$('.caddress'),
        $('.cemail'),
        $('.cmsg')
	);

	var data = new Array(inf.length);
	for(var i=0; i<inf.length; i++){
		if (inf[i].val().length==0) {
			inf[i].parent().parent().addClass('fill_info');
		}else{
			inf[i].parent().parent().removeClass('fill_info');
			data[i] = inf[i].val();
			validate +=i;
		}
	}
if(validate == '0123'){
	$.ajax({
        url: '../process/contact.php',
        type: 'post',
        datatype: 'json',
        data: {
        	data: JSON.stringify(data)
        	},
        success: function(event){
        	if(event.valid == valid){
        		$('#contacted').show();
            $('#contact').hide();
        		$('#cont').trigger('reset');
        		$('#contacted').find('.contact-body').text(event.msg);
        		action = event.action;
        	}
        },
        error: function(event){
        	alert('There was an error on contacting us');
        }
	});
}
	});


function news(eventId){
  //Showing the News modal As block
     document.getElementById('news').style.display = 'block';
    //putting event id into variable
     $.getJSON({
     	url: '../process/news.php',
     	datatype: 'json',
     	type: 'post',
     	data: {eId: eventId},
     	success: function(data){
            console.log(data);
            $('#news').find('.ntittle').text("Today Feeds");
            $('#news').find('.modal-title').text(data.eheading);
            $('#news').find('.nbody').text(data.ecaption);
            $('#news').find('.nauthor').text("News Writer  "+data.fname+"  "+data.lname);
     	},
     	error: function(){
     		alert('There was an error on Showing Requested News');
     	}
     });
}


function eventInfo(eid){
	$.getJSON({
		url: '../process/news.php',
		datatype: 'json',
		type: 'post',
		data: {ueId: eid},
    success: function(data){
      console.log(data);
            $('#news').find('.ntittle').text(data.edesc+"  "+data.eventdate);
            $('#news').find('.modal-title').text(data.eheading);
            $('#news').find('.nbody').text(data.ecaption);
            $('#news').find('.nauthor').text(data.fname+"  "+data.lname);
            document.getElementById('news').style.display = 'block';
          },
    error: function(){
      alert("There was an Error on Showing Event");
    }
	});
}

// google map function call <!-- Add Google Maps -->
function myMap() {
  myCenter=new google.maps.LatLng(41.878114, -87.629798);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}
// Accordion
function openDock(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-theme-d1";
  } else { 
    x.className = x.className.replace("w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-theme-d1", "");
  }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += "w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

//Function to carry sign Up Process
$('#signup').click(function(event){
  $('#sign-up-form').trigger('reset');
  $('#signup-modal').find('.modal-title').text('Join us BY Signing up');
});

$(document).on('submit', '#sign-up-form', function(event){
  event.preventDefault();
  var validation = '';

  var cdetails = new Array(
                          $('#cfName'),
                          $('#cmName'),
                          $('#clName'),
                          $('#cUname'),
                          $('#cEmail'),
                          $('#cPhone'),
                          $('#cAddre'),
                          $('#cPass'),
                          $('#cCPass')
                          ); 
  var details = new Array(cdetails.length);
  for(var i=0; i < cdetails.length; i++){
    if(cdetails[i].val().length == 0){
      cdetails[i].parent().parent().addClass('fill_info');
    }else{
      cdetails[i].parent().parent().removeClass('fill_info');
      validation += i;
      details[i] = cdetails[i].val();
    }
  }
/*
#Validating id the customer filled all the required field
#On registration
 */
  if(validation == '012345678'){
     if($('#cPass').val() == $('#cCPass').val()){
          $.ajax({
            url: '../process/signup.php',
            type: 'post',
            dataType: 'json',
            data: { client: JSON.stringify(details) },
            success: function(event){
              if(event.valid = 'valid'){
                $('#signup-modal').modal('hide');
                $('#msgBox').modal('show');
                $('#msgBox').find('.modal-title').text('Success Message Box');
                $('#msgBox').find('.modal-body').text(event.msg);
              }else{
                aler('OOOOOPs..! Something Went Wrong');
              }
            },
            error: function(){
              alert('There was an Error Processing You Data');
            }
          });
     }else{
      alert("Snap..! Password And Comfirmation Password must match");
     }
  }else{
    alert('Whoops...! Fill all Mandatory Field Thank you');
  }

});

//checking whether the customer click the login button
$('#login-menu').click(function(e){
  $('#login-form').trigger('reset');
  $('#login-modal').find('.headings').text("Provide Your Credentials");
});

//login form submission and validation
//Initialize The valid
var valid = true;
$(document).on('submit', '#login-form', function(e){
  e.preventDefault();

  var validate = '';
  var form_data = new Array($('#uname'), $('#pword'));
  var data = new Array(form_data.length);
  for(var i=0; i<form_data.length; i++){
    if(form_data[i].val().length == 0){
      form_data[i].parent().parent().addClass('fill_info');
    }else{
      form_data[i].parent().parent().removeClass('fill_info');
      data[i] = form_data[i].val();
      validate += i;
    }
  }
  //check if the user fiil the input data
  if(validate == '01'){

  $.ajax({
    url: '../process/login.php',
    type: 'post',
    dataType: 'json',
    data: {data: JSON.stringify(data)},
    success: function(data){
      if(data.valid == valid){
        window.location = data.url;
        console.log(data.url);
      }else{
        $('#login-modal').find('.headings').text(data.msg);
      }
    },
    error: function(){
      alert('We Are Sorry, Something Went Wrong Try Again');
    }
  });
    }else{
    alert('Fill the user name and Password are required');
  }
});

function w3_close(id){
  document.getElementById(id).style.display='none';
}

//Idea for displaying time the image uploaded

/*$(document).ready(function(){
  $.getJSON('../process/timePost.php',function(data){
     $('#itime').text(data.muda);
  })
});*/


/*
  ##..Display clock counting down According to the event to happen

  */
  function getTime(eid, etime){
    //Declearing data and finding the time interval


    var edateTime = Date.parse(etime)-Date.parse(new Date());

    var tsec = Math.floor(edateTime/1000);

    var sec = Math.floor(tsec%60);

    var min = Math.floor((tsec/60)%60);

    var hrs = Math.floor((tsec/3600)%24);

    var days = Math.floor((tsec/3600)/24);

    document.getElementById(eid).innerHTML = days+' '+hrs+' '+min+' '+sec;

    console.log(days+' '+hrs+' '+min+' '+sec);
    console.log("counting hours");
  }

/*
*Function Fo handling comment
*begin here
*/
const x = document.getElementById("comment");

function comment(id){
      $("#cusCom").val("");
      x.style.display = "block";
      document.getElementById("ceid").value = id;
}


$("#comment-btn").click(function(){
  var txt = $("#cusCom").val();
  
  //Ajax Sending comment

  var id = document.getElementById("ceid").value;

  $.ajax({
    url: "../process/comment.php",
    type: "post",
    dataType: "json",
    data: {com: txt, eid: id},
    success: function(res){
      if(res.success="success"){
         $("#comment").find(".commented").text(res.msg);
         $("#cusCom").trigger("reset");
     }
    },
    error: function(){
      alert("You have an Error on Your Server");
    }
  });
});

function reaction(id){
  $.ajax({
    url: "../process/eventReaction.php",
    type: "post",
    dataType: "json",
    data: {eid:id},
    success: function(resp){
      if(resp.reacted == "success")
      document.getElementById("likebtn"+id).disabled="disabled";
      else alert(resp.fail);
    },
    error: function(){
      alert("There was a problem in Server please try again");
    }
  });
}