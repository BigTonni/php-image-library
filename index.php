<?php

require_once __DIR__ . '/vendor/autoload.php';

use \Vendor\Image\JpgImage;

$image_jpg = new JpgImage('test', __DIR__);
$image_jpg->setParams(200, 200);
$image_jpg->create();

$image_jpg->crop(0, 0, 10, 10);
$image_jpg->rotate(180, 0);

$image_jpg->show();