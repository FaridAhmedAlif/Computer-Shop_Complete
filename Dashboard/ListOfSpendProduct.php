<!DOCTYPE html>
<head>
    <title>List Of Spend Product</title>
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
    <div class="AddButton"><td><a class="btn btn-success btn-sm" href="AddSpendProduct.php"><i class="fa-solid fa-hand-point-right"> Add Spend Product</i></a></td>
    
    <style>
h2 {text-align: center;}
    h2 {
        color: darkslategray;
        font-weight: bold;
  font-size: 30px;
}
</style>
<h2><i class="fa-brands fa-stack-overflow"></i> Spend Product <i class="fa-brands fa-stack-overflow"></i></i></h2>
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
                    $sql= "SELECT * FROM spend_product";
                    $query = $conn->query($sql);

                    while($data = mysqli_fetch_assoc($query)){
                        $spend_product_id  = $data['spend_product_id'];
                        $spend_product_name = $data['spend_product_name'];
                        $spend_product_quentity = $data['spend_product_quentity'];
                        $spend_product_entry_date = $data['spend_product_entry_date'];
                    ?>
                        <tr>
                            <td><?php echo $dada_list[$spend_product_name]?></td>
                            <td><?php echo $spend_product_quentity?></td>
                            <td><?php echo $spend_product_entry_date?></td>
                            <td><a href='EditSpendProduct.php?id=<?php echo $spend_product_id ?>' class="btn btn-primary btn-sm">Edit</a></td>
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
