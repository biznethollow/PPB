<?php
    require_once "../model/user_model.php";

    $pesan = "";
    $display = "none";
    if(!empty($_POST)) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $username = htmlspecialchars($_POST['username']);
        tambahUser($email, $password, $username, $pesan, $display);
    }  

    require_once "../view/daftarUser_view.php";
?>