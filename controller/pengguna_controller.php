<?php 
    require_once "session_control.php";

    require_once "../model/user_model.php";

    $list_user = listUser();

    require_once "../view/pengguna_view.php";
?>