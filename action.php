<?php

$width = $_POST['width'];
$height = $_POST['height'];
$size = $_POST['size'];

include("resize_function.php");

$zip = new ZipArchive();
$tmp_file = tempnam('/tmp','');

$zip->open($tmp_file, ZipArchive::CREATE);

$i=$_POST['start'];
foreach ($_FILES['images']['error'] as $key => $error) {

    if ($error == UPLOAD_ERR_OK) {

        $name = $_FILES['images']['name'][$key];
        $tmp_name = $_FILES['images']['tmp_name'][$key];

        $pathinfo = pathinfo($name); // get pathinfo
        $ext = $pathinfo["extension"]; // get extension

        $name = strtolower(trim($name)); // changed to english character
        $name = basename($name, "." . $ext); // extension removed from name

        $dizin1 = $_POST['ek'] . "_" . $i . "." . $ext;

        $image_file = tempnam('/tmp','');
        $image = smart_resize_image($tmp_name, $image_file, $width, $height, $size, "0", false, "100");

        # download file
        $download_file = file_get_contents($image_file);

        #add it to the zip
        $zip->addFromString($dizin1,$download_file);

        $i++;
    }
}
$zip->close();

# send the file to the browser as a download
header('Content-disposition: attachment; filename='.$_POST['ek'].'.zip');
header('Content-type: application/zip');
readfile($tmp_file);

?>