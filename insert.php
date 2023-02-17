<?php
// connect with database
include 'connection.php';

session_start();
if(isset($_SESSION['userEmail'])){  

// if(isset($_POST['name'])   && isset($_POST['phone'])  && isset($_POST['district'])
// && isset($_POST['pincode']) && isset($_POST['state']) && isset($_POST['country']) )
// {

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $name=$_POST['name'];
    // $email=$_POST['email'];
    $phone=$_POST['phone'];
    $country=$_POST['country'];
    $district=$_POST['district'];
    $pincode=$_POST['pincode'];
    $state=$_POST['state'];
    $avatar=$_FILES['avatar']['name'];

    // print_r($avatar);
    //  exit;
   
    //Server side validation
    $namebool = false;
    $phonebool = false;
    $distbool = false;
    $countrybool = false;
    $pinbool = false;
    $statebool = false;
    $avtarbool = false;
    

    $nameerror = "";
    $phoneerror = "";
    $disterror = "";
    $pinerror = "";
    $stateerror = "";
    $countryerror = "";
    $avtarerror = "";
   
    
    //Validation  for name that will accept alphabetically only.
    if(empty($name)){
        $nameerror= "Enter name";
        $namebool = false;
    }else{
        if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            $nameerror="Name must be enter in alphabet";
            $namebool = false;
        }
        else{
            $namebool = true;
        }
       
    }

   //Phone Input validation
    if(empty($phone)){
        $phoneerror="Enter phone";
        $phonebool = false;
    }
    else{

        if((!is_numeric($phone)) || (strlen($phone) != 10))  {
            $phoneerror=" Phone must be numeric value and only 10 digits!";
            $phonebool = false;
        }  
        else{
            $phonebool = true;
        }
    }
    //Country Input Validation
    if(empty($country)){
        $countryerror="Select  country";
        $countrybool = false;
    }
    else{
      if(!preg_match("/^[a-zA-Z ]*$/",$country)){
        $countryerror="Country name must be enter in alphabet";
        $countrybool = false;
       }else{
       $countrybool = true;
       }
    }
    //District Input validation
    if(empty($district)){
        $disterror="Enter District";
        $distbool = false;
    }
    else{
        if(!preg_match("/^[a-zA-Z ]*$/",$district)){
            $disterror=" District name must be enter in alphabet";
           $distbool = false;
         }
         else{
             $distbool = true;
         }
    }
  //Pin code Input validation
    if(empty($pincode)){
        $pinerror="Enter pin code";
        $pinbool = false;
    }
    else{

        if((!is_numeric($pincode)) || (strlen($pincode) != 6))  {
            $pinerror="Enter pin code must be numeric and  only 6 digit!";
            $pinbool = false;
        }  
        else{
            $pinbool = true;
        }
    }

   //State Input validation
    if(empty($state)){
        $stateerror="Enter state";
        $statebool = false;
    }
    else{
        if(!preg_match("/^[a-zA-Z ]*$/",$state)){
            $stateerror="State name must be enter in alphabet";
            $statebool = false;
        }
        else{
            $statebool = true;
        }
    }
    
   //Image Input validation
    if(empty($avtar)){
        $avtarerror="select Images";
        $avtarbool = false;
    }
    else{
        $avtarbool = true;
    }

   
  
    

  //check condition if all the validation are true then it will insert record through sql language.
  
    if($namebool == true && $phonebool == true && $countrybool == true && $distbool == true && $pinbool == true && $statebool == true &&  $avtarbool = true){

       $id = 0;
       $email = $_SESSION['userEmail'];
       $sql = "SELECT ID FROM user WHERE Email='$email'";
       $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
       $id = $row["ID"];
        } 
      else
      {
      echo "No matching record found.";
      }

     $query ="INSERT INTO contacts (Name,Phone,District,Pin_code,State,Country,Avatar,User_id) VALUES ('$name','$phone','$district','$pincode','$state','$country','$avatar','$id')";
     $result = mysqli_query($conn,$query);

//    echo  $row['$avatar'];

     if($result){
        // echo "record inserted <br>";
       echo '<script>alert("Add new contact successfully!");location.href="Dashboard.php"</script>';

     //    header("Location:Dashboard.php");
      
     }else{
        // echo "failed";
        echo "<script type='text/javascript'>alert('Insertion failed!')</script>";
      }
    
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insertion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <style type="text/css">
        h4 {
            color: #0e59a5;
            text-align: center;
            margin-right:5vw;
            
        }

        label {
            color: #0e59a5;

        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg " style="background-color:#0e59a5;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="color:white">Address Book</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
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
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="Register.php" style="padding-right:2vw;color:white">
                            <?php echo $_SESSION['userEmail']?>
                        </a>
                    </li>
                    <button class="btn btn-primary">
                        <span class="navbar-text"><a href="Logout.php" style="text-decoration: none;color:white">Logout</a></span>
                    </button>
                </ul>
            </div>
        </div>
    </nav>
    <form class="container" style="margin-left:35vw;" action="" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <h4>Add New Record</h4>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" id="name"placeholder="Enter name" class="form-control" style="width:75%" />
                    <span style="color:red">
                        <?php if(isset($nameerror)){
                        echo $nameerror;
                        }?>
                    </span>
                </div>
               
                <div class="form-group">
                    <label>Phone</label>
                    <input type="number" name="phone" id="phone" placeholder="Enter phone" class="form-control"
                        style="width:75%" />
                    <span style="color:red">
                        <?php if(isset($phoneerror)){
                        echo $phoneerror;
                        }?>
                    </span>
                </div>
                <div class="form-group">
                    <label>District</label>
                    <input type="text" name="district" id="district" placeholder="Enter district" class="form-control"
                        style="width:75%" />
                    <span style="color:red">
                        <?php if(isset($disterror)){
                        echo $disterror;
                        }?>
                    </span>
                </div>
                <div class="form-group">
                    <label>Pin Code</label>
                    <input type="number" name="pincode" id="pincode" placeholder="Enter Pin code" class="form-control"
                        style="width:75%" />
                    <span style="color:red">
                        <?php if(isset($pinerror)){
                        echo $pinerror;
                        }?>
                    </span>
                </div>
                <div class="form-group">
                    <label>State</label>
                    <input type="text" name="state" id="state" placeholder="Enter State" class="form-control" style="width:75%" />
                    <span style="color:red">
                        <?php if(isset($stateerror)){
                        echo $stateerror;
                        }?>
                    </span>
                </div>
                <div class="form-group">
                    <label>Select country</label>
                    <select class="form-control" id="country" name="country" style="width:75%">
                        <option value=""></option>
                        <option value="India">India</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Srilanka">Srilanka</option>
                    </select>
                    <span style="color:red">
                        <?php if(isset($countryerror)){
                        echo $countryerror;
                        }?>
                    </span>
                </div>

                <div class="form-group">
                    <label>Select Image File</label>
                    <input type="file" name="avatar" id="avatar" class="form-control" style="width:75%" />
                    <span style="color:red">
                        <?php if(isset($avtarerror)){
                        echo $avtarerror;
                        }?>
                    </span>
                    
                </div>
                <br>
                <button class="btn btn-primary" type="submit" style="margin-left:9vw;">Submit</button>
                <button class="btn btn-danger"><a href="Dashboard.php" style="text-decoration: none;color:white;">Cancel</a></button>
            </div>
        </div>
    </form>
</body>
</html>
<?php
}
else{
    header("Location:Login.php");
}
?>
