<?php 
include_once('db_config.php');
$search= $_POST['search'];
// fetch query 
    $res = mysqli_query($conn, "SELECT * FROM employees WHERE name LIKE '%$search%' OR address LIKE '%$search%' OR salary LIKE '%$search%' ");
    $count = mysqli_num_rows($res);
    if($count>0){
      $i=1;
      $output = "";
      $output .= "
      <table class='table table-bordered'>
      <thead class='table-dark text-uppercase'>
  <tr>
  <th>Sno</th>
  <th>User Name</th>
  <th>address</th>
  <th>salary</th>
  <th>Edit</th>
  <th>Delete</th>
</tr>
</thead>
<tbody>";
      while($row = mysqli_fetch_array($res)){
          $output .= "<tr>
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
      }
      $output .= '</tbody> </table>';
      echo $output;
      
        }
        else{
            echo "<h3 style='color:red;'> Record not found! </h3>";
        }
        mysqli_close($conn);  
    
    
    ?>