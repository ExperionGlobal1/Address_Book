<!DOCTYPE html>
<html>
<head>
  <title>Address Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" 
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      /* background-color: #f2f2f2; */
      margin:0;
      padding:0;
      background-image: url('./Images/img.jpg');
      background-size:100%;
      background-repeat:no-repeat;
      background-position:center;

    }

    header {
      background-color: #473C33;
      color: white;
      padding: 20px;
      text-align: center;
    }

    header h1 {
      margin: 0;
      /* background: yellowgreen; */
    }

    nav {
      background-color:#AD8E70;
      color: white;
      display: flex;
      justify-content: flex-end;
      padding: 20px;
    }

    nav a {
      color:white;
      text-decoration: none;
      padding: 0 5px 0 5px;
    }

    .container {
      /* max-width: 960px; */
      margin: 0 auto;
      text-align: center;
      padding: 50px 0;
      /* background-color:#0e59a5; */
      
    }

    .container h2 {
      font-size: 36px;
      margin-bottom: 20px;
      color: white;
    }

    .container p {
      font-size: 18px;
      line-height: 2;
      color:white;
    }
  </style>
</head>
<body>
  <header>
    <h1>Address Book</h1>
  </header>
  <nav>
    <button class="btn btn-primary" style="border-radius:10px;margin-right:10px" >
    <a href="Register.php">Signup</a>
    </button>
    <button class="btn btn-primary" style="border-radius:10px">
    <a href="Login.php">Login</a>
    </button>
  </nav>

  <div class="container">
    <h2>Welcome To Address Book</h2>
    <p>An address book is a database that stores names, addresses and other contact information for a computer user.<p>
  </div>
</body>
</html>
