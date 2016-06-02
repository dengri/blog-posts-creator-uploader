<?php

include '/blop/scr/classes/Folder.class.php';
include '/blop/scr/classes/Database.class.php';
include '/blop/scr/setup.php';
include '/blop/scr/functions.php';
use Sitecontent\Folder\Folder;
use Database\Database;


$db = new Database('sitecontent', 'root', 'qxwv35azsc');

//Initialize Folder object for directory containing images 
//to upload
$img_small_folder = new Folder(SERVER_IMG_SMALL_PATH);


//Get cover images from source directory and prepare them for upload with cURL
$images_small = $img_small_folder->as_post_fields_curl_array();

var_dump($images_small);

//Upload images to site and get urls
$images_small_urls = upload_images($images_small, SITE_IMG_SMALL_PATH);

var_dump($images_small_urls);

//---------------------------------------------------
//Get video_ids from videos table
//---------------------------------------------------
foreach ($images_small_urls as $img_url){

	echo "Adding image $img_url[0] info to the database\n";
	echo ".......................................\n";
	$video_id = $db->getVideoID($img_url[0]);	
	$db->appendTo('img_small', array('video_id' => $video_id, 'url' => $img_url[0]) );
}


