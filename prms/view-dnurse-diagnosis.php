<?php include('include/db.php');  ?>
<?php include('include/tables.php');  ?>
<?php include('include/functions.php');  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRMS</title>
    <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="datatable/datatables.min.css"/>
    <link rel="stylesheet" href="css/style.css"
</head>

<body>

    <!-- display error -->
  <?php  
    
   if(isset($_SESSION['success'])){
        echo "<div id='display-success'><img src='img/correct.png' id = 'successImg' alt='Success' />".$_SESSION['success']."</div>";
        unset($_SESSION['success']);
   }
  
  ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
             <a class = "navbar-brand"> <?php if(isset($_SESSION['name'])) echo "Welcome: ".$_SESSION['role']." ".$_SESSION['name']  ?></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                
            </div>
     </nav>

    <div class="container-fluid mt-4">
        <table class="table" id="myTable">
             <thead class="thead-dark">
                <tr>
                <th scope="col">S/No</th>
                <th scope="col">nurse_id</th>
                <th scope="col">patient_id</th>
                <th scope="col">temperature</th>
                <th scope="col">pulse_rate</th>
                 <th scope="col">respiratory_rate</th>
                <th scope="col">blood_pressure</th>
                <th scope="col">osl</th>
                <th scope="col">weight</th>
                <th scope="col">height</th>
                <th scope="col">bmi</th>
                <th scope="col">date</th>
                 <th scope="col">diagnose</th>
                </tr>
             </thead>
             <tbody>
        <?php 
            $sqlNurses = "SELECT * FROM nurses";
            $result = mysqli_query($conn, $sqlNurses);
            $i = 1;
            while ($rows = mysqli_fetch_assoc($result)) {
            ?>
             <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $rows['code'] ?></td>
                <td><?php echo $rows['patient_id'] ?></td>
                <td><?php echo $rows['temperature'] ?></td>
                <td><?php echo $rows['pulse_rate'] ?></td>
                <td><?php echo $rows['respiratory_rate'] ?></td>
                <td><?php echo $rows['blood_pressure'] ?></td>
                <td><?php echo $rows['osl'] ?></td>
                <td><?php echo $rows['weight'] ?></td>
                <td><?php echo $rows['height'] ?></td>
                <td><?php echo $rows['bmi'] ?></td>
                <td><?php echo $rows['date'] ?></td>
                 <td><a href="doctor-diagnosis-patient.php?patient_id=<?php echo $rows['patient_id'] ?>&nurse_id=<?php echo $rows['code'] ?>" class = "btn btn-success btn-sm">diagnose</a></td>
                
            </tr>
             
        <?php
            $i++;
            }
         ?>

          
        </tbody>
    </table>
    </div>
    <script src = "js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="datatable/datatables.min.js"></script>
    <script>
        $(document).ready(function(){

            setInterval(() => {
                $("#display-success").hide('slow');
            }, 2000);


            $('#myTable').DataTable();
        });

    </script>
</body>

</html>