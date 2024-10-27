<?php
include_once 'database.php';
session_start();
if (isset($_SESSION["email"])) {
    session_destroy();
}

$ref = @$_GET['q'];
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = stripslashes($email);
    $email = addslashes($email);
    $password = stripslashes($password);
    $password = addslashes($password);

    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);

    $result = mysqli_query($con, "SELECT email FROM admin WHERE email = '$email' and password = '$password'") or die('Error');
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        session_start();
        if (isset($_SESSION['email'])) {
            session_unset();
        }
        $_SESSION["name"] = 'Admin';
        $_SESSION["key"] = 'admin';
        $_SESSION["email"] = $email;
        header("location:dashboard.php?q=0");
    } else {
        echo "<center><h3><script>alert('Sorry.. Wrong Username (or) Password');</script></h3></center>";
        header("refresh:0;url=admin.php");
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login | Online Quiz System</title>
    <link rel="stylesheet" href="scripts/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="scripts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/fieflies.css">
    <style type="text/css">
        /* body {
            width: 100%;
            background: url(image/book.png);
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        } */
        .text-container h4{
  margin: 0;
  font-size: 50px;
  color: rgba(225,225,225, .01);
  background-image: url("https://images.unsplash.com/photo-1499195333224-3ce974eecb47?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=2cf549433129d4227d1879347b9e78ce&auto=format&fit=crop&w=1248&q=80");
  background-repeat: repeat;
  -webkit-background-clip:text;
  animation: animate 15s ease-in-out infinite;
  text-align: center;
  text-transform: uppercase;
  font-weight: 900;
}
    </style>
</head>

<body>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
<div class="firefly"></div>
    <div class="text-container">
        <section class="login first grey">
            <div class="container">
                <div class="box-wrapper">
                    <div class="box box-border">
                        <div class="box-body">
                            <center>
                                <h5 style="font-family: Noto Sans;font-size: 25px;">Login to </h5>
                                <h4 style="font-family: Noto Sans;">Admin Page</h4>
                            </center><br>
                            <form method="post" action="admin.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Enter Your Email Id:</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="fw">Enter Your Password:
                                        <a href="javascript:void(0)" class="pull-right">Forgot Password?</a>
                                    </label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-primary btn-block" name="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="js/jquery.js"></script>
    <script src="scripts/bootstrap/bootstrap.min.js"></script>
</body>

</html>