<?php include('include/db.php');  ?>
<?php include('include/tables.php');  ?>
<?php include('include/functions.php');  ?>
<?php 
    if(isset($_GET['code'])){
        $code = clean($conn,  $_GET['code']);
        $sqlDelete = "DELETE FROM users WHERE code = '$code'";
        $result = mysqli_query($conn, $sqlDelete);
        if($result){
            header("Location:view-staff-info.php");
        }
    }



?>