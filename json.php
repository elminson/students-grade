<?php

$file = "students.json";

$content = file_get_contents($file); 

if ($content == null) {
    $data[] = $_POST;
    $jsonData = json_encode($data);
    file_put_contents($file, $jsonData);
} else {
    $data = $_POST;
    $tempArray = (array) json_decode($content);
    array_push($tempArray, $data);
    $jsonData = json_encode($tempArray);
    file_put_contents($file, $jsonData);

}
echo $jsonData;

