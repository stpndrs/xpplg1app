<?php 
$file = $_GET['file'];
$folder = '/file-info/';

if (file_exists($folder . $file)) {
    $nama_file = basename($file);
    header("Content-Disposition: attachment; filename=\"$nama_file\"");
    readfile($folder . $file);
    exit;
}
?>