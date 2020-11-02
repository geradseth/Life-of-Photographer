<?php
include_once('../events/ShowEvents.php');
$etypes = $sEvent->getEv();
?>
<!-- Modal that pops up when you click on "New Message" -->
<div id="addImg" class="w3-modal" style="z-index:4">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-padding w3-red">
       <span onclick="document.getElementById('addImg').style.display='none'"
       class="w3-button w3-red w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
      <h2 class="headings">Add Images</h2>
    </div>
    <div class="w3-panel">
      <form id="image-form" method="post" name="events" action = "../process/uploadImg.php" enctype="multipart/form-data">
      <input type="hidden" name="iag" id="itk" value="">
      <label>Event Headings</label>
      <select class="w3-input w3-border w3-margin-bottom" id="ename" name="ename" type="text">
        <option disabled selected="selected">...Select Event....</option>
        <?php foreach ($etypes as $type) {
          ?><option value = "<?=$type['eID'];?>"><?=$type['eheading'];?></option>";
       <?php }?>
     </select>
      <label for="edate">Image</label>
      <input type="file" class="w3-input w3-border w3-margin-bottom" id="images" name="images[]" multiple="multiple">
      <button type="submit" id="ibtn" class="w3-button w3-light-grey w3-right" name="ibtn" value="Post">POST<i class="fa fa-paper-plane"></i></button>
    </form>   
    </div>
  </div>
</div>
