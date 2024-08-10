<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Card Users</title>
    <!-- list css -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="CssCdn.css">
    <link rel="stylesheet" href="Da.css">
</head>
<body>
<?php include "SbarHeader.php"; ?>
<div class="input">
<div>
<style>
h2 {text-align: center;
        color: darkslategray;
        font-weight: bold;
  font-size: 50px;
}
</style>
<h2><i class="fs-5 fa-solid fa-user-tie"></i> Users <i class="fs-5 fa-solid fa-user-tie"></i></h2>
<p style="text-align:center;">&#169;Created by Farid Ahmed Alif &#169;</p>
</div>
    <?php require('Connection.php');?>
    <section class="container ListCardUsers.php">
        <div class="row">
            <div class="card border-0  mt-2">
            <table id="ListProduct" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Join Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        <?php
        $sql= "SELECT * FROM user";
        $query = $conn->query($sql);

        while($data = mysqli_fetch_assoc($query)){
            $ID         = $data['ID'];
            $user_fullname = $data['user_fullname'];
            $user_email  = $data['user_email'];
            $user_password      = $data['user_password'];
            $user_join_datetime      = $data['user_join_datetime'];
            $user_status      = $data['user_status'];
            ?>
                <tr>
                    <td><?php echo $ID ?></td>
                    <td><?php echo $user_fullname ?></td>
                    <td><?php echo $user_email?></td>
                    <td><?php echo substr($user_password, 0, 20)?></td>
                    <td><?php echo $user_join_datetime?></td>
                    <td><?php echo $user_status?></td>
                    <td><a href='EditUsers.php?id=<?php echo $ID ?>' class="btn btn-primary btn-sm">Edit</a></td>
                </tr>
         <?php }?>
     </table>
        </tbody>

    </table>
            
        
    </section>
    </div>
    </div>

    <script src="JsCdn.js"></script>
    <script src="SecondJsCdn.js"></script>
    <script src="main.js"></script>
</body>
</html>
