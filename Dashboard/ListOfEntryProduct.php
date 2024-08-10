<!DOCTYPE html>
<head>
    <title>List Of Entry Product</title>
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

    <div class="AddButton"><td><a class="btn btn-success btn-sm" href="AddStoreProduct.php"><i class="fa-solid fa-hand-point-right"> Add Store Product</i></a></td>
    <style>
h2 {text-align: center;}
    h2 {
        color: darkslategray;
        font-weight: bold;
  font-size: 30px;
}
</style>
<h2><i class="fa-solid fa-gift"></i> Store Product <i class="fa-solid fa-gift"></i></h2>
<p style="text-align:center;">&#169;Created by Farid Ahmed Alif &#169;</p>
</div>

<section class="container ListCardUsers.php">
    <div class="row">
        <div class="card border-0 mt-2">
            <table id="ListProduct" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Entry Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $sql= "SELECT * FROM store_product";
                $query = $conn->query($sql);

                while($data = mysqli_fetch_assoc($query)){
                    $store_product_id  = $data['store_product_id'];
                    $store_product_name = $data['store_product_name'];
                    $store_product_quentity = $data['store_product_quentity'];
                    $store_procuct_emtry_date = $data['store_procuct_emtry_date'];
                ?>
                    <tr>
                        <td><?php echo $dada_list[$store_product_name]?></td>
                        <td><?php echo $store_product_quentity?></td>
                        <td><?php echo $store_procuct_emtry_date?></td>
                        <td><a href='EditStoreProduct.php?id=<?php echo $store_product_id ?>' class="btn btn-primary btn-sm">Edit</a></td>
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
