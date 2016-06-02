<?php
define ('DOMAIN_NAME', 'javdeluxe.com');
define ('UPLOAD_PATH', '/wp-content/uploads/jav/');

//Set path to the folder where all image files are uploaded
// parent folder of this script + UPLOAD_PATH constant 
$upload_path = dirname(__FILE__) . UPLOAD_PATH;

//Set needed folder in the upload path
$screens_dir = $_POST['path'] . '/';

//Set full path for current upload folder
$upload_path .= $screens_dir;

	//path to the uploaded temporary source file
	$temp_path = $_FILES['cover']['tmp_name'];


	//path to the destination file
	$dest_path = $upload_path . $_FILES['cover']['name'];


	$img_urls = array();
	if (move_uploaded_file($temp_path, $dest_path)){
		
		//Create URL for uploaded image
		$img_urls[] = 'http://' . basename( dirname(__FILE__) ) . UPLOAD_PATH . $screens_dir . $_FILES['cover']['name'];

	}else{
		$img_urls[] = "Error!";
	}

echo json_encode($img_urls);

