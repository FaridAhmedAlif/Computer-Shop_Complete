<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="AddCategory.css">
</head>
<body>
<?php include "SbarHeader.php"; ?>

<title>Add Product</title>
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
                        <h1>Add Product</h1><br>
                        <?php
                        require('Connection.php');
                        // Ai if theke Url diye dhukte na parar code suru..
                        $username = $_SESSION['username'];
                        if(!empty($username)){
                        ?>
                        
                        <?php
                        $submitted = false;
                        if(isset($_GET['product_name'])){
                            $product_name       = $_GET['product_name'];
                            $product_category   = $_GET['product_category'];
                            $product_code       = $_GET['product_code'];
                            $product_entry_date = $_GET['product_entry_date'];

                            // Table Selection Part
                            $sql = "INSERT INTO product (product_name, product_category, product_code, product_entry_date)
                                    VALUES ('$product_name', '$product_category', '$product_code', '$product_entry_date')";

                            if($conn->query($sql) == TRUE){
                                echo '<h1>Data Inserted..!!</h1>';
                                echo '<script>setTimeout(function(){ window.location.href = "ListOfProduct.php"; }, 3000);</script>';
                                $submitted = true;
                            }else{
                                echo '<p>Data Not Inserted..!!</p>';
                            }
                        } 
                        ?>

                        <!-- Category Table Theke Array Akare niye Dropdown manu te show korbe.. -->
                        <?php $sql = "SELECT * FROM category";
                        $query = $conn->query($sql);
                        ?>

                        <?php if(!$submitted) { ?>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET" onsubmit="return validateForm()"> 
                            Product Name: <br>
                            <input type="text" id="product_name" name="product_name"><br><br>
                            Product Category: <br>

                            <!-- Dropdown Selection Bar (Inpotant Part) --> 
                            <select id="product_category" name="product_category">
                                <?php
                                while($data = mysqli_fetch_array($query)){
                                    $category_id = $data['category_id'];
                                    $category_name = $data['category_name'];
                                    echo "<option value='$category_id'>$category_name</option>";
                                }
                                ?>
                            </select><br><br>
                            
                            Total Tk : <br>
                            <input type="text" id="product_code" name="product_code"><br><br>
                            Product Entry Date: <br>
                            <input type="date" id="product_entry_date" name="product_entry_date"><br><br>
                            <input type="submit" value="Submit" class="btn btn-success btn-sm" >
                        </form>
                        <p id="error_message" style="color:red;"></p>
                        <?php } ?>
                    <?php
                    // Close the initial if statement
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

    <script>
        function validateForm() {
            var productName = document.getElementById('product_name').value;
            var productCategory = document.getElementById('product_category').value;
            var productCode = document.getElementById('product_code').value;
            var productEntryDate = document.getElementById('product_entry_date').value;
            var errorMessage = document.getElementById('error_message');

            if (productName == "" || productCategory == "" || productCode == "" || productEntryDate == "") {
                errorMessage.innerText = "Please insert the Product Name, Product Category, Product Code, and Product Entry Date.";
                return false;
            }
            return true;
        }
    </script>

</body>
</html>
