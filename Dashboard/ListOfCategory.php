<!DOCTYPE html>
<head>
    <title>
        List Of Category
    </title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link rel="stylesheet" href="CssCdn.css">
</head>

<?php include "SbarHeader.php"; ?>
<link rel="stylesheet" href="Da.css">


<?php
require('Connection.php');

      // Ai if theke Url diye dhukte na parar code suru..
      $username = $_SESSION['username'];
      if(!empty($username) && !empty($username)){
?>

<div class="input">
    <br>

<div class="AddButton"><td><a class="btn btn-success btn-sm" href="AddCategory.php"><i class="fa-solid fa-hand-point-right"> Add Category</i></a></td>
<style>
h2 {text-align: center;}
    h2 {
        color: darkslategray;
        font-weight: bold;
  font-size: 30px;
}
</style>
<h2><i class="fs-5 fa-solid fa-icons"></i> Category <i class="fs-5 fa-solid fa-icons"></i></h2>
<p style="text-align:center;">&#169;Created by Farid Ahmed Alif &#169;</p>
</div>

<section class="container ListCardUsers.php">
        <div class="row">
            <div class="card border-0 mt-2">
            <table id="ListProduct" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $sql= "SELECT * FROM category";
            $query = $conn->query($sql);

            while($data = mysqli_fetch_assoc($query)){
                $category_id = $data['category_id'];
                $category_name = $data['category_name'];
                $category_entrydate = $data ['category_entrydate'];
        ?>
                <tr>
                    <td><?php echo $category_id ?></td>
                    <td><?php echo $category_name ?></td>
                    <td><?php echo $category_entrydate?></td>
                    <td><a href='EditCategory.php?id=<?php echo $category_id ?>' class="btn btn-primary btn-sm">Edit</a></td>
                </tr>
         <?php }?>

    </tbody>
</div>
    </div>
    </div>
    </section>
    </div>

<!-- Ai else e Url diye dhukte na parar code ses..-->
<?php
}else{
  header('location:../');
}
?>

<script src="JsCdn.js"></script>
    <script src="SecondJsCdn.js"></script>
    <script src="main.js"></script>
    
</html>
