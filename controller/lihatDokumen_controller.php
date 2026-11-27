<?php 
    require_once "session_control.php";

    require_once "../model/dokumen_model.php";

    $list_dokumen = lihatDokumen($_SESSION['id_user']);

    require_once "../view/lihatDokumen_view.php";
?>