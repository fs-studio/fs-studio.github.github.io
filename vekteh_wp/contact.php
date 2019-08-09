<?php

if (!empty($_POST['name']) && !empty($_POST['tel'])) :

    foreach ($_POST as $key => $value) {
        $data[$key] = htmlspecialchars(strip_tags($value));
    }

    $header = "Content-Type: text/plain; charset=utf-8\n";
    $header .= "From: <request@form.mst-krd.com>\n\n";
    $subject ="Новая заявка с сайта mst-krd.com";
    $message = "" . $data['name'] . " хочет получить предложение." .
     "\nДанные по заявке:\n" .
     "Имя: " . $data['name'] . "\n" .
     "Телефон: " . $data['tel'];

     if (mail("mst-krd@mail.ru", $subject, $message, $header)) {
         echo 'OK';
     } else {
         echo 'Error';
     }

endif;
