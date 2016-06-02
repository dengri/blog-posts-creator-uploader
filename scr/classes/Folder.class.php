<?php namespace Sitecontent\Folder;

class Folder{
	private $path;

	function __construct($path){
		$this->path = $path;
	}
	

	function set_path($path){
		$this->path = $path;
	}
	

	function getPath(){
		return $this->path;
	}


	function as_array($full_path = false){

		$path = $full_path ? $this->path : '';

		$handle = opendir($this->path);
		if(!$handle) return false;

		$dir_array = array();
	
		while (($file = readdir($handle)) !== false) if ($file!='.' && $file!='..' && $file!='.gitignore') $dir_array[]=$path.$file;
		
		closedir($handle);
		
		return $dir_array;
	}



//$array['file_name']	=> 'file_path'
	function as_assoc_array (){
		$dir_handle = opendir($this->path);
		if(!$dir_handle) return false;

		$dir_array = array();
	
		while (($file = readdir($dir_handle)) !== false) 
	
	
			if ($file!='.' && $file!='..'){
				
				$file_handle = fopen($this->path . $file, 'r');
				$filestr = fread($file_handle, filesize($this->path . $file));
				$dir_array[$file]=$filestr;
				fclose($file_handle);
				
		}
			
		closedir($dir_handle);
	
		return $dir_array;
	}


//Returns an array ready to cUrl upload
	function as_post_fields_curl_array(){
	
		$post_array = array();
		$i=1;
		
		foreach($this->as_array(1) as $image){
			$post_array['file'.$i] = '@'.$image;
			$i++;
		}
		
		return $post_array;	
	}

}
