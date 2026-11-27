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
        <a href="../controller/dashboardAdmin_controller.php">Home</a>
        <a href="../controller/pengguna_controller.php">Pengguna</a>
        <a href="../controller/antreanPengajuan_controller.php">Antrean</a>
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
                            <a href="hapusDokumenAdmin_controller.php?id=<?php echo $ld['id_doc'] ?>">Hapus</a>
                        <?php endif; ?>
                        <a href="../controller/gantiStatus_controller.php?id=<?php echo $ld['id_doc']?>&id1=<?php echo "ditolak" ?>">Tolak</a>
                        <a href="../controller/gantiStatus_controller.php?id=<?php echo $ld['id_doc']?>&id1=<?php echo "disetujui" ?>">Setujui</a>
                        <a href="../controller/uploadSuratPengantar_controller.php?id=<?php echo $ld['id_doc'] ?>">Upload Surat Pengantar</a>
                        <?php if(!empty($ld['lokasi_surat'])): ?>
                            <a href="../surat/<?php echo rawurlencode($ld['lokasi_surat']) ?>" target="_blank">Lihat Surat Pengantar</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
