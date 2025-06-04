<?php

date_default_timezone_set('Asia/Kuala_Lumpur');
$tsmp = date("Y-m-d h:i:sa");

include 'db-con.php';

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if (isset($_POST['subm'])) {

        $kembali_nama = $_POST['nama-kembali'];
        $kembali_nisn = $_POST['nisn-kembali'];
        $kembali_kelas = $_POST['kelas-kembali'];
        $kembali_barang_nama = $_POST['nama-barang-kembali'];





        // buat ubah file jadi blob

        if (isset($_FILES['imagin_dragon']) && $_FILES['imagin_dragon']['error'] === UPLOAD_ERR_OK) {
            $file_path = $_FILES['imagin_dragon'];

            if (file_exists($file_path)) {
                $file_handle = fopen($file_path, 'rb'); // Open the file in binary read mode
                if ($file_handle) {
                    $file_content = fread($file_handle, filesize($file_path)); // Read the entire file
                    fclose($file_handle); // Close the file handle

                    // Now $file_content contains the file data as a string, which can be used as a BLOB
                    // Example of inserting into a database:
                    $blob_data = $file_content;
                }
            }
        }



        $cek_siswa_last = $connection->prepare("SELECT * FROM siswa WHERE `NISN`='{$kembali_nisn}'");
        $cek_siswa_last->execute();
        if ($cek_siswa_last->rowCount() > 0) {
            $cek_barang = $connection->prepare("SELECT * FROM barang WHERE `nama_barang`={$kembali_barang_nama}");
            $cek_barang->execute();
            if ($cek_barang->rowCount() > 0) {
                foreach ($cek_siswa_last->fetchAll(PDO::FETCH_ASSOC) as $data_s) {
                    foreach ($cek_barang->fetchAll(PDO::FETCH_ASSOC) as $data_b) {
                        $kembali_input = $connection->prepare("INSERT INTO `Pengembalian` VALUES(null,:nama,:nisn,:nama_b,:kode_b,:kondisi_b,:foto_b,:tsmp)");
                        $kembali_input->bindParam(":nama", $data_s['siswa']);
                        $kembali_input->bindParam(":nisn", $data_s['siswa']);
                        $kembali_input->bindParam(":nama_b", $data_b['nama_barang']);
                        $kembali_input->bindParam(":kode_b", $data_b['kode_barang']);
                        $kembali_input->bindParam(":kondisi_b", $data_b['kondisi']);
                        $kembali_input->bindParam(":foto_b", $blob_data);
                        $kembali_input->bindParam(":tsmp", $tsmp);
                        $kembali_input->execute();
                        break;
                    }
                }
            }
        }
    }
}



// CREATE TABLE IF NOT EXISTS Barang (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     nama_barang VARCHAR(255) NOT NULL,
//     kode_barang VARCHAR(150) NOT NULL,
//     kondisi Varchar(100) NOT NULL ,
//     peminjaman_id INT,
//     pengembalian_id INT,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
// );

// CREATE TABLE IF NOT EXISTS Pengembalian (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     nama VARCHAR(255) NOT NULL ,
//     NSIN VARCHAR(20) NOT NULL UNIQUE,
//     nama_barang VARCHAR(255) NOT NULL,
//     kode_barang VARCHAR(150) NOT NULL,
//     kondisi Varchar(100) NOT NULL ,
//     foto_barang LONGBLOB,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
