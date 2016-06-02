<?php
namespace XMLRPClientWordpress;

class XMLRPClientWordpress{

	public $XMLRPCURL = '';
	public $Username = '';
	public $Password = '';


	function __construct($xmlrpcurl, $username, $password){
		$this->XMLRPCURL = $xmlrpcurl;
		$this->Username = $username;
		$this->Password = $password;
	}


	function send_request($requestname, $params){
		$request = xmlrpc_encode_request(	$requestname, $params );		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
		curl_setopt($ch, CURLOPT_URL, $this->XMLRPCURL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 1);

		$results = curl_exec($ch);
		\curl_close($ch);
		return $results;
	}


	function create_post($title, $body, $category = '', $tags = '', $encoding = 'UTF-8'){

		$title = htmlentities($title, ENT_NOQUOTES, $encoding);	
		$tags = htmlentities($tags, ENT_NOQUOTES, $encoding);	

		$content = array(
			'title'	=> $title,
			'description' => $body,
			'mt_allow_comments' => 1,
			'mt_allow_pings' => 1,
			'post_type' => 'post',
			'mt_kywords' => $tags,
			'categories' => $category
		);

		$params = array(0,
										$this->Username,
										$this->Password,
										$content,
										true	
									 );

		return $this->send_request('metaWeblog.newPost', $params);
	}



	function create_category( $category_name, $description ){
	
		$category = array(
			'name'				=> $category_name,
			'description' => $description
		);

		$params = array(0, $this->Username, $this->Password, $category);

		return xmlrpc_decode($this->send_request('wp.newCategory', $params));
	}


}

