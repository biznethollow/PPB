<?php
    require_once "../connection.php";

    function cekUser($email, $password, &$pesan, &$display) {
        global $conn;

        $stmt = $conn->prepare(
            "SELECT email, id_user, nama, id_role, password 
            from user
            where email = :email"
        );
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $s = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($s)) {
            if(password_verify($password, $s['password'])) {
                $_SESSION['id_user'] = $s['id_user'];
                $_SESSION['email'] = $s['email'];
                $_SESSION['nama'] = $s['nama'];
                $_SESSION['id_role'] = $s['id_role'];
                $pesan = '';
                $display = "none";
            } else {
                $pesan = 'Email atau Password tidak cocok';
                $display = "block";
            }
        } else {
            $pesan = "Email tidak terdaftar";
            $display = "block";
        }
    }

    function tambahUser($email, $password, $nama, &$pesan, &$display) {
        global $conn;

        $stmt = $conn->prepare(
            "SELECT 1 from user
            where email = :email"
        );
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $s = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($s[1])) {
            $stmt = $conn->prepare(
                "INSERT INTO user
                (email, password, nama, id_role)
                VALUES
                (:email, :password, :nama, :id_role)"
            );
            $role = 2;
            $pass = password_hash($password, PASSWORD_BCRYPT);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $pass);
            $stmt->bindParam(":nama", $nama);
            $stmt->bindParam(":id_role", $role);
            $stmt->execute();
            $pesan = "";
            $display = "none";
        } else {
            $pesan = "Email sudah ada";
            $display = "block";
        }
    }

    function listUser() {
        global $conn;

        $stmt = $conn->prepare(
            "SELECT * from user
            where id_role != 1"
        );
        $stmt->execute();
        $hasil = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $hasil;
    }
?>