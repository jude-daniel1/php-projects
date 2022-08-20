<?php
    $usersTable = "users";
    $reiceptionistTable = "reiceptionist";
    $doctorTable = "doctors";
    $nursesTable = "nurses";
    $pharmacistTable = "pharmacist";
    $administratorTable = "administrator";
    $dbname = "prms";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE TABLE IF NOT EXISTS `prms`.`users` ( `id` INT NOT NULL AUTO_INCREMENT , `code` VARCHAR(6) NOT NULL , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(255) NOT NULL , `phone` VARCHAR(11) NOT NULL , `password` VARCHAR(40) NOT NULL , `role` VARCHAR(50) NOT NULL , `status` INT NOT NULL , `date` DATETIME NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    if (!mysqli_query($conn, $sql)) {
        echo 'Error creating table: ' . mysqli_error($conn) . "\n";    
    } 

    $sqlPatients = "CREATE TABLE IF NOT EXISTS `prms`.`patients` ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(256) NOT NULL , `patient_id` VARCHAR(6) NOT NULL , `email` VARCHAR(246) NOT NULL , `dob` VARCHAR(20) NOT NULL , `phone` VARCHAR(11) NOT NULL , `address` VARCHAR(255) NOT NULL , `state` VARCHAR(111) NOT NULL, `lga` VARCHAR(255) NOT NULL , `marital_status` VARCHAR(50) NOT NULL , `profession` VARCHAR(50) NULL , `next_of_kin` VARCHAR(60) NOT NULL , `reg_date` DATE NOT NULL , `exp_date` DATE NOT NULL , `status` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    if (!mysqli_query($conn, $sqlPatients)) {
        echo 'Error creating Patients table: ' . mysqli_error($conn) . "\n";    
    } 

     $sqlNurses = "CREATE TABLE IF NOT EXISTS `prms`.`nurses` ( `id` INT NOT NULL AUTO_INCREMENT , `code` VARCHAR(11) NOT NULL , `patient_id` VARCHAR(11) NOT NULL , `temperature` FLOAT NOT NULL , `pulse_rate` FLOAT NOT NULL , `respiratory_rate` FLOAT NOT NULL , `blood_pressure` FLOAT NOT NULL , `osl` INT NOT NULL , `weight` FLOAT NOT NULL , `height` FLOAT NOT NULL , `bmi` FLOAT NOT NULL , `date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
    if (!mysqli_query($conn, $sqlNurses)) {
        echo 'Error creating Nurses table: ' . mysqli_error($conn) . "\n";    
    }
    
     $sqlDoctors = "CREATE TABLE IF NOT EXISTS `prms`.`doctors` ( `id` INT NOT NULL AUTO_INCREMENT , `code` VARCHAR(11) NOT NULL , `nurse_id` VARCHAR(11) NOT NULL , `patient_id` VARCHAR(11) NOT NULL , `sickness_name` VARCHAR(256) NOT NULL , `sickness_desc` TEXT NOT NULL , `prescription` VARCHAR(256) NOT NULL , `date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        if (!mysqli_query($conn, $sqlDoctors)) {
            echo 'Error creating Doctors table: ' . mysqli_error($conn) . "\n";    
        }

    $sqlPharmacist = "CREATE TABLE IF NOT EXISTS `prms`.`pharmacist` ( `id` INT NOT NULL , `code` VARCHAR(11) NOT NULL , `doctor_id` VARCHAR(11) NOT NULL , `patient_id` VARCHAR(11) NOT NULL , `drug_names` TEXT NOT NULL , `drug_desc` TEXT NOT NULL , `date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";
        if (!mysqli_query($conn, $sqlPharmacist)) {
            echo 'Error creating Pharmacist table: ' . mysqli_error($conn) . "\n";    
        }
?>