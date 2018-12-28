<?php

$user = $_POST["user"];
$password = $_POST["password"];


function login($user, $password){

    $mysqli = new mysqli('localhost','root','','CandyBoy', "33060");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    else{

        $sql = "select * from users where username='".$user."' AND password='".$password."'";
        $resultado = $mysqli->query($sql);

        if($resultado->num_rows > 0){
            session_start();
            $_SESSION["UserName"] = $user;

            redirect("index.php");
        }
        else{
            redirect("logIn.php");
        }
        $resultado->free();
        $mysqli->close();

    }
}


function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);

    exit();
}

login($user,$password);
