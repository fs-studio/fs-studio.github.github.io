<?php

namespace App\Rep\Elements;

require_once 'simple_html_dom.php';

interface Scrap
{
    public function __construct($address, $dirName, array $arrayOfFiles);
    public function scrapping();
    public function saving($page);
}


class GetIndexPage implements Scrap
{
    private $address, $dirName;

    public function __construct($address, $dirName, array $arrayOfFiles = [])
    {
        $this->address = $address;
        $this->dirName = $dirName;
    }

    public function scrapping()
    {
        $page = new cUrl($this->address);
        $indexPHP = $page->getPage();

        $this->saving($indexPHP);

        return '././' . $this->dirName . '/index.php';
    }

    public function saving($page)
    {
        file_put_contents('././' . $this->dirName . '/index.php', $page);
    }

}

class GetImages
{

    public static function save($address, $dirName)
    {

        $html = file_get_html($address['indexDir']);

        foreach ($html->find('img') as $elements) {
            $arrayOfFiles[] = $elements->src;
        }

        $getFiles = new GetFiles($address, $dirName, $arrayOfFiles);
        $getFiles->scrapping();

    }

}

class GetStyles
{

    public static function save($address, $dirName)
    {

        $html = file_get_html($address['indexDir']);

        foreach ($html->find('link') as $elements) {
            $arrayOfFiles[] = $elements->href;
        }

        $getFiles = new GetFiles($address, $dirName, $arrayOfFiles);
        $getFiles->scrapping();

    }

}

class GetImagesInStyles
{

    public static function save($address, $dirName)
    {
        $dirHandle = opendir($dirName . '/');

        while (($file = readdir($dirHandle)) !== false) {

            if (($file != '.' && $file != '..') && stristr($file, '.css')) {
                $fileName[] = $file;
            }

        }

        print_r($fileName);

        foreach ($fileName as $f) {
            $file = file_get_contents('././' . $dirName . '/' . $f);
            preg_match('%([a-zA-Z0-9\/\.]+\.(jpg|jpeg|png|gif))%', $file, $images);
            print_r($images);
            $getFiles = new GetFiles($address, $dirName, $images);
            $getFiles->scrapping();
        }

    }

}

class GetFiles implements Scrap
{
    private $address = [], $dirName, $arryaOfImages = [];

    public function __construct($address, $dirName, array $arrayOfFiles)
    {
        $this->address['indexDir'] = $address['indexDir'];
        $this->address['site_url'] = $address['site_url'];
        $this->dirName = $dirName;
        $this->arrayOfImages = $arrayOfFiles;
    }

    public function scrapping()
    {

        //print_r($this->arrayOfImages);

        foreach ($this->arrayOfImages as $imageSrc) {

            if (stristr($imageSrc, 'http') !== false ||
                stristr($imageSrc, '://') !== false ||
                stristr($imageSrc, 'www.') !== false
            ) {
                $page = new cUrl($imageSrc);
                $image['image'] = $page->getPage();
                $image['name'] = explode("/", $imageSrc);
                $image['name'] = end($image['name']);
                //Абсолют

                $this->saving($image);
            } elseif (preg_match('%[\/]+[a-zA-Z0-9\.]*%', $imageSrc) !== false &&
                      $imageSrc[0] != '/' &&
                      stristr($imageSrc, '..') === false &&
                      stristr($imageSrc, 'http') === false &&
                      stristr($imageSrc, 'www.') === false
            ) {
                $parseLink = parse_url($this->address['site_url']);
                $parseLink = 'http://' . $parseLink['host'] . $parseLink['path'] . '/' . $imageSrc;
                $page = new cUrl($parseLink);
                $image['image'] = $page->getPage();
                $image['name'] = explode("/", $imageSrc);
                $image['name'] = end($image['name']);
                //вверх от страницы | в одном разделе со страницей

                $this->saving($image);
            } elseif (preg_match('%[\/]+[a-zA-Z0-9\.]*%', $imageSrc) !== false &&
                      $imageSrc[0] == '/' &&
                      stristr($imageSrc, '..') === false &&
                      stristr($imageSrc, 'http') === false &&
                      stristr($imageSrc, 'www.') === false &&
                      stristr($imageSrc, '/') !== false
            ) {
                $parseLink = parse_url($this->address['site_url']);
                $parseLink = 'http://' . $parseLink['host'] . $imageSrc;
                $page = new cUrl($parseLink);
                $image['image'] = $page->getPage();
                $image['name'] = explode("/", $imageSrc);
                $image['name'] = end($image['name']);
                //от корня сайта

                $this->saving($image);
            } elseif (preg_match('%[\/]+[a-zA-Z0-9\.]*%', $imageSrc) !== false &&
                      $imageSrc[0] == '.' &&
                      stristr($imageSrc, '..') !== false &&
                      stristr($imageSrc, 'http') === false &&
                      stristr($imageSrc, 'www.') === false &&
                      stristr($imageSrc, '/') !== false
            ) {
                $parseLink = parse_url($this->address['site_url']);
                $imageSrcArray = explode("/", $imageSrc);
                $parseLinkPathArray = explode("/", $parseLink['path']);
                $parseLinkPathArray = array_filter($parseLinkPathArray);

                foreach ($imageSrcArray as $key => $element) {

                    if ($element == '..' || $element == '.') {
                        $lastElemOfPath = array_pop($parseLinkPathArray);
                        unset($imageSrcArray[$key]);
                    }

                }

                $imageSrc = implode("/", $imageSrcArray);
                $parseLink = 'http://' . $parseLink['host'] . '/' . $imageSrc;
                $page = new cUrl($parseLink);
                $image['image'] = $page->getPage();
                $image['name'] = explode("/", $imageSrc);
                $image['name'] = end($image['name']);
                //относительный (..)

                $this->saving($image);
            } else {
                echo 'Ошибка: не удалось скачать файл (' . $imageSrc . '); URL: ' . $this->address['site_url'] . '\r\n';
            }
        }

    }

    public function saving($page)
    {
        $page['name'] = explode("?", $page['name']);
        $success = file_put_contents('././' . $this->dirName . '/' . $page['name'][0], $page['image']);

        if ($success !== false) {
            echo "Загрузка файла " . $page['name'][0] . " завершена успешно. Файл сохранен.<br>";
        } else {
            echo "Возникла ошибка при записи файла " . $page['name'][0] . ". Файл не был сохранен.<br>";
        }
    }

}

class cUrl
{
    private $address;

    public function __construct($address)
    {
        $this->address = $address;
    }

    public function getPage()
    {
        $curl = curl_init($this->address);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $page = curl_exec($curl);

        return $page;
    }

}
