<?php

session_start();

if (!empty($_POST['preland'])) {

    foreach ($_POST as $key => $value) {
        $_SESSION[$key] = $value;
    }

}

//preland: prelandUrl, ruletka: ruletka, offers: offers, rulInPreland: rulInPreland, prelandRul: prelandRul
