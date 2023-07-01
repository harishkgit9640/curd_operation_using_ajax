<?php
include_once('db_config.php');
$new_id = $_POST['new_id'];
$sql = mysqli_query($conn, "DELETE FROM employees WHERE id = $new_id");
if($sql){
    echo 1;
}else{
    echo 0;
}
mysqli_close($conn);  

?>