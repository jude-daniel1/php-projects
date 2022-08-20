<?php include('include/db.php');  ?>
<?php include('include/tables.php');  ?>
<?php include('include/functions.php');  ?>
<?php
    if(isset($_POST['register'])){
        isset($_POST['name']) ? $name = clean($conn, $_POST['name']) : $name = "";
        isset($_POST['email']) ? $email = clean($conn, $_POST['email']) : $email = "";
        isset($_POST['phone']) ? $phone = clean($conn, $_POST['phone']) : $phone = "";
        isset($_POST['role']) ? $role = clean($conn, $_POST['role']) : $role = "";
        isset($_POST['password']) ? $password = clean($conn, $_POST['password']) : $password = "";
        

        $dt1 = new DateTime();
        $date = $dt1->format("Y-m-d");
        $password = md5($password);
        $status = 0;

        $first = ["a","b", "c","d","e","f","g","h","i","j","k","l","m","N","O","P","Q","R","R","T","U","V","W","X","Y","Z"];
        $second = ["A","B", "C","D","E","F","G","H","I","J","K","L","M","n","o","p","q","r","s","t","u","v","w","x","y","z"];
        $random = random_int(1000, 9999);
        $code = $first[random_int(0,27)].$random.$second[random_int(0,27)];
        
        $sqlUsers = "INSERT INTO users(code,name,email,phone,password,role,status,date) VALUES('$code','$name','$email','$phone','$password','$role','$status','$date')";
        $result = mysqli_query($conn, $sqlUsers);
         if($result){
             $_SESSION['success'] = "User created successfully";
             echo "<script>alert('Users account created successfull')</script>";
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
            <form action=""> <button type = "submit" class = "btn btn-primary-outline"><a href="logout.php" style = "font-weight:bold;color:black;">Logout</a></button></form>
          </div>


          <div class="row">
              
              <div class="col-4 mt-4 text-center mybutton">
                    <div class = "card text-center p-2" style = "cursor:pointer">
                        <h6 class = "mybutton" style = "cursor:pointer"><a href = "view-patients.php" style = "text-decoration:none; color:black;">View All Patients</a></h6>
                    </div>
              </div>
              <div class="col-4 mt-4 text-center mybutton" style = "cursor:pointer">
                    <div class = "card text-center p-2" style = "cursor:pointer">
                        <h6 class = "mybutton"><a href = "view-nurse-examined.php" style = "text-decoration:none; color:black;">View Examined Patients</a></h6>
                    </div>
              </div>

              <div class="col-4 mt-4 text-center">
                    <div class = "card text-center p-2 mybutton" style = "cursor:pointer">
                       <h6 class = "mybutton"><a href = "view-doctor-diagnosis.php" style = "text-decoration:none; color:black;">View Diagnosed Patient</a></h6>
                    </div>
              </div>
          </div>

           <div class="row">
              

               <div class="col-4 mt-4 text-center mybutton">
                    <div class = "card text-center p-2" style = "cursor:pointer">
                        <h6 class = "mybutton" style = "cursor:pointer"><a href = "view-pharmacist-administering.php"  style = "text-decoration:none; color:black;">View Administered Info</a></h6>
                    </div>
              </div>

              <div class="col-4 mt-4 text-center mybutton" style = "cursor:pointer">
                    <div class = "card text-center p-2" style = "cursor:pointer">
                        <h6 class = "mybutton"><a href = "view-patients-generate.php" style = "text-decoration:none; color:black;">Generate Report</a></h6>
                    </div>
              </div>

              <div class="col-4 mt-4 text-center">
                    <div class = "card text-center p-2 mybutton" style = "cursor:pointer">
                       <h6 class = "mybutton"><a href = "card.php" style =  "cursor:pointer text-decoration:none; color:black;" data-toggle="modal" data-target="#register">Add Hospital Staffs</a></h6>
                    </div>
              </div>

          </div>

           <div class="row">
              

               <div class="col-4 mt-4 text-center mybutton">
                    <div class = "card text-center p-2" style = "cursor:pointer">
                        <h6 class = "mybutton" style = "cursor:pointer"><a href = "view-staff-info.php"  style = "text-decoration:none; color:black;">View Staff Info</a></h6>
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
                    <form action="administrator.php" method = "POST">
                        <div class="form-group">
                            <label for="name" class="text-primary">Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" id = "name" required>
                        </div>

                         <div class="form-group">
                            <label for="email" class="text-primary">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" id = "email" required>
                        </div>

                         <div class="form-group">
                            <label for="phone" class="text-primary">Phone</label>
                            <input type="text" name="phone" class="form-control form-control-sm" id = "phone" max = "11" min = "11" required>
                        </div>

                        <div class = "form-group">
                            <label for="role" class="text-primary">ROLE</label>
                            <select name="role" id="role" class="form-control">
                                <option value="Receptionist">Receptionist</option>
                                <option value="Nurse">Nurse</option>
                                <option value="Doctor">Doctor</option>
                                <option value="Administrator">Administrator</option>
                                <option value="Pharmacist">Pharmacist</option>
                            </select>
                        </div>

                     <div class="form-group">
                            <label for="password" class="text-primary">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" id = "password" required>
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