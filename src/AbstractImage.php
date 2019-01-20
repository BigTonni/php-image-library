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
     * @return mixed
     */
    abstract public function show();

    /**
     * @return mixed
     */
    abstract public function save();
}
