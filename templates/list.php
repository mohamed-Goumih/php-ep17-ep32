<?php
$pageTitle = 'List of products';

require_once '_header.php';
?>

<div class="row">

    <?php
    foreach ($products as $id => $product):
    $price = number_format($product['price'], 2);
?>
        <div class="product col-md-2 text-center">
            <img src="../public/images/<?= $product['image'] ?>" alt="<?= $product['name'] ?>">
            <?= starsHtml($product['stars']) ?>
            <h1 class="fs-5"><?= $product['name'] ?></h1>
            <div class="price">
                $ <?= $price ?>
                <form method="post" action="index.php?action=addToCart&id=<?= $id ?>"
                      style="display: inline">
                    <button class="btn btn-primary btn-sm">Add To Cart</button>
                </form>
            </div>
            <div>
                <?= $product['description'] ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
