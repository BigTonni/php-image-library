<?php

namespace Vendor\Image;

class JpgImage extends AbstractImage
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
     * @param resource $image
     */
    public function __construct($image)
    {
        $this->image = $image;
    }

    /**
     * @param int $width
     * @param int $height
     */
    public function setAttributes($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @param string $name
     * @param string $dir
     */
    public function setFilePath($name, $dir)
    {
        $this->fileName = ($name !== '') ? $name : date('YmdHis');
        $this->fileName = $dir . '/images/' . $this->fileName .'.'. $this->ext;
    }
      
    public function save()
    {
        imagejpeg($this->image, $this->fileName);
        $this->destroy($this->image);
    }
    
    /**
     * @return resource $image
     */
    public function show()
    {
        $image = file_get_contents($this->fileName);
        header('Content-type: image/jpeg');
        return $image;
    }

    /**
     * @return resource
     */
    public function open()
    {
        $image = imagecreatefromjpeg($this->image);
        $this->destroy($this->image);
        return $image;
    }
    
    /**
     * @param resource $image
     */
    private function destroy($image): void
    {
        imagedestroy($image);
    }
}
