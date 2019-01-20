<?php

namespace Vendor\Image\Handlers;

class Resize implements ResizeInterface
{
    protected $img;

    /**
     * Resize constructor.
     * @param $img resource
     */
    public function __construct($img)
    {
        $this->img = $img;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return imagesx($this->img);
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return imagesy($this->img);
    }

    /**
     * @param $width
     * @param $height
     *
     * @return resource
     */
    public function resize($width, $height)
    {
        $newImage = imagecreatetruecolor($width, $height);
        imagecopyresampled($newImage, $this->img, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
        imagedestroy($this->img);

        return $newImage;
    }
}
