<?php
require '/blop/scr/setup.php';
require '/blop/scr/classes/Database.class.php';

$db =new Database\Database('sitecontent', 'root', 'qxwv35azsc');

$info = trim(file_get_contents(MEDIAINFO_PATH));

$info = explode('###', $info);
$info = array_slice($info, 0, count($info)-1);

foreach($info as $i){
	$i = explode('___', $i);
	$info_assoc[$i[0]] = $i[1];
}

$fields = array();
foreach( $info_assoc as $filename => $mediainfo ){
	$fields[] = array('video_id' => $db->getVideoID($filename), 'filename' => $filename, 'info' => $mediainfo);
}


foreach($fields as $field){
	$db->appendTo('mediainfo', $field);
}

