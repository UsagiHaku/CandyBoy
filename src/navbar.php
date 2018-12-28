<?php

session_start();

if($_SESSION && $_SESSION["UserName"]) {
    $navOptions = '<li class="nav-item">
                        <p class="nav-link" style="margin-bottom: 0">Hola, ' . $_SESSION["UserName"] . '</p>
                   </li>
                   <li class="nav-item">  
                        <a class="nav-link btn-logout" href="logout.php">Cerrar Sesion</a>
                   </li>';
} else {
    $navOptions = '<li class="nav-item">  
                        <a class="nav-link" href="logIn.php">Iniciar Sesión</a>
                   </li>
                   <li class="nav-item">
                       <a class="nav-link" href="singUp.php">Registrarme</a>
                   </li>';
}

echo '<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#F1BFD2" >
    <a class="navbar-brand">CandyBoy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><span class="oi oi-home"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="productsFromCategorie.php?categorie=all">Productos</a>
            </li>
        </ul>
        <ul class="navbar-nav" >' .
            $navOptions .
            '<li class="nav-item">
                <a class="nav-link" href="shoppingCart.php"><span class="oi oi-cart"></span> </a>
            </li>
        </ul>
    </div>
</nav>';
