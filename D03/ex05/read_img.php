<?php
header('content-type: image/png');
$file = '../img/42.png';
readfile($file);
?>