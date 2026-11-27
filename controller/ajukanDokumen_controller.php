<?php
    require_once "session_control.php";

    require_once "../model/dokumen_model.php";

    $pesan = "";
    $display = "none";
    if(isset($_POST['submit'])) {
        var_dump("test");
        uploadDokumen($pesan, $display, "upload");
    }

    require_once "../view/ajukanDokumen_view.php";
?>