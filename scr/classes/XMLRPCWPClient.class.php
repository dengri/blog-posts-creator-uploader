<?php 

include '/blop/scr/classes/IXR_Library.php';

class XMLRPCWPClient extends IXR_Client{

	private $_login;
	private $_password;

	function __construct($xml_rpc_server_url, $login, $password){
		parent::IXR_Client($xml_rpc_server_url);

		$this->_login = $login;
		$this->_password = $password;
	}


	function get_terms($taxonomy){

		$args = array(
			0, 
			$this->_login, 
			$this->_password, 
			$taxonomy,
			$filter = array()
		);
					
		if( $this->query('wp.getTerms', $args) ){
				return $this->getResponse();
		}else{
			echo "Taxonomy name wrong / or you do not have rights to post on this blog";	
			return false;
		}

		return false;
	}




	function term_exist($taxonomy, $term_name){

		$args = array(
			0, 
			$this->_login, 
			$this->_password, 
			$taxonomy,
			$filter = array()
		);
					
		if( $this->query('wp.getTerms', $args) ){

			$terms =  $this->getResponse();
			$i = 0;
			while(isset($terms[$i])){
				if($terms[$i]['name'] === $term_name)	return true;
				$i++;
			}

		}else{
			echo "Taxonomy name wrong / or you do not have rights to post on this blog";	
			return false;
		}

		return false;
	}




	function add_wp_category($name, $desc, $parent=false){
		return $this->add_wp_taxonomy('category', $name, $desc, $parent);
	}



	function add_wp_tag($name, $desc){
		return $this->add_wp_taxonomy('post_tag', $name, $desc);
	}



	function add_wp_taxonomy($taxonomy, $name, $desc, $parent=false){

		$taxonomy_params = array(
												'taxonomy'		=> $taxonomy, 
												'name'				=> $name, 
												'description' => $desc
											);

		if($parent) $taxonomy_params['parent'] = $parent;

		$args = array(
			0, 
			$this->_login, 
			$this->_password, 
			$taxonomy_params
		);
		
		$this->query('wp.newTerm', $args);

		return $this->getResponse();
	}



function add_wp_post($title, $body, $terms = false, $post_thumbnail = false, $post_status = 'publish' ){

		$post_params = array(
			'post_status' => $post_status,
			'post_title'   => $title,
			'post_content' => $body
		);

		if($terms)
			$post_params['terms']	= $terms;

		if($post_thumbnail)
			$post_params['post_thumbnail'] = $post_thumbnail;

		$args = array(
			0, 
			$this->_login, 
			$this->_password, 
			$post_params
		);

		return $this->query('wp.newPost', $args) ? $this->getResponse() : false;
	}



	function get_terms_array($taxonomy){

		$terms = $this->get_terms($taxonomy);
		$terms_arr = array();

		foreach($terms as $term)
			$terms_arr[$term['name']] = $term['term_id'];
		
		return $terms_arr;
	}


function upload_image($path){

		$cont = file_get_contents($path);

		$filename = basename($path);

		$image_data = array('name' => $filename, 'type' => 'image/jpg', 'bits' => new IXR_Base64($cont), 'overwrite' => true);

		return $this->query('wp.uploadFile', 1, $this->_login, $this->_password, $image_data) ? $this->getResponse() : false;
	}




}
