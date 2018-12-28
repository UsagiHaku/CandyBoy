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
$categorie = $_GET['categorie'];

if($categorie=='tofu'){
    $sql = "select * from products where categorie='tofu' or categorie='miso'";
}
if($categorie=='all'){
    $sql = "select * from products";
}
else{
    $sql = "select * from products where categorie='$categorie' ";
}

$result = mysqli_query($conexion,$sql) or die( "invalid query" . mysqli_error());
$columnsCont = 1;
$SnackNumber = mysqli_num_rows($result);


while($SnackNumber >= 0) {

    ?>
    <section id="display" class="container" style="margin-top: 100px">
        <div class="card-deck">

            <?php
            while (($product = mysqli_fetch_array($result))) { ?>

                <div class="card col-md-3" style="width: 300px;">
                    <img class="card-img-top " src="img/<?php echo $product['image_path'] ?>"
                         alt="Card image snack">
                    <div class="card-body">
                        <div class="d-flex justify-content-between" style="margin-bottom: 10px;">
                            <p class="btn btn-primary btn-minus" style="margin-bottom: 0">-</p>
                            <p class="quantity align-self-center" style="margin-bottom: 0">1</p>
                            <p class="btn btn-primary btn-plus" style="margin-bottom: 0">+</p>
                        </div>
                        <a href='./shoppingCart.php'
                           data-id="<?php echo $product['SKU'] ?>"
                           data-quantity="1"
                           data-image-path="<?php echo $product['image_path'] ?>"
                           data-name="<?php echo normaliza($product["title"]) ?>"
                           data-price="<?php echo $product["price"] ?>"
                           class="btn btn-primary btn-block btn-add-product"
                           style="background-color: #F1BFD2;border-color: #F1BFD2"><span class="oi oi-cart"></span>Comprar</a>
                        <h6 class="card-title products-title" style="margin-top: 10px;"><?php echo normaliza($product['title'] . ' ' . $product['content']) ?></h6>
                        <p class="card-text" style="margin-bottom: 5px;"> $<?php echo $product['price'] ?> </p>
                        <p style="text-align: right;"><a class="card-text"  href="oneProductInfo.php?SKU=<?php echo $product['SKU']?>" style="color: #555555"> ver más.. </a></p>
                    </div>
                </div>
                <?php
                if($columnsCont==4){
                    break 1;
                }
                $columnsCont++;
            }
            $columnsCont = 1;
            $SnackNumber = $SnackNumber - 4;
            ?>
        </div>


    </section>

    <?php
}
?>

<!--Script-->
<?php include  'scriptsBody.php';?>

</body>
</html>