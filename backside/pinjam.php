<?php
include 'db-con.php';
// check data siswa dan unit 
// mengecek apakah sudah kembali sebelunya atau tidak 

date_default_timezone_set('Asia/Kuala_Lumpur');

$cek_siswa=$connection->prepare("SELECT * FROM siswa WHERE `NISN`='{$masukan_nisn}'" );
$cek_siswa->execute();
if($cek_siswa->rowCount()>0){
    foreach($cek_siswa->fetchAll(PDO::FETCH_ASSOC) as $ceker){
        
    }
}
else{
    $new_siswa=$connection->prepare("INSERT INTO `siswa` VALUES(null,:siswa,:nisn,:kelas,".date('Y-m-d H:i:s').")");
    $new_siswa->bindParam(":siswa",$masukan_nama);
    $new_siswa->bindParam(':nisn',$masukan_nisn);
    $new_siswa->bindParam(":kelas",$masukan_kelas);
    $new_siswa->execute();
    
}
$cek_barang=$connection->prepare("SELECT * FROM barang WHERE `nama_barang`={$masukan_barang}");



// if($check_condition){function($connection){
//     $insert_pinjam=$connection->prepare("INSERT INTO Peminjaman Values()");
    
// }}

?>