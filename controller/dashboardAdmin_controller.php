<?php
    require_once "session_control.php";

    require_once "../model/user_model.php";
    if (empty($_SESSION['id_user']) || (int) ($_SESSION['id_role'] ?? 0) !== 1) {
        http_response_code(403);
        exit('Halaman ini hanya dapat diakses oleh admin.');
    }

    require_once __DIR__ . '/../view/dashboardAdmin_view.php';
?>