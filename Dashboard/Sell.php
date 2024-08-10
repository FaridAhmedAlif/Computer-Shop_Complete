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

    <!-- list css -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
<style>
body{
    margin: 0;
    padding: 0;
}


.sightbar{
    background-color: #1E90FF;
    width: 200px;
    top: 50px;
    left: 0;
    height: 100%;
    
}
.sightbar ul li :hover{
    background-color:#696969;
}
</style>

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


<div class="input no-print">
    <div class="row">
        <div class="col-sm-6">
            <div class="card bg-secondary text-white">
                <div class="card-body">
                    <h5 class="card-title">
                <a href="index.php ">
    <button type="button" class="btn btn-primary no-print">Home</button>
    </a>
</div>
                    <h1 class="no-print" style="text-align: center;">Sell</h1>
                    <hr>
                    <div class="Box">
                        <style>
                            .Box{
                                padding: 10px;
                                padding-left: 20px;
                            }
                        </style>
                    <?php
                    require('Connection.php');
                    require('Function.php');

                    $username = $_SESSION['username'];
                    if (!empty($username)) {

                        $submitted = false;
                        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['seal_product_name'])) {
                            $seal_product_name = $_GET['seal_product_name'];
                            $seal_product_quantity = $_GET['seal_product_quantity'];
                            $seal_spend_entry_date = $_GET['seal_spend_entry_date'];
                            $seal_coustomer_name = $_GET['seal_coustomer_name'];
                            $seal_coustomer_phone = $_GET['seal_coustomer_phone'];
                            $seal_price_par_unit = $_GET['seal_price_par_unit'];
                            $seal_total_price = $_GET['seal_total_price'];
                            $seal_discount = $_GET['seal_discount'];
                            $seal_due = $_GET['seal_due'];
                            $more_product_name = $_GET['more_product_name'];

                            // Input validation
                            if (empty($seal_product_name) || empty($seal_product_quantity) || empty($seal_spend_entry_date) || empty($seal_coustomer_name)
                            || empty($seal_coustomer_phone) || empty($seal_coustomer_phone) || empty($seal_price_par_unit) || empty($seal_total_price)) {
                                echo '<div class="alert alert-danger">Please insert the Product Category, Product Quantity, and Spend Entry Date</div>';
                            } else {
                                // Table Selection Part
                                $sql = "INSERT INTO seal (seal_product_name, seal_product_quantity, seal_spend_entry_date, seal_coustomer_name,
                                                    seal_coustomer_phone, seal_price_par_unit, seal_total_price, seal_discount, seal_due, more_product_name)
                                        VALUES ('$seal_product_name', '$seal_product_quantity', '$seal_spend_entry_date', '$seal_coustomer_name',
                                            '$seal_coustomer_phone', '$seal_price_par_unit', '$seal_total_price', '$seal_discount', '$seal_due', '$more_product_name')";

                                if ($conn->query($sql) === TRUE) {
                                    echo '<div class="alert alert-success">Data Inserted..!!</div>';
                                    echo '<script>setTimeout(function(){ window.location.href = "Sell.php"; }, 1000);</script>';
                                    $submitted = true;
                                } else {
                                    echo '<div class="alert alert-danger">Data Not Inserted..!!</div>';
                                }
                            }
                        }

                    ?>
                    <?php if(!$submitted) { ?>

                    <form id="spendForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" onsubmit="return validateSpendForm()" class="no-print">
                        Product Name: <br>
                        <!-- Dropdown Selection Bar and Function Call (Important Part)--> 
                        <select name="seal_product_name" id="seal_product_name">
                            <?php data_list('product', 'product_id', 'product_name'); ?>
                        </select><br><br>
                        
                        Product Quantity: <br>
                        <input type="text" name="seal_product_quantity" id="seal_product_quantity"><br><br>
                        Spend Entry Date: <br>
                        <input type="date" name="seal_spend_entry_date" id="seal_spend_entry_date"><br><br>
                        Coustomer Name: <br>
                        <input type="text" name="seal_coustomer_name" id="seal_coustomer_name"><br><br>
                        Phone Number: <br>
                        <input type="text" name="seal_coustomer_phone" id="seal_coustomer_phone"><br><br>
                        Price per Unit: <br>
                        <input type="text" name="seal_price_par_unit" id="seal_price_par_unit"><br><br>


                        <h3 class="no-print" style="text-align: center;">Submit Part</h3>
                        <hr>

                        Discount: <br>
                        <input type="text" name="seal_discount" id="seal_discount"><br><br>
                        Total Price: <br>
                        <input type="text" name="seal_total_price" id="seal_total_price"><br><br>
                        Due : <br>
                        <input type="text" name="seal_due" id="seal_due"><br><br>
                        More Product Short Name: <br>
                        <input type="text" name="more_product_name" id="more_product_name"><br><br>
                        <input type="submit" value="Submit" class="btn btn-success btn-sm">
                        <button type="button" onclick="addProduct()" class="btn btn-primary btn-sm" style="margin-left: 80px;">Add</button>
                    </form>
                    <?php 
                        }
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

</div>


<style>
    .print{
        padding: 30px;
    }
</style>


<div class="Print">
<div class="display-section hidden" id="displaySection">
    <h1 style="text-align: Center">Morden Computer</h1>
    <h3 style="text-align: center;">Noapara,Avainagar,Jeshore</h3>
    <h3 style="text-align: center;">Phone: 01796853085</h3><br><br>
    <table id="productTable">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Phone Number</th>
                <th>Price per Unit</th>
                <th>Total Price</th>
                <th class="no-print" >Action</th>
            </tr>
        </thead>
        <hr>
        <tbody>
            <!-- Filled by JavaScript -->
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" style="text-align: right;"><strong>Total:</strong></td>
                <td id="totalPrice">0</td>
                <td class="no-print"></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;"><strong>Discount:</strong></td>
                <td><input type="text" id="discount" oninput="updateFinalPrice()" style="width: 100px;"></td>
                <td class="no-print"></td>
            </tr>
            <tr>
                <td colspan="6" style="text-align: right;"><strong>Final Total:</strong></td>
                <td id="finalPrice">0</td>
                <td class="no-print"></td>
            </tr>
        </tfoot>
    </table>
    <br><br>
    <div class="no-print">
    <button onclick="printPage()" class="btn btn-primary btn-sm-20 d-grid gap-2 col-6 mx-auto no-print">Print</button>
</div>
</div>

<br><br>
<script>
    function validateSpendForm() {
        var spendProductName = document.getElementsByName('seal_product_name')[0].value;
        var spendProductQuantity = document.getElementsByName('seal_product_quantity')[0].value;
        var spendEntryDate = document.getElementsByName('seal_spend_entry_date')[0].value;
        var customerName = document.getElementsByName('seal_coustomer_name')[0].value;
        var phoneNumber = document.getElementsByName('seal_coustomer_phone')[0].value;
        var pricePerUnit = document.getElementsByName('seal_price_par_unit')[0].value;

        if (spendProductName == "" || spendProductQuantity == "" || spendEntryDate == "" || customerName == "" || phoneNumber == "" || pricePerUnit == "") {
            alert("Please insert the Product Category, Product Quantity, Spend Entry Date, Name, Phone Number, and Price per Unit.");
            return false;
        }
        return true;
    }

    function addProduct() {
        var spendProductNameElement = document.getElementById('seal_product_name');
        var spendProductName = spendProductNameElement.options[spendProductNameElement.selectedIndex].text;
        var spendProductQuantity = document.getElementById('seal_product_quantity').value;
        var spendEntryDate = document.getElementById('seal_spend_entry_date').value;
        var customerName = document.getElementById('seal_coustomer_name').value;
        var phoneNumber = document.getElementById('seal_coustomer_phone').value;
        var pricePerUnit = document.getElementById('seal_price_par_unit').value;

        if (validateSpendForm()) {
            var table = document.getElementById("productTable").getElementsByTagName('tbody')[0];
            var newRow = table.insertRow(table.rows.length);

            var cell1 = newRow.insertCell(0);
            var cell2 = newRow.insertCell(1);
            var cell3 = newRow.insertCell(2);
            var cell4 = newRow.insertCell(3);
            var cell5 = newRow.insertCell(4);
            var cell6 = newRow.insertCell(5);
            var cell7 = newRow.insertCell(6);
            var cell8 = newRow.insertCell(7);

            var totalPrice = spendProductQuantity * pricePerUnit;

            cell1.innerHTML = spendProductName;
            cell2.innerHTML = spendProductQuantity;
            cell3.innerHTML = spendEntryDate;
            cell4.innerHTML = customerName;
            cell5.innerHTML = phoneNumber;
            cell6.innerHTML = pricePerUnit;
            cell7.innerHTML = totalPrice;
            cell8.innerHTML = '<button onclick="deleteRow(this)" class="btn btn-danger btn-sm no-print">Delete</button>';

            document.getElementById("displaySection").classList.remove("hidden");
            updateTotalPrice();
        }
    }

    function deleteRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateTotalPrice();
    }

    function updateTotalPrice() {
        var table = document.getElementById("productTable");
        var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        var total = 0;

        for (var i = 0; i < rows.length; i++) {
            var totalPrice = parseFloat(rows[i].getElementsByTagName('td')[6].innerHTML);
            total += totalPrice;
        }

        document.getElementById('totalPrice').innerHTML = total.toFixed(2);
        updateFinalPrice();
    }

    function updateFinalPrice() {
        var totalPrice = parseFloat(document.getElementById('totalPrice').innerHTML);
        var discount = parseFloat(document.getElementById('discount').value) || 0;
        var finalPrice = totalPrice - discount;

        document.getElementById('finalPrice').innerHTML = finalPrice.toFixed(2);
    }

    function setFilename() {
        var d = new Date();
        var filename = 'Sale_' + d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate() + '_' + d.getHours() + '-' + d.getMinutes();
        document.title = filename;
    }

    function resetTitle() {
        document.title = "Sale";
    }

    function printPage() {
        setFilename();
        window.print();
    }

    window.onafterprint = resetTitle;
</script>
                
</div>
</body>
</html>
