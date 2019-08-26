<?php

session_start();
$_SESSION['user_id'] = !empty($_GET['id']) ? $_GET['id'] : 2;

$users = [
    1 => [
        "name" => "Александр",
        "type" => 9,
        "position" => "Администратор"
    ],
    2 => [
        "name" => "Иван",
        "type" => 1,
        "position" => "Сотрудник"
    ]
];
