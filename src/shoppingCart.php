<!doctype html>
<html class="no-js" lang="">

<head>
    <?php include 'metadata.php';?>
</head>

<body>
<!-- NavBar-->
<?php include 'navbar.php';?>

<div class="container" style="margin-top: 100px;">
    <table id="cart-table" class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Nombre</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <td scope="row"></td>
                <td scope="row"></td>
                <td scope="row"></td>
                <td scope="row">Total</td>
                <td scope="row"><p id="total"></p></td>
            </tr>
        </tfoot>
    </table>
    <div class="d-flex justify-content-between" style="margin-bottom: 30px;">
        <a href="./shoppingCart.php" class="btn btn-danger btn-clean-cart">Limpiar Carrito</a>
        <?php
        if($_SESSION && $_SESSION["UserName"]) {
            echo '<a href="./finish.php" class="btn btn-success btn-finish">Finalizar Compra</a>';
        } else {
            echo '<a href="./logIn.php" class="btn btn-primary">Iniciar sesion para comprar</a>';
        }
        ?>
    </div>
</div>

<?php include  'scriptsBody.php';?>

<script>
    var cartProducts = getCart().products;
    var total = 0;

    for(var i=0; i<cartProducts.length; i++) {
        var product = cartProducts[i];
        var productSubTotal = product.quantity * product.price;
        total += productSubTotal;
        var row =
            "<tr>\n" +
            "    <th scope='row'>\n" +
            "        <img style='width: 100px; height: auto;' class='card-img-top' src='img/" + product.imagePath + "' alt='Card image snack'>" +
            "    </td>\n" +
            "    <td>" + product.name + "</td>\n" +
            "    <td>" + product.quantity + "</td>\n" +
            "    <td>$" + product.price + "</td>\n" +
            "    <td>$" + productSubTotal + "</td>\n" +
            "</tr>";
        $("#cart-table tbody").append(row);
    }

    $("#total").text(("$" + total));

    if(cartProducts.length === 0) {
        $(".btn-clean-cart").addClass("disabled");
        $(".btn-finish").addClass("disabled");
    }

</script>

</body>

</html>

