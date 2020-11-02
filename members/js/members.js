
var openInbox = document.getElementById("myBtn");
openInbox.click();

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


//event posting by verified member members
const evntfrm = document.getElementById('event-form');
evntfrm.addEventListener('submit', function(event){
event.preventDefault();
  var v = '';
  var d = new Array(
                    document.getElementById('jina'),
                    document.getElementById('ecapt'),
                    document.getElementById('etype'),
                    document.getElementById('edate')
                    );
  var dt = new Array(d.length);
  for(var i=0; i < d.length; i++){
    if(d[i].value.length == 0){
      d[i].previousElementSibling.className += 'has-error';
    }else{
      d[i].previousElementSibling.className.replace('has-error','');
      v += i;
      dt[i] = d[i].value
    }
  }

  if(v == '0123'){
      var req = new XMLHttpRequest();
      req.open('POST', '../process/addEvent.php', true);
      req.setRequestHeader('content-type','application/json')
      req.send(JSON.stringify(dt));
      req.onreadystatechange = function(){
        if (req.readyState==4 && req.status==200) {
          removePreloader();
        }else
        addPreloader();
      };
     
}
else alert("fill All required Fields");
});

function addPreloader() {
// if the preloader doesn't already exist, add one to the page
if(!document.querySelector('#preloader')) {
var preloaderHTML = '<img id="preloader" src="upl/image_upload_status.gif';
document.querySelector('body').innerHTML += preloaderHTML;
}
}
function removePreloader() {
// select the preloader element
var preloader = document.querySelector('#preloader');
// if it exists, remove it from the page
if(preloader) {
preloader.remove();
}
}