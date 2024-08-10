<?php require_once('config.php') ?>
<?php 
    // check if already login
    if(isset($_SESSION['loginStatus']) && $_SESSION['loginStatus'] === true && !empty($_SESSION['userID'])){
        header('location:dashboard/');
    }

    // submit for login 
    if(isset($_POST['loginbtn'])){
        $uname = $_POST['un'];
        $upass = $_POST['pass'];

        $sql = "SELECT * FROM $users WHERE user_email = '$uname'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify the entered password against the stored hash
            if (password_verify($upass, $user['user_password'])) {
                // Password is correct
                $_SESSION['loginStatus'] = true;
                $_SESSION['userID'] = $user['ID'];
                $_SESSION['username'] = $user['user_fullname'];
                $succ = "Login Successful!";
                header("refresh:1;url=dashboard/");
            } else {
                // Password is incorrect
                $err = "Wrong Password!";
            }
        } else {
            // No user found with the entered email
            $err = "Wrong Username!";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farid Ahmed Alif</title>
    <!-- list css -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="container login">
        <div class="row">
            <div class="col-4 m-auto border login-form">
                <h1 class="h2 text-center my-4">Login</h1>
                
                <?php if(isset($succ)){ ?>
                <div class="alert alert-success" role="alert"><?php echo $succ?></div>
                <?php } ?>
                
                <?php if(isset($err)){ ?>
                <div class="alert alert-danger" role="alert"><?php echo $err?></div>
                <?php } ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username"name="un"
                            placeholder="Enter Email Address">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password"name="pass"
                            placeholder="Enter password">
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="form-control btn btn-primary" id="loginbtn" value="Login" name="loginbtn">
                    </div>
                </form>
                <div class="text-center">
                    <a href="#">Forget Password?</a>
                    <hr>
                    <a href="registration.php" class="btn btn-success">Create New Account</a>
                </div>
                <br>
                <p style="text-align:center;">&#169;Created by Farid Ahmed Alif &#169;</p>
            </div>
        </div>
    </section>



    <!-- Bootstrap JS -->
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>