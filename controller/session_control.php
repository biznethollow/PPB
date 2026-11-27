<?php 
session_start();
if (empty($_SESSION['id_user'])) {
    header('Location: /PPB/controller/loginUser_controller.php');
    exit;
}
?>