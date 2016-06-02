<?php

$message = 'Hello';
/*
$example = function(){
	var_dump($message);
};

echo $example();
*/

$example = function() use ($message){
	var_dump($message);
};
$example();

$message = 'World';
$example();


$message = 'Hello';
$example = function() use (&$message){
	var_dump($message);
};
$example();

$message = 'World';
$example();
