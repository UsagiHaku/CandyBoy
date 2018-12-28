<?php
$conexion = mysqli_connect('localhost','root','','CandyBoy');

function normaliza ($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuy
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    $cadena = strtolower($cadena);
    return utf8_encode($cadena);
}
?>
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'metadata.php';?>
</head>

<body>

<!--NavBar-->
<?php include 'navbar.php';?>

<!-- Snack Products-->
<?php
$SKU = $_GET['SKU'];
$sql = "select * from products where SKU = '$SKU' ";
$result = mysqli_query($conexion,$sql) or die( "invalid query" . mysqli_error());
$product = mysqli_fetch_array($result);

?>
<section id="display" class="container" style="margin-top: 110px">
    <div class="card-deck">
        <div class="card col-md-4" style="width: 300px;">
            <img class="card-img-top " src="img/<?php echo $product['image_path'] ?>"
                 alt="Card image snack">
            <div class="card-body">
                <h3 class="card-title products-title" style="margin-top: 10px;"><?php echo normaliza($product['title'] . '| ' . $product['content']) ?></h3>
                <p class="card-text" style="margin-bottom: 5px;"> $<?php echo normaliza($product['description']) ?> </p>
            </div>
        </div>
        <div class="card col-md-8" style="width: 300px;">
            <div class="card-body">
                <h3 class="card-title products-title" style="margin-top: 10px;"><?php echo normaliza($product['title'] . '| ' . $product['content']) ?></h3>
                <p class="card-text" style="margin-bottom: 5px;"> SKU: <?php echo $product['SKU'] ?></p><br>
                <p class="card-text" style="margin-bottom: 5px;"> Cont.: <?php echo normaliza($product['content']) ?></p>
                <p class="card-text" style="margin-bottom: 5px;"> Caducidad: <?php $product['caducity'] ?></p>
                <p class="card-text" style="margin-bottom: 5px;"> Precio: <?php echo $product['price'] ?></p><br>
                <div class="d-flex" style="margin-bottom: 10px;">
                    <p class="btn btn-primary btn-minus" style="margin-bottom: 0">-</p>
                    <p class="quantity align-self-center" style="width: 30%; text-align: center; margin-bottom: 0">1</p>
                    <p class="btn btn-primary btn-plus" style="margin-bottom: 0">+</p>
                    <div class="d-flex justify-content-end" style="width: 100%; margin-left: 50px">
                        <a href='./shoppingCart.php'
                           data-id="<?php echo $SKU ?>"
                           data-quantity="1"
                           data-image-path="<?php echo $product['image_path'] ?>"
                           data-name="<?php echo $product["title"] ?>"
                           data-price="<?php echo $product["price"] ?>"
                           class="btn btn-primary btn-block btn-add-product"
                           style="background-color: #F1BFD2;border-color: #F1BFD2"><span class="oi oi-cart"></span>Comprar</a>
                    </div>
                </div>
                <p class="card-text" style="margin-bottom: 5px;">Ingredientes: <?php echo normaliza($product['ingredients']) ?></p> <br>

                <h5 class="card-text"> Información nutricional cada 100 g.</h5>
                <p class="card-text" style="margin-bottom: 5px;"> <?php echo normaliza($product['nutritional_information']) ?></p>
            </div>
        </div>
    </div>
</section>

<!--Script-->
<?php include  'scriptsBody.php';?>

</body>
</html>