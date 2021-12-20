<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: ../");
    exit;
}
require_once "../config.php";

$username = $password = "";

$username_err = $password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){ //check for request
  if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))){
    $username_err= "Username or password can't be blank";
  }else{
    $username=trim($_POST['username']);
    $password=trim($_POST['password']);
  }
 if(empty($username_err) && empty($password_err)){
  $sql = "SELECT id, username, password, email FROM users WHERE username = ?";
  $stmt = mysqli_prepare($conn , $sql);
  mysqli_stmt_bind_param($stmt , 's' , $param_username);
  $param_username = $username;
  //try to execute statment
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
      mysqli_stmt_bind_result($stmt , $id, $username, $hashed_password, $email);
      if(mysqli_stmt_fetch($stmt)){
        if(password_verify($password , $hashed_password)){
          //this means password is right. Allow user to join
          session_start();
          $_SESSION["username"]=$username;
          $_SESSION["id"]=$id;
          $_SESSION["email"]=$email;
          $_SESSION["loggedin"]=true;

          //redirecting user to welcome page
          if(isset($_GET["link"])){
            $link = $_GET["link"];
            header("location:".$link);
          }else{
            header ("location: ../");
          }        
        }else{
        $password_err="Passwords dont match!!";
        }
      }
    }else{$username_err="Username not found!!";}
  }

 }
}



?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/header.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
    <title>Login | Book Site</title>
  </head>
  <body style="background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)), url('../img/bg.jpg');">
  <header style="height:8%">
      <div class="headh">Book Site</div>
      <div class="headu" id="headu">
          <div class="headuu" id="headuu"><a href="../register" style="text-decoration: none;color:white;">Register<i class="fas fa-sign-in-alt" style="font-size: 20px;margin-left:5px;"></i></a></div>
      </div>
  </header>

<div class="container mt-4">
<h3>Please Login Here:</h3>
<hr style="border-color:black;">

<?php 

if(!empty($password_err)){
  echo '<div class="alert alert-danger" role="alert">'.$password_err.'</div>';
}
if(!empty($username_err)){
  echo '<div class="alert alert-danger" role="alert">'.$username_err.'</div>';
}


?>


<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
  <br>
    <a href="../recover">Forgot Passoword?</a>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>




</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>