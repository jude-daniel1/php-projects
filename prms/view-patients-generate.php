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



    <div class="container-fluid mt-4">
        <table class="table" id="myTable">
             <thead class="thead-dark">
                <tr>
                <th scope="col">name</th>
                <th scope="col">patient_id</th>
                <th scope="col">email</th>
                <th scope="col">phone</th>
                <th scope="col">reg_date</th>
                <th scope="col">action</th>
                </tr>
             </thead>
             <tbody>
        <?php 
            $sqlPatients = "SELECT * FROM patients";
            $result = mysqli_query($conn, $sqlPatients);
            while ($rows = mysqli_fetch_assoc($result)) {
            ?>
             <tr>
                <td><?php echo $rows['name'] ?></td>
                <td><?php echo $rows['patient_id'] ?></td>
                <td><?php echo $rows['email'] ?></td>
                <td><?php echo $rows['phone'] ?></td>
                <td><?php echo $rows['reg_date'] ?></td>    
                <td><a class = "btn btn-info btn-sm"  id = "generate" href = "medical-report.php?patient_id=<?php echo $rows['patient_id'] ?>">Generate report</a></td>      
            </tr>
             
        <?php
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