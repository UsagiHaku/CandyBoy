<?php

$username = $_POST["user"];
$password = $_POST["password"];
$email = $_POST["email"];

function singUp($username, $password,$email){

    $mysqli = new mysqli('localhost','root','','CandyBoy', "33060");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    else{
        $sql = "select * from users";
        $result = mysqli_query($mysqli,$sql) or die( "invalid query" . mysqli_error());

        while($product = mysqli_fetch_array($result)){
            if($username == $product['username'] or $email==$product['email']){
                redirect('singUp.php');
                exit();

            }
        }

        $sql = "insert into users (password,username,email) values ('$password','$username','$email')";

        $mysqli->query($sql);

        session_start();
        $_SESSION["UserName"] = $username;
        $mysqli->close();
        redirect("index.php");


    }
}


function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);

    exit();
}

singUp($username,$password,$email);