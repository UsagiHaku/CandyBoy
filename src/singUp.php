<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'metadata.php';?>
</head>
<body>

<!--NavBar-->
<?php include 'navbar.php';?>

<?php
if($_SESSION && isset($_SESSION["UserName"])) {
    redirect("index.php");
}

function redirect($url, $statusCode = 303) {
    header('Location: ' . $url, true, $statusCode);
    exit();
}
?>

<!--Registry-->
<div class="container" style="margin-top: 5%">
    <form method="post" action="validateSingUp.php">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" required>
        </div>
        <div class="form-group">
            <label for="user">Nombre de Usuario</label>
            <input type="text" class="form-control" id="user" name="user" placeholder="Nombre de usuario" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrarse!</button>
    </form>
</div>


<?php include  'scriptsBody.php';?>

</body>
</html>