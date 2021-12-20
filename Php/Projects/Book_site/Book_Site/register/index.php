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

$username = $password = $confirmpassword = "";

$username_err = $password_err = $confirmpassword_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){ //check for request

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please fill all the details";
    }
    else{
        $sql = "SELECT id FROM users WHERE username = ?";//Creating query
        $stmt = mysqli_prepare($conn, $sql);//Preparing statment
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);//binding parameters ? of $stmt to $param_username

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){ 
                mysqli_stmt_store_result($stmt); //storing results from mysql database
                if(mysqli_stmt_num_rows($stmt) == 1)//Check if username already exists(if rows == 1 then there already exists a username with that name)
                {
                    $username_err = "This username is already taken"; 
                }
                else{
                    $username = trim($_POST['username']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }


// Check for password
if(empty(trim($_POST['password']))){//checking if password is empty or not
    $username_err = "Please fill all the details";
}
elseif(strlen(trim($_POST['password'])) < 7){//checking if password is less then 6 characters
    $password_err = "Password cannot be less than 6 characters";
}
else{
    $password = trim($_POST['password']);//if no issues then setting password equal to variable
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
}

if(empty(trim($_POST["email"]))){
        $username_err = "Please fill all the details";
    }
    else{
        $sql = "SELECT id FROM users WHERE email = ?";//Creating query
        $stmt = mysqli_prepare($conn, $sql);//Preparing statment
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_email);//binding parameters ? of $stmt to $param_email

            // Set the value of param email
            $param_email = trim($_POST['email']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){ 
                mysqli_stmt_store_result($stmt); //storing results from mysql database
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This email is already taken"; 
                }
                else{
                    $email = trim($_POST['email']);
                }
            }
            else{
                echo "Something went wrong";
            }
        }
    }

$curdate = date("j") . "/" . date("n") ."/" . date("Y");
$date = $curdate;


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
  {
      $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";//creating sql query
      $stmt = mysqli_prepare($conn, $sql);//preparing statment
      if ($stmt)
      {
          mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_password, $param_email);//binding parameteres ? ? to $param_username and $param_password

          // Set these parameters
          $param_email = $_POST['email'];
          $param_username = $username;
          $param_password = password_hash($password, PASSWORD_DEFAULT); //hasing passoword

          // Try to execute the query
          if (mysqli_stmt_execute($stmt))
          {
              $content = "New user account created with username: ".$username."<br/>Dated:".$date;
              $query = "INSERT INTO logs (username, date, content) VALUES (?, ?, ?)";
              $result = mysqli_prepare($conn, $query);
              if($result){
                mysqli_stmt_bind_param($result, "sss", $param_username, $param_date, $param_content);
                $param_username = $username;
                $param_date = $date;
                $param_content = $content;
                if(mysqli_stmt_execute($result)){
                  header("location: ../login"); //redirecting to login page
                }mysqli_stmt_close($result);
              }
              $sql = "SELECT * FROM users WHERE username = '$username'";
              $result2 = mysqli_query($conn, $sql);
              while($Row=mysqli_fetch_array($result2)){
                $uid = $Row["id"];
              }
              session_start();
              $_SESSION["username"]=$username;
              $_SESSION["id"] = $uid;
              $_SESSION["email"] = $param_email;
              $_SESSION["loggedin"]=true;
          }
          else{
              echo "Something went wrong... cannot redirect!";
          }
      }
      mysqli_stmt_close($stmt);
  }
  mysqli_close($conn);
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
    <title>Register Account</title>
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
  </head>
  <body style="background: linear-gradient(rgba(255,255,255,.8), rgba(255,255,255,.8)), url('../img/bg.jpg')">
  <header style="height:8%">
      <div class="headh">Book Site</div>
      <div class="headu" id="headu">
          <div class="headuu" id="headuu"><a href="../login" style="text-decoration: none;color:white;">Login<i class="fas fa-sign-in-alt" style="font-size: 20px;margin-left:5px;"></i></a></div>
      </div>
  </header>

<div class="container mt-4">
<h3>Please Register Here:</h3>
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
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputUsername4">Username</label>
      <input type="text" class="form-control" name="username" id="inputUsername4" placeholder="Username" maxlength="25">
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail">Email</label>
      <input type="email" class="form-control" name ="email" id="inputEmail" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" name ="password" id="inputPassword4" placeholder="Password">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Confirm Password</label>
      <input type="password" class="form-control" name ="confirm_password" id="inputPassword" placeholder="Confirm Password">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>