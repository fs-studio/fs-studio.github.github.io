<?php

$files = scandir("../link");
array_shift($files);
array_shift($files);
$files = json_encode($files);

echo $files;
