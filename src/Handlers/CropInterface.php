<?php

namespace Vendor\Image\Handlers;

interface CropInterface
{
    /**
     * @param int $x
     * @param int $y
     * @param int $width
     * @param int $height
     *
     * @return mixed
     */
    public function crop($x, $y, $width, $height);
}
