<?php
include "../functions.php";

$glob_reset_progress = true;

for($i=0; $i<5; $i++){
	progress("Hello World!", ">");
	sleep(1);
}

progress_recet();


for($i=0; $i<5; $i++){
	progress("How are You", "<");
	sleep(1);
}

progress_recet();


for($i=0; $i<5; $i++){
	progress("I'm fine!", ">");
	sleep(1);
}

progress_recet();
