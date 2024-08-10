<?php
            session_start();
            $hostname= 'localhost';
            $username= 'root';
            $password= '';
            $databasename= 'new_store_db';

            $conn= new mysqli($hostname,$username,$password,$databasename);
        if($conn->connect_error){
          die ("Connection failed: ".$conn->connect_error );
        }
?>
<?php
require('Connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farid Ahmed ALif</title>
    <!-- list css -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="sightbar">
    <br>
<h3 style="text-align:center; color:aliceblue">Menu</h3>
<hr class="text-white">
                        <!-- Menu Bar -->
                        <ul class="nav nav-pills flex-column mt-1 ms-4 mt-sm-0" id="menu">
                            <li class="nav-item">
                                
                                <a href="index.php" class="nav-link text-white" aria-current="page">
                                    <i class="fs-5 fa fa-gauge"></i>
                                    <span class="ms-2">Dashbord</span>
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
                            <h5>
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
                                        <span class="ms-2" >Log Out</span>
                                    </a>
                                </li>
                            </h5>
                        </ul>
                </div>
            </div>
        </div>
</div>

    <nav class="navbar no-print navbar-expand-lg bg-primary text-white"  data-bs-theme="dark">
        <div class="container-fluid">
                    <!--ID Logo or name-->
                    <div class="Name">
                        <a class="navbar-brand" href="index.php">Welcome:</a>
                        <img src="../assets/images/user-circle-icon.png"  width="40">
                        <?php echo (!empty ($_SESSION['username']))? $_SESSION['username']:'User'?>
                    </div>
                    <h3 style="text-align:center;">Farid Ahmed Alif</h3>
                    <!--Time-->
                    <h3 id = "current-time"> </h3>               

                    <script>
                    let time = document.getElementById("current-time");
                    setInterval(() => {
                        let d = new Date();
                        time.innerHTML = d.toLocaleTimeString();
                    }, 1000);
                    </script>
            </div>
        </div>
    </nav>

</body>
</html>