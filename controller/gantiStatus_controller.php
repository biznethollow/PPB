<?php 
    require_once "session_control.php";

    require_once "../model/dokumen_model.php";

    if(!empty($_GET)) {
        $id = $_GET['id'];
        $status = $_GET['id1'];
        if($status == "disetujui") {
            disetujui($id);
        } elseif($status == "ditolak") {
            ditolak($id);
        } 
    }

    header("location: antreanPengajuan_controller.php");
?>