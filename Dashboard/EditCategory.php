<!DOCTYPE html>
<head>
<title>Edit Category</title>
<link rel="stylesheet" href="AddCategory.css">
</head>
<?php include "SbarHeader.php"; ?>

<br>
<br><br>
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
                        <h1>Edit Category</h1><br>
                    <?php
                        require('Connection.php');
                        // Ai if theke Url diye dhukte na parar code suru..
                        $username = $_SESSION['username'];
                        if (!empty($username)) {
                    ?>
                    <!DOCTYPE html>
                        <html lang="en">
                            <head>
                                <title>Document</title>
                                    <script>
                                        function redirectToList() {
                                        setTimeout(function() {
                                        window.location.href = 'ListOfCategory.php';
                                    }, 3000); // Redirect after 3 seconds
                                }
                            </script>
                        </head>
                    <body>
                            <?php
                            $update_successful = false;

                            if (isset($_GET['id'])) {
                                $getid = $_GET['id'];

                                $sql = "SELECT * FROM category WHERE category_id = $getid";
                                $query = $conn->query($sql);
                                $data = mysqli_fetch_assoc($query);

                                $category_id = $data['category_id'];
                                $category_name = $data['category_name'];
                                $category_entrydate = $data['category_entrydate'];
                            }

                            if (isset($_GET['category_name'])) {
                                $new_category_name = $_GET['category_name'];
                                $new_category_entrydate = $_GET['category_entrydate'];
                                $new_category_id = $_GET['category_id'];

                                $sql1 = "UPDATE category SET 
                                        category_name = '$new_category_name',  
                                        category_entrydate = '$new_category_entrydate' 
                                        WHERE category_id = $new_category_id";

                                if ($conn->query($sql1) == TRUE) {
                                    $update_successful = true;
                                    echo '<h1>Update Successful...!</h1>';
                                    echo '<script>redirectToList();</script>';
                                } else {
                                    echo '<p>Not Update!</p>';
                                }
                            }

                            if (!$update_successful) {
                            ?>
                                <form action="EditCategory.php" method="GET"> 
                                    Category: <br>
                                    <input type="text" name="category_name" value="<?php echo $category_name ?>"><br><br>
                                    Category Entry Date: <br>
                                    <input type="date" name="category_entrydate" value="<?php echo $category_entrydate ?>"><br><br>
                                    <input type="text" name="category_id" value="<?php echo $category_id ?>" hidden>
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </form>
                            <?php
                                 }
                            ?>
                        </body>
                        <!-- Ai else e Url diye dhukte na parar code ses..-->
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
</html>
