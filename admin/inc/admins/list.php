<div class="container mt-4">
    <?php
    connect();

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
            $select = mysqli_query($con, "SELECT * FROM admin");
            while ($user = mysqli_fetch_array($select)) {
            ?>
                <tr>
                    <td><?= $user['id']  ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email']  ?></td>
                    <td> <a class="btn btn-primary" href="?edit_admin&id=<?= $user['id'] ?>">Edit</a> <a class="btn btn-danger" href="inc/admins/delete.php?id=<?= $user['id'] ?>">Delete</a> </td>

                </tr>
            <?php
            }
            ?>
        </table>
    </div>
</div>