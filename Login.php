<?php
session_start();
if(isset($_SESSION['userEmail'])){
    header("Location:Dashboard.php");
}else{

include 'connection.php';

if(isset($_POST['email']) && isset($_POST['password'])){
    $email =$_POST['email'];
    $password =$_POST['password'];

  //Server side validation
    $emailbool = false;
    $passbool = false;

    $emailerror = "";
    $passworderror = "";

  //Email validation
    if(empty($email)){
      $emailerror="Enter email";
      $emailbool = false;
  }
  else{
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
          
          $emailerror="Email is not correct";
          $emailbool = false;
      }
      else{
          $emailbool = true;
      }
  }
    //Password validation
    if(empty($password)){
        $passworderror= "Enter password";
        $passbool = false;
    }else{     
     $passbool = true;
     }
if($emailbool == true && $passbool == true){       

 $query ="SELECT * FROM user WHERE Email ='$email' AND Password='$password' ";
 $result = mysqli_query($conn, $query);
 $rows = mysqli_fetch_array($result);
 $count = mysqli_num_rows($result);
 if($count ==1){
    // echo "Login successfully";
    echo '<script>alert("Login successfully!");location.href="Dashboard.php"</script>';
    $_SESSION['userEmail'] = $email;
    
    // header("Location:Dashboard.php");

    // setcookie("email",$email,time() + (1 * 8640),"/");
    // setcookie("Raj","This is me Raj kishore",time() + (1 * 8640),"/");
 }else{
    // echo "failed";
    echo "<script type='text/javascript'>alert('Login failed!')</script>";
 }
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
     
    <style type="text/css">
         h4 {
            color: #0e59a5;
            text-align: center;
            margin-left:-12vw;
        }

        label {
            color: #0e59a5;

        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg " style="background-color:#0e59a5;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php" style="color:white" ><img src="Images/contactlogo.png" alt="#" height="40px" width="40px" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#" style="color:white">Contact Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#" style="color:white">Abouts Us</a>
        </li>
      </ul>
      <button class="btn btn-primary">
      <span class="navbar-text"><a href="Register.php" style="text-decoration: none;color:white">Signup</a></span>
      </button>
    </div>
  </div>
</nav>
   
    <form class="container"  style="margin-left:32vw;"   action="" method="POST" enctype="multipart/form-data" >
        <div class="row">
            <div class="col-md-6">
                <h4>Login Here!</h4>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Enter email" class="form-control" style="width:75%" />
                    <span style="color:red"><?php if(isset($emailerror)){
                        echo $emailerror;
                        }?></span>
                </div>
                
                <div class="form-group">
                    <label>Password </label>
                    <input type="password" name="password" placeholder="Enter password" class="form-control" style="width:75%" />
                    <span style="color:red">
                        <?php 
                        if(isset($passworderror)){
                        echo $passworderror;
                        }
                        ?>
                    </span>
                </div>
                <br>
                <button class="btn btn-primary" type="submit" style="margin-left:9vw;">SignIn</button>
                <button class="btn btn-danger"><a href="index.php" style="text-decoration: none;color:white">Cancel</a></button>

            </div>

        </div>


    </form>
</body>
</html>
<?php
}
?>