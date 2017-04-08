<?php
include '../Timer.php';

$timer = new \dbarnwell\Timer();
$timer->start();
sleep(2);
echo $timer->stop()->elapsedSeconds().PHP_EOL;