<?php
namespace Sitecontent\Folder;

include '/blop/scr/classes/Folder.class.php';

class ImageFolder extends Folder{

	function __construct($path){
		Folder::__construct($path);
	}	

}

$if = new ImageFolder('/blop/upl/img_cov/');
echo $if->getPath();
echo "\n";
