<?php include('include/db.php');  ?>
<?php include('include/tables.php');  ?>
<?php include('include/functions.php');  ?>
<?php
    if(isset($_POST['register'])){
        $patient_id =  clean($conn, $_POST['patient_id']);
        $temperature =  clean($conn, $_POST['temperature']);
        $pulse =  clean($conn, $_POST['pulse']);
        $rr =  clean($conn, $_POST['rr']);
        $bp =  clean($conn, $_POST['bp']);
        $osl =  clean($conn, $_POST['osl']);
        $weight =  clean($conn, $_POST['weight']);
        $height =  clean($conn, $_POST['height']);
        $bmi = $weight * $height;
        $code = $_SESSION['code'];



        $dt1 = new DateTime();
        $reg_date = $dt1->format("Y-m-d");
    
        
        $sqlNurses = "INSERT INTO nurses(code,patient_id,temperature,pulse_rate,respiratory_rate,blood_pressure,osl, weight,height, bmi,date) VALUES('$code','$patient_id','$temperature','$pulse','$rr','$bp', '$osl', '$weight', '$height', '$bmi', '$reg_date')";
        $result = mysqli_query($conn, $sqlNurses);
         if($result){
             $_SESSION['success'] = "Patient examined successfully";
             echo "<script>alert('Patient examined successfully')</script>";
             echo "<script>window.location.href = 'nurses.php';</script>";
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

        <?php     

            if(!isset($_GET['patient_id'])){
                // header("Location:index.php");
            }


        ?>
        
            <div id="main">
                <form action="nurse-examine-patient.php" class = "col-sm col-sm-8 offset-2 d-block" method = "POST">
                <h3 class = "text-primary">NURSE GENERAL PATIENT TEST</h3>
                    
                    <div class="form-group">
                        <label for="temperature">Temperature(deg. celsus)</label>
                        <input type="text" class = "form-control" id = "temperature" name = "temperature">
                    </div>

                     <div class="form-group">
                        <input type="hidden" class = "form-control" id = "patient_id" name = "patient_id" value="<?php echo $_GET['patient_id'] ?>">
                    </div>

                     <div class="form-group">
                        <label for="pulse">Pulse Rate(b/m)</label>
                        <input type="text" class = "form-control" id = "pulse" name = "pulse">
                    </div>

                     <div class="form-group">
                        <label for="rr">Respiratory Rate(c/m)</label>
                        <input type="text" class = "form-control" id = "rr" name = "rr">
                    </div>

                     <div class="form-group">
                        <label for="bp">Blood Pressure(mmHg)</label>
                        <input type="text" class = "form-control" id = "bp" name ="bp">
                    </div>

                     <div class="form-group">
                        <label for="osl">Oxygen Saturation Level(%)</label>
                        <input type="text" class = "form-control" id = "osl" name = "osl">
                    </div>

                     <div class="form-group">
                        <label for="weight">Weight(kg)</label>
                        <input type="text" class = "form-control" id = "weight" name = "weight">
                    </div>

                     <div class="form-group">
                        <label for="height">Height(meters)</label>
                        <input type="text" class = "form-control" id = "height" name = "height">
                    </div>

                    <!-- <div class="form-group">
                        <label for="height">BMI(meters square)</label>
                        <input type="text" class = "form-control" id = "height" name = "height">
                    </div> -->

                    <div class="form-group">
                       <button class = "btn btn-primary btn-block" name = "register" type = "submit">Save</button>
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