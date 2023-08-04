<?php

// Read the JSON file
$json = file_get_contents('links.json');

// Decode the JSON file
$json_data = json_decode($json,true);

// get a random link from the file
$random_url = $json_data["links"][rand(0, ( count($json_data["links"]) - 1) )]["URL"];

// redirect to this link
header('Location: '.$random_url);

?>
