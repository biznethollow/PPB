<?php 
    require_once "../connection.php";

    function lihatDokumen($id_user) {
        global $conn;

        if($id_user == 0) {
            $stmt = $conn->prepare(
                "SELECT dl.id_doc id_doc, dl.lokasi lokasi, dl.id_user id_user, dl.tanggal_dicatat tanggal_dicatat, sp.nama status, dl.lokasi_surat lokasi_surat FROM dokumen_list dl
                join status_pengajuan sp on sp.id_sp = dl.id_sp
                order by tanggal_dicatat desc;"
            );
            $stmt->execute();
            $hasil = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $stmt = $conn->prepare(
                "SELECT dl.id_doc id_doc, dl.lokasi lokasi, dl.id_user id_user, dl.tanggal_dicatat tanggal_dicatat, sp.nama status, dl.lokasi_surat lokasi_surat FROM dokumen_list dl
                join status_pengajuan sp on sp.id_sp = dl.id_sp
                where id_user = :id_user
                order by tanggal_dicatat desc;"
            );
            $stmt->bindParam(":id_user", $id_user);
            $stmt->execute();
            $hasil = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $hasil;
    }

    function uploadDokumen(&$pesan, &$display, $tipe) {
        global $conn;

        if($tipe == "upload") {
            $folder = "../uploads/";
        } elseif ($tipe == "surat") {
            $folder = "../surat/";
        }

        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }

        if (isset($_FILES["file"])) {

            $nama_file = basename($_FILES["file"]["name"]);
            $file_sementara = $_FILES["file"]["tmp_name"];

            $tujuan = $folder . $nama_file;

            if (move_uploaded_file($file_sementara, $tujuan)) {
                $pesan = "File berhasil disimpan!";
                $display = "block";
            } else {
                $pesan = "File gagal disimpan!";
                $display = "block";
            }
        }

        if($tipe == "upload") {
            $id_user = $_SESSION['id_user'];
            $id_sp = 1;
            $stmt = $conn->prepare(
                "INSERT INTO dokumen_list
                (lokasi, id_user, id_sp)
                VALUES 
                (:lokasi, :id_user, :id_sp)"
            );
            $stmt->bindParam(":lokasi", $nama_file);
            $stmt->bindParam(":id_user", $id_user);
            $stmt->bindParam(":id_sp", $id_sp);
            $stmt->execute();
        } elseif ($tipe == "surat") {
            $id_doc = $_GET['id'];
            $id_sp = 2;
            $stmt = $conn->prepare(
                "UPDATE dokumen_list
                set lokasi_surat = :lokasi_surat, id_sp = 2
                where id_doc = :id_doc"
            );
            $stmt->bindParam(":lokasi_surat", $nama_file);
            $stmt->bindParam(":id_doc", $id_doc);
            $stmt->execute();
        }
    }

    function hapusDokumen($id_doc) {
        global $conn;

        $stmt = $conn->prepare(
            "DELETE FROM dokumen_list
            where id_doc = :id_doc"
        ); 
        $stmt->bindParam(":id_doc", $id_doc);
        $stmt->execute();
    }

    function cekDokumen($id_doc) {
        global $conn;

        $stmt = $conn->prepare(
            "SELECT 1 from dokumen_list
            where id_doc = :id_doc"
        );
        $stmt->bindParam("id_doc", $id_doc);
        $stmt->execute();
        $hasil = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!empty($hasil[1])) {
            hapusDokumen($id_doc);
        }
    }

    function disetujui($id) {
        global $conn;

        $stmt = $conn->prepare(
            "UPDATE dokumen_list
            set id_sp = 2
            where id_doc = :id_doc"
        );
        $stmt->bindParam(":id_doc", $id);
        $stmt->execute();
    }

    function ditolak($id) {
        global $conn;

        $stmt = $conn->prepare(
            "UPDATE dokumen_list
            set id_sp = 3
            where id_doc = :id_doc"
        );
        $stmt->bindParam(":id_doc", $id);
        $stmt->execute();
    }
?>