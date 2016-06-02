<?php

require '/blop/scr/classes/Folder.class.php';
require '/blop/scr/classes/Database.class.php';
require '/blop/scr/classes/XMLRPCWPClient.class.php';
require '/blop/scr/setup.php';

$client = new XMLRPCWPClient('http://shemaletrannyvideo.com/readme.php', 'shemale_lover', 'qxwv35azsc');
$img_folder = new Sitecontent\Folder\Folder(SERVER_IMG_SMALL_PATH );

$db = new Database\Database('sitecontent', 'root', 'qxwv35azsc');

$images = $img_folder->as_array();

foreach($images as $image){
	$image_uploaded = $client->upload_image(SERVER_IMG_SMALL_PATH . $image);

	//Update db with cover ID and URL
	$db->saveImageInfoToDB(array('img_path' => $image, 
															 'img_url'  => $image_uploaded['url']), 'small');
}


