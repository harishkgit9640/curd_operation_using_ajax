
<?php
include_once('db_config.php');

$res = mysqli_query($conn, "SELECT * FROM employees;");
$count = mysqli_num_rows($res);
if($count>0){
        $i=1;
        $output = "";
        while($row = mysqli_fetch_array($res)){
            $output = "<tr>
            <td>{$i}</td>
            <td>{$row['name']}</td>
            <td>{$row['address']}</td>
            <td>{$row['salary']}</td>
            <td>
               <button class='btn btn-success edit_btn' data-id='{$row["id"]}' data-toggle='modal' data-target='#update_model' >Edit</button>
            </td>
            <td>
               <button class='btn btn-danger delete_btn' data-id='{$row["id"]}'>Delete</button>
            </td>
        </tr>";
            $i++;
            echo $output;
        }

mysqli_close($conn);             
    }else{
        echo "Data not found";
    }
?>