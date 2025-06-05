<?php
include 'db-name.php';

try {
    $connection = new PDO("mysql:host={$_SESSSION['servername']};dbname={$_SESSION['databases']}", $_SESSION['username_server'], $_SESSION['passsword_server']);

    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo($e->getMessage()."<br>");
    try {
        // Step 1: Connect to MySQL server (without specifying DB)
        $pdo = new PDO("mysql:host={$_SESSSION['servername']}", $_SESSION['username_server'], $_SESSION['passsword_server']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Step 2: Create the database
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$_SESSION[databases]` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        echo "Database `$_SESSION[databases]` created successfully.<br>";
    
        // Step 3: Connect to the newly created database
        $pdo->exec("USE `$_SESSION[databases]`");
    
        // Step 4: Create a sample table (e.g. users)
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                email VARCHAR(150) NOT NULL UNIQUE,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );

            CREATE TABLE IF NOT EXISTS Siswa (
                id INT AUTO_INCREMENT PRIMARY KEY,
                siswa VARCHAR(100) NOT NULL,
                kelas VARCHAR(150) NOT NULL,
                NISN Varchar(100) NOT NULL UNIQUE,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
            
            CREATE TABLE IF NOT EXISTS Barang (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nama_barang VARCHAR(255) NOT NULL,
                kode_barang VARCHAR(150) NOT NULL,
                kondisi Varchar(100) NOT NULL ,
                peminjaman_id INT,
                pengembalian_id INT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );

            CREATE TABLE IF NOT EXISTS Pengembalian (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nama VARCHAR(255) NOT NULL ,
                NSIN VARCHAR(20) NOT NULL UNIQUE,
                nama_barang VARCHAR(255) NOT NULL,
                kode_barang VARCHAR(150) NOT NULL,
                kondisi Varchar(100) NOT NULL ,
                foto_barang LONGBLOB,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );

            CREATE TABLE IF NOT EXISTS Peminjaman (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nama VARCHAR(255) NOT NULL ,
                NSIN VARCHAR(20) NOT NULL UNIQUE,
                nama_barang VARCHAR(255) NOT NULL,
                kode_barang VARCHAR(150) NOT NULL,
                kondisi Varchar(100) NOT NULL ,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ");
    
    } catch (PDOException $e) {
        die("ERROR: " . $e->getMessage());
    }
}





// header('Location: ../'); 
