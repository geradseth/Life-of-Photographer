<?php
/*
#######....FILE UPLOADING SCRIPT
..........
      /*/ 
include_once('../events/AddEvents.php');
include_once('filter.php');

if (isset($_POST['ibtn'])||isset($_POST['images'])) {

   $images = array();

   $eid =f($_POST['ename']);

   #.....Counting the Image to be uploaded

   $imgn = count($_FILES['images']['name']);

   $img = array_filter($_FILES['images']['name']);

   #...Creating an Array of Allowed File Type

   $allowed_file = array("png","jpeg","jpg");

   ##..looping Through each image  and moving to target uploaded folder.

   for($i=0;$i<$imgn;$i++){ 
        $upload_dir = "../index/images/";
        $upload_image = $upload_dir.basename($_FILES['images']['name'][$i]);

		$filename = time().'_'.$_FILES['images']['name'][$i];	

		# Getting The File Extension
		$ext = pathinfo($filename, PATHINFO_EXTENSION);

		// Checking file type if it is in The allowed files
		if(in_array($ext, $allowed_file)){	
        if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $upload_image)){
            $images[] = $upload_image;
			$insert_sql = $event->addImage($eid, $filename);

        }else  echo "<script type=\"text/javascript\">
							alert(\"We are having problem on Uploading your Photo Please Try Again later!\")
							window.location=\"../index.php\"
						  </script>";

      }else  echo "<script type=\"text/javascript\">
							alert(\"We only Allow Png, jpeg and jpg please try again!\")
							window.location=\"../index.php\"
						  </script>";
    }
?>
<div class="row">
	<div class="image_gallery">
		<?php
		if(!empty($images)){ 
			foreach($images as $image){ ?>
			<ul>
				<li >
					<img class="images" src="../images/<?php echo $image; ?>" alt="">
				</li>
			</ul>
		<?php }	}?>
	</div>
</div>
<?php } ?>