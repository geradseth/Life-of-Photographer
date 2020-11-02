<?php
require_once('../process/member-session.php');
include_once('../events/ShowEvents.php');
$cus = $sEvent->getContactedCustomes();
$customers = $sEvent->getCustomersMessages();
?>
<!DOCTYPE html>
<html lang="en">
<title>AG MEMBERS ACCEPTED</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../css/font-awesome.min.css"><style>
html,body,h1,h2,h3,h4,h5 {font-family: "RobotoDraft", "Roboto", sans-serif}
.image_uploading {
    margin-top: 15px;
}
.w3-bar-block .w3-bar-item {padding: 16px}


.hidden {
    display: none;
}
.image_gallery { 
  width:100%; 
  float:left; 
}
.image_gallery ul{ 
  margin:0;
  padding:0; 
  list-style-type:none;
}
.image_gallery ul li{ 
  padding:7px; 
  border:2px solid #ccc;
  float:left;
  margin:10px 7px;
  background:none; 
  width:auto; 
  height:auto;
}
.images {
  width:200px;
  height:200px;
}
</style>
<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;" id="mySidebar">
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-large"><img src="images/ger.png" style="width:60%;"></a>
  <a href="javascript:void(0)" onclick="m_close()" title="Close Sidemenu" 
  class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'" id="nevt">New Event<i class="w3-padding fa fa-pencil"></i></a>
  <a  href="javascript:void(0)" onclick="showGrouped('mesg')" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>New Interested Customers (<?=$cus['nc'];?>)<i class="fa fa-caret-down w3-margin-left"></i></a>
  <div id="mesg" class="w3-hide w3-animate-left">

    <?php foreach ($customers as $cust) {?>
      <!-- code... For Customer Details-->
   
    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('message','<?=$cust['cName'];?>','<?=$cust['cContact'];?>','<?=$cust['contactedDate'];?>','<?=$cust['cMsg'];?>');m_close();">
      <div class="w3-container">
        <img class="w3-round w3-margin-right" src="/w3images/avatar3.png" style="width:15%;"><span class="w3-opacity w3-large"><?=$cust['cName'];?></span>
        <h6>Customer Address: <?=$cust['cAddress'];?></h6>
        <p><?=$cust['cContact'];?></p>
      </div>
    </a>
    <?php  } ?>
  </div>
  <a href="javascript:void(0)" onclick="showGrouped('pot')"  class="w3-bar-item w3-button"><i class="fa fa-paper-plane w3-margin-right"></i>My Potofolio</a>
   <div id="pot" class="w3-hide w3-animate-left">
      <a href="javascript:void(0)" id="aimg" class="w3-bar-item w3-button" onclick="document.getElementById('addImg').style.display='block'"><i class="fa fa-hourglass-end w3-margin-right"></i>Add Images</a>
      <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="potofolio()"><i class="fa fa-trash w3-margin-right"></i>Potofolios</a>
    </div>
  <a href="#" class="w3-bar-item w3-button" onclick="tours()"><i class="fa fa-hourglass-end w3-margin-right"></i>My Tour</a>
  <a href="#" class="w3-bar-item w3-button" onclick="mememm()"><i class="fa fa-trash w3-margin-right"></i>Reaction on my Work</a>
</nav>
<!-- Page content -->
<div class="w3-main" style="margin-left:320px;">
  <center>
     <button class="w3-yellow-grey" onclick="window.location='../index.php'">HOME</button>
     <button class="w3-yellow-grey" onclick="window.open('../process/member-logout.php')">LOGOUT</button>
     </center>
<div>
  <h1>WELCOME <?php echo '$ptg'; ?> TO OUR COMMUNITY FEEL FREE TO SHARE AND ANNOUNCE YOUR TOUR</h1>
  <section class="w3-hover-green w3-blue-grey"> 
    <div>RECENT AG SUGGETION ON YOUR WORKS: <?="You Better respond Fater On you Client for your location";?> </div> 
  </section>
</div>

<?php include_once('load-member-modal.php'); ?>
</div>
<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="m_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>
<script type="text/javascript" src="../dscript/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/ajaxHandler.js"></script>
</body>
</html> 
<!--
<script>
var openTab = document.getElementById("firstTab");
openTab.click();
</script>
-->
