<?php

namespace ImagickDemo\Tutorial;

class imagickComposite extends \ImagickDemo\Example {


    function render() {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }


}