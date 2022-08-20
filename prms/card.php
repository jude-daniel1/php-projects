<?php include('include/db.php');  ?>
<?php include('include/tables.php');  ?>
<?php include('include/functions.php');  ?>
<?php include('include/receiptionist-restrict.php');  ?>

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
    <div class="container mt-4">
       <div class="row justify-content-center align-item-center">
           <div class="col-6">
               <?php
            isset($_GET['patient_id']) ? $patient_id = trim($_GET['patient_id']) : $patient_id = "";
            $sql = "SELECT * FROM patients WHERE patient_id = '$patient_id'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_assoc($result);   
            ?>
                <div class = "card"  id = "printable" style ="background-color:green">
                    <div class = "card-header">
                        <h3>FEDERAL MEDICAL CENTER CARD</h3>
                    </div>
                    <div class="card-body">
                        <div class = "d-flex justify-content-between py-3" style = "border-bottom:solid black 1px;">
                            <h5>Name:</h5>
                            <h5><?php echo $rows['name'] ?></h5>
                        </div>
                        <div class = "d-flex justify-content-between py-3" style = "border-bottom:solid black 1px;">
                            <h5>Email:</h5>
                            <h5><?php echo $rows['email'] ?></h5>
                        </div>
                        <div class = "d-flex justify-content-between py-3" style = "border-bottom:solid black 1px;">
                            <h5>Patient_id:</h5>
                            <h5><?php echo $rows['patient_id'] ?></h5>
                        </div>
                        <div class = "d-flex justify-content-between py-3" style = "border-bottom:solid black 1px;">
                            <h5>DOB:</h5>
                            <h5><?php echo $rows['dob'] ?></h5>
                        </div>
                        <div class = "d-flex justify-content-between py-3" style = "border-bottom:solid black 1px;">
                            <h5>Phone:</h5>
                            <h5><?php echo $rows['phone'] ?></h5>
                        </div>
                         <div class = "d-flex justify-content-between py-3" style = "border-bottom:solid black 1px;">
                            <h5>State:</h5>
                            <h5><?php echo $rows['state'] ?></h5>
                        </div>
                         <div class = "d-flex justify-content-between py-3" style = "border-bottom:solid black 1px;">
                            <h5>LGA:</h5>
                            <h5><?php echo $rows['lga'] ?></h5>
                        </div>
                         
                    </div>
                </div> 
           </div>
       </div>
      <div class = "row justify-content-center mt-4"> <div class="row"><button  id = "button" class="btn btn-success btn-block" type = "submit"> Print Card </button></div></div>
    </div>
    <script src = "js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="datatable/datatables.min.js"></script>
    <script src = "js/jQuery.print.js" type = "text/javascript"></script>
    <script src = "js/tableHTMLExport.js"></script>
    <script>
       $(document).ready(function(){
         $("#button").click(function(){
        $("#printable").print({
                globalStyles: true,
                mediaPrint: false,
                stylesheet: null,
                noPrintSelector: ".no-print",
                iframe: true,
                append: null,
                prepend: null,
                manuallyCopyFormValues: true,
                deferred: $.Deferred(),
                timeout: 750,
                title: null,
                doctype: '<!doctype html>'
                });
         });
       });
    </script>
</body>

</html>