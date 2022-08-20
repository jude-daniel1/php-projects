<?php
     if(!isset($_SESSION['role']) || $_SESSION['role'] != "Doctor"){
        header("Location:index.php");
    }


?>