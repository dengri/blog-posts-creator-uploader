<?php
include '/blop/scr/classes/Folder.class.php';
include '/blop/scr/classes/Database.class.php';
use Sitecontent\Folder;
use Database\Database;

//Initialize Folder objects for directories containing images 
//to upload
$img_large = new Folder\Folder('/blop/upl/img_large/');
$img_small = new Folder\Folder('/blop/upl/img_small/');


//Upload large screenshots
$curl_img = $img_large->as_post_fields_curl_array();
$curl_img['scr_size'] = 'img_large';

$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_URL, 'http://javdeluxe.com/uploader.php');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_img);

echo "Uploading large screenshots\n";
echo ".......................................\n";
$img_large_resp = json_decode(curl_exec($ch));



//Upload small screenshots
$curl_img = $img_small->as_post_fields_curl_array();
$curl_img['scr_size'] = 'img_small';
curl_setopt($ch, CURLOPT_POSTFIELDS, $curl_img);

echo "Uploading small screenshots\n";
echo ".......................................\n";
$img_small_resp = json_decode(curl_exec($ch));


$db = new Database('sitecontent', 'root', 'qxwv35azsc');


//---------------------------------------------------
//Get video_ids from videos table
//---------------------------------------------------
foreach ($img_large_resp as $img_url){

	echo "Adding image $img_url info to the database\n";
	echo ".......................................\n";
	$video_id = $db->getVideoID($img_url);	
	$db->appendTo('img_large', array('video_id' => $video_id, 'url' => $img_url) );
}


foreach ($img_small_resp as $img_url){
	
	echo "Adding image $img_url info to the database\n";
	echo ".......................................\n";
	$video_id = $db->getVideoID($img_url);	
	$db->appendTo('img_small', array('video_id' => $video_id, 'url' => $img_url) );
}


curl_close($ch);
