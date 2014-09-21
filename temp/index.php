<?php
 
//Load the file
$contents = file_get_contents('example.json');
 
//Decode the JSON data into a PHP array.
$contentsDecoded = json_decode($contents, true);
 
//Modify the counter variable.
echo $contents;
 
//Encode the array back into a JSON string.
$json = json_encode($contentsDecoded);
 
//Save the file.
file_put_contents('example.json', $json);

?>