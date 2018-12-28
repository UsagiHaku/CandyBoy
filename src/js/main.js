$(".btn-add-product").click(function () {
    product = $(this);

    addToCart({
        id: product.data("id"),
        name: product.data("name"),
        price: product.data("price"),
        quantity: product.data("quantity"),
        imagePath: product.data("image-path")
    });
});

$(".btn-logout").click(function () {
    cleanCart();
});

$(".btn-minus").click(function () {
    updateQuantity(this, "minus");
});

$(".btn-plus").click(function () {
    updateQuantity(this, "plus");
});

$(".btn-finish").click(function () {
    cleanCart()
});

$(".btn-clean-cart").click(function () {
    cleanCart()
});

function updateQuantity(selector, action) {
    var parent = $(selector).parent();
    var quantityItem = parent.find(".quantity");

    var quantityValue = parseInt(quantityItem.text());

    if(action === "plus" && quantityValue < 9) quantityValue++;

    if(action === "minus" && quantityValue > 1) quantityValue--;

    quantityItem.text(quantityValue);
    parent.parent().find(".btn-add-product").data("quantity", quantityValue);
}

function getCart() {
    if (localStorage.getItem('cart') == null) {
        var cart = {};
        cart.products = [];
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    if (localStorage && localStorage.getItem('cart')) {
        console.log(localStorage.getItem("cart"));
        console.log(JSON.parse(localStorage.getItem('cart')));
        return JSON.parse(localStorage.getItem('cart'));
    }
}

function addToCart(product) {
    var cart = {};
    if (localStorage.getItem('cart') == null) {
        cart = {};
        cart.products = [];
        localStorage.setItem('cart', JSON.stringify(cart));
    }

    cart = JSON.parse(localStorage.getItem('cart'));

    var id = product.id;
    var quantity = product.quantity;
    var wasFound = false;

    cart.products.forEach(function(product) {
        if(id === product.id) {
            product.quantity += quantity;
            wasFound = true
        }
    });

    if(!wasFound) {
        cart.products.push(product);
    }

    localStorage.setItem('cart', JSON.stringify(cart));
}

function cleanCart() {
    localStorage.removeItem('cart')
}