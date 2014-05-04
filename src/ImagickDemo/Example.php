<?php


namespace ImagickDemo;



class Example {

    protected $colors;

    protected $imagePath;
    
    
    
    function __construct(\ImagickDemo\Colors $colors, $imagePath) {
        $this->colors = $colors;
    }



//    function getFilename() {
//        $fullClassName = get_class($this);
//        $classPathPart = str_replace('\\', '/', getNamespace($fullClassName));
//        $filename = $classPathPart.'/'.getClassName($fullClassName);
//        //$params = $this->getParameters();
//
////        if (!empty($params)) {
////            $filename .= '_'.md5(json_encode($params));
////        }
//
//        return $filename;
//    }

    function renderTitle() {
        return getClassName(get_class($this));
    }
    
    function renderImageURL() {
        return "";
    }
    
    function renderImage() {
        return "Image goes here?";
    }
    
    function renderImageSafe() {
        try {
            /** @noinspection PhpVoidFunctionResultUsedInspection */
            $this->renderImage();
        }
        catch(\Exception $e) {
            $draw = new \ImagickDraw();

            $strokeColor = new \ImagickPixel('none');
            $lightColor = new \ImagickPixel('brown');

            $draw->setStrokeColor($strokeColor);
            $draw->setFillColor($lightColor);
            $draw->setStrokeWidth(1);
            $draw->setFontSize(24);
            $draw->setFont("../fonts/Arial.ttf");

            $draw->setTextAntialias(false);
            $draw->annotation(50, 75, $e->getMessage());

            $imagick = new \Imagick();
            $imagick->newImage(500, 250, "SteelBlue2");
            $imagick->setImageFormat("png");
            $imagick->drawImage($draw);

            header("Content-Type: image/png");
            echo $imagick->getImageBlob();
        }
    }
    
    function renderDescription() {
        //return "Choose something mofo.";
        return "";
    }
    
}

 