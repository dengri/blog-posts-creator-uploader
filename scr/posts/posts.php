<?php
require '/blop/scr/classes/Database.class.php';
require '/blop/scr/classes/XMLRPCWPClient.class.php';
require '/blop/scr/functions.php';
require '/blop/scr/setup.php';

use Database\Database;

$db =new Database('sitecontent', 'root', 'qxwv35azsc');
$client = new XMLRPCWPClient(XMLRPC_SERVER, 'shemale_lover', 'qxwv35azsc');

//Get all categories of the blog
$all_categories = $client->get_terms_array('category');

//Get all tags of the blog
$all_tags = $client->get_terms_array('post_tag');

//Get all post data in aray
$data = $db->getUploadedData();

var_dump($data);


//Process every post in $data array
$posts = array();
foreach($data as $d){

	//Create post 
	$posts = compose_post($d);

	//Creating new variables!!!
	extract($posts);

	//Checking if post category allready exists, if not - create it
//--------------------------------------------------------------------
	if(!array_key_exists($category, $all_categories)){
		echo "Adding $category category\n";
	  $client->add_wp_category($category, POSTS_CATEGORY_DESC);	
	}

	$tags_array = explode(', ', $tags);

	foreach($tags_array as $tag){
		//Checking if post category allready exists, if not - create it
		if(!array_key_exists($tag, $all_tags)){
			progress('Adding tag', '|');
		  $client->add_wp_tag($tag, $tag);	
		}
	}

	progress_recet();
//--------------------------------------------------------------------

//Get all categories of the blog
$all_categories = $client->get_terms_array('category');

//Get all tags of the blog
$tag_IDs = array();
$all_tags = $client->get_terms_array('post_tag');
foreach($tags_array as $tag){
		$tag_IDs[] = $all_tags[$tag];
	}

	$client->add_wp_post($title, $body, array('category' => array($all_categories[$category]), 'post_tag' => $tag_IDs), $cover);

}

