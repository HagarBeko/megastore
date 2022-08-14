<?php
include("inc/head.php");
?>
</head>

<body>



    <?php
    include("inc/header.php");
    ?>


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container py-5 mt-5">

            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                        $id = $_GET['id'];
                        connect();
                        $select_pro = mysqli_query($con, "SELECT * FROM product WHERE id='$id' ");
                        while ($product = mysqli_fetch_array($select_pro)) {
                            $total =  $product['price'] - $product['discount'];
                        ?>
                            <div class=" col-md-4 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="admin/inc/Products/upload/<?= $product['images'] ?>" alt="">
                                        <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                    </div>

                                </div>
                            </div>
                            <div class=" col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="product-item">

                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href=""><?= $product['name'] ?></a>
                                        <p class="m-5"><?= $product['description'] ?></p>
                                        <span class="text-primary me-1">$<?= $total; ?>.00</span>
                                        <span class="text-body text-decoration-line-through">$<?= $product['price'] ?></span>
                                    </div>
                                    <div class="d-flex border-top">

                                        <small class="w-100 text-center py-2">
                                            <a class="text-body" href="cart.php?id=<?= $product['id'] ?>"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }; ?>
                    </div>

                </div>
                <div class="col-lg-6 py-5">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Other Products</h1>
                    </div>
                </div>
                <div class="row g-4">
                    <?php
                    $cat  = $_GET['cat'];
                    $select_category = mysqli_query($con, "SELECT * FROM product WHERE category='$cat'  ORDER BY id");

                    while ($category = mysqli_fetch_array($select_category)) {
                        if ($id != $category['id']) {
                    ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                <div class="product-item">
                                    <div class="position-relative bg-light overflow-hidden">
                                        <img class="img-fluid w-100" src="admin/inc/Products/upload/<?= $category['images'] ?>" alt="">
                                        <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                    </div>

                                    <div class="text-center p-4">
                                        <a class="d-block h5 mb-2" href=""><?= $category['name'] ?></a>
                                        <span class="text-primary me-1">$<?= $category['price'] - $category['discount']; ?>.00</span>
                                        <span class="text-body text-decoration-line-through">$<?= $category['price'] ?></span>
                                    </div>
                                    <div class="d-flex border-top">
                                        <small class="w-50 text-center border-end py-2">
                                            <a class="text-body" href="product.php?id=<?= $category['id'] ?>&cat=<?= $category['category'] ?>"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                        </small>
                                        <small class="w-50 text-center py-2">
                                            <a class="text-body" href="cart.php?id=<?= $category['id'] ?>"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                        </small>
                                    </div>
                                </div>
                            </div>

                        <?php
                        };
                    };
                    if (basename($_SERVER['PHP_SELF']) == "index.php") { ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="products.php">Browse More Products </a>
                        </div><?php }; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Product End -->




    <?php
    include("inc/footer.php")
    ?>
</body>

</html>