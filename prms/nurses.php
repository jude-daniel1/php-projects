<?php include('include/db.php');  ?>
<?php include('include/tables.php');  ?>
<?php include('include/functions.php');  ?>
<?php include('include/nurse-restrict.php');  ?>

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
  

  <div class="container-fluid" id = "imgc">
      <div class="container">
          <div class="row d-flex justify-content-between" >
             <h6 class = "font-weight-bold mt-2"> <?php if(isset($_SESSION['name'])) echo "Welcome: ".$_SESSION['role']." ".$_SESSION['name']  ?></h6>
            <a href="logout.php" style = "font-weight:bold;text-decoration:none;">Logout</a>
          </div>


          <div class="row">
              
              <div class="col-4 mt-4 text-center mybutton">
                    <div class = "card text-center p-2" style = "cursor:pointer">
                        <a href = "view-nurse-patients.php" style = "text-decoration:none; color:black;cursor:pointer">View All Patients Record</a></h6>
                    </div>
              </div>
              <div class="col-4 mt-4 text-center mybutton" style = "cursor:pointer">
                    <div class = "card text-center p-2" style = "cursor:pointer">
                        <a href = "view-nurse-examined.php" style = "text-decoration:none; color:black;cursor:pointer">View Examined Patients Record</a></h6>
                    </div>
              </div>

          </div>
      </div>
    
  </div>


    
    <!-- Modal goes here -->
    <div class="modal fade" id="register" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary font-weight-bold" id="staticBackdropLabel">PATIENT REGISTRATION</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="home.php" method = "POST">
                        <div class="form-group">
                            <label for="name" class="text-primary">Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" id = "name" required>
                        </div>

                         <div class="form-group">
                            <label for="email" class="text-primary">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" id = "email" required>
                        </div>
                        <div class="form-group">
                            <label for="dob" class="text-primary">DOB</label>
                            <input type="date" name="dob" class="form-control form-control-sm" id = "dob" required>
                        </div>

                         <div class="form-group">
                            <label for="phone" class="text-primary">Phone</label>
                            <input type="text" name="phone" class="form-control form-control-sm" id = "phone" max = "11" min = "11" required>
                        </div>

                        <div class="form-group">
                            <label for="address" class="text-primary">Address</label>
                            <input type="text" name="address" class="form-control form-control-sm " id = "address" required> 
                        </div>

                        <div class="form-group">
                            <label for="state" class="text-primary">State</label>
                            <input type="text" name="state" class="form-control form-control-sm" id = "state" required> 
                        </div>

                         <div class="form-group">
                            <label for="lga" class="text-primary">Local Governement Area</label>
                            <input type="text" name="lga" class="form-control form-control-sm" id = "lga" required > 
                        </div>

                        <div class="form-group">
                            <label for="marital_status" class="text-primary">Maritial Status</label>
                            <select name="marital_status" id="marital_status" class = "form-control form-control-sm" required>
                                <option value="single">Single</option> 
                                <option value="married">Married</option> 
                                <option value="divorce">Divorce</option> 
                            </select>
                            
                        </div>

                         <div class="form-group">
                            <label for="profession" class="text-primary">Profession</label>
                           <select name="profession" id="profession" class = "form-control form-control-sm" required>
                                <option value="employed">Employed</option> 
                                <option value="self_employed">Selef employed</option> 
                                <option value="unemployed">Unemployed</option> 
                                <option value="business">Business</option> 
                                <option value="student">Student</option> 
                          </select>
                        </div>


                         <div class="form-group">
                            <label for="next_of_kin" class="text-primary" require>Next of kin</label>
                            <input type="text" name="next_of_kin" class="form-control form-control-sm" id = "next_of_kin" required> 
                        </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name = "register">Register</button>
                    </form>
                </div>
            </div>
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