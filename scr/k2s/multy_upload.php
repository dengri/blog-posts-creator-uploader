<?php
// create both cURL resources
$ch1 = curl_init();

$postFields = $data['form_data'];
$postFields['parent_id'] = $parent_id;
$postFields['parent_name'] = $parent_name;
$postFields[$data['file_field']] = '@'.$file;

curl_setopt_array($ch1, array(
    CURLOPT_FOLLOWLOCATION => 1,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $data['form_action'],
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS =>$postFields,
));



$ch2 = curl_init();




//create the multiple cURL handle
$mh = curl_multi_init();

//add the two handles
curl_multi_add_handle($mh,$ch1);
curl_multi_add_handle($mh,$ch2);

$active = null;
//execute the handles
do {
    $mrc = curl_multi_exec($mh, $active);
} while ($mrc == CURLM_CALL_MULTI_PERFORM);

while ($active && $mrc == CURLM_OK) {
    if (curl_multi_select($mh) != -1) {
        do {
            $mrc = curl_multi_exec($mh, $active);
        } while ($mrc == CURLM_CALL_MULTI_PERFORM);
    }
}

//close the handles
curl_multi_remove_handle($mh, $ch1);
curl_multi_remove_handle($mh, $ch2);
curl_multi_close($mh);

?>

