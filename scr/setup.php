<?php

define('DEBUG', 1);

//-----------------
//  Constants
//-----------------
$glob_reset_progress = true;


//-----------------
//  Constants
//-----------------

//--- Server ---//
define('START_TO_PARSE', 0);
//Number of torrents to parse
define('NUM_TORRENTS', 20);
//Where to store torrent files
define('TORRENTS_PATH', '/blop/tor/');
//Watch folder
define('WATCH_PATH', '/blop/watch/');
//Path to a folder where to save covers prepared for upload
define('SERVER_COVERS_PATH', '/blop/upl/img_cov/');
//Path to the img_large folder
define('SERVER_IMG_LARGE_PATH', '/blop/upl/img_large/');
//Path to the img_large folder
define('SERVER_IMG_SMALL_PATH', '/blop/upl/img_small/');
//Path to videos to be renamed
define('VIDEOS_SRC_PATH', '/blop/vids/');
//Path to videos to be uploaded
define('VIDEOS_DEST_PATH', '/blop/upl/vids/');
//Upload folder at k2s
define('UPLOAD_FOLDER_K2S', 'aad9aa36886bd');


//Login URL Empornium
define('LOGIN_URL_EMP', 'http://www.empornium.me/login.php');

//Login URL Pornbay
define('LOGIN_URL_PB', 'https://pornbay.org/login.php');
//define('LOGIN_URL_PB', 'http://google.com');

//Url of the page to be barsed
define('URL_TO_PARSE_PB', 
'https://pornbay.org/torrents.php?filter_cat[3]=1&order_by=time&order_way=desc&filter_freeleech=1&searchtext=&search_type=0&taglist=&tags_type=0');
define('URL_TO_PARSE_EMP', 'http://www.empornium.me/torrents.php?filter_cat[15]=1');

//Login and password of the torrent tracker site
define('POST_FIELDS_EMP', 'http://www.empornium.me/torrents.php?page=26&filter_cat[15]=1');
define('POST_FIELDS_PB', 'http://www.empornium.me/torrents.php?page=1&order_way=desc&order_by=time&action=basic&taglist=jav');

//Path to the file were video technical info will be saved
define('MEDIAINFO_PATH', '/blop/upl/inf/filesinfo.txt');


//--- Site ---//
//Path to XMLRPC server
define('XMLRPC_SERVER', 'http://shemaletrannyvideo.com/readme.php');
//Path to image uploader
define('IMG_UPLOADER_PATH', 'http://shemaletrannyvideo.com/uploader.php');
//Path to the covers folder
define('SITE_COVERS_PATH', 'img_cov');
//Path to the covers folder
define('SITE_IMG_LARGE_PATH', 'img_large');
//Path to the covers folder
define('SITE_IMG_SMALL_PATH', 'img_small');

//Category
define('POSTS_CATEGORY', 'Shemale sex videos');
define('POSTS_CATEGORY_DESC', 'Download shemale sex, transsexual, tranny, ladyboy, t-girl sex videos');

//-----------------
//  Temp. files
//-----------------
define('COOKIEJAR_TEMP_PATH', '/blop/scr/temp/cookiejar');
define('PARSED_PAGE_TEMP_PATH', '/blop/scr/temp/page.html');


