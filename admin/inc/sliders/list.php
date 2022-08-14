<div class="container mt-4">
    <?php
    connect();

    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];


        if (isset($_POST['tittle'])) {
            $tittle = strtolower($_POST['tittle']);
            $description = strtolower($_POST['description']);
            $update = mysqli_query($con, "UPDATE pages SET tittle='$tittle' , description='$description' WHERE id='$id' ");
            if ($update) {
    ?>
                <div class="row">
                    <div class="alert col-md-12 alert-success">User Updated Successfully</div>
                </div>
        <?php
            }
        }
        $select_user = mysqli_query($con, "SELECT * FROM pages WHERE id='$id'");
        $user = mysqli_fetch_array($select_user);
        ?>


        <h1>Edit <?php echo $_GET['edit']; ?></h1>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="text" class="form-control mb-2" name="username" placeholder="username" value="<?php echo $user['username']; ?>">
            <input type="email " class=" form-control mb-2" name="email" placeholder="email" value="<?php echo $user['email']; ?>">
            <button type="submit" class=" form-control ">Save</button>

        </form>
    <?php
    } else {
    ?>
        <div class="row">
            <table class="table table-success table-striped">
                <tr>
                    <th>#</th>
                    <th>image</th>
                    <th>description</th>
                    <th>Action</th>
                </tr>
                <?php
                $select = mysqli_query($con, "SELECT * FROM image");
                while ($image = mysqli_fetch_array($select)) {
                ?>
                    <tr>
                        <td><?= $image['id']  ?></td>
                        <td><img src="inc/sliders/upload/<?= $image['images'] ?>" style="width: 50px; hight: 50px;"></td>
                        <td><?= $image['description'] ?></td>
                        <td> <a class="btn btn-primary" href="?edit_slider&id=<?= $image['id'] ?>">Edit</a> <a class="btn btn-danger" href="inc/sliders/delete.php?id=<?= $image['id'] ?>">Delete</a> </td>
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