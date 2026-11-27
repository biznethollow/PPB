<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Dashboard Pengguna - PPB</title>
</head>
<body>
    <div class="sidebar">
        <h1><?php echo $_SESSION['nama']; ?></h1>
        <a href="../controller/dashboardUser_controller.php">Home</a>
        <a href="../controller/ajukanDokumen_controller.php">Ajukan Dokumen</a>
        <a href="../controller/lihatDokumen_controller.php">Lihat Pengajuan</a>
        <a href="../controller/logout.php">Log Out</a>
    </div>
    <div class="content">
        <div id="error" style="display:<?php echo $display ?>">
            <p>
                <?php echo $pesan; ?>
            </p>
        </div>
        <div class="pilih"> 
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type="submit" name="submit" value="submit">Upload</button>
            </form>
        </div>
    </div>
</body>
</html>
