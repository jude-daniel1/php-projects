<?php include('include/db.php');  ?>
<?php include('include/tables.php');  ?>
<?php include('include/functions.php');  ?>
<?php include('include/doctors-restrict.php');  ?>
<?php
    if(isset($_POST['doctor'])){
        $patient_id =  clean($conn, $_POST['patient_id']);
        $nurse_id =  clean($conn, $_POST['nurse_id']);
        $sick_name =  clean($conn, $_POST['sick_name']);
        $sick_desc =  clean($conn, $_POST['sick_desc']);
        $prescription =  clean($conn, $_POST['prescription']);
        $code = $_SESSION['code'];



        $dt1 = new DateTime();
        $reg_date = $dt1->format("Y-m-d");
    
        
        $sqlDoctors = "INSERT INTO doctors(code,nurse_id,patient_id,sickness_name, sickness_desc, prescription,date) VALUES('$code','$nurse_id','$patient_id','$sick_name','$sick_desc','$prescription', '$reg_date')";
        $result = mysqli_query($conn, $sqlDoctors);
         if($result){
             $_SESSION['success'] = "Patient Diagnosed successfully";
             echo "<script>confirm('doctors diagnosis successfully')</script>";
             echo "<script>window.location.href = 'doctors.php'</script>";
         }else{
             echo "Error".mysqli_error($conn);
            $_SESSION['error'] = "Something went wrong";
         }  
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRMS</title>
    <link rel="stylesheet" href="css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="datatable/datatables.min.css"/>
    <link rel="stylesheet" href="css/style.css" />
    <style>
        form{
            border-radius: 20px;
            margin-top: 50px;
            padding: 40px;
            border:2px solid darkred;
        }
    </style>
</head>

    <body>

     <?php  
    
   if(isset($_SESSION['success'])){
        echo "<div id='display-success'><img src='img/correct.png' id = 'successImg' alt='Success' />".$_SESSION['success']."</div>";
        unset($_SESSION['success']);
   }
    
  if(isset($_SESSION['error'])){
        echo "<div id='display-error'><img src='img/error.png' id = 'errorImg' alt='Error' />".$_SESSION['error']."</div>";
        unset($_SESSION['error']);
   }
  
  ?>
        <div class="container">
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
        
            <div id="main">
                <form action="doctor-diagnosis-patient.php" class = "col-sm col-sm-8 offset-2 d-block" method = "POST">
                <h3 class = "text-primary">DOCTORS DIAGNOSIS OF PATIENT</h3>
                    <input type="hidden" value = "<?php echo $_GET['patient_id'] ?>" class = "form-control" name = "patient_id">
                    <input type="hidden" value = "<?php echo $_GET['nurse_id'] ?>" class = "form-control" name = "nurse_id">
                    <div class="form-group">
                        <label for="sick_name">Sickness Name</label>
                        <input type="text" class = "form-control" id = "sick_name" name = "sick_name">
                    </div>

                     <div class="form-group">
                        <label for="sick_desc">Sickness Description</label>
                        <textarea name="sick_desc" id="" cols="30" rows="5" class = "form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="prescription">Prescription</label>
                        <textarea name="prescription" id="prescription" cols="30" rows="5" class = "form-control"></textarea>
                    </div>

                      <div class="form-group">
                       <button class = "btn btn-primary btn-block" name = "doctor" type = "submit">Save</button>
                    </div>

                </form>
            </div>
        </div>
<script src = "js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="datatable/datatables.min.js"></script>
    <script>
        $(document).ready(function(){

            setInterval(() => {
                $("#display-success").hide('slow');
            }, 2000);

             setInterval(() => {
                $("#display-error").hide('slow');
            }, 2000);

            $('#myTable').DataTable();
        });

    </script>
</body>

</html>