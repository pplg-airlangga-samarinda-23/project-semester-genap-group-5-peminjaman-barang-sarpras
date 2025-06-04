<?php
include 'db-con.php';
// check data siswa dan unit 
// mengecek apakah sudah kembali sebelunya atau tidak 

date_default_timezone_set('Asia/Kuala_Lumpur');
$tsmp=date("Y-m-d h:i:sa");
// session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['subm'])) {

        $masukan_nisn = $_POST['nisn-pinjam'];
        $masukan_nama = $_POST['nama-pinjam'];
        $masukan_kelas = $_POST['kelas-pinjam'];
        $masukan_barang = $_POST['nama-barang-pinjam'];

        $cek_siswa = $connection->prepare("SELECT * FROM siswa WHERE `NISN`='{$masukan_nisn}'");
        $cek_siswa->execute();
        if ($cek_siswa->rowCount() > 0) {
            // do nothing
        } else {
            $new_siswa = $connection->prepare("INSERT INTO `siswa` VALUES(null,:siswa,:nisn,:kelas," . date('Y-m-d H:i:s') . ")");
            $new_siswa->bindParam(":siswa", $masukan_nama);
            $new_siswa->bindParam(':nisn', $masukan_nisn);
            $new_siswa->bindParam(":kelas", $masukan_kelas);
            $new_siswa->execute();
        }



        // $cek_barang = $connection->prepare("SELECT * FROM barang WHERE `nama_barang`={$masukan_barang}");


        // Barang (
        //     id INT AUTO_INCREMENT PRIMARY KEY,
        //     nama_barang VARCHAR(255) NOT NULL,
        //     kode_barang VARCHAR(150) NOT NULL,
        //     kondisi Varchar(100) NOT NULL ,
        //     peminjaman_id INT,
        //     pengembalian_id INT,
        //     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

        // pinjam table
        // id INT AUTO_INCREMENT PRIMARY KEY,
        //         nama VARCHAR(255) NOT NULL ,
        //         NSIN VARCHAR(20) NOT NULL UNIQUE,
        //         nama_barang VARCHAR(255) NOT NULL,
        //         kode_barang VARCHAR(150) NOT NULL,
        //         kondisi Varchar(100) NOT NULL ,
        //         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

        $cek_siswa_last = $connection->prepare("SELECT * FROM siswa WHERE `NISN`='{$masukan_nisn}'");
        $cek_siswa_last->execute();
        if ($cek_siswa_last->rowCount() > 0) {
            $cek_barang = $connection->prepare("SELECT * FROM barang WHERE `nama_barang`={$masukan_barang}");
            $cek_barang->execute();
            if($cek_barang->rowCount()>0){
                foreach($cek_siswa_last->fetchAll(PDO::FETCH_ASSOC) as $data_s){
                    foreach($cek_barang->fetchAll(PDO::FETCH_ASSOC) as $data_b){
                        $pinjam_in=$connection->prepare("INSERT INTO `Peminjaman` VALUES(null,:nama,:nisn,:n_barang,:k_barang,kondisi_barang,:tsmp) ");
                        $pinjam_in->bindParam(":nama", $data_s['siswa']);
                        $pinjam_in->bindParam(":nisn", $data_s['siswa']);
                        $pinjam_in->bindParam(":n_barang", $data_b['nama_barang']);
                        $pinjam_in->bindParam(":k_barang", $data_b['kode_barang']);
                        $pinjam_in->bindParam(":kondisi_barang", $data_b['kondisi']);
                        $pinjam_in->bindParam(":tsmp", $tsmp);
                        $pinjam_in->execute();
                        break;
                    }
                }
            }
        }
    }
}
