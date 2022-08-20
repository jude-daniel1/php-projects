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
    <?php
        isset($_GET['patient_id']) ? $patient_id = trim($_GET['patient_id']) : $patient_id = "";
        $sql = "SELECT * FROM patients LEFT JOIN doctors ON doctors.patient_id=patients.patient_id LEFT JOIN pharmacist ON pharmacist.patient_id = patients.patient_id WHERE patients.patient_id ='$patient_id'";
         $result = mysqli_query($conn, $sql);
         $rows = mysqli_fetch_assoc($result);   
    ?>
    <div class="container mt-4" style = "border:1px solid black;" id = "printable">
        <img src="img/fmc.png" alt="">
        <div class="row" style = "border: 3px solid black">
            <div class="col-3">
                <h4 class = "font-weight-bold text-center">MEDICAL&nbsp;RECORDS</h3>
            </div>
             <div class="col-6">
                <h4 class = "font-weight-bold text-center">REPORT&nbsp;OF&nbsp;MEDICAL&nbsp;HISTORY</h3>
            </div>
             <div class="col-3">
                <span class = "font-weight-bold text-center">DATE&nbsp;OF&nbsp;EXAM</span>
                 <span style = "font-weight:400">(<?php echo $rows['reg_date']?>)</span>
            </div>
        </div>
         <div class="row" style = "border: 1px solid black;">
            <div class="col-6 text-center" style = "border-right:1px solid black">
                <p style = "font-weight:bold;">NAME OF PATIENT (surname, firstname)</p>
                <p style = "font-weight:400"><?php echo $rows['name'] ?></p>
            </div>
             <div class="col-3 text-center" style = "border-right:1px solid black">
                <p class = "" style = "font-weight:bold;">PATIENT ID</p>
                <p style = "font-weight:400"><?php echo $rows['patient_id'] ?></p>
            </div>
             <div class="col-3 text-center">
                <p class = "" style = "font-weight:bold;">PATIENT EMAIL</hp>
                <p style = "font-weight:400"><?php echo $rows['name'] ?></p>
            </div>
        </div>
        <div class="row" style = "border: 1px solid black;">
            <div class="col-6 text-center" style = "border-right:1px solid black">
                <p style = "font-weight:bold;">HOME STREET ADDRESS (Street, City)</p>
                <p style = "font-weight:400"><?php echo $rows['address'] ?></p>
            </div>
             <div class="col-2 text-center" style = "border-right:1px solid black">
                <p class = "" style = "font-weight:bold;">STATE</p>
                 <p style = "font-weight:400"><?php echo $rows['state'] ?></p>
            </div>
            <div class="col-2 text-center" style = "border-right:1px solid black">
                <p class = "" style = "font-weight:bold;">LGA</p>
                 <p style = "font-weight:400"><?php echo $rows['lga'] ?></p>
            </div>
            <div class="col-2 text-center">
                <p class = "" style = "font-weight:bold;">PHONE</p>
                 <p style = "font-weight:400"><?php echo $rows['phone'] ?></p>
            </div>
        </div>

         <div class="row" style = "border: 1px solid black;">
            <div class="col-3 text-center" style = "border-right:1px solid black">
                <p style = "font-weight:bold;">MARITAL&nbsp;STATUS</p>
                 <p style = "font-weight:400"><?php echo $rows['marital_status'] ?></p>
            </div>
             <div class="col-3 text-center" style = "border-right:1px solid black">
                <p class = "" style = "font-weight:bold;">PROFESSION</p>
                 <p style = "font-weight:400"><?php echo $rows['profession'] ?></p>
            </div>
            <div class="col-6 text-center">
                <p class = "" style = "font-weight:bold;">NEXT OF KIN</p>
                 <p style = "font-weight:400"><?php  echo $rows['next_of_kin'] ?></p>
            </div>   
        </div>
        <div class="row">
            <p style = "font-weight:bold;margin-left:auto;margin-right:auto;"> DOCTORS DIANOSIS</p>
        </div>
        <div class="row" style = "border: 1px solid black;">
            <div class="col-4 text-center" style = "border-right:1px solid black">
                <p style = "font-weight:bold;">SICKNESS&nbsp;NAME</p>
                 <p style = "font-weight:400"><?php echo $rows['sickness_name'] ?></p>
            </div>
             <div class="col-8 text-center">
                <p class = "" style = "font-weight:bold;">SICKNESS PRESCRIPTION</p>
                 <p style = "font-weight:400"><?php echo $rows['sickness_desc'] ?></p>
            </div>
               
        </div>

         <div class="row" style = "border: 1px solid black;">
             <div class="col-12 text-center">
                <p class = "" style = "font-weight:bold;">SICKNESS DESCRIPTION</p>
                 <p style = "font-weight:400"><?php echo $rows['prescription'] ?></p>
            </div>
               
        </div>
        <div class="row text-center">
          <p style = "font-weight:bold;margin-left:auto;margin-right:auto;"> DRUGS ADMINISTERED BY PHARMACIST</p>
        </div>
        <div class="row" style = "border: 1px solid black;">
            <div class="col-4 text-center" style = "border-right:1px solid black">
                <p style = "font-weight:bold;">DRUG NAME (S)</p>
                 <p style = "font-weight:400"><?php echo $rows['drug_names'] ?></p>
            </div>
             <div class="col-8 text-center">
                <p class = "" style = "font-weight:bold;">DRUGS DESCRIPTION</p>
                 <p style = "font-weight:400"><?php echo $rows['drug_desc']  ?></p>
            </div>
               
        </div>
    </div>
    
    <div class="container">
          <div class="row mt-3"><button  id = "button" class="btn btn-success btn-block" type = "submit"> Print Report </button></div>
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