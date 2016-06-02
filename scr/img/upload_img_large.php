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
$img_large_folder = new Folder(SERVER_IMG_LARGE_PATH);


//Get cover images from source directory and prepare them for upload with cURL
$images_large = $img_large_folder->as_post_fields_curl_array();

var_dump($images_large);

//Upload images to site and get urls
$images_large_urls = upload_images($images_large, SITE_IMG_LARGE_PATH);

var_dump($images_large_urls);

//---------------------------------------------------
//Get video_ids from videos table
//---------------------------------------------------
foreach ($images_large_urls as $img_url){

	echo "Adding image $img_url[0] info to the database\n";
	echo ".......................................\n";
	$video_id = $db->getVideoID($img_url[0]);	
	$db->appendTo('img_large', array('video_id' => $video_id, 'url' => $img_url[0]) );
}


