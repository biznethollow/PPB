<?php 
    require_once "session_control.php";

    require_once "../model/dokumen_model.php";

    $pesan = "";
    $display = "none";
    if(!empty($_GET)) {
        $id = $_GET['id'];
    } else {
        header("location: antreanPengajuan_controller.php");
    }

    if(!empty($_POST)) {
        uploadDokumen($pesan, $display, "surat");
        header("location: antreanPengajuan_controller.php");
    }

    require_once "../view/uploadSuratPengantar_view.php";
?>