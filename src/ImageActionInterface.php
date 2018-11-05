<?php

namespace Vendor\Image;

interface ImageActionInterface
{
    public function show();
    
    /**
     * @param $x
     * @param $y
     * @param $width
     * @param $height
     *
     * @return mixed
     */
    public function crop($x, $y, $width, $height);
    
    /**
     * @param $angle
     * @param $bgd_color
     *
     * @return mixed
     */
    public function rotate($angle, $bgd_color);
}
