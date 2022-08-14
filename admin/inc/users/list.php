<div class="container mt-4">
    <?php
    connect();

    if (isset($_GET['edit_admin'])) {

        $username = $_GET['edit_admin'];


        if (isset($_POST['email'])) {
            $username = strtolower($_POST['username']);
            $email = strtolower($_POST['email']);
            $update = mysqli_query($con, "UPDATE users SET username='$username' , email='$email' WHERE password='$password' ");
            if ($update) {
    ?>
                <div class="row">
                    <div class="alert col-md-12 alert-success">User Updated Successfully</div>
                </div>
        <?php
            }
        }
        $select_user = mysqli_query($con, "SELECT * FROM users WHERE username='$username'");
        $user = mysqli_fetch_array($select_user);
        ?>


        <h1>Edit <?php echo $_GET['edit_admin']; ?></h1>
        <form action="" method="post">
            <input type="text" class="form-control mb-2" name="username" placeholder="username" value="<?php echo $user['username']; ?>">
            <input type="email " class=" form-control mb-2" name="email" placeholder="email" value="<?php echo $user['email']; ?>">
            <input type="text" class="form-control mb-2" name="password" placeholder="password" value="<?php echo $user['password']; ?>">


            <button type="submit" class=" form-control ">Save</button>

        </form>
    <?php
    } else {
    ?>
        <div class="row">
            <table class="table table-success table-striped">
                <tr>
                    <th>#</th>
                    <th>user name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
                <?php
                $select = mysqli_query($con, "SELECT * FROM users");
                while ($user = mysqli_fetch_array($select)) {
                ?>
                    <tr>
                        <td><?= $user['id']  ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email']  ?></td>
                        <td> <a class="btn btn-danger" href="inc/admins/delete.php?id=<?= $user['id'] ?>">Delete</a> </td>
                        <!--    <td>
                            <div class='dropdown'>
                                <a class='btn btn-secondary dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-bs-toggle='dropdown' aria-expanded='false'>
                                    <i class='fa-solid fa-gear'></i>
                                </a>

                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
                                    <li><a class='dropdown-item' href='?edit&id=<?= $user['id'] ?>'>Edit</a></li>
                                    <li><a class='dropdown-item' inc/admins/delete.php?id=<?= $user['id'] ?>'>Delete</a></li>

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