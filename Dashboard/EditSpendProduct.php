<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Spend Product</title>
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
                        <h1>Edit Spend Product</h1><br>
    <?php
    require('Connection.php');
    require('Function.php');

    // Ai if theke Url diye dhukte na parar code suru..
    $username = $_SESSION['username'];
    if (!empty($username)) {
        if (isset($_GET['id'])) {
            $getid = $_GET['id'];

            $sql = "SELECT * FROM spend_product WHERE spend_product_id = $getid";

            $query = $conn->query($sql);
        
            $data = mysqli_fetch_assoc($query);
        
            $spend_product_id = $data['spend_product_id'];
            $spend_product_name = $data['spend_product_name'];
            $spend_product_quentity = $data['spend_product_quentity'];
            $spend_product_entry_date = $data['spend_product_entry_date'];
        }

        $submitted = false;
        if (isset($_GET['spend_product_name'])) {
            $new_spend_product_name = $_GET['spend_product_name'];
            $new_spend_product_quentity = $_GET['spend_product_quentity'];
            $new_spend_product_entry_date = $_GET['spend_product_entry_date'];
            $new_spend_product_id = $_GET['spend_product_id'];

            // Update method..
            $sql1 = "UPDATE spend_product SET spend_product_name = '$new_spend_product_name',
                        spend_product_quentity = '$new_spend_product_quentity',
                        spend_product_entry_date = '$new_spend_product_entry_date'
                        WHERE spend_product_id = $new_spend_product_id";

            // Update or Not Update message show..
            if ($conn->query($sql1) === TRUE) {
                echo '<div class="alert alert-success">Update Successful!</div>';
                echo '<script>setTimeout(function(){ window.location.href = "ListOfSpendProduct.php"; }, 3000);</script>';
                $submitted = true;
            } else {
                echo '<div class="alert alert-danger">Not Updated!</div>';
            }
        }
    ?>
        <?php if (!$submitted) { ?>
        <form id="editForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
            Product: <br>
            <!-- Dropdown Selection Bar and Function Call (Important Part) -->
            <select name="spend_product_name">
                <?php
                $sql = "SELECT * FROM product";
                $query = $conn->query($sql);

                while ($data = mysqli_fetch_array($query)) {
                    $data_id = $data['product_id'];
                    $data_name = $data['product_name'];
                ?>
                    <option value="<?php echo $data_id; ?>" <?php if ($spend_product_name == $data_id) { echo 'selected'; } ?>>
                        <?php echo $data_name; ?>
                    </option>
                <?php } ?>
            </select><br><br>
            
            Product Quantity: <br>
            <input type="number" name="spend_product_quentity" value="<?php echo $spend_product_quentity; ?>"><br><br>
            Spend Entry Date: <br>
            <input type="date" name="spend_product_entry_date" value="<?php echo $spend_product_entry_date; ?>"><br><br>
            <input type="text" name="spend_product_id" value="<?php echo $spend_product_id; ?>" hidden>
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
