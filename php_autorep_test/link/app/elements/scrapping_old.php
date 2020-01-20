<?php

namespace App\Rep\Elements;

require_once 'simple_html_dom.php';

class Scrap {
    protected $address;
    protected $scrapArray = [];

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function scrapping()
    {
        $html = file_get_html($this->address);

        foreach ($html->find('base') as $elements) {
            $this->scrapArray['base-href'][] = !empty($elements->href) ? $elements->href : false;
        }

        foreach ($html->find('img') as $elements) {
            $this->scrapArray['images'][] = $elements->src;
        }

        foreach ($html->find('link') as $elements) {
            $this->scrapArray['styles'][] = $elements->href;
        }

    }

    public function saving()
    {

        self::getStyles();

        sleep(3);

        self::getImages();

        return true;

    }

    private function getStyles()
    {

        foreach ($this->scrapArray['styles'] as $value) {

            $fileName = explode('/', $value);
            $fileName = end($fileName);

            $this->address = preg_replace('%(\?)[\#\=\&\-\_\.a-zA-Z\d]+%', '', $this->address);
            $fileName = preg_replace('%(\?)[\#\=\&\-\_\.a-zA-Z\d]+%', '', $fileName);

            $text = file_get_contents($this->address . $value);

            file_put_contents('././files/' . $fileName, $text);

        }

    }

    private function getImages()
    {

        foreach ($this->scrapArray['images'] as $value) {

            $fileName = explode('/', $value);
            $fileName = end($fileName);

            $this->address = preg_replace('%(\?)[\=\&\-\_\.a-zA-Z\d]+%', '', $this->address);

            $text = file_get_contents($this->address . $value);

            file_put_contents('././files/' . $fileName, $text);

        }

        foreach ($this->scrapArray['styles'] as $value) {

            $this->address = preg_replace('%(\?)[\=\&\-\_\.a-zA-Z\d]+%', '', $this->address);
            $uri = explode('/', $value);
            $fileName = end($uri);
            $fileName = preg_replace('%(\?)[\=\&\-\_\.a-zA-Z\d]+%', '', $fileName);

            $styleText = file_get_contents('././files/' . $fileName);
            preg_match('%([a-zA-Z0-9\/\.]+\.[jpg|jpeg|png|gif]+)%', $styleText, $bgImages);

            if (!empty($bgImages)) {
                $imagePath = explode('/', $bgImages[0]);
                $imageName = end($imagePath);
                $address = explode('/', $this->address);

                foreach ($address as $key=>$v) {

                    if ($v == '' || $v == ' ' || stristr($v, 'http')) {
                        unset($address[$key]);
                    }

                }

                foreach ($imagePath as $key=>$v) {

                    if (stristr($v, '..') !== FALSE) {
                        $lastElemOfAdr = array_pop($address);
                        unset($imagePath[$key]);
                    }

                }

                $address = implode('/', $address);
                $imagePath = implode('/', $imagePath);
                $realPath = 'http://' . $address . $imagePath;
                echo $realPath;

                file_put_contents('././files/' . $imageName, $realPath);

            }
            /* $address = explode('/', $this->address);

            foreach ($imagePath as $v) {

                if (stristr($v, '..') !== FALSE) {
                    $lastElemOfAdr = array_pop($address);
                }

            }

            print_r($address); */

            /* $styleText = file_get_contents($this->address . $value);
            preg_match('%([a-zA-Z0-9\/\.]+\.[jpg|jpeg|png|gif]+)%', $styleText, $bgImages);

            $fileName = explode('/', $bgImages[0]);
            $address = explode('/', $this->address);
            print_r($address);

            foreach ($fileName as $value) {

                if (stristr($value, '..') !== FALSE) {
                    $lastElemOfAdr = array_pop($address);
                }

            }
            print_r($address);

            $address = implode('/', $address);
            $cssImage = file_get_contents($address . $bgImages[0]);
            $fileName = end($fileName);

            file_put_contents('././files/' . $fileName, $cssImage); */

        }

        //print_r($bgImages);

    }

}

//выражение для поиска картинок в стилях: %(background|(background[\-]?image))[\:\s]+(([\#a-zA-Z\d\s]+url[\(\"\'\.\/\)a-zA-Z\d\s\-]+)|(url[\(\"\'\.\/\)a-zA-Z\d\s\-]+));%
//выражение для поиска url картинок в стилях: %([\/\.a-zA-Z\d]+[\.][png|jpg|jpeg|webp|gif]+)%
