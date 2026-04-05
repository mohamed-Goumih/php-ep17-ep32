<?php
    $total = 0;
    $pageTitle = 'Shopping Cart';
    require_once '_header.php';
?>
<div class="row">
    <div class="col-2 fw-bold text-center">
        Image
    </div>

    <div class="col-4 fw-bold">
        Item
    </div>
    <div class="col fw-bold text-right">
        Price
    </div>
    <div class="col-3 fw-bold text-center">
        Quantity
    </div>
    <div class="col fw-bold text-right">
        Subtotal
    </div>
    <div class="col fw-bold">
        Action
    </div>
</div>
<?php
foreach ($cartItems as $id => $quantity):
    $product = $products[$id];
    $price = $product['price'];
    $subtotal = $quantity * $price;

    // Update total
    $total += $subtotal;

    // Format prices to 2 d.p.
    $price = number_format($price, 2);
    $subtotal = number_format($subtotal, 2);
?>
<div class="row border-top">

    <div class="col-2 product text-center">
        <img src="images/cart/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
    </div>

    <div class="col-4">
        <h1><?= $product['name'] ?></h1>
        <div>
            <?= $product['description'] ?>
        </div>
    </div>

    <div class="col price text-end align-self-center">
        $ <?= $price ?>
    </div>

    <div class="col-3 text-center align-self-center">
        <form action="index.php?action=changeCartQuantity&id=<?= $id ?>" method="post">
            <button type="submit" name="changeDirection" value="reduce"
                    class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-minus"></span>
            </button>
            <?= $quantity ?>
            <button type="submit" name="changeDirection" value="increase"
                    class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-plus"></span>
            </button>
        </form>
    </div>

    <div class="col price text-end align-self-center">
        $ <?= $subtotal ?>
    </div>

    <div class="col align-self-center">
        <form action="index.php?action=removeFromCart&id=<?= $id ?>" method="post">
            <button class="btn btn-danger btn-sm">
                <span class="glyphicon glyphicon-remove"></span>
                Remove
            </button>
        </form>
    </div>

</div>
<?php endforeach; ?>

<div class="row border-top">
    <div class="col-11 price text-end">
        <?php
        $total = number_format($total, 2);
        ?>
        $ <?= $total ?>
    </div>

    <div class="col fw-bold ">
        Total
    </div>
</div>
</body>
</html>