<?php

namespace Vendor\Image;

abstract class AbstractImage
{
    /**
     * @var string
     */
    protected $fileName;
    
    /**
     * @var string
     */
    protected $ext;
    
    /**
     * @var int
     */
    protected $width;
    
    /**
     * @var int
     */
    protected $height;    
    
    /**
     * @param string $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }
   
}