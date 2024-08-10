<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="AddCategory.css">
</head>
<body>
<?php include "SbarHeader.php";?>

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
                        <h1>Edit Product</h1><br>
                            <?php
                            require('Connection.php');
                            $username = $_SESSION['username'];
                            if (!empty($username)) {
                            ?>

                            <?php
                            $submitted = false;
                            if (isset($_GET['id'])) {
                                $getid = $_GET['id'];

                                $sql = "SELECT * FROM product WHERE product_id = $getid";
                                $query = $conn->query($sql);
                                $data = mysqli_fetch_assoc($query);

                                $product_id = $data['product_id'];
                                $product_name = $data['product_name'];
                                $product_category = $data['product_category'];
                                $product_code = $data['product_code'];
                                $product_entry_date = $data['product_entry_date'];
                            }

                            if (isset($_GET['product_name'])) {
                                $new_product_name = $_GET['product_name'];
                                $new_product_category = $_GET['product_category'];
                                $new_product_code = $_GET['product_code'];
                                $new_product_entry_date = $_GET['product_entry_date'];
                                $new_product_id = $_GET['product_id'];

                                // Update method
                                $sql1 = "UPDATE product SET product_name = '$new_product_name',
                                                            product_category='$new_product_category',
                                                            product_code='$new_product_code',
                                                            product_entry_date='$new_product_entry_date'
                                                            WHERE product_id = $new_product_id";

                                // Update or Not Update message show
                                if ($conn->query($sql1) == TRUE) {
                                    echo '<h1>Update Successful!</h1>';
                                    echo '<script>setTimeout(function(){ window.location.href = "ListOfProduct.php"; }, 3000);</script>';
                                    $submitted = true;
                                } else {
                                    echo '<p>Not Update!</p>';
                                }
                            }
                            ?>

                            <?php if (!$submitted) { ?>
                            <!-- Category Table Theke Array Akare niye Dropdown manu te show korbe.. -->
                            <?php
                                $sql = "SELECT * FROM category";
                                $query = $conn->query($sql);
                            ?>

                            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
                                Product: <br>
                                <input type="text" name="product_name" value="<?php echo $product_name ?>"><br><br>
                                Product Category: <br>

                                <!-- Dropdown Selection Bar (Inpotant Part) -->
                                <select name="product_category">
                                    <?php
                                        while ($data = mysqli_fetch_array($query)) {
                                            $category_id = $data['category_id'];
                                            $category_name = $data['category_name'];
                                    ?>
                                    <!-- Ai code er maddhome Option selected thakbe -->
                                    <option value='<?php echo $category_id ?>' <?php if ($category_id == $product_category) { echo 'selected'; } ?>>
                                        <?php echo $category_name ?>
                                    </option>
                                    <?php } ?>
                                </select><br><br>
                                    Product Code: <br>
                                    <input type="text" name="product_code" value="<?php echo $product_code ?>"><br><br>
                                    Product Entry Date: <br>
                                    <input type="date" name="product_entry_date" value="<?php echo $product_entry_date ?>"><br><br>
                                    <input type="text" name="product_id" value="<?php echo $product_id ?>" hidden>
                                    <input type="submit" value="Submit" class="btn btn-success btn-sm">
                                </form>
                            <?php } ?>
                        </div>

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
    </body>
</html>
