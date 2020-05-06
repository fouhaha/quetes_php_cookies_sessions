<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php
if (empty($_SESSION)) {
    header('location: /login.php');
}

if (isset($_GET['add_to_cart'])) {
    if (isset($_COOKIE[$_GET['add_to_cart']]) && $_COOKIE[$_GET['add_to_cart']] != 0) {
//        $nbPassage = $_COOKIE[$_GET['add_to_cart']];
        if (isset($_GET['increment'])) {
            if ($_COOKIE[$_GET['add_to_cart']] != $_GET['increment']) {
                setcookie($_GET['add_to_cart'], $_GET['increment']);
                header ("refresh: 0");
            }
        }
    } else {
        echo ("Check La valeur de \$_GET['add_to_cart'] est : " . ($_GET['add_to_cart']) ."<br>");
        setcookie($_GET['add_to_cart'], 1);
        header ("refresh: 0");
    }
}

?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>&increment=<?php if(isset($_COOKIE[$id])) {
                                echo($_COOKIE[$id] + 1);
                                } else {
                                    echo "1";
                                } ?>
                        " class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
