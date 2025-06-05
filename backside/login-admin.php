<?php

if($_SERVER['REQUEST_METHOD']==="POST"){
    if(isset($_POST['login_sub'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
    }
}

?>