<?php
	if(isset($_POST['submitImage'])){
	$image_name = $_FILES['uploadImage']['name'];
	$image_type = $_FILES['uploadImage']['type'];
	$image_size = $_FILES['uploadImage']['size'];
	$image_tmp_name= $_FILES['uploadImage']['tmp_name'];
		

	move_uploaded_file($image_tmp_name,"photos/$image_name");
		echo "<img src='photos/$image_name' width='400' height='250'>";		
			
}
?>