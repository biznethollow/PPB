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
        <h2>Dashboard Pengguna PPB</h2>
        <p>Selamat datang, <?= htmlspecialchars((string)($_SESSION['nama'] ?? 'Pengguna'), ENT_QUOTES, 'UTF-8') ?>.</p>
    </div>
</body>
</html>
