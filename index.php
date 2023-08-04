<?php

// Read the JSON file
$json = file_get_contents('links.json');

// Decode the JSON file
$json_data = json_decode($json,true);

// get a random link from the file
$random_url = $json_data["links"][rand(0, ( count($json_data["links"]) - 1) )]["URL"];

// log access
$handle = fopen("logs.csv", "a");
$access = isset($_GET["a"]) ? $_GET["a"] : "direct";
$line = [ date("Y-m-d H:i:s"), $access ,$_SERVER["REMOTE_ADDR"], $_SERVER["HTTP_REFERER"],$_SERVER["HTTP_USER_AGENT"],$random_url];
fputcsv($handle, $line,";");
fclose($handle);

// redirect to this link
header('Location: '.$random_url);

?>
