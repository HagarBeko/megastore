<div class="container mt-4">
    <?php
    connect();

    if (isset($_GET['edit_category'])) {

        $id = $_GET['id'];


        if (isset($_POST['tittle'])) {
            $tittle = strtolower($_POST['tittle']);
            $update = mysqli_query($con, "UPDATE category SET tittle='$tittle' WHERE id='$id' ");
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


        <h1>Edit <?php echo $_GET['edit_category']; ?></h1>
        <form action="" method="post">
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
                    <th>Tittle</th>
                    <th>Actions</th>
                </tr>
                <?php
                $select = mysqli_query($con, "SELECT * FROM category");
                while ($user = mysqli_fetch_array($select)) {
                ?>
                    <tr>
                        <td><?= $user['id']  ?></td>
                        <td><?= $user['tittle'] ?></td>
                        <td> <a class="btn btn-primary" href="?edit_category&id=<?= $user['id'] ?>">Edit</a> <a class="btn btn-danger" href="inc/categories/delete.php?id=<?= $user['id'] ?>">Delete</a> </td>
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