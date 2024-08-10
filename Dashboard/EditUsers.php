<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Users</title>
    <link rel="stylesheet" href="AddCategory.css">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>
<body>

<?php include "SbarHeader.php"; ?>

<br><br><br>
<div class="input">
    <div class="row">
        <div class="col-sm-6">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h5 class="card-title">
                    <style>
                        h1 {
                        text-align: center;
                        }
                    </style>
                        <h1>Edit Users</h1><br>
                        <?php
                        require('Connection.php');

                        $username = $_SESSION['username'];
                        if (!empty($username)) {
                            $submitted = false;

                            if (isset($_GET['id'])) {
                                $getid = $_GET['id'];

                                $sql = "SELECT * FROM user WHERE ID = $getid";
                                $query = $conn->query($sql);
                                $data = mysqli_fetch_assoc($query);

                                $user_ID = $data['ID'];
                                $user_fullname = $data['user_fullname'];
                                $user_email = $data['user_email'];
                                $user_password = $data['user_password'];
                                $user_join_datetime = $data['user_join_datetime'];
                                $user_status = $data['user_status'];
                            } else {
                                // Default values if 'id' is not set in the GET request
                                $user_ID = '';
                                $user_fullname = '';
                                $user_email = '';
                                $user_password = '';
                                $user_join_datetime = '';
                                $user_status = '';
                            }

                            if (isset($_GET['user_fullname'])) {
                                $new_user_fullname = $_GET['user_fullname'];
                                $new_user_email = $_GET['user_email'];
                                $new_user_password = $_GET['user_password'];
                                $new_user_join_datetime = $_GET['user_join_datetime'];
                                $new_user_status = $_GET['user_status'];
                                $new_ID = $_GET['ID'];

                                // Update method
                                $sql1 = "UPDATE user SET 
                                            user_fullname = '$new_user_fullname',
                                            user_email = '$new_user_email',
                                            user_password = '$new_user_password',
                                            user_join_datetime = '$new_user_join_datetime',
                                            user_status = '$new_user_status'
                                         WHERE ID = $new_ID";

                                // Show if updated or not
                                if ($conn->query($sql1) === TRUE) {
                                    echo '<div class="alert alert-success">Update Successful!</div>';
                                    echo '<script>
                                            setTimeout(function(){
                                                window.location.href = "ListCardUsers.php";
                                            }, 3000);
                                          </script>';
                                    $submitted = true;
                                } else {
                                    echo '<div class="alert alert-danger">Not Updated!</div>';
                                }
                            } else {
                                // Default values if 'user_fullname' is not set in the GET request
                                $new_user_fullname = $user_fullname;
                                $new_user_email = $user_email;
                                $new_user_password = $user_password;
                                $new_user_join_datetime = $user_join_datetime;
                                $new_user_status = $user_status;
                                $new_ID = $user_ID;
                            }
                        ?>
                        <?php if(!$submitted) { ?>
                        <form id="updateForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                            User's Full Name: <br>
                            <input type="text" name="user_fullname" value="<?php echo $new_user_fullname; ?>"><br><br>
                            User's E-mail: <br>
                            <input type="email" name="user_email" value="<?php echo $new_user_email; ?>"><br><br>
                            User's Password: <br>
                            <input type="password" name="user_password" value="<?php echo $new_user_password; ?>"><br><br>
                            User's Join Date: <br>
                            <input type="text" name="user_join_datetime" value="<?php echo $new_user_join_datetime; ?>"><br><br>
                            User's Status: <br>
                            <input type="text" name="user_status" value="<?php echo $new_user_status; ?>"><br><br>
                            <input type="text" name="ID" value="<?php echo $new_ID; ?>" hidden><br>
                            <input type="submit" value="Submit" class="btn btn-success btn-sm">
                        </form>
                        <?php } ?>
                        <?php
                        } else {
                            header('location:../');
                        }
                        ?>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
