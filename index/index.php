
<?php
 if(session_status() == PHP_SESSION_NONE){
 session_start();
 }
 include_once('includes/head.php'); 
?>
<div id="homep"></div>
<!-- LOading Some modal to view som requested data by users -->
<?php include_once('load-modal.php'); ?>

<!--including footer11-->
<?php include_once("includes/footer.php"); ?>
</body>
</html>
