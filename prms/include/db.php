<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prms";
    session_start();

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    // Check connection
    if (!$conn) {
        die('Could not connect: ' . mysqli_connect_error());
    }

    // Make my_db the current database
    $db_selected = mysqli_select_db($conn, $dbname);

    if (!$db_selected) {
    // If we couldn't, then it either doesn't exist, or we can't see it.
        $sql = 'CREATE DATABASE '.$dbname;

        if (mysqli_query($conn, $sql)) {
           
        } else {
            echo 'Error creating database: ' . mysql_error() . "\n";
        }
    }

    

    // mysqli_close($conn);
?>