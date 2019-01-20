<?php

namespace Vendor\Image\Handlers;

interface ResizeInterface
{
    /**
     * @param $width
     * @param $height
     *
     * @return mixed
     */
    public function resize($width, $height);
}
