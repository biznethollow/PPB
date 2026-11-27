<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>PPB</title>
</head>
<body>
    <div id="error" style="display:<?php echo $display ?>">
        <p>
            <?php echo $pesan; ?>
        </p>
    </div>
    <div class="login">
        <form action="" method="POST">  
            <div>
                <p>Email</p>
                <input type="email" name="email" placeholder="Masukkan email anda disini" required value="<?php echo $_POST['email'] ?? "" ?>">
            </div>
            <div>
                <p>Username</p>
                <input type="text" name="username" placeholder="Masukkan username anda disini" required value="<?php echo $_POST['username'] ?? "" ?>">
            </div>
            <div>
                <p>Password</p>
                <input type="password" name="password" placeholder="Masukkan password anda disini" required value="<?php echo $_POST['password'] ?? "" ?>">
            </div>
            <input type="submit" name="submit" value="submit">
            <div>
                <p>Sudah punya akun?</p>
                <a href="../controller/loginUser_controller.php">Login</a>
            </div>
        </form>
    </div>
</body>
</html>