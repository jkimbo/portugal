<?php
/*
Uploadify v2.1.4
Release Date: November 8, 2010

Copyright (c) 2010 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
if (!empty($_FILES)) {

    require_once('../dBconnect.php');
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
    $title = stripslashes($_FILES['Filedata']['name']);
    $filename = strtolower($title); // Make title lowercase
    $filename = trim($filename);
    $filename = str_replace( " ", "-", $filename); // Replace spaces with hypens

	$targetFile =  str_replace('//','/',$targetPath) . $filename;

    move_uploaded_file($tempFile,$targetFile);

    $exif_data = exif_read_data ( '../uploads/'.$filename);
    list($width, $height, $type, $attr) = getimagesize('../uploads/'.$filename);

    $emodel = $exif_data['Model'];
    $eexposuretime = $exif_data['ExposureTime'];
    $efnumber = $exif_data['FNumber'];
    $eiso = $exif_data['ISOSpeedRatings'];
    $edate = $exif_data['DateTime'];

    global $cid;
    $sql = "SELECT file_order FROM `portugal_images` ORDER BY id DESC LIMIT 1";
    $order = mysql_result(mysql_query($sql,$cid),0);
    $order++;

    if (mysql_query("INSERT INTO `portugal_images` (id,title,filename,file_order,model,exposuretime,fnumber,iso,date,width,height) VALUES ('','$title','$filename','$order++','$emodel','$eexposuretime','$efnumber','$eiso','$edate','$width','$height')",$cid)){
        //echo 'Successful insertion!';
    } else {
        //echo 'Unsuccessful insertion :( !';
    }

    $max_width = 250;
    $scale_height = $height / ($width / $max_width);

    $json = array('max_width' => $max_width, 'filename' => $filename, 'height' => $scale_height);
    echo json_encode($json);

}
?>
