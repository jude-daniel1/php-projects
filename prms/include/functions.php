<?php

function clean($conn, $args){
     $args = trim($args);
     return mysqli_real_escape_string($conn, $args);
}

?>