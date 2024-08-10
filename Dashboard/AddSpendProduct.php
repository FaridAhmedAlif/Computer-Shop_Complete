<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Spend Product</title>
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
                        <h1>Add Spend Product</h1><br>
                    <?php
                    require('Connection.php');
                    require('Function.php');

                    $username = $_SESSION['username'];
                    if (!empty($username)) {

                        $submitted = false;
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['spend_product_name'])) {
                            $spend_product_name = $_GET['spend_product_name'];
                            $spend_product_quentity = $_GET['spend_product_quentity'];
                            $spend_product_entry_date = $_GET['spend_product_entry_date'];

                            // Input validation
                            if (empty($spend_product_name) || empty($spend_product_quentity) || empty($spend_product_entry_date)) {
                                echo '<div class="alert alert-danger">Please insert the Product Category, Product Quantity, and Spend Entry Date</div>';
                            } else {
                                // Table Selection Part
                                $sql = "INSERT INTO spend_product (spend_product_name, spend_product_quentity, spend_product_entry_date)
                                        VALUES ('$spend_product_name', '$spend_product_quentity', '$spend_product_entry_date')";

                                if ($conn->query($sql) === TRUE) {
                                    echo '<div class="alert alert-success">Data Inserted..!!</div>';
                                    echo '<script>setTimeout(function(){ window.location.href = "ListOfSpendProduct.php"; }, 3000);</script>';
                                    $submitted = true;
                                } else {
                                    echo '<div class="alert alert-danger">Data Not Inserted..!!</div>';
                                }
                            }
                        }

                    ?>
<?php if(!$submitted) { ?>

                    <form id="spendForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" onsubmit="return validateSpendForm()">
                        Product Name: <br>
                        <!-- Dropdown Selection Bar and Function Call (Important Part)--> 
                        <select name="spend_product_name">
                            <?php data_list('product', 'product_id', 'product_name'); ?>
                        </select><br><br>
                        
                        Product Quantity: <br>
                        <input type="text" name="spend_product_quentity"><br><br>
                        Spend Entry Date: <br>
                        <input type="date" name="spend_product_entry_date"><br><br>
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
function validateSpendForm() {
    var spendProductName = document.getElementsByName('spend_product_name')[0].value;
    var spendProductQuantity = document.getElementsByName('spend_product_quentity')[0].value;
    var spendEntryDate = document.getElementsByName('spend_product_entry_date')[0].value;

    if (spendProductName == "" || spendProductQuantity == "" || spendEntryDate == "") {
        alert("Please insert the Product Category, Product Quantity, and Spend Entry Date.");
        return false;
    }
    return true;
}
</script>

</body>
</html>
