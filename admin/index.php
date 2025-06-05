<?php
session_start();
if ($_SESSION['login'] === TRUE) {
    include('dashbor.php');
} else {
    include('login.php');
}
