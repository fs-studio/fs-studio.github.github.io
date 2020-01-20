<?php

namespace App\Rep\Elements;

class AddRul extends AddElements
{

    public function doReplace($file, $rul)
    {

        if ($rul[0] === 1) {
            $popUpBackground = '<div class="eeee"></div>';
            $pos = strripos($file, $popUpBackground);
            $file = substr_replace($file, $this->getElements()[8], $pos + strlen($popUpBackground), 0);

            $pos = strripos($file, '</head>');
            $file = substr_replace($file, $this->getElements()[7], $pos, 0);

            if (preg_match('%[\<div\s]+([class]+|[id]+)([\=\"\'\s]+)(com|comment)([(\s\-\_)]*[a-z]+)[\"\'/>]+%', $file, $string)) {
                $pos = strripos($file, $string[0]);
                $file = substr_replace($file, $this->getElements()[9], $pos, 0);
            }

            $file = preg_replace('%href=\"\<\?php echo trackerGetUrl\(\)\; \?\>\"%', 'href="#roulette"', $file);;

            return $file;

        } else {
            return $file;
        }

    }
}
