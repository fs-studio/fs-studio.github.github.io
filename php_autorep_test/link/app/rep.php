<?php

namespace App\Rep;

require_once __DIR__ . "/elements/add.php";
require_once __DIR__ . "/elements/offers.php";
require_once __DIR__ . "/elements/town.php";
require_once __DIR__ . "/elements/rul.php";

use ZipArchive;

interface Reader
{
    public function read($file);
}

interface Writer
{
    public function write($writeTo, $file, $ruletka);
}

class InputReader implements Reader
{

    public function read($path)
    {
        $file = file_get_contents($path . '/index.php');
        //$file = $file;

        return $file;
    }
}

class ScreenWriter implements Writer
{
    public function write($writeTo, $file, $ruletka)
    {
        $indexFile = file_put_contents($writeTo . '/index.php', $file);
        $zip = new ZipArchive();
        $zipName = $writeTo . '/preland.zip';

        if ($zip->open($zipName, ZIPARCHIVE::CREATE) === TRUE)
        {
            //$zip->addFile($writeTo . '/index.php', 'index.php');

            if ($ruletka != 'no') {
                $file = file_get_contents(__DIR__ . '/elements/config_preland_rul.txt');
                $file = str_ireplace('{{RUL}}', $ruletka, $file);
                file_put_contents($writeTo . '/config_preland_rul.php', $file);
                //$zip->addFile($writeTo . '/config_preland_rul.php', 'config_preland_rul.php');
            } else {
                $file = file_get_contents(__DIR__ . '/elements/config_preland.txt');
                file_put_contents($writeTo . '/config_preland.php', $file);
                //$zip->addFile($writeTo . '/config_preland.php', 'config_preland.php');
            }

            $dirHandle = opendir($writeTo . '/');

            while (($file = readdir($dirHandle)) !== false) {

                if ($file != '.' && $file != '..') {
                    $zip->addFile($writeTo . '/' . $file, $file);
                }

            }

            $zip->close();
        } else {
            echo "Не удалось создать zip-архив";
        }

        return $zipName;
    }
}

class Rep
{
    private $reader, $writer, $file, $converters = [], $offerEditors = [], $ruletka, $offers, $rul, $rulInPreland = [];

    public function __construct($file, $ruletka, $offers, array $rulInPreland)
    {
        $this->file = $file;
        $this->ruletka = $ruletka;
        $this->offers = $offers;
        $this->rul = $rulInPreland;
    }

    public function from(Reader $reader)
    {
        $this->reader = $reader;

        return $this->reader;
    }

    public function to(Writer $writer)
    {
        $this->writer = $writer;

        return $this->writer;
    }

    public function with($converters)
    {
        $this->converters[] = $converters;

        return $this->converters;
    }

    public function editOffer($editors)
    {
        $this->offerEditors[] = $editors;

        return $this->offerEditors;
    }

    public function addRul($rul)
    {
        $this->rulInPreland[] = $rul;

        return $this->rulInPreland;
    }

    public function editTown($editTown)
    {
        $this->editTown = $editTown;

        return $this->editTown;
    }

    public function execute()
    {
        $file = $this->reader->read($this->file);

        //$file = $this->converters[0]->doReplace($file, $this->offers);

        foreach ($this->converters as $key => $value) {
            $file = $value->doReplace($file, $this->ruletka);
        }

        foreach ($this->offerEditors as $key => $value) {
            $file = $value->doReplace($file, $this->offers);
        }

        foreach ($this->rulInPreland as $key => $value) {
            $file = $value->doReplace($file, $this->rul);
        }

        $file = $this->editTown->doReplace($file);

        return $this->writer->write($this->file, $file, $this->ruletka);
    }

}
