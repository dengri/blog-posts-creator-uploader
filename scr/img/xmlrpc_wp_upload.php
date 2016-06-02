<?php

require '/blop/scr/classes/Folder.class.php';
require '/blop/scr/classes/Database.class.php';
require '/blop/scr/classes/XMLRPCWPClient.class.php';
require '/blop/scr/setup.php';

$client = new XMLRPCWPClient('http://shemaletrannyvideo.com/readme.php', 'shemale_lover', 'qxwv35azsc');
$covers_folder = new Sitecontent\Folder\Folder(SERVER_COVERS_PATH);

$db = new Database\Database('sitecontent', 'root', 'qxwv35azsc');

$covers = $covers_folder->as_array();

foreach($covers as $cover){
	$cover_uploaded = $client->upload_image(SERVER_COVERS_PATH . $cover);
	//Update db with cover ID and URL
	$db->updateDB('torrents', array('cover_url' => $cover, 
																	'cover_id'  => $cover_uploaded['id']));
}


