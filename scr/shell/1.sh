#!/bin/bash

#Find videos in */blop/complete* folder and move them all to */blop/vids* folder
echo "1. Finding and copying videos\n";
find /blop/complete/ -type f -exec mv {} /blop/vids/ \;
rm /blop/vids/*.{jpg,png,txt,pdf,bmp,tif,tiff,gif,Jpg,jPg,jpG,jpeg,jPG,JPg,Jpeg,JPEG,rar,Rar,RAR,zip,Zip,ZIP,JPG}

#Rename videos from */blop/vids* and move them to */blop/upl/vids*
#Add information to the *torrents* DB table
echo "2. Renaming and preparing to make screenshots\n";
php -f /blop/scr/upload/new_fnames_move.php

#Create screenshots from the videos in */blop/upl/vids* and place them
#to the */blop/upl/img_large* and */blop/upl/img_small* folders
echo "3. Creating screenshots\n";
rm /blop/upl/img/*
rm /blop/upl/img_large/*
rm /blop/upl/img_small/*
cd /blop/upl/vids/

/blop/scr/img/mtn -i -t -c 2 -r 3 -w 800 -O /blop/upl/img_large   /blop/upl/vids
/blop/scr/img/mtn -i -t -c 4 -r 9 -O /blop/upl/img_small /blop/upl/vids

#upload images and add image-info to DB
echo "4. Uploading images\n";
php -f /blop/scr/img/xmlrpc_wp_upload_img_large.php
php -f /blop/scr/img/xmlrpc_wp_upload_img_small.php
php -f /blop/scr/img/xmlrpc_wp_upload.php
#Generate video info
echo "5. Generating video info\n";
mediainfo --Inform="file:///blop/scr/mediainfo/template.txt" /blop/upl/vids/* > /blop/upl/inf/filesinfo.txt
php -f /blop/scr/mediainfo/add_media_info_to_db.php

#Create blophives
cd /blop/upl/vids
echo "6. Creating archives\n";
for i in *
	 do rar m -r- -m0 -v695000000b -sm700000000 -ximg -xinf -xrars "/blop/upl/rars/${i}" "$i";
done

mv /blop/upl/rars/* /blop/upl/vids/

echo "6. Uploading archives\n";
php -f /blop/scr/upload/upload.php

