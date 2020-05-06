<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<?php
if (empty($_SESSION)) {
    header('location: /login.php');
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
                        <p>Nb. in cart : <?php if(isset($_COOKIE[$id])) {
                                echo($_COOKIE[$id]);
                            } else {
                                echo "0";
                            } ?></p>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
