<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Admin PPB</title>
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

    </div>
</body>
</html>
