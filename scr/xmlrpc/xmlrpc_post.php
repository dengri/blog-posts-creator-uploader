<?php

include '/blop/scr/classes/IXR_Library.php';
include '/blop/scr/classes/XMLRPCWPClient.class.php';

$client = new XMLRPCWPClient('http://javdeluxe.com/readme.php', 'javdeluxe', 'qxwv35azsc');
/*
if(!$client->query('demo.sayHello', array())){
	die('Something went wrong ' . $client->getErrorCode() . ' : ' . $client->getErrorMessage());
}
 */

//$parent = $client->add_wp_category('Parent test cat 4', 'Parent test cat description', 820);
//$post = $client->add_wp_post('Test title 2', 'Test content 2', ['category' => [823], 'post_tag' => [809, 810]]);

$r = $client->term_exist('post_tag', 'Test 2 tag');
var_dump($r);

