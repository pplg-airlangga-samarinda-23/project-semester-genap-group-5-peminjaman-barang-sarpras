<?php
include 'bakcside/db-con.php';

date_default_timezone_set('Asia/Kuala_Lumpur');
$tsmp = date("Y-m-d h:i:sa");

//<--------------------------------output peminjam
function output_peminjam($connection)
{
    $pinjam = $connection->prepare("SELECT * FROM `Peminjaman` ORDER BY `id` DESC");
    $pinjam->execute();

    foreach ($pinjam->fetchAll(PDO::FETCH_ASSOC) as $p) {
        $compres = serialize($p);
        $_SESSION['pinjam'] = $_SESSION['pinjam'] . "!" . $p;
    }
}

function output_pengembalian($connection){
    $kembali = $connection->prepare("SELECT * FROM `Pengembalian` ORDER BY `id` DESC");
    $kembali->execute();
    foreach ($kembali->fetchAll(PDO::FETCH_ASSOC) as $k) {
        $compresing = serialize($k);
        $_SESSION['kembali'] = $_SESSION['kembali'] . "!" . $compresing;
    }
}

function output_barang($connection)
{
    $barang = $connection->prepare("SELECT * FROM `Barang` ORDER BY `id` DESC");
    $barang->execute();
    foreach ($barang->fetchAll(PDO::FETCH_ASSOC) as $b) {
        $compresing = serialize($b);
        $_SESSION['barang'] = $_SESSION['barang'] . "!" . $compresing;
    }
}

function output_user($connection)
{
    $user = $connection->prepare("SELECT * FROM `User` ORDER BY `id` DESC");
    $user->execute();
    foreach ($user->fetchAll(PDO::FETCH_ASSOC) as $u) {
        $compresing = serialize($u);
        $_SESSION['users_data'] = $_SESSION['users_data'] . "!" . $compresing;
    }
}

function output_siswa($connection)
{
    $siswa = $connection->prepare("SELECT * FROM `Siswa` ORDER BY `id` DESC");
    $siswa->execute();
    foreach ($siswa->fetchAll(PDO::FETCH_ASSOC) as $s) {
        $compresing = serialize($s);
        $_SESSION['siswa'] = $_SESSION['siswa'] . "!" . $compresing;
    }
}

//-------------------------------------------------->


//<----------------------------update berdasarkan value "id" button

//kosong - males aku

//------------------------------------------------------>



//<------------------------------ add 

function add_user($connection, $tsmp)
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $new_admin = $connection->prepare("INSERT INTO `users` VALUES(null,:nm,:em,:pa,tsmp) ");
    $new_admin->bindParam(":nm", $name);
    $new_admin->bindParam(":em", $email);
    $new_admin->bindParam("pa", $password);
    $new_admin->bindParam(":tsmp", $tsmp);
    $new_admin->execute();

    backto();
}

function add_siswa($connection, $tsmp)
{
    $siswa = $_POST['siswa'];
    $kelas = $_POST['kelas'];
    $NISN  = $_POST['NISN'];
    $new_siswa = $connection->prepare("INSERT INTO `Siswa` VALUES(null,:sw,:kl,:nisn,:tsmp)");
    $new_siswa->bindParam(":sw", $siswa);
    $new_siswa->bindParam(":kl", $kelas);
    $new_siswa->bindParam(":nisn", $NISN);
    $new_siswa->bindParam(":tsmp", $tsmp);
    $new_siswa->execute();

    backto();
}

function add_barang($connection, $tsmp)
{
    $nama_barang = $_POST['nama_barang'];
    $kode_barang = $_POST['kode_barang'];
    $kondisi = $_POST['kodisi'];
    $peminjaman_id = $_POST['peminjaman_id'];
    $pengembalian_id = $_POST['pengembalian_id'];

    $new_barang = $connection->prepare("INSERT INTO `Barang` VALUES(null,:nb,:kd,:kondisi,:pmi,:pbi,:tsmp)");
    $new_barang->bindParam(":nb", $nama_barang);
    $new_barang->bindParam(":kd", $kode_barang);
    $new_barang->bindParam(":kondisi", $kondisi);
    $new_barang->bindParam(":pmi", $peminjaman_id);
    $new_barang->bindParam(":pbi", $pengembalian_id);
    $new_barang->bindParam(":tsmp", $tsmp);
    $new_barang->execute();
}

//-------------------------------------------------->


//<------------------------remove

function remove_users($connection)
{
    $id = $_POST['user_remove'];
    $remover = $connection->prepare("DELETE FROM `users` WHERE `id` = :id");
    $remover->bindParam(":id", $id);
    $remover->execute();

    backto();
}

function remove_siswa($connection)
{
    $id = $_POST['siswa_remove'];
    $remover = $connection->prepare("DELETE FROM `Siswa` WHERE `id` = :id");
    $remover->bindParam(":id", $id);
    $remover->execute();

    backto();
}

function remove_barang($connection)
{
    $id = $_POST['barang_remove'];
    $remover = $connection->prepare("DELETE FROM `Barang` WHERE `id` = :id");
    $remover->bindParam(":id", $id);
    $remover->execute();

    backto();
}

//----------------------------------->



function backto()
{
    header("Location:../admin");
}



if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['add_user'])) {
        add_user($connection, $tsmp);
    }
    if (isset($_POST['add_siswa'])) {
        add_siswa($connection, $tsmp);
    }
    if (isset($_POST['add_barang'])) {
        add_barang($connection, $tsmp);
    }

    
    if (isset($_POST['user_remove'])) {
        remove_users($connection);
    }
    if (isset($_POST['siswa_remove'])) {
        remove_siswa($connection);
    }
    if (isset($_POST['barang_remove'])) {
        remove_barang($connection);
    }
}
