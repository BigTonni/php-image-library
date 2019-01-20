<?php

namespace Vendor\Image\Handlers;

class Rotate implements RotateInterface
{
    protected $img;

    /**
     * Rotate constructor.
     * @param $img resource
     */
    public function __construct($img)
    {
        $this->img = $img;
    }

    /**
     * @param $angle
     * @param $background
     *
     * @return resource
     */
    public function rotate($angle, $background)
    {
        $rotate = imagerotate($this->img, $angle, $background);
        imagedestroy($this->img);

        return $rotate;
    }
}
