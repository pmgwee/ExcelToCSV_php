<?php
session_start();
$filename = $_SESSION['ft'];
// echo $filename stored when user upload the file with the respective file name
$filename = 'convertedFile/'.$filename.'.csv';
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false);
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="'.basename($filename).'";');
header('Content-Transfer-Encoding: binary');
header('Content-Length:'.filesize($filename));
readfile($filename);

exit;



