<?php
connect();
?>
<div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            $select = mysqli_query($con, "SELECT * FROM image");
            $count = 1;
            while ($image = mysqli_fetch_array($select)) {
            ?>
                <div class="carousel-item <?php if ($count == 1) {
                                                echo 'active';
                                            } ?>">
                    <img class=" w-100" src="admin/inc/sliders/upload/<?= $image['images'] ?>" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown"><?= $image['description'] ?></h1>
                                    <a href="<?= $image['links-Products'] ?>" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href="<?= $image['links-Services'] ?>" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Services</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            <?php
                $count++;
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>