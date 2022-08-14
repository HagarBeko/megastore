<div class="container">

    <div class="row">
        <h1 class="text-success mt-4 mb-4">Add Product</h1>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <?php
        if (isset($_POST["name"])) {
            $category = $_POST["category"];
            $name_pro = $_POST["name"];
            $price = $_POST["price"];
            $description = $_POST["description"];
            $discount = $_POST["discount"];
            $quantity =  $_POST["quantity"];

            if (empty($name_pro)) {
                $error = "please enter name product";
            } elseif (empty($price)) {
                $error = "please enter price";
            } elseif (empty($description)) {
                $error = "please enter description product";
            } elseif (empty($quantity)) {
                $error = "please enter quantity";
            } else {
                connect();

                $select_name = mysqli_query($con, "SELECT name FROM product WHERE name='$name_pro'");
                $count_user = mysqli_num_rows($select_name);
                if ($count_user > 0) {
                    $error = "name is exist";
                } else {
                    $name = $_FILES['image']['name'];
                    $type = $_FILES['image']['type'];
                    $size = $_FILES['image']['size'];
                    $errors = $_FILES['image']['error'];
                    $tmp = $_FILES['image']['tmp_name'];
                    $result = '';
                    $chr = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM0123456789";
                    for ($i = 0; $i < 10; $i++) {
                        $result .= $chr[rand(0, 61)];
                    }
                    $cut = explode(".", $name);
                    $new_name = $cut[0] . "_" . $result . "." . $cut[count($cut) - 1];
                    $location = dirname(__FILE__) . "/upload/";
                    $full = $location . $new_name;
                    if ($errors == UPLOAD_ERR_OK) {
                        move_uploaded_file($tmp, $full);
                        $success = "the image is uploaded";
                    } else {
                        $default = "../../upload/nophoto.jpg";
                    }
                    $insert = mysqli_query($con, "INSERT INTO product (category,images,name,price,description,discount,quantity) 
                        VALUES ('$category','$new_name','$name_pro','$price','$description','$discount','$quantity')") or die(mysqli_error($con));
                    mysqli_close($con);
                    // close connection

                    if ($insert) {
                        $success = "product Success added";
                    };
                }
            };
        };

        ?>
        <div class="row">
            <!-- <input type="text" class="col-md-12 form-control mb-2"> -->
            <label class="form-label-wrapper">

                <?php if (isset($error)) {

                ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php
                } ?>


                <?php if (isset($success)) {



                ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php
                } ?>

            </label>
        </div>

        <div class="row">
            <?php
            connect();
            $select_cat =  mysqli_query($con, "SELECT * FROM category ");
            ?>
            <select name="category">
                <option>select category</option>
                <?php
                while ($category = mysqli_fetch_array($select_cat)) {
                ?>
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['tittle'] ?></option>
                <?php }
                mysqli_close($con);

                ?>
            </select>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Upload image</label>
                <input class="form-control" name="image" type="file" id="formFileMultiple" multiple>
            </div>
            <br>
            <input type="text" name="name" class="col-md-12 form-control mb-2" placeholder="Enter name product">
            <br>
            <input type="number" name="price" class="col-md-12 form-control mb-2" placeholder="Enter price">
            <br>
            <input type="text" name="description" class="col-md-12 form-control mb-2" placeholder="Enter description">
            <br>
            <input type="text" name="discount" class="col-md-12 form-control mb-2" placeholder="Enter discount">
            <br>
            <input type="number" name="quantity" class="col-md-12 form-control mb-2" placeholder="Enter quantity">
            <button type="submit" class="btn btn-success col-md-2 mb-2">Add</button>
        </div>
    </form>
</div>