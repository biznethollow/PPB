<?php
    require_once "../model/user_model.php";

    $display = "none";
    $pesan = "";
    if(!empty($_POST)) {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        cekUser($email, $password, $pesan, $display);
        if(empty($pesan)) {
            if($_SESSION['id_role'] == 1 ) {
                header("location: dashboardAdmin_controller.php");
                exit;
            } else {
                header("location: dashboardUser_controller.php");
                exit;
            }
        }
    }


    require_once "../view/loginUser_view.php";
?>