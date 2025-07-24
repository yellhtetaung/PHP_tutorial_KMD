<?php
include('./adminLayout.php');
include('./connection.php');
$query = 'SELECT * FROM tblUser';
$result = mysqli_query($connection, $query);
$rows = mysqli_num_rows($result);


?>

<main class="container mx-auto mt-5">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            for ($i = 0; $i < $rows; $i++) {
                $user = mysqli_fetch_array($result);
                $userId = $user['user_id'];
                $username = $user['username'];
                $email = $user['email'];
                $num = $i + 1;

                echo "
                <tr>
                    <td scope='row'>{$num}</td>
                    <td>{$userId}</td>
                    <td>{$username}</td>
                    <td>{$email}</td>
                    <td>
                        <a href='' class='btn btn-primary btn-sm'>
                            <i class='bi bi-pencil'></i>
                            Edit
                        </a>

                        <a href='' class='btn btn-danger btn-sm'>
                            <i class='bi bi-trash3'></i>
                            Delete
                        </a>
                    </td>
                </tr>
            ";
            }
            ?>
        </tbody>
    </table>
</main>