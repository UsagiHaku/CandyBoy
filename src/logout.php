<?php

function logout(){
    session_start();
    session_destroy();
    redirect("logIn.php");
}

function redirect($url, $statusCode = 303) {
    header('Location: ' . $url, true, $statusCode);

    exit();
}

logout();