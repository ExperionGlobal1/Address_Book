<?php

include 'connection.php';

session_start();

if(isset($_SESSION['userEmail'])){

    // echo $_SESSION['userEmail'];
    

    // if(isset($_COOKIE["user"])){
    //     echo "cookies are set <br>";
    //     echo $_COOKIE["email"];
    // }
    // echo $_COOKIE["Raj"];
    // setcookie("email","",time() - 60);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

    <style type="text/css">
        h1 {
            color: #0e59a5;
            text-align: center;
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
    <br>
    <div class="container">
        <div class="col-md-6">
            <button class="btn btn-primary" data-toggle="modal"><a href="insert.php" style="text-decoration: none;color:white">+Add Record</a></button>
        </div>
        <div class="container" style="padding-top:20px">
            <table class="table table-success table-striped text-center" id="tableRecord">
                <thead>
                    <tr>
                        <th scope="col">S.No</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">District</th>
                        <th scope="col">Pin code</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>

                <tbody>

                <?php
               
                $id = 0;
                $email=$_SESSION['userEmail'];
                
                $sql ="SELECT ID FROM user WHERE Email ='$email'";
                $result =$conn->query($sql);
                if ($result->num_rows > 0)
                {
                  $row = $result->fetch_assoc();
                  $id = $row["ID"];
                 
                }
                
                else {
                  echo "0 results";
                }

                $sql = "SELECT ID,Avatar,Name,Phone,District,Pin_code,State,Country FROM contacts WHERE User_id=$id ";
                $result = $conn->query($sql);
                $sn=1;
                if(mysqli_num_rows($result) > 0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td>
                            <!-- <?php echo $row["ID"];?> -->
                            <?php echo $sn++ ;?>
                        </td>
                            <?php echo "<td><img src='Images/" . $row["Avatar"] . "' height='50' width='50' style='border-radius:50px'></td>" ;?>
                        <td>
                            <?php echo $row["Name"];?>
                        </td>
                        
                        <td>
                            <?php echo $row["Phone"];?>
                        </td>
                        <td>
                            <?php echo $row["District"];?>
                        </td>
                        <td>
                            <?php echo $row["Pin_code"];?>
                        </td>
                        <td>
                            <?php echo $row["State"];?>
                        </td>
                        <td>
                            <?php echo $row["Country"];?>
                        </td>
                            <?php
                            echo "<td><a style='margin-right:10px;text-decoration:none;'  href='update.php?id=" . $row['ID'] ."'>
                            <button class='btn btn-primary'>
                            Edit
                            </button>
                            </a>
                           <a style='text-decoration:none;' href='delete.php?id=" . $row['ID'] . "' onClick='return confirm(\"Are you sure you want to delete?\")'>
                           <button  class='btn btn-danger'>
                           Delete
                           </button>
                           </a></td>";
                            ?>
                    </tr>
                    <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>

<?php
}else{
    header("Location:index.php");
}
?>


