<?php

namespace App\Rep\Elements;

require_once 'simple_html_dom.php';

abstract class AddElements
{

    protected function getElements()
    {
        $elements = file_get_contents(__DIR__ . '/elements.txt');
        $elements = explode("||||||||||||||||", $elements);

        return $elements;
    }

    public function doReplace($item, $ruletka)
    {

    }
}

class DateScript extends AddElements
{
    public function doReplace($item, $ruletka)
    {
        $item = preg_replace('%(\d{1,2}|[A-Za-zА-Яа-я]+)[\s.\-\/\\\\](\d{1,2}|[A-Za-zА-Яа-я]+)[\s.\-\/\\\\]\d{2,4}%ism', '<?=date(\'d.m.Y\');?>', $item);

        return $item;
    }
}

class RemoveScripts extends AddElements
{
    public function doReplace($item, $ruletka)
    {
        $item = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $item);

        return $item;
    }
}

class AddPopUp extends AddElements
{
    public function doReplace($item, $ruletka)
    {
      $pos = stripos($item, '</body>');
      $item = substr_replace($item, $this->getElements()[4], $pos, 0);

      return $item;
    }
}

class AddScripts extends AddElements
{
    public function doReplace($item, $ruletka)
    {
      $pos = stripos($item, '</head>');
      $item = substr_replace($item, $this->getElements()[2], $pos, 0);
      $item = preg_replace('%(<body.*?>)%i', '$1' . $this->getElements()[3], $item);
      $pos = stripos($item, '</body>');

      if ($ruletka != 'no') {
          $item = substr_replace($item, $this->getElements()[6], $pos, 0);
      } else {
          $item = substr_replace($item, $this->getElements()[5], $pos, 0);
      }

      return $item;
    }
}

class LinkEdit extends AddElements
{
    public function doReplace($item, $ruletka)
    {
      $item = preg_replace('!(<a .*?href=")([^"]+)!', '$1<?php echo trackerGetUrl(); ?>', $item);
      $item = preg_replace("%(onclick=(\"[^\"]*\"))%i", '', $item);
      $item = preg_replace("%(target=(\"[^\"]*\"))%i", '', $item);

      return $item;
    }
}

class AddPHPElements extends AddElements
{
    public function doReplace($item, $ruletka)
    {
        $item = substr_replace($item, $this->getElements()[0], 0, 0);
        $pos = stripos($item, '</body>');
        $item = substr_replace($item, $this->getElements()[1], $pos, 0);

        return $item;
    }
}

class SrcChanger extends AddElements
{
    public function doReplace($item, $ruletka)
    {
        $html = str_get_html($item);

        foreach ($html->find('img') as $element) {
            $html1 = str_get_html($item);
            $srcArray = explode("/", $element->src);
            $endOfSrcArray = end($srcArray);
            $html1->find('img[src^=' . $element->src . ']', 0)->src = $endOfSrcArray;
            $item = $html1;
        } //src=[a-zA-Z0-9\.\'\"\/\\\:\-\_]+

        foreach ($html->find('link') as $element) {
            $html1 = str_get_html($item);
            $srcArray = explode("/", $element->href);
            $endOfSrcArray = end($srcArray);
            $html1->find('link[href^=' . $element->href . ']', 0)->href = $endOfSrcArray;
            $item = $html1;
        }

        return $item;
    }
}
