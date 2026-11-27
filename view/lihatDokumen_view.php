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
        <div class="list_dokumen">
            <?php foreach($list_dokumen as $ld): ?>
                <div class="kotak">
                    <div class="nama_file">
                        <?php echo $ld['lokasi'] ?>
                    </div>
                    <div class="tanggal">
                        <?php echo $ld['tanggal_dicatat'] ?>
                    </div>
                    <div class="status">
                        <?php echo $ld['status'] ?>
                    </div>
                    <div class="tombol">
                        <a href="../uploads/<?php echo rawurlencode($ld['lokasi']) ?>" target="_blank">Lihat</a>
                        <?php if($ld['status'] == "diproses"): ?>
                            <a href="hapusDokumen_controller.php?id=<?php echo $ld['id_doc'] ?>">Hapus</a>
                        <?php endif; ?>
                        <?php if(!empty($ld['lokasi_surat'])): ?>
                            <a href="../surat/<?php echo $ld['lokasi_surat'] ?>">Lihat Surat</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
