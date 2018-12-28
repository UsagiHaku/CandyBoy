<!doctype html>
<html class="no-js" lang="">

<head>
    <?php include 'metadata.php';?>
</head>

<body>
<!-- NavBar-->
<?php include 'navbar.php';?>

<!-- Carrousel-->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-left: 30px; margin-right: 30px;margin-top: 30px">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner rounded">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../src/img/SlideChocopie.png" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../src/img/SlideFantaOnePiece.png" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../src/img/SlideMatcha.png" alt="Third slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../src/img/SlideTofu.png" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<!-- Categories-->
<div class="container-fluid" style="margin-top: 20px">
    <div class="row">
        <div class="col-md-4 ">
            <div class="row">
                <a class="col-md-12 rounded" href="productsFromCategorie.php?categorie=snack"  id="Snack"></a>
            </div>
            <div class="row">
                <a class="col-md-12 rounded" href="productsFromCategorie.php?categorie=te" id="Te"></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <a class="col-md-12 rounded"  href="productsFromCategorie.php?categorie=ramen" id="Ramen"></a>
            </div>
            <div class="row" >
                <a class="col-md-12 rounded"  href="productsFromCategorie.php?categorie=liqueur" id="Liqueur"></a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <a class="col-md-12 rounded"  href="productsFromCategorie.php?categorie=tofu" id="TofuAndMiso"></a>
            </div>
            <div class="row">
                <a class="col-md-12 rounded"   href="productsFromCategorie.php?categorie=soda"  hreflang="" id="Soda"></a>
            </div>
        </div>
    </div>
</div>

    <?php include  'scriptsBody.php';?>

</body>

</html>

