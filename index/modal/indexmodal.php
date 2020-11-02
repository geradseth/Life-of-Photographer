<?php
include_once('../events/ShowEvents.php');
  $events = $sEvent->getEvents();
  $headilines = $sEvent->getHeadline();
  $rphotos = $sEvent->getFeaturedPhoto();
  $uevents = $sEvent->getUpcomingEvent();

?>
<div class="w3-theme-l5" id="npage">
<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:20px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">Events And News</h4>
          <?php foreach ($headilines as $h) {?>
          <button class="w3-tag w3-small w3-theme-d3" onclick="news(<?php echo $h['eID'];?>)"> <?php echo $h['eheading'];?></button><br>
        <?php }?>
         </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="openDock('tour')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i>Business Today</button>
          <div id="tour" class="w3-hide w3-container">
            <a href="business/index.php">Go to Business Page</a>
          </div>
          <button onclick="openDock('event')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Recent Events</button>
          <div id="event" class="w3-hide w3-container">
            <?php foreach ($events as $e) {?>
            <p><?=$e['eheading'];?></p>
          <?php }?>
          </div>
          <button onclick="openDock('rphoto')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> Recent Photos</button>
          <div id="rphoto" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
         <?php foreach ($rphotos as $rp) {?>
           <div class="w3-half">
             <img src="images/<?php echo $rp['idesc'];?>" style="width:100%" class="w3-margin-bottom">
           </div>
         <?php }?>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Joining if interested --> 
     <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <p>Feel Free And Enjoy By</p>
          <p>
           <?php if(!isset($_SESSION['member_logged_in'])){?>
            <a href = "javascript:void(0)" id="signup" class="w3-tag w3-small w3-theme-d5" onclick="document.getElementById('signup-modal').style.display='block'">Signing Up</a>
            <a href="javascript:void(0)" class="w3-tag w3-small w3-theme-d4" onclick="document.getElementById('login-modal').style.display='block'">Login</a>
            <?php } else {?>
            <button class="w3-tag w3-small w3-theme-d4" onclick="window.location='../members/index.php'">Update Customers</button>
            <?php }?>
            <a href = "#review-modal" id="review-menu" class="w3-tag w3-small w3-theme-d3">Give us Review</a>
          </p>
        </div>
      </div>
      <br>

      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are Doing business. Find out what can you be Interested.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card w3-round w3-white">
            <div class="w3-container w3-padding">

                  <div class="w3-bar w3-white w3-padding w3-card">
                    
                                  <!-- Header -->
                                  <header class="w3-display-container w3-content w3-center" style="max-width:1500px">
                                    <img class="w3-image" src="agimages/view.png" alt="Me" width="1500" height="600">
                                    <div class="w3-display-middle w3-padding-large w3-border w3-wide w3-text-light-grey w3-center">
                                      <h1 class="w3-hide-medium w3-hide-small">Remark Your Event With</h1>
                                      <h5 class="w3-hide-large" style="white-space:nowrap">PHOENIX</h5>
                                      <h3 class="w3-hide-medium w3-hide-small">PHOTOGRAPHERS</h3>
                                    </div>
                                    
                                    <!-- Navbar (placed at the bottom of the header image) -->
                                    <div class="w3-bar w3-light-grey w3-round w3-display-bottommiddle w3-hide-small" style="bottom:-16px">
                                      <a href="index.php" class="w3-bar-item w3-button">Home</a>
                                      <a href="#portfolio" class="w3-bar-item w3-button">Portfolio</a>
                                      <a href="javascript:void(0)" class="w3-bar-item w3-button" onclick="document.getElementById('contact').style.display = 'block'">Contact</a>
                                    </div>
                                  </header>

                                  <!-- Navbar on small screens -->
                                  <div class="w3-center w3-light-grey w3-padding-16 w3-hide-large w3-hide-medium">
                                  <div class="w3-bar w3-light-grey">
                                    <a href="#" class="w3-bar-item w3-button">Home</a>
                                    <a href="#portfolio" class="w3-bar-item w3-button">Portfolio</a>
                                    <a href="#contact" class="w3-bar-item w3-button">Contact</a>
                                  </div>
                                  </div>
                         
                      </div>

         </div>
          </div>
        </div>
      </div>
      
      <?php foreach ($events as $ev){ $imgs = $sEvent->getImages($ev['eID']); ?>
      <div class="w3-container w3-card w3-white w3-round w3-margin">
        <img src="pimages/Avatar.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
        <span class="w3-right w3-opacity" id="itime"><?php $ipd = $sEvent->getDatepost($ev['eID']); include('../process/timePost.php');?></span>
        <h1><?php echo htmlspecialchars($ev['fname'])."  ".htmlspecialchars($ev['lname']); ?></h1>
        <h2><?php echo $ev['eheading']; ?></h2><br>
        <hr class="w3-clear">
        <p><?php echo $ev['ecaption']; ?></p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <?php 
            foreach($imgs as $img){?>
            <div class="w3-half">
              <img src="images/<?= htmlspecialchars($img['idesc']);?>" style="width:100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
         <?php }?>

        </div>
        <button type="button" onclick="reaction('images/<?= htmlspecialchars($ev['eID']);?>')" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" onclick="comment('images/<?= htmlspecialchars($ev['eID']);?>')" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div>
    <?php } ?>

       
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Upcoming Events:</p>
          <?php foreach ($uevents as $uev) {?>
            <div onload="getTime('<?='deadln'.$uev['eID'];?>','<?=htmlspecialchars($uev['eventdate']);?>')" >
               <img src="images/<?=htmlspecialchars($uev['edesc']);?>" alt="<?=htmlspecialchars($uev['eheading']);?>" style="width:100%;">
               <p><strong><?=htmlspecialchars($uev['edesc']);?></strong></p>
               <p><?=htmlspecialchars($uev['eventdate']);?></p>
               <h3 id="<?='deadln'.$uev['eID'];?>"></h3>
               <p><button onclick ="eventInfo('<?=$uev['eID']?>')" class="w3-button w3-block w3-theme-l4">Info</button></p>
            </div>
          <?php }?>
          <img src="images/oliah.jpg" alt="Forest" style="width:100%;">
          <p><strong>Holiday</strong></p>
          <p>Friday 15:00</p>
          <p><button onclick ="eventInfo()" class="w3-button w3-block w3-theme-l4">Info</button></p>
        </div>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-16 w3-center">
        <p>ADS</p>
      </div>
      <br>
      
      <div class="w3-card w3-round w3-white w3-padding-32 w3-center">
        <p><i class="fa fa-bug w3-xxlarge"></i></p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>
</div>
