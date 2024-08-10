<?php 
//Function create..
function data_list($tableName,$cloumn1,$cloumn2){
    require('Connection.php');
$sql = "SELECT * FROM $tableName";
$query = $conn->query($sql);

while($data = mysqli_fetch_array($query)){
    $data_id = $data [$cloumn1];
    $data_name = $data [$cloumn2];
    echo "<option value='$data_id'>$data_name</option>";
    }
}
?>


