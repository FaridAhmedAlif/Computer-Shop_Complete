<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Store Product</title>
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
                        <h1>Add Store Product</h1><br>
                    <?php
                    require('Connection.php');
                    require('Function.php');

                    $username = $_SESSION['username'];
                    if (!empty($username)) {

                        $submitted = false;
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['store_product_name'])) {
                            $store_product_name = $_GET['store_product_name'];
                            $store_product_quentity = $_GET['store_product_quentity'];
                            $store_procuct_emtry_date = $_GET['store_procuct_emtry_date'];

                            // Input validation
                            if (empty($store_product_name) || empty($store_product_quentity) || empty($store_procuct_emtry_date)) {
                                echo '<div class="alert alert-danger">Please insert the Product Category, Product Quantity, and Store Entry Date</div>';
                            } else {
                                // Table Selection Part
                                $sql = "INSERT INTO store_product (store_product_name, store_product_quentity, store_procuct_emtry_date)
                                        VALUES ('$store_product_name', '$store_product_quentity', '$store_procuct_emtry_date')";

                                if ($conn->query($sql) === TRUE) {
                                    echo '<div class="alert alert-success">Data Inserted..!!</div>';
                                    echo '<script>setTimeout(function(){ window.location.href = "ListOfEntryProduct.php"; }, 3000);</script>';
                                    $submitted = true;
                                } else {
                                    echo '<div class="alert alert-danger">Data Not Inserted..!!</div>';
                                }
                            }
                        }

                    ?>
                    
                    <?php if(!$submitted) { ?>
                    <form id="storeForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" onsubmit="return validateStoreForm()">
                        Product Name: <br>
                        <!-- Dropdown Selection Bar and Function Call (Important Part)--> 
                        <select name="store_product_name">
                            <?php data_list('product', 'product_id', 'product_name'); ?>
                        </select><br><br>
                        
                        Product Quantity: <br>
                        <input type="text" name="store_product_quentity"><br><br>
                        Store Entry Date: <br>
                        <input type="date" name="store_procuct_emtry_date"><br><br>
                        <input type="submit" value="Submit" class="btn btn-success btn-sm">
                    </form>
                    <?php 
                        }
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

<script>
function validateStoreForm() {
    var storeProductName = document.getElementsByName('store_product_name')[0].value;
    var storeProductQuantity = document.getElementsByName('store_product_quentity')[0].value;
    var storeEntryDate = document.getElementsByName('store_procuct_emtry_date')[0].value;

    if (storeProductName == "" || storeProductQuantity == "" || storeEntryDate == "") {
        alert("Please insert the Product Category, Product Quantity, and Store Entry Date.");
        return false;
    }
    return true;
}
</script>

</body>
</html>
