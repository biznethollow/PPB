<?php
    session_start();

    $user = 'root';
    $pass = 'root';
    $db = 'ppb';
    $host = 'localhost';

    $conn = new PDO(
        "mysql:host=$host;dbname=$db",
        $user,
        $pass
    );
?>