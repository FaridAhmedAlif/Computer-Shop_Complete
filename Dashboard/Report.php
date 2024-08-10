<!DOCTYPE html>
<html lang="en">
<head>
    <title>Report</title>
    <link rel="stylesheet" href="AddCategory.css">
</head>
<body>

<?php 
require('Connection.php'); // Connection should be required here at the top

include "SbarHeader.php";

// Initialize the product list array
$product_list = array();

// Correcting the variable names and query execution
$sql3 = "SELECT * FROM product";
$query3 = $conn->query($sql3);

// Check if the query was successful
if ($query3 && $query3->num_rows > 0) {
    while($data3 = mysqli_fetch_assoc($query3)){
        $product_id  = $data3['product_id'];
        $product_name = $data3['product_name'];
        $product_list[$product_id] = $product_name;
    }
} else {
    echo "Error fetching product list: " . $conn->error;
}

?>

<br>

<div class="input">
    <?php
    $username = $_SESSION['username'];
    if (!empty($username)) {
    ?>




<div class="Ce text-center">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET"> 
        
   
        <h1> <i class="fs-5 fa-solid fa-book"></i> Report <i class="fs-5 fa-solid fa-book"></i></h1>
        <h1><i class="fa-solid fa-hand-point-down"></i></h1><br>
        <h2>  Select Product Name </h2>
        <p style="text-align:center;">&#169;Created by Farid Ahmed Alif &#169;</p>
        <hr>
        <select name="product_name">
            <?php
            foreach($product_list as $product_id => $product_name) {
            ?>
                <option value="<?php echo $product_id; ?>"> <?php echo $product_name; ?></option>
            <?php } ?>
        </select>
        <i class="fa-solid fa-hand-point-right"></i>
        <input type="submit" value="Generate Report" class="btn btn-success btn-sm">
    </form>
</div>

<br>
<div class="row">
  <div class="col-sm-6">
    <div class="card bg-info">
      <div class="card-body">
        <div class="text-center"><h3>Store Product</h3></div>
        <hr>

        <?php 
        if (isset($_GET['product_name'])) {
            $product_id = $_GET['product_name'];

            // Query to fetch product details from store_product
            $sql1 = "SELECT * FROM store_product WHERE store_product_name = '$product_id'";
            $query1 = $conn->query($sql1);

            if ($query1 && $query1->num_rows > 0) {
                echo "<table border='1' cellpadding='10' cellspacing='0'>";
                echo "<tr><th>Product Name</th><th>Store Date</th><th>Quantity</th></tr>";
                
                $total_quantity_store = 0; // Initialize the total quantity

                while ($data1 = mysqli_fetch_assoc($query1)) {
                    $store_product_quantity = $data1['store_product_quentity'];
                    $store_product_entry_date = $data1['store_procuct_emtry_date'];
                    $store_product_name = $data1['store_product_name'];

                    // Accumulate the total quantity
                    $total_quantity_store += $store_product_quantity;

                    // Display product name, entry date, and quantity
                    echo "<tr><td>{$product_list[$store_product_name]}</td><td>$store_product_entry_date</td><td>$store_product_quantity</td></tr>";
                }

                // Close the table
                echo "</table>";

                // Display the total quantity
                echo "<p><strong>Total Store Quantity:$total_quantity_store</strong> </p>";
            } else {
                echo "<p>No records found for the selected product.</p>";
            }
        }
        ?>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    <div class="card bg-info">
      <div class="card-body">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
          <div class="text-center"><h3>Spend Product</h3></div>
          <hr>
        </form>

        <?php 
        if (isset($_GET['product_name'])) {
            $product_id = $_GET['product_name'];

            // Query to fetch product details from spend_product
            $sql2 = "SELECT * FROM spend_product WHERE spend_product_name = '$product_id'";
            $query2 = $conn->query($sql2);

            if ($query2 && $query2->num_rows > 0) {
                echo "<table border='1' cellpadding='10' cellspacing='0'>";
                echo "<tr><th>Product Name</th><th>Store Date</th><th>Quantity</th></tr>";

                $total_quantity_spend = 0; // Initialize the total quantity

                while ($data2 = mysqli_fetch_assoc($query2)) {
                    $spend_product_quantity = $data2['spend_product_quentity'];
                    $spend_product_entry_date = $data2['spend_product_entry_date'];
                    $spend_product_name = $data2['spend_product_name'];

                    // Accumulate the total quantity
                    $total_quantity_spend += $spend_product_quantity;

                    // Display product name, entry date, and quantity
                    echo "<tr><td>{$product_list[$spend_product_name]}</td><td>$spend_product_entry_date</td><td>$spend_product_quantity</td></tr>";
                }

                // Close the table
                echo "</table>";

                // Display the total quantity
                echo "<p><strong>Total Spend Quantity: $total_quantity_spend</strong></p>";
            } else {
                echo "<p>No records found for the selected product.</p>";
            }
        }
        ?>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-sm-12">
    <div class="card bg-info">
      <div class="card-body text-center">
        <?php 
        if (isset($total_quantity_store) && isset($total_quantity_spend)) {
            $quantity_difference = $total_quantity_store - $total_quantity_spend;
            echo "<p><strong>Remaining Quantity: $quantity_difference </strong></p>";
        }
        ?>
      </div>
    </div>
  </div>
</div>


</div>


<?php
} else {
    header('Location: ../');
}
?>

</body>
</html>
