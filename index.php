<?php

require_once __DIR__ . '/vendor/autoload.php';

use Vendor\Image\Handlers\Crop;
use Vendor\Image\Handlers\Resize;
use Vendor\Image\Handlers\Rotate;
use Vendor\Image\JpgImage;

$imageJpg = new JpgImage(__DIR__ .'/images/test.jpg');
$imageJpg->setAttributes(200, 200);

$imageResource = $imageJpg->open();

$imageCrop = new Crop($imageResource);
$imageNew = $imageCrop->crop(0, 0, 50, 10);

//$imageResize = new Resize($imageResource);
//$imageNew = $imageResize->resize(300, 200);

//$imageRotate = new Rotate($imageResource);
//$imageNew = $imageRotate->rotate(180, 0);

//Save new jpg-file
$imageJpgNew = new JpgImage($imageNew);
$imageJpgNew->setFilePath('new-image', __DIR__);

$imageJpgNew->save();
$imageJpgNew->show();
