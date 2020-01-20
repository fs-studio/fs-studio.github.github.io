<?php

namespace App;

session_start();

require_once __DIR__ . '/app/rep.php';
require_once __DIR__ . '/app/elements/scrapping.php';

ini_set('max_execution_time', 9000);
ob_end_clean();
ob_implicit_flush(true);

$preland = trim($_SESSION['preland']);
$ruletka = trim($_SESSION['ruletka']);
$offers = $_SESSION['offers'];
$rulInPreland = [$_SESSION['rulInPreland'] == 'true' ? 1 : 0, $_SESSION['prelandRul']];

unset($_SESSION['preland']);
unset($_SESSION['ruletka']);
unset($_SESSION['offers']);
unset($_SESSION['rulInPreland']);
unset($_SESSION['prelandRul']);

session_destroy();

if (!empty($preland)) :

    $dirName = "files/" . time();

    mkdir($dirName, 0777);
    chmod($dirName, 0777);

    $getIndex = new Rep\Elements\GetIndexPage($preland, $dirName);
    $indexDir = $getIndex->scrapping();
    Rep\Elements\GetImages::save(['indexDir' => $indexDir, 'site_url' => $preland], $dirName);
    Rep\Elements\GetStyles::save(['indexDir' => $indexDir, 'site_url' => $preland], $dirName);
    Rep\Elements\GetImagesInStyles::save(['indexDir' => $indexDir, 'site_url' => $preland], $dirName);
    $import = new Rep\Rep('./' . $dirName, $ruletka, $offers, $rulInPreland);
    $import->from(new Rep\InputReader);
    $import->to(new Rep\ScreenWriter);
    $import->with(new Rep\Elements\RemoveScripts);
    $import->with(new Rep\Elements\SrcChanger);
    $import->with(new Rep\Elements\AddPopUp);
    $import->with(new Rep\Elements\AddScripts);
    $import->with(new Rep\Elements\LinkEdit);
    $import->with(new Rep\Elements\AddPHPElements);
    $import->addRul(new Rep\Elements\AddRul);
    $import->editOffer(new Rep\Elements\EditOffer);
    $import->editTown(new Rep\Elements\EditTown);
    //$import->with(new Rep\Elements\DateScript);

    echo $import->execute();

    echo '<script> window.location.href="downloader.php?zipName=' . $dirName . '/preland.zip"; </script>';

    else :
        echo 'Ссылка не указана!';
endif;
