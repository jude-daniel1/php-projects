<?php include('include/db.php');  ?>
<?php include('include/tables.php');  ?>
<?php include('include/functions.php');  ?>
<?php
    if(isset($_POST['receptionist'])){
        isset($_POST['code']) ? $code = clean($conn, $_POST['code']) : $code = "";
        isset($_POST['password']) ? $password = md5(clean($conn, $_POST['password'])) : $password = "";
        $sqlLogin = "SELECT * FROM users WHERE code = '$code' AND password = '$password' AND role = 'Receptionist'";
        $result = mysqli_query($conn, $sqlLogin);
         if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
             $_SESSION['code'] = $code;
             $_SESSION['name'] = $row['name'];
             $_SESSION['role'] = "Receptionist";
             $_SESSION['success'] = "Congratulation! Login successfully";
             header("Location:home.php");
         }else{
            $_SESSION['error'] = "Email or password wrong";
         }
    }

    if(isset($_POST['administrator'])){
        isset($_POST['code']) ? $code = clean($conn, $_POST['code']) : $code = "";
        isset($_POST['password']) ? $password = md5(clean($conn, $_POST['password'])) : $password = "";
        $sqlLogin = "SELECT * FROM users WHERE code = '$code' AND password = '$password' AND role = 'Administrator'";
        $result = mysqli_query($conn, $sqlLogin);
         if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
             $_SESSION['code'] = $code;
             $_SESSION['name'] = $row['name'];
             $_SESSION['role'] = "Administrator";
             $_SESSION['success'] = "Congratulation! Login successfully";
             header("Location:administrator.php");
         }else{
            $_SESSION['error'] = "Email or password wrong";
         }
    }

    if(isset($_POST['nurses'])){
        isset($_POST['code']) ? $code = clean($conn, $_POST['code']) : $code = "";
        isset($_POST['password']) ? $password = md5(clean($conn, $_POST['password'])) : $password = "";
        isset($_POST['role']) ? $role = clean($conn, $_POST['role']) : $role = "";
        $sqlLogin = "SELECT * FROM users WHERE code = '$code' AND password = '$password' AND role = 'Nurse'";
        $result = mysqli_query($conn, $sqlLogin);
         if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
             $_SESSION['code'] = $code;
             $_SESSION['name'] = $row['name'];
             $_SESSION['role'] = "Nurse";
             $_SESSION['success'] = "Congratulation! Login successfully";
             header("Location:nurses.php");
         }else{
            $_SESSION['error'] = "Email or password wrong";
         }
    }

    if(isset($_POST['doctors'])){
        isset($_POST['code']) ? $code = clean($conn, $_POST['code']) : $code = "";
        isset($_POST['password']) ? $password = md5(clean($conn, $_POST['password'])) : $password = "";
        $sqlLogin = "SELECT * FROM users WHERE code = '$code' AND password = '$password' AND role = 'Doctor'";
        $result = mysqli_query($conn, $sqlLogin);
         if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
             $_SESSION['code'] = $code;
             $_SESSION['name'] = $row['name'];
             $_SESSION['role'] = "Doctor";
             $_SESSION['success'] = "Congratulation! Login successfully";
             header("Location:doctors.php");
         }else{
            $_SESSION['error'] = "Email or password wrong";
         }
    }

    if(isset($_POST['pharmacist'])){
        isset($_POST['code']) ? $code = clean($conn, $_POST['code']) : $code = "";
        isset($_POST['password']) ? $password = md5(clean($conn, $_POST['password'])) : $password = "";
        isset($_POST['role']) ? $role = clean($conn, $_POST['role']) : $role = "";
        $sqlPharmacist = "SELECT * FROM users WHERE code = '$code' AND password = '$password' AND role = 'Pharmacist'";
        $result = mysqli_query($conn, $sqlPharmacist);
         if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
             $_SESSION['code'] = $code;
             $_SESSION['name'] = $row['name'];
             $_SESSION['role'] = "Pharmacist";
             $_SESSION['success'] = "Congratulation! Login successfully";
             header("Location:pharmacist.php");
         }else{
            $_SESSION['error'] = "Email or password wrong";
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="#">PATIENT RECORD MANAGEMENT SYSTEM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="btn btn-primary btn-sm mt-1 ml-2" href="#">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#receptionist">Receptionist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#nurses" href="#">Nurses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#doctors" href="#">Doctors</a>
                    </li>

                     <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#pharmacist" href="#">Pharmacist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" href="administrator" data-toggle="modal" data-target="#admin">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- display error -->
  <?php  
  
    
   if(isset($_SESSION['error'])){
        echo "<div id='display-error'><img src='img/error.png' id = 'errorImg' alt='Error' />".$_SESSION['error']."</div>";
        unset($_SESSION['error']);
   }
  
  ?>
    <!-- end display-error  -->
    <!-- end nav -->
    <!-- Start carousel -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Modal goes here -->
    <div class="modal fade" id="receptionist" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary font-weight-bold" id="staticBackdropLabel">LOGIN AS RECEPTIONIST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method = "POST">
                        <div class="form-group">
                            <label for="code" class="text-primary">LOGIN ID</label>
                            <input type="text" name="code" class="form-control" id = "code">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-primary">PASSWORD</label>
                            <input type="password" name="password" class="form-control" id = "password">
                        </div>
                        <!-- <div class="form-group">
                            <label for="role" class="text-primary">ROLE</label>
                           <select name="role" id="role" class="form-control">
                               <option value="Receptionist">Receptionist</option>
                               <option value="Nurse">Nurse</option>
                               <option value="Doctor">Doctor</option>
                               <option value="Administrator">Administrator</option>
                               <option value="Pharmacist">Pharmacist</option>
                           </select>
                        </div> -->
                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name = "receptionist">Login</button>
                    </form>
                </div>
            </div>

        </div>
    </div>


    
    <!-- Modal goes here -->
    <div class="modal fade" id="nurses" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary font-weight-bold" id="staticBackdropLabel">LOGIN AS A NURSE</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method = "POST">
                        <div class="form-group">
                            <label for="code" class="text-primary">LOGIN ID</label>
                            <input type="text" name="code" class="form-control" id = "code">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-primary">PASSWORD</label>
                            <input type="password" name="password" class="form-control" id = "password">
                        </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name = "nurses">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal goes here -->
    <div class="modal fade" id="pharmacist" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary font-weight-bold" id="staticBackdropLabel">LOGIN AS PHARMACIST</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method = "POST">
                        <div class="form-group">
                            <label for="code" class="text-primary">LOGIN ID</label>
                            <input type="text" name="code" class="form-control" id = "code">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-primary">PASSWORD</label>
                            <input type="password" name="password" class="form-control" id = "password">
                        </div>
                        <!-- <div class="form-group">
                            <label for="role" class="text-primary">ROLE</label>
                           <select name="role" id="role" class="form-control">
                               <option value="Receptionist">Receptionist</option>
                               <option value="Nurse">Nurse</option>
                               <option value="Doctor">Doctor</option>
                               <option value="Administrator">Administrator</option>
                               <option value="Pharmacist">Pharmacist</option>
                           </select>
                        </div> -->
                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name = "pharmacist">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal goes here -->
    <div class="modal fade" id="doctors" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary font-weight-bold" id="staticBackdropLabel">LOGIN AS A DOCTOR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method = "POST">
                        <div class="form-group">
                            <label for="code" class="text-primary">LOGIN ID</label>
                            <input type="text" name="code" class="form-control" id = "code">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-primary">PASSWORD</label>
                            <input type="password" name="password" class="form-control" id = "password">
                        </div>
                        <!-- <div class="form-group">
                            <label for="role" class="text-primary">ROLE</label>
                           <select name="role" id="role" class="form-control">
                               <option value="Receptionist">Receptionist</option>
                               <option value="Nurse">Nurse</option>
                               <option value="Doctor">Doctor</option>
                               <option value="Administrator">Administrator</option>
                               <option value="Pharmacist">Pharmacist</option>
                           </select>
                        </div> -->
                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name = "doctors">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <!-- Modal goes here -->
    <div class="modal fade" id="admin" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-primary font-weight-bold" id="staticBackdropLabel">LOGIN AS ADMIN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method = "POST">
                        <div class="form-group">
                            <label for="code" class="text-primary">LOGIN ID</label>
                            <input type="text" name="code" class="form-control" id = "code">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-primary">PASSWORD</label>
                            <input type="password" name="password" class="form-control" id = "password">
                        </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name = "administrator">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src = "js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script>
        $(document).ready(function(){
            setInterval(() => {
                $("#display-error").hide('slow');
            }, 2000);
        });
    </script>
</body>

</html>