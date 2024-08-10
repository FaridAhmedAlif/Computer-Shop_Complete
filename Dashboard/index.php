<?php
session_start();
$hostname = 'localhost';
$username = 'root';
$password = '';
$databasename = 'new_store_db';

$conn = new mysqli($hostname, $username, $password, $databasename);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$total = 0; // Initialize the total variable
$total_quentity = 0; // Initialize the total_quentity variable
$total_purchese = 0;
$total_price = 0;

$sql1 = mysqli_query($conn, "SELECT store_product_quentity FROM store_product");

while ($result = mysqli_fetch_array($sql1)) {
    $total += $result['store_product_quentity'];
}

// Assuming you have another query to calculate $total_quentity
$sql2 = mysqli_query($conn, "SELECT spend_product_quentity FROM spend_product");

while ($result = mysqli_fetch_array($sql2)) {
    $total_quentity += $result['spend_product_quentity'];
}


$sql2 = mysqli_query($conn, "SELECT product_code FROM product");
while ($result = mysqli_fetch_array($sql2)) {
    $total_purchese += (int)$result['product_code']; // Convert to integer
}


$sql2 = mysqli_query($conn, "SELECT seal_total_price FROM seal");
while ($result = mysqli_fetch_array($sql2)) {
    $total_price += (float)$result['seal_total_price']; // Convert to float in case it's a decimal
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farid Ahmed Alif</title>
    <!-- list css -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>

<!-- 4 Cards -->
<div class="position-absolute start-50 bottom-50 ms-5">
    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
        <h3>
            <div class="card-header">Spend Product</div>
        </h3>
        <div class="card-body">
            <h5 class="card-title">Total: <?php echo $total_quentity; ?></h5>
            <p class="card-text text-success">
                <i class="fs-2 text-white fa-regular fa-calendar-check"></i>
                hhhhhhhhhhhhhhhhhhhhhhhhhhhh
            </p>
        </div>
    </div>
</div>

<div class="position-absolute bottom-50 end-50">
    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
        <h3>
            <div class="card-header">Product Entry</div>
        </h3>
        <div class="card-body">
            <h5 class="card-title">Total: <?php echo $total; ?></h5>
            <p class="card-text text-danger">
                <i class="fs-2 text-white fa-solid fa-dungeon"></i>
                hhhhhhhhhhhhhhhhhhhhhhhhhhhh
            </p>
        </div>
    </div>
</div>

<div class="position-absolute top-50 end-50">
    <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
        <h3>
            <div class="card-header">Purchase</div>
        </h3>
        <div class="card-body">
            <h5 class="card-title">Total Tk: <?php echo $total_purchese; ?></h5>
            <p class="card-text text-secondary">
                <i class="fs-2 fa-solid fa-cart-shopping text-white"></i>
                hhhhhhhhhhhhhhhhhhhhhhhhhhhh
            </p>
        </div>
    </div>
    <br>
    <p style="text-align:center;">&#169;Created by Farid Ahmed Alif &#169;</p>
</div>

<div class="position-absolute top-50 start-50 ms-5">
    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <h3>
            <div class="card-header">Sell</div>
        </h3>
        <div class="card-body">
            <h5 class="card-title">Total Tk: <?php echo $total_price; ?></h5>
            <p class="card-text text-info">
                <i class="fs-2 fa-solid fa-sack-dollar text-white"></i>
                hhhhhhhhhhhhhhhhhhhhhhhhhhhh
            </p>
        </div>
    </div><br>
    <p style="text-align:center;">I am starting in the name of Allah..!!</p>
</div>

<!-- Sidebar -->
<div class="sightbar">
    <br>
    <h3 style="text-align:center; color:aliceblue">Menu</h3>
    <hr class="text-white">
    <!-- Menu Bar -->
    <ul class="nav nav-pills flex-column mt-1 ms-4 mt-sm-0" id="menu">
        <li class="nav-item">
            <a href="index.php" class="nav-link text-white" aria-current="page">
                <i class="fs-5 fa fa-gauge"></i>
                <span class="ms-2">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="ListOfCategory.php" class="nav-link text-white" aris-current="page">
                <i class="fs-5 fa-solid fa-icons"></i>
                <span class="ms-2">Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="ListOfProduct.php" class="nav-link text-white" aria-current="page">
                <i class="fs-5 fa-solid fa-laptop"></i>
                <span class="ms-2">Product</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="ListOfEntryProduct.php" class="nav-link text-white" aria-current="page">
                <i class="fs-5 fa-solid fa-gift"></i>
                <span class="ms-2">Store Product</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="ListOfSpendProduct.php" class="nav-link text-white" aria-current="page">
                <i class="fs-3 fa-brands fa-stack-overflow"></i>
                <span class="ms-2">Spend Product</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="Report.php" class="nav-link text-white" aria-current="page">
                <i class="fs-5 fa-solid fa-book"></i>
                <span class="ms-2">Report</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="ListOfSale.php" class="nav-link text-white" aria-current="page">
                <i class="fa-solid fa-comments-dollar"></i>
                <span class="ms-2">Sell</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="ListCardUsers.php" class="nav-link text-white" aria-current="page">
                <i class="fs-5 fa-solid fa-user-tie"></i>
                <span class="ms-2">Users</span>
            </a>
        </li>
        <h5>
            <li class="nav-item mt-5">
                <a href="Logout.php" class="nav-link text-white mt-8" aria-current="page">
                    <i class="fs-4 fa-solid fa-right-from-bracket"></i>
                    <span class="ms-2">Log Out</span>
                </a>
            </li>
        </h5>
    </ul>
</div>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary text-white" data-bs-theme="dark">
    <div class="container-fluid">
        <!-- ID Logo or name -->
        <div class="Name">
            <a class="navbar-brand" href="index.php">Welcome:</a>
            <img src="../assets/images/user-circle-icon.png" width="40">
            <?php echo (!empty($_SESSION['username'])) ? $_SESSION['username'] : 'User' ?>
        </div>
        <h3 style="text-align:center;">Farid Ahmed Alif</h3>
        <!-- Time -->
        <h3 id="current-time"></h3>

        <!-- JavaScript Code Timer Show -->
        <script>
            let time = document.getElementById("current-time");
            setInterval(() => {
                let d = new Date();
                time.innerHTML = d.toLocaleTimeString();
            }, 1000);
        </script>
    </div>
    
</nav>
