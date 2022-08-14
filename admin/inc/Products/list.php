<div class="container mt-4">
    <?php
    connect();

    if (isset($_GET['edit_Product'])) {

        $id = $_GET['edit_Product'];



        if (isset($_POST['name'])) {
            $tittle = strtolower($_POST['name']);
            $price = $_POST["price"];
            $description = strtolower($_POST['description']);
            $discount = $_POST["discount"];
            $quantity =  $_POST["quantity"];
            $update = mysqli_query($con, "UPDATE name SET name='$tittle',price='$price' , description='$description' ,discount='$discount' , quantity='$quantity'WHERE id='$id' ");
            if ($update) {
    ?>
                <div class="row">
                    <div class="alert col-md-12 alert-success">product Updated Successfully</div>
                </div>
        <?php
            }
        }
        $select_user = mysqli_query($con, "SELECT * FROM product WHERE id='$id'");
        $user = mysqli_fetch_array($select_user);
        ?>

        <h1>Edit <?php echo $_GET['edit_Product']; ?></h1>
        <form action="" method="post">
            <input type="text" class="form-control mb-2" name="name" placeholder="name product" value="<?php echo $user['name']; ?>">
            <input type="number " class=" form-control mb-2" name="price" placeholder="Enter price" value="<?php echo $user['price']; ?>">
            <input type="text " class=" form-control mb-2" name="description" placeholder="Enter description" value="<?php echo $user['description']; ?>">
            <input type="text " class=" form-control mb-2" name="discount" placeholder="Enter discount" value="<?php echo $user['discount']; ?>">
            <input type="number " class=" form-control mb-2" name="quantity" placeholder="Enter quantity" value="<?php echo $user['quantity']; ?>">
            <button type="submit" class=" form-control ">Save</button>

        </form>
    <?php
    } else {
    ?>
        <div class="row">
            <table class="table table-success table-striped">
                <tr>
                    <th>#</th>
                    <th>category</th>
                    <th>Name Product</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Discount</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <?php
                $select = mysqli_query($con, "SELECT * FROM product");
                while ($user = mysqli_fetch_array($select)) {
                    $total = $user['price'] - $user['discount'];
                    $select_cat = mysqli_query($con, "SELECT * FROM category WHERE id='$user[category]'");
                    $category_array = mysqli_fetch_array($select_cat);
                ?>
                    <tr>
                        <td><?= $user['id']  ?></td>
                        <td><?= $category_array['tittle']  ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['price'] ?>$</td>
                        <td><?= substr($user['description'], 0, 50); ?>...</td>
                        <td><?= $user['discount'] ?></td>
                        <td><?= $user['quantity'] ?></td>
                        <td><?= $total ?>$</td>
                        <td> <a class="btn btn-primary" href="?edit_Product&id=<?= $user['id'] ?>">Edit</a> <a class="btn btn-danger" href="inc/products/delete.php?id=<?= $user['id'] ?>">Delete</a> </td>
                        <!--    <td>
                            <div class='dropdown'>
                                <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='fa-solid fa-gear'></i>
                                </a>

                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                    <li><a class='dropdown-item' href='?edit&id=<?= $user['id'] ?>'>Edit</a></li>
                                    <li><a class='dropdown-item' inc/pages/delete.php?id=<?= $user['id'] ?>'>Delete</a></li>

                                </ul>
                            </div>
                        </td> -->
                    </tr>
                <?php

                }
                ?>
            </table>
        </div>
    <?php
    }
    ?>
</div>