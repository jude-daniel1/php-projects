<?php include('include/db.php');  ?>
<?php include('include/tables.php');  ?>
<?php include('include/functions.php');  ?>
<?php
    if(isset($_POST['update'])){
        $code =  clean($conn, $_POST['code']);
        $name =  clean($conn, $_POST['name']);
        $email =  clean($conn, $_POST['email']);
        $phone =  clean($conn, $_POST['phone']);
        $password =  md5(clean($conn, $_POST['password']));



        $dt1 = new DateTime();
        $reg_date = $dt1->format("Y-m-d");
    
        
        $sqlUpdate = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', password = '$password' WHERE code = '$code'";
        $result = mysqli_query($conn, $sqlUpdate);
         if($result){
             $_SESSION['success'] = "Staff Info Updated Successfully";
             echo "<script>confirm('Staff Info Updated Successfully')</script>";
             echo "<script>window.location.href = 'view-staff-info.php'</script>";
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
             <?PHP
                        if (isset($_GET['code'])) {
                            $code = clean($conn, $_GET['code']);
                            $sql = "SELECT * FROM users WHERE code = '$code'";
                            $result = mysqli_query($conn, $sql);
           
                            $rows = mysqli_fetch_assoc($result);
                        }

                    ?>
            <div id="main">
                <form action="" class = "col-sm col-sm-8 offset-2 d-block" method = "POST">
                <h3 class = "text-primary">UPDATE STAFF INFORMATION</h3>
                    <input type="text" value = "<?php echo $_GET['code'] ?>" class = "form-control" name = "code">
                        <div class="form-group">
                            <label for="name" class="text-primary">Name</label>
                            <input type="text" name="name" class="form-control form-control-sm" id = "name" required  value = "<?php echo $rows['name'] ?>">
                        </div>

                         <div class="form-group">
                            <label for="email" class="text-primary">Email</label>
                            <input type="email" name="email" class="form-control form-control-sm" id = "email" required value = "<?php echo $rows['email'] ?>">
                        </div>

                         <div class="form-group">
                            <label for="phone" class="text-primary">Phone</label>
                            <input type="text" name="phone" class="form-control form-control-sm" id = "phone" max = "11" min = "11" required value = "<?php echo $rows['phone'] ?>">
                        </div>

                     <div class="form-group">
                            <label for="password" class="text-primary">Password</label>
                            <input type="password" name="password" class="form-control form-control-sm" id = "password" required value = "<?php echo md5($rows['password']) ?>">
                     </div>

                  <div class="form-group">
                       <button class = "btn btn-primary btn-block" name = "update" type = "submit">Update</button>
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