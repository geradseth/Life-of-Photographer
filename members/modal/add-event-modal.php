<?php
include_once('../events/ShowEvents.php');
$etypes = $sEvent->getEventType();
?>
<!-- Modal that pops up when you click on "New Message" -->
<div id="id01" class="w3-modal" style="z-index:4">
  <div class="w3-modal-content w3-animate-zoom">
    <div class="w3-container w3-padding w3-red">
       <span onclick="document.getElementById('id01').style.display='none'"
       class="w3-button w3-red w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
      <h2 class="headings">Add Events</h2>
    </div>
    <div class="w3-panel">
      <form id="event-form" name="events">
      <input type="hidden" name="ag" id="etk" value="">
      <label>Event Type</label>
      <select class="w3-input w3-border w3-margin-bottom" id="etype" type="text">
        <option disabled selected="selected">...Select Event Type....</option>
        <?php foreach ($etypes as $type) {
          ?><option value = "<?=$type['etid'];?>"><?=$type['edesc'];?></option>";
       <?php }?>
     </select>
      <label for="edate">Event date</label>
      <input class="w3-input w3-border w3-margin-bottom" id="edate" type="datetime-local">
      <label>Event Title / Name</label>
      <input class="w3-input w3-border w3-margin-bottom" id="jina" type="text">
      <label>Caption</label>
      <textarea class="w3-input w3-border w3-margin-bottom" id = "ecapt" style="height:150px" placeholder="What's on your mind?"></textarea>
      <button type="submit" id="ebtn" class="w3-button w3-light-grey w3-right" value="Post">POST<i class="fa fa-paper-plane"></i></button>
    </form>   
    </div>
  </div>
</div>
