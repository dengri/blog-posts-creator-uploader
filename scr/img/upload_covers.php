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
$covers_folder = new Folder(SERVER_COVERS_PATH);



//Get cover images from source directory and prepare them for upload with cURL
$covers = $covers_folder->as_post_fields_curl_array();

//var_dump($covers); die();
$covers_urls = upload_images($covers, SITE_COVERS_PATH);


//---------------------------------------------------
//			Get video_ids from videos table
//---------------------------------------------------
foreach ($covers_urls as $img_url){
	$db->updateDB('torrents', array('cover' => $img_url[0]));
}
 

