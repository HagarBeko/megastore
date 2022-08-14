<!-- Product Start -->
<div class="container-xxl py-5 mt-5">
    <div class="container py-4">
        <div class="row g-0 gx-5 align-items-end">
            <div class="col-lg-6">
                <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h1 class="display-5 mb-3">Our Products</h1>
                    <p>Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
            </div>
            <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
                <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                    <?php
                    connect();
                    $select_cat = mysqli_query($con, "SELECT * FROM category");
                    $count_cat = 1;
                    while ($user_cat = mysqli_fetch_array($select_cat)) {

                    ?>
                        <li class="nav-item me-2">
                            <a class="btn btn-outline-primary border-2 <?php if ($count_cat == 1) {
                                                                            echo 'active';
                                                                        } ?>" data-bs-toggle="pill" href="#tab-<?= $count_cat; ?>"><?= $user_cat['tittle']; ?></a>
                        </li>
                    <?php
                        $count_cat++;
                    };
                    ?>
                    <!-- <li class="nav-item me-2">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-2">Fruits </a>
                    </li>
                    <li class="nav-item me-0">
                        <a class="btn btn-outline-primary border-2" data-bs-toggle="pill" href="#tab-3">Fresh</a>
                    </li> -->
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">

                <div class="row g-4">
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "products.php") {
                        $select_pro = mysqli_query($con, "SELECT * FROM product ORDER BY id");
                    } else {
                        $select_pro = mysqli_query($con, "SELECT * FROM product ORDER BY id DESC  LIMIT 8");
                    };
                    while ($product = mysqli_fetch_array($select_pro)) {

                    ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="admin/inc/Products/upload/<?= $product['images'] ?>" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>

                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""><?= $product['name'] ?></a>
                                    <span class="text-primary me-1">$<?= $product['price'] - $product['discount']; ?>.00</span>
                                    <span class="text-body text-decoration-line-through">$<?= $product['price'] ?></span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="product.php?id=<?= $product['id'] ?>&cat=<?= $product['category'] ?>"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="cart.php?id=<?= $product['id'] ?>"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>

                    <?php
                    };
                    if (basename($_SERVER['PHP_SELF']) == "index.php") { ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="products.php">Browse More Products </a>
                        </div><?php }; ?>
                </div>
            </div>
            <div id="tab-2" class="tab-pane fade show p-0 ">

                <div class="row g-4">
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "products.php") {
                        $select_pro = mysqli_query($con, "SELECT * FROM product  WHERE category= 3 ORDER BY id");
                    } else {
                        $select_pro = mysqli_query($con, "SELECT * FROM product  WHERE category= 3 ORDER BY id DESC  LIMIT 8");
                    };
                    while ($product = mysqli_fetch_array($select_pro)) {

                    ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="admin/inc/Products/upload/<?= $product['images'] ?>" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>

                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""><?= $product['name'] ?></a>
                                    <span class="text-primary me-1">$<?= $product['price'] - $product['discount']; ?>.00</span>
                                    <span class="text-body text-decoration-line-through">$<?= $product['price'] ?></span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="product.php?id='<?= $product['id'] ?>&cat=<?= $product['category'] ?>'"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="cart.php?id=<?= $product['id'] ?>"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>

                    <?php
                    };
                    if (basename($_SERVER['PHP_SELF']) == "index.php") { ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="products.php">Browse More Products </a>
                        </div><?php };
                                ?>
                </div>
            </div>
            <div id="tab-3" class="tab-pane fade show p-0">
                <div class="row g-4">
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "products.php") {
                        $select_pro = mysqli_query($con, "SELECT * FROM product  WHERE category= 4 ORDER BY id");
                    } else {
                        $select_pro = mysqli_query($con, "SELECT * FROM product  WHERE category= 4 ORDER BY id DESC  LIMIT 8");
                    };
                    while ($product = mysqli_fetch_array($select_pro)) {

                    ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="admin/inc/Products/upload/<?= $product['images'] ?>" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>

                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""><?= $product['name'] ?></a>
                                    <span class="text-primary me-1">$<?= $product['price'] - $product['discount']; ?>.00</span>
                                    <span class="text-body text-decoration-line-through">$<?= $product['price'] ?></span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="product.php?id='<?= $product['id'] ?>&cat=<?= $product['category'] ?>'"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="cart.php?id=<?= $product['id'] ?>"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>

                    <?php
                    };
                    if (basename($_SERVER['PHP_SELF']) == "index.php") { ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="products.php">Browse More Products </a>
                        </div><?php };
                                ?>

                </div>
            </div>
            <div id="tab-4" class="tab-pane fade show p-0">
                <div class="row g-4">
                    <?php
                    if (basename($_SERVER['PHP_SELF']) == "products.php") {
                        $select_pro = mysqli_query($con, "SELECT * FROM product  WHERE category= 5 ORDER BY id");
                    } else {
                        $select_pro = mysqli_query($con, "SELECT * FROM product  WHERE category= 5 ORDER BY id DESC  LIMIT 8");
                    };
                    while ($product = mysqli_fetch_array($select_pro)) {

                    ?>

                        <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="product-item">
                                <div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="admin/inc/Products/upload/<?= $product['images'] ?>" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>

                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href=""><?= $product['name'] ?></a>
                                    <span class="text-primary me-1">$<?= $product['price'] - $product['discount']; ?>.00</span>
                                    <span class="text-body text-decoration-line-through">$<?= $product['price'] ?></span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="product.php?id='<?= $product['id'] ?>&cat=<?= $product['category'] ?>'"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="cart.php?id=<?= $product['id'] ?>"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                                </div>
                            </div>
                        </div>

                    <?php
                    };
                    if (basename($_SERVER['PHP_SELF']) == "index.php") { ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="products.php">Browse More Products </a>
                        </div><?php };
                                ?>

                </div>
            </div>

        </div>
    </div>
</div>
<!-- Product End -->