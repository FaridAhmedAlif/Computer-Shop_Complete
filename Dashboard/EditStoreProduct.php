<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Store Product</title>
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
                        <h1>Edit Store Product</h1><br>
                        <?php
                        require('Connection.php');
                        require('Function.php');

                        $username = $_SESSION['username'];
                        if (!empty($username)) {
                            $submitted = false;

                            if (isset($_GET['id'])) {
                                $getid = $_GET['id'];

                                $sql = "SELECT * FROM store_product WHERE store_product_id = $getid";
                                $query = $conn->query($sql);
                                $data = mysqli_fetch_assoc($query);

                                $store_product_id = $data['store_product_id'];
                                $store_product_name = $data['store_product_name'];
                                $store_product_quentity = $data['store_product_quentity'];
                                $store_procuct_emtry_date = $data['store_procuct_emtry_date'];
                            }

                            if (isset($_GET['store_product_name'])) {
                                $new_store_product_name = $_GET['store_product_name'];
                                $new_store_product_quentity = $_GET['store_product_quentity'];
                                $new_store_procuct_emtry_date = $_GET['store_procuct_emtry_date'];
                                $new_store_product_id = $_GET['store_product_id'];

                                $sql1 = "UPDATE store_product SET 
                                            store_product_name = '$new_store_product_name',
                                            store_product_quentity = '$new_store_product_quentity',
                                            store_procuct_emtry_date = '$new_store_procuct_emtry_date'
                                         WHERE store_product_id = $new_store_product_id";

                                if ($conn->query($sql1) === TRUE) {
                                    echo '<div class="alert alert-success">Update Successful!</div>';
                                    echo '<script>
                                            setTimeout(function(){
                                                window.location.href = "ListOfEntryProduct.php";
                                            }, 3000);
                                          </script>';
                                    $submitted = true;
                                } else {
                                    echo '<div class="alert alert-danger">Not Updated!</div>';
                                }
                            }
                        ?>
                        <?php if(!$submitted) { ?>
                        <form id="updateForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                            Product: <br>
                            <select name="store_product_name">
                                <?php
                                $sql = "SELECT * FROM product";
                                $query = $conn->query($sql);
                                while($data = mysqli_fetch_array($query)){
                                    $data_id = $data['product_id'];
                                    $data_name = $data['product_name'];
                                ?>
                                    <option value='<?php echo $data_id?>' <?php if($store_product_name == $data_id ) { echo 'selected';} ?>>
                                        <?php echo $data_name?>
                                    </option>
                                <?php } ?>
                            </select><br><br>
                            Product Quantity: <br>
                            <input type="number" name="store_product_quentity" value="<?php echo $store_product_quentity;?>"><br><br>
                            Store Entry Date: <br>
                            <input type="date" name="store_procuct_emtry_date" value="<?php echo $store_procuct_emtry_date;?>"><br><br>
                            <input type="text" name="store_product_id" value="<?php echo $store_product_id; ?>" hidden>
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
