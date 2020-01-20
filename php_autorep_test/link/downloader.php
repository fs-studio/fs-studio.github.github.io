<?php

//$zipName = 'files/preland.zip';
$zipName = $_GET['zipName'];

if(file_exists($zipName)) {
    header('Content-type: application/zip');
    header('Content-Disposition: attachment; filename="' . $zipName . '"');
    readfile($zipName);
    unlink($zipName);
} else {
    echo 'Ошибка!';
}
