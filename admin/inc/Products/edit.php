<?php
connect();

if (isset($_GET['edit_Product'])) {

    $id = $_GET['id'];


    if (isset($_POST['name'])) {
        $category = $_POST['category'];
        $tittle = strtolower($_POST['name']);
        $price = $_POST["price"];
        $description = strtolower($_POST['description']);
        $discount = $_POST["discount"];
        $quantity =  $_POST["quantity"];
        $update = mysqli_query($con, "UPDATE product SET category='$category', name='$tittle',price='$price' , description='$description' ,discount='$discount' , quantity='$quantity'WHERE id='$id' ");
        if ($update) {
?>
            <div class="row">
                <div class="alert col-md-12 alert-success">product Updated Successfully</div>
                <meta http-equiv="refresh" content="1;url=?Product">
            </div>
    <?php
        }
    }
    $select_user = mysqli_query($con, "SELECT * FROM product WHERE id='$id'");
    $user = mysqli_fetch_array($select_user);
    ?>


    <h1 class="text-success mt-4 mb-4 ms-2">Edit <?php echo $_GET['edit_Product']; ?></h1>
    <form action="" method="post">
        <div class="form-group ms-2">
            <label for="category" class="text-primary">category Product</label><br>
            <?php
            connect();
            $select_cat =  mysqli_query($con, "SELECT * FROM category ");
            ?>
            <select name="category" id="category">
                <option>select category</option>
                <?php
                while ($category = mysqli_fetch_array($select_cat)) {
                ?>
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['tittle'] ?></option>
                <?php }
                mysqli_close($con); ?>
            </select>
        </div>
        <div class="form-group ms-2">
            <label for="name" class="text-primary">Name Product</label>
            <input type="text" id="name" class="form-control mb-2 " name="name" placeholder="name product" value="<?php echo $user['name']; ?>">
        </div>
        <div class="form-group ms-2">
            <label for="price" class="text-primary">Enter price</label>
            <input type="number " id="price" class=" form-control mb-2" name="price" placeholder="Enter price" value="<?php echo $user['price']; ?>">
        </div>
        <div class="form-group ms-2">
            <label for="description" class="text-primary">Enter description</label>
            <input type="text " id="description" class=" form-control mb-2" name="description" placeholder="Enter description" value="<?php echo $user['description']; ?>">
        </div>
        <div class="form-group ms-2">
            <label for="name" id="discount" class="text-primary">Enter discount</label>
            <input type="text " id="discount" class=" form-control mb-2" name="discount" placeholder="Enter discount" value="<?php echo $user['discount']; ?>">
        </div>
        <div class="form-group ms-2">
            <label for="name" id="quantity" class="text-primary">Enter quantity</label>
            <input type="quantity " class=" form-control mb-2" name="quantity" placeholder="Enter quantity" value="<?php echo $user['quantity']; ?>">
        </div>
        <button type="submit" class=" form-control btn-success col-md-4 ms-2">Save</button>

    </form>
<?php
}
?>