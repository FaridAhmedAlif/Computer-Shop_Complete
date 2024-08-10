<!DOCTYPE html>
<head>
    <title>List Of Sale</title>
</head>

<?php include "SbarHeader.php"; ?>
<link rel="stylesheet" href="Da.css">

<?php
require('Connection.php');

$sql1 = "SELECT * FROM product";
$query1 = $conn->query($sql1);

$dada_list = array();

while($data1 = mysqli_fetch_assoc($query1)){
    $product_id  = $data1['product_id'];
    $product_name = $data1['product_name'];
    $dada_list[$product_id] = $product_name;
}

// Ensure the user is logged in
$username = $_SESSION['username'];
if(!empty($username)){
?>

<div class="input">
    <br>

    <div class="AddButton"><td><a class="btn btn-success btn-sm" href="Sell.php"><i class="fa-solid fa-hand-point-right"> Add Sell Product</i></a></td>
    <style>
    h2 {
        text-align: center;
        color: darkslategray;
        font-weight: bold;
        font-size: 30px;
    }
    </style>
    <h2><i class="fa-solid fa-gift"></i> Sell <i class="fa-solid fa-gift"></i></h2>
    <p style="text-align:center;">&#169;Created by Farid Ahmed Alif &#169;</p>
</div>

<section class="container ListCardUsers.php">
    <div class="row">
        <div class="card border-0 mt-2">
            <table id="ListProduct" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>More Product Short Name</th>
                        <th>Quantity</th>
                        <th>Sale Date</th>
                        <th>Coustomer Name</th>
                        <th>Coustomer Phone</th>
                        <th>Price Par Unit</th>
                        <th>Total Price</th>
                        <th>Discount</th>
                        <th>Deu</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql = "SELECT * FROM seal";
                $query = $conn->query($sql);

                while($data = mysqli_fetch_assoc($query)){
                    $seal_id  = $data['seal_id'];
                    $store_product_name = $data['seal_product_name'];
                    $more_product_name = $data['more_product_name'];
                    $seal_product_quantity = $data['seal_product_quantity'];
                    $seal_spend_entry_date = $data['seal_spend_entry_date'];
                    $seal_coustomer_name = $data['seal_coustomer_name'];
                    $seal_coustomer_phone = $data['seal_coustomer_phone'];
                    $seal_price_par_unit = $data['seal_price_par_unit'];
                    $seal_total_price = $data['seal_total_price'];
                    $seal_discount = $data['seal_discount'];
                    $seal_due = $data['seal_due'];
                ?>
                    <tr>
                        <td><?php echo $dada_list[$store_product_name]?></td>
                        <td><?php echo $more_product_name?></td>
                        <td><?php echo $seal_product_quantity?></td>
                        <td><?php echo $seal_spend_entry_date?></td>
                        <td><?php echo $seal_coustomer_name?></td>
                        <td><?php echo $seal_coustomer_phone?></td>
                        <td><?php echo $seal_price_par_unit?></td>
                        <td><?php echo $seal_total_price?></td>
                        <td><?php echo $seal_discount?></td>
                        <td><?php echo $seal_due?></td>
                        <td><a href='EditSale.php?id=<?php echo $seal_id ?>' class="btn btn-primary btn-sm">Edit</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>

<?php
}else{
    header('location:../');
}
?>

<script src="JsCdn.js"></script>
<script src="SecondJsCdn.js"></script>
<script src="main.js"></script>
</html>
