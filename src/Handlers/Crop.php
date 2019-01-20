<?php

namespace Vendor\Image\Handlers;

class Crop
{
    protected $img;

    /**
     * Crop constructor.
     * @param $img resource
     */
    public function __construct($img)
    {
        $this->img = $img;
    }

    /**
     * @param int $x
     * @param int $y
     * @param int $width
     * @param int $height
     *
     * @return bool|resource
     */
    public function crop($x, $y, $width, $height)
    {
        $imageCrop = imagecrop($this->img, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
        imagedestroy($this->img);

        return $imageCrop;
    }
}
