<!DOCTYPE html>
    <head>
    <title>Add Users</title>
    </head>

      <?php include "SbarHeader.php";?>
        <link rel="stylesheet" href="AddCategory.css">
        <br><br><br>
            <div class="input">
      <?php
      require('Connection.php');

      $username = $_SESSION['username'];
      if(!empty($username) && !empty($username)){
      ?>

            <?php
            if(isset($_GET['user_fullname'])){
                $user_fullname       = $_GET ['user_fullname'];
                $user_email = $_GET['user_email'];
                $user_password = $_GET['user_password'];
                

              //Table Selection Part
              $sql = "INSERT INTO users (user_first_name,user_last_name,user_email,user_password)
                      VALUES ('$user_first_name','$user_email','$user_password')";

                      if($conn->query($sql)==TRUE){
                        echo 'Data Inserted..!!';
                      }else{
                        echo 'Data Not Inserted..!!';
                      }
                  } 
                ?>

              <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET"> 
                User's First Name: <br>
                <input type="text" name="user_first_name"><br><br>
                User's E-mail: <br>
                <input type="email" name="user_email"><br><br>
                User's Password: <br>
                <input type="text" name="user_password"><br><br>
                <input type="submit" value="Submit" class="btn btn-success btn-sm">
              </form>
            </div>

              <?php
                }else{
                  header('location:../');
                }
              ?>
</html>