<?php
require '/blop/scr/setup.php';
require '/blop/scr/functions.php';
require '/blop/scr/parse/simple_html_dom.php';
require '/blop/scr/classes/Database.class.php';

$test = login(LOGIN_URL_PB);
echo($test);
//$str = get_page(URL_TO_PARSE);
//
//file_put_contents(PARSED_PAGE_TEMP_PATH, $str);
//
///*===============================================================================================*
// *																Get ALL page rows
///*===============================================================================================*/
//
//$dom = file_get_html(PARSED_PAGE_TEMP_PATH);
//$rows = $dom->find('tr[class*="torrent row"]');
//
////Setting nuber of downloaded torrents
//$rows = array_slice($rows, START_TO_PARSE,  NUM_TORRENTS);
//
//var_dump($rows);
///*===============================================================================================*
// *																Get images from rows 
///*===============================================================================================*/
//$dom2 = new simple_html_dom();
//$img = array();
//foreach($rows as $row){
// 	$parce_result = $row->find('script')[0]->innertext;
//	$parse_result = preg_replace('/\\\/i', '', $parce_result);
//	$dom2->load($parse_result);
//	$img[] = $dom2->find('img')[0]->src;
//}
//
///*===============================================================================================*
// *																Get file sizes inside the rows
///*===============================================================================================*/
//$tds = array();
//foreach($rows as $row)
//		$tds[] = $row->children(5);
//
//$file_sizes = squeeze_plain_text($tds);
//
////var_dump($file_sizes);
////$file_sizes = array_map(function($e){return (float)$e;}, $file_sizes);
//
///*===============================================================================================*
// *																Get download URLs for torrents inside the rows
///*===============================================================================================*/
//$urls = array();
//foreach($rows as $row)
//		$urls[] = 'http://empornium.me/' . $row->children(1)->find('a[href^=torrents.php?action=download]')[0]->href;
//
//
//
///*===============================================================================================*
// *																Get post titles inside the rows
///*===============================================================================================*/
//$titles = array();
//foreach($rows as $row)
//		$titles[] = $row->children(1)->find('a[onmouseout=return nd();]')[0]->plaintext;
//
//
//
///*===============================================================================================*
// *																Get post tags inside the rows
///*===============================================================================================*/
//$tags = array();
//foreach($rows as $row){
//	$tag = $row->children(1)->find('div.tags')[0]->plaintext;
//
// 	$tag = trim($tag);
// 	$tag = preg_replace('/ /', ', ', $tag);
// 	$tag = preg_replace('/\./', ' ', $tag);
//	
//	$tags[] = $tag;
//}
//
//
///*===============================================================================================*
// *															Normalize torrent names	
///*===============================================================================================*/
//
//$filenames = array();
//foreach($titles as $filename){
//	$filename = preg_replace('/[^a-z0-9\._]/i', '-', $filename);
//	$filename = preg_replace('/-+/i', '-', $filename);
//	$filename = trim($filename, '-') . '.torrent';
//	$filenames[] = $filename;
//}
//
//
///*===============================================================================================*
// *														Download images	
///*===============================================================================================*/
//$img_filenames = preg_replace('/\.torrent/', '', $filenames);
//$covers = downloadImages($img, $img_filenames);
//
//
//
///*===============================================================================================*
// *															Download torrent file	
///*===============================================================================================*/
//$torrents = download_torrents($urls, $filenames);
//
//$md5 = array();
//
//foreach($torrents as $path){
//	$md5[] = hash_file('md5', $path);
//}
//
//
//
//$db = new Database\Database('sitecontent', 'root', 'qxwv35azsc');
//
//for($i=0; $i<count($md5); $i++){
//	
//	$db->appendTo('torrents', array('title'			=>	$titles[$i],
//																	'tags'			=>	$tags[$i], 
//																	'url'				=>	$urls[$i], 
//																	'md5'				=>	$md5[$i], 
//																	'file_name'	=>	$filenames[$i], 
//																	'file_size'	=>	$file_sizes[$i]));
//}

?>
