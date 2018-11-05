<?php

namespace Vendor\Image;

class JpgImage extends AbstractImage implements ImageActionInterface
{
    /**
     * @var string
     */
    protected $ext = 'jpg';
    
    /**
     * @var int
     */
    protected $width = 100;
    
    /**
     * @var int
     */
    protected $height = 100;
    
    /**
    * GD Resource.
    *
    * @var resource
    */
    protected $image;
    
    /**
     * @param string $name
     * @param string $dir
     */
    public function __construct($name = '', $dir)
    {
        $this->fileName = ($name !== '') ? $name : date('YmdHis');
        $this->fileName = $dir . '/images/' . $this->fileName .'.'. $this->ext;
        parent::__construct($this->fileName);
    }
      
    public function create()
    {
        imagejpeg($this->image, $this->fileName);
        $this->destroy($this->image);
    }
    
    /**
     * @return string
     */
    public function show()
    {
        $image = file_get_contents($this->fileName);
        header('Content-type: image/jpeg');
        return $image;
    }
    
    /**
     * @param int $width
     * @param int $height
     */
    public function setParams($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        
        $this->image = imagecreatetruecolor($this->width, $this->height);
    }
    
    /**
     * @param int $x
     * @param int $y
     * @param int $width
     * @param int $height
     */
    public function crop($x, $y, $width, $height)
    {
        $this->width = $width;
        $this->height = $height;
        $this->image = imagecreatefromjpeg($this->fileName);
        $new_image = imagecrop($this->image, ['x' => $x, 'y' => $y, 'width' => $width, 'height' => $height]);
        if($new_image !== false)
        {
            imagejpeg($new_image, 'images/new-cropped.'. $this->ext);
            $this->destroy($new_image);
        }
        $this->destroy($this->image);
    }
    
    /**
     * @param float $angle
     * @param int $bgd_color
     */
    public function rotate($angle, $bgd_color)
    {
        $this->image = imagecreatefromjpeg($this->fileName);
        $new_image = imagerotate($this->image, $angle, $bgd_color);
        if($new_image !== false)
        {
            imagejpeg($new_image, 'images/new-rotated.'. $this->ext);
            $this->destroy($new_image);
        }
        $this->destroy($this->image);
    }
    
    /**
     * @param resource $image
     */
    private function destroy($image)
    {
        imagedestroy($image);
    }
}