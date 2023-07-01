<?php
include_once('db_config.php');

$page_limit = 2;
$page = "";
if(isset($_POST['page_id'])){
    $page = $_POST['page_id'];
}else{
    $page = 1;
}
$offset = ($page - 1) * $page_limit;
$res = mysqli_query($conn, "SELECT * FROM employees LIMIT $offset, $page_limit");
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
        while($row = mysqli_fetch_assoc($res)){
            $output .= "<tr>
            <td>{$row['id']}</td>
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
        $sql = mysqli_query($conn, "SELECT * FROM employees");
        $record = mysqli_num_rows($sql);
        $total_pages = ceil($record/$page_limit);

        $output .= '<nav aria-label="pagination"> <ul class="pagination">';
        if($page >=2){
            $output .= "<li class='page-item'><a href='' class='page-link' id='".($page-1)."' >Previous</a></li>";
        }else{
            $output .= "<li class='page-item disabled'><a href='' class='page-link' id='".($page-1)."' >Previous</a></li>";
        }
        
        for ($i=1; $i <=$total_pages; $i++) { 
            if($page == $i) {
            $output .= "<li class='page-item active'><a href='' class='page-link' id='".$i."' >$i</a></li>";
        }else{
                $output .= "<li class='page-item '><a href='' class='page-link' id='".$i."' >$i</a></li>";
            }
        }
        
        if($page >=$total_pages){
            $output .= "<li class='page-item disabled'><a href='' class='page-link' id='".($page+1)."' >Next</a></li>";
        }else{
            $output .= "<li class='page-item '><a href='' class='page-link' id='".($page+1)."' >Next</a></li>";
        }

        $output .= "</ul></nav>";

        echo $output;

mysqli_close($conn);             
    }else{
        echo "Data not found";
    }
?>