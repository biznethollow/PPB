<?php 
    require_once "session_control.php";

    require_once "../model/dokumen_model.php";

    $list_dokumen = lihatDokumen(0);

    require_once "../view/antreanPengajuan_view.php";
?>