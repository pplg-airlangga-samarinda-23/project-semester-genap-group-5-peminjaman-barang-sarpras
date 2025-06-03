<?php

$filebom=$_POST['file'];

$filebom=file_get_contents($filebom);
$fp = fopen($filebom, 'r');
$contents = stream_get_contents($fp);


?>