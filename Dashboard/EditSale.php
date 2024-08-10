<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sale</title>
    <link rel="stylesheet" href="AddCategory.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .hidden {
            display: none;
        }
        .display-section {
            margin-top: 20px;
        }
        .display-section table {
            width: 100%;
            border-collapse: collapse;
        }
        .display-section th, .display-section td {
            border: 1px solid black;
            padding: 10px;
            text-align: left;
        }
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

<div class="no-print">
<?php
    session_start();
    $hostname= 'localhost';
    $username= 'root';
    $password= '';
    $databasename= 'new_store_db';

    $conn= new mysqli($hostname, $username, $password, $databasename);
    if ($conn->connect_error) {
        die("Connection failed: ".$conn->connect_error);
    }
?>
<?php
require('Connection.php');
?>
<nav class="navbar no-print navbar-expand-lg bg-primary text-white" data-bs-theme="dark">
    <div class="container-fluid">
        <div class="Name">
            <a class="navbar-brand" href="index.php">Welcome:</a>
            <img src="../assets/images/user-circle-icon.png" width="40">
            <?php echo (!empty($_SESSION['username'])) ? $_SESSION['username'] : 'User' ?>
        </div>
        <h3 style="text-align:center;">Farid Ahmed Alif</h3>
        <h3 id="current-time"></h3>               

        <script>
            let time = document.getElementById("current-time");
            setInterval(() => {
                let d = new Date();
                time.innerHTML = d.toLocaleTimeString();
            }, 1000);
        </script>
    </div>
</nav>

<div class="input no-print">
    <div class="row">
        <div class="col-sm-6">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="index.php ">
                            <button type="button" class="btn btn-primary no-print">Home</button>
                        </a>
                    </h5>
                    <h1 class="no-print" style="text-align: center;">Edit Sale Product</h1>
                    <hr>
                    <div class="Box">
                        <style>
                            .Box {
                                padding: 10px;
                                padding-left: 20px;
                            }
                        </style>
                        <?php
                        require('Connection.php');
                        require('Function.php');

                        $username = $_SESSION['username'];
                        if (!empty($username)) {
                            if (isset($_GET['id'])) {
                                $getid = $_GET['id'];

                                $sql = "SELECT * FROM seal WHERE seal_id = $getid";
                                $query = $conn->query($sql);
                                $data = mysqli_fetch_assoc($query);

                                $seal_id = $data['seal_id'];
                                $seal_product_name = $data['seal_product_name'];
                                $more_product_name = $data['more_product_name'];
                                $seal_product_quantity = $data['seal_product_quantity'];
                                $seal_spend_entry_date = $data['seal_spend_entry_date'];
                                $seal_coustomer_name = $data['seal_coustomer_name'];
                                $seal_coustomer_phone = $data['seal_coustomer_phone'];
                                $seal_price_par_unit = $data['seal_price_par_unit'];
                                $seal_total_price = $data['seal_total_price'];
                                $seal_discount = $data['seal_discount'];
                                $seal_due = $data['seal_due'];
                            }

                            $submitted = false;
                            if (isset($_GET['seal_product_name'])) {
                                $new_seal_product_name = $_GET['seal_product_name'];
                                $new_more_product_name = $_GET['more_product_name'];
                                $new_seal_product_quantity = $_GET['seal_product_quantity'];
                                $new_seal_spend_entry_date = $_GET['seal_spend_entry_date'];
                                $new_seal_coustomer_name = $_GET['seal_coustomer_name'];
                                $new_seal_coustomer_phone = $_GET['seal_coustomer_phone'];
                                $new_seal_price_par_unit = $_GET['seal_price_par_unit'];
                                $new_seal_total_price = $_GET['seal_total_price'];
                                $new_seal_discount = $_GET['seal_discount'];
                                $new_seal_due = $_GET['seal_due'];
                                $new_seal_id = $_GET['seal_id'];

                                // Update method..
                                $sql1 = "UPDATE seal SET 
                                            seal_product_name = '$new_seal_product_name',
                                            more_product_name = '$new_more_product_name',
                                            seal_product_quantity = '$new_seal_product_quantity',
                                            seal_spend_entry_date = '$new_seal_spend_entry_date',
                                            seal_coustomer_name = '$new_seal_coustomer_name',
                                            seal_coustomer_phone = '$new_seal_coustomer_phone',
                                            seal_price_par_unit = '$new_seal_price_par_unit',
                                            seal_total_price = '$new_seal_total_price',
                                            seal_discount = '$new_seal_discount',
                                            seal_due = '$new_seal_due'
                                            WHERE seal_id = $new_seal_id";

                                // Update or Not Update message show..
                                if ($conn->query($sql1) === TRUE) {
                                    echo '<div class="alert alert-success">Update Successful!</div>';
                                    echo '<script>setTimeout(function(){ window.location.href = "ListOfSale.php"; }, 3000);</script>';
                                    $submitted = true;
                                } else {
                                    echo '<div class="alert alert-danger">Not Updated!</div>';
                                }
                            }
                        ?>
                        <?php if (!$submitted) { ?>
                            <form id="editForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                                Product Name: <br>
                                <!-- Dropdown Selection Bar and Function Call (Important Part) -->
                                <select name="seal_product_name">
                                    <?php
                                    $sql = "SELECT * FROM product";
                                    $query = $conn->query($sql);

                                    while ($data = mysqli_fetch_array($query)) {
                                        $data_id = $data['product_id'];
                                        $data_name = $data['product_name'];
                                    ?>
                                        <option value="<?php echo $data_id; ?>" <?php if ($seal_product_name == $data_id) { echo 'selected'; } ?>>
                                            <?php echo $data_name; ?>
                                        </option>
                                    <?php } ?>
                                </select><br><br>
                                Product Quantity: <br>
                                <input type="text" name="seal_product_quantity" value="<?php echo $seal_product_quantity; ?>"><br><br>
                                Spend Entry Date: <br>
                                <input type="date" name="seal_spend_entry_date" value="<?php echo $seal_spend_entry_date; ?>"><br><br>
                                Coustomer Name: <br>
                                <input type="text" name="seal_coustomer_name" value="<?php echo $seal_coustomer_name; ?>"><br><br>
                                Phone Number: <br>
                                <input type="text" name="seal_coustomer_phone" value="<?php echo $seal_coustomer_phone; ?>"><br><br>
                                Price per Unit: <br>
                                <input type="text" name="seal_price_par_unit" value="<?php echo $seal_price_par_unit; ?>"><br><br>
                                <h3 class="no-print" style="text-align: center;">Submit Part</h3>
                                <hr>
                                Discount: <br>
                                <input type="text" name="seal_discount" value="<?php echo $seal_discount; ?>"><br><br>
                                Total Price: <br>
                                <input type="text" name="seal_total_price" value="<?php echo $seal_total_price; ?>"><br><br>
                                Due: <br>
                                <input type="text" name="seal_due" value="<?php echo $seal_due; ?>"><br><br>
                                More Product Short Name: <br>
                                <input type="text" name="more_product_name" value="<?php echo $more_product_name; ?>"><br><br>
                                <input type="hidden" name="seal_id" value="<?php echo $seal_id; ?>">
                                <input type="submit" value="Submit" class="btn btn-success btn-sm">
                                <button type="button" onclick="addProduct()" class="btn btn-primary btn-sm">Add</button>
                            </form>
                        <?php } ?>
                        <?php 
                        } else {
                            header('location:../');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
