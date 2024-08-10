<!DOCTYPE html>
<head>
    <title>List Of Product</title>
</head>

<?php include "SbarHeader.php"; ?>
<link rel="stylesheet" href="Da.css">

<?php
require('Connection.php');

$sql1 = "SELECT * FROM category";
$query1 = $conn->query($sql1);

$dada_list = array();

while($data1 = mysqli_fetch_assoc($query1)){
    $category_id  = $data1['category_id'];
    $category_name = $data1['category_name'];
    $dada_list[$category_id] = $category_name;
}

// Ensure the user is logged in
$username = $_SESSION['username'];
if(!empty($username)){
?>

<div class="input">
    <br>

    <div class="AddButton"><td><a class="btn btn-success btn-sm" href="AddProduct.php"><i class="fa-solid fa-hand-point-right"> Add Product</i></a></td>
    <style>
h2 {text-align: center;}
    h2 {
        color: darkslategray;
        font-weight: bold;
  font-size: 30px;
}
</style>
<h2><i class="fa-solid fa-laptop"></i> Product <i class="fa-solid fa-laptop"></i></h2>
<p style="text-align:center;">&#169;Created by Farid Ahmed Alif &#169;</p>
</div>
    <section class="container ListCardUsers.php">
        <div class="row">
            <div class="card border-0 mt-2">
                <table id="ListProduct" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Total Tk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql= "SELECT * FROM product";
                    $query = $conn->query($sql);

                    while($data = mysqli_fetch_assoc($query)){
                        $product_id  = $data['product_id'];
                        $product_name = $data['product_name'];
                        $product_category = $data['product_category'];
                        $product_code = $data['product_code'];
                    ?>
                        <tr>
                            <td><?php echo $product_name?></td>
                            <td><?php echo $dada_list[$product_category]?></td>
                            <td><?php echo $product_code?></td>
                            <td><a href='EditProduct.php?id=<?php echo $product_id ?>' class="btn btn-primary btn-sm">Edit</a></td>
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
