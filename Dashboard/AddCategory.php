<!DOCTYPE html>
  <head>
    <title>Add Category</title>
    <link rel="stylesheet" href="AddCategory.css">
  </head>
  <?php include "SbarHeader.php";?>

  <br>
  <br><br>
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
                        <h1>Add Category</h1><br>
      <?php    
      require('Connection.php');
      // Ai if theke Url diye dhukte na parar code suru..
      $username = $_SESSION['username'];
      if(!empty($username) && !empty($username)){
      ?>

      <?php
      $submitted = false;
      if(isset($_GET['category_name'])){
          $category_name=      $_GET['category_name'];
          $category_entrydate= $_GET['category_entrydate'];

          $sql = "INSERT INTO category (category_name,category_entrydate)
                  VALUES ('$category_name','$category_entrydate')";

          if($conn->query($sql) == TRUE){
              echo '<h1>Data Inserted..!!</h1>';
              echo '<script>setTimeout(function(){ window.location.href = "ListOfCategory.php"; }, 3000);</script>';
              $submitted = true;
          }else{
              echo '<p>Data Not Inserted..!!</p>';
          }
      }
      ?>

      <?php if(!$submitted) { ?>
          <form action="AddCategory.php" method="GET" onsubmit="return validateForm()"> 
              Category: <br>
              <input type="text" name="category_name" id="category_name"><br><br>
              Category Entry Date: <br>
              <input type="date" name="category_entrydate" id="category_entrydate"><br><br>
              <input type="submit" value="Submit" class="btn btn-success">
              <p id="error_message" style="color:red;"></p>
          </form>
      <?php } ?>
              </div>
              <!-- Ai else e Url diye dhukte na parar code ses..-->
              <?php
              }else{
                  header('location:../');
              }
              ?></h5>
            </div>
          </div>
        </div>
      </div>
      </div>

      <script>
      function validateForm() {
          var category = document.getElementById('category_name').value;
          var entryDate = document.getElementById('category_entrydate').value;
          var errorMessage = document.getElementById('error_message');

          if (category == "" || entryDate == "") {
              errorMessage.innerText = "Please insert the category and category entry date.";
              return false;
          }
          return true;
      }
      </script>
</html>
