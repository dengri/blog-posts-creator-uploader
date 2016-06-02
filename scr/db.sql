/*
DROP DATABASE `sitecontent`;
CREATE DATABASE `sitecontent` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
*/

USE `sitecontent`;
/*
DROP TABLE `torrents`;
CREATE TABLE IF NOT EXISTS `torrents`(
`id` int(11) NOT NULL AUTO_INCREMENT,
`title` varchar(1000) DEFAULT NULL,
`tags` varchar(1000) DEFAULT NULL,
`cover` int(11) DEFAULT NULL,
`url` varchar(1000) DEFAULT NULL,
`md5` varchar(50) DEFAULT NULL,
`file_name` varchar(1000) DEFAULT NULL,
`file_size` varchar(10) DEFAULT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;
*/
/*INSERT INTO `products` (`sku`,`name`,`img`,`price`,`paypal`) VALUES(NULL, 'Logo shirt, Blue', 'img\logo-shirt-blue.jpg', '12.07', '1451345345');*/

/*DROP TABLE `videos`;
*/
/*
CREATE TABLE IF NOT EXISTs `videos`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`torrent_id` int(11) DEFAULT NULL,
`video` varchar(1000) DEFAULT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;
*/

/*
drop table if exists minfo_temp;
create temporary table minfo_temp select v.torrent_id, group_concat(m.info separator '\n') as minfo from videos as v left join mediainfo as m on v.id = m.video_id group by v.torrent_id;
*/
/*select * from minfo_temp;*/
/*
select torrents.title, torrents.tags, img_large.url, minfo_temp.minfo, img_small.url, group_concat(distinct video_urls.video_url order by substring_index(video_urls.video_url, '.', -2) separator '\n') as k2s from video_urls, torrents, img_large, img_small, videos, minfo_temp where video_urls.torrent_id = torrents.id and img_large.video_id = videos.id and img_small.video_id = videos.id and minfo_temp.torrent_id = torrents.id group by video_urls.torrent_id\G
*/

/*
DROP TABLE `images`;
CREATE TABLE IF NOT EXISTS `img_large`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`video_id` int(11) DEFAULT NULL,
`url` varchar(1000) DEFAULT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `img_small`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`video_id` int(11) DEFAULT NULL,
`url` varchar(1000) DEFAULT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `mediainfo`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`video_id` int(11) DEFAULT NULL,
`info` varchar(1000) DEFAULT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS `video_urls`;
CREATE TABLE IF NOT EXISTS `video_urls`(
`id` int(11) AUTO_INCREMENT NOT NULL,
`torrent_id` int(11) DEFAULT NULL,
`video_id` int(11) DEFAULT NULL,
`video_url` varchar(1000) DEFAULT NULL,
PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE utf8_unicode_ci;

*/

ALTER TABLE torrents
ADD img_large_url VARCHAR(500),
		img_small_url VARCHAR(500);
