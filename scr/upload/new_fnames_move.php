<?php

include "/blop/scr/functions.php";
include "/blop/scr/classes/Folder.class.php";
include "/blop/scr/classes/Database.class.php";
include "/blop/scr/setup.php";

use Sitecontent\Folder;

$torr_dir = new Folder\Folder(TORRENTS_PATH);
$fl_dir = new Folder\Folder(VIDEOS_SRC_PATH);
$torr_assoc_arr = $torr_dir->as_assoc_array();
$torr_arr = $torr_dir->as_array();
$fl_array = $fl_dir->as_array();


set_time_limit(3600);


//======================== Generate new filenames for DB videos table ===========================//
$new_flnames = array();

$db = new Database\Database('sitecontent', 'root', 'qxwv35azsc');

	//Take one file name from array
	foreach ($fl_array as $flname){

		$i = 0;
				

		//Take one filename and sebloph it in every torrent contents
		foreach ($torr_assoc_arr as $torr_flname => $torr_content ){

			$search_res = strpos($torr_content, $flname);
			
			//If file name hase been found in a torrent - do something and jump to 
			//the next filename in thr outer loop			
			if ($search_res){
				
				$id = $db->getTorrID(TORRENTS_PATH . $torr_flname); 		
			
				$new_flname = substr($torr_flname, 0, strlen($torr_flname)-8) . "_" . md5($flname) . '.' . pathinfo($flname, PATHINFO_EXTENSION);
				$new_flname = preg_replace('/[^a-z0-9\._]/i', '-', $new_flname);
				$new_flname = preg_replace('/-+/i', '-', $new_flname);
				$new_flnames[$flname] = array('torrent_id' => $id, 'filename' => $new_flname);

				echo $new_flname . "\n";	
				//Break current loop execution and jump to the outer loop
				continue 2;		
			}	
		}		
	}

//======================== Fill videos table ===========================//
	echo "\n\n";
	foreach ($new_flnames as $old_flname => $new_flname)
	{
		
		$db->appendTo('videos', array('video'	=>	$new_flname['filename'], 
																	'torrent_id'		=>	$new_flname['torrent_id'] ));
		
		//rename(SOURCE_PATH . $key, DEST_PATH . $value);
		echo "Copying " . VIDEOS_SRC_PATH . $old_flname . " to " . VIDEOS_DEST_PATH . $new_flname['filename'];
		echo "\n....................................................................................................................\n";
		rename(VIDEOS_SRC_PATH . $old_flname, VIDEOS_DEST_PATH . $new_flname['filename']);
	}

