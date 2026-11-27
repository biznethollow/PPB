<?php 
    require_once "session_control.php";

    require_once "../model/dokumen_model.php";

    $id = htmlspecialchars($_GET['id']);
    if(!empty($id)) {
        cekDokumen($id);
    }

    header("location: lihatDokumen_controller.php");
?>