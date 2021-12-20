<?php 

$token = $_GET["token"];
$username = $_GET["username"];
$email = $_GET["email"];

require_once "../config.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $stoken = $_POST["stoken"];
    $password = $_POST["npassword"];
    $confirm_password = $_POST["cnpassword"];
    if(password_verify($stoken , $token)){
        if($password == $confirm_password){
            if(strlen(trim($password)) < 7){
                $password = password_hash($password, PASSWORD_DEFAULT);
                $query = "UPDATE users SET password = '$password' WHERE username='$username' AND email = '$email'";
                if(mysqli_query($conn, $query)){
                    $suc_err = "Success";
                    header("../login");
                }else{
                    echo 'Something went wrong';
                }
            }else{
                $pass_err = "Password should atleast be 6 characters";
            }
        }else{
            $pass_err = "Password don't match";
        }
    }else{
        
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recovery Account</title>
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/styles.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
</head>
<body style="background: #f1f6fe;">
<header style="height:8%">
      <div class="headh">Book Site</div>
      <div class="headu" id="headu">
          <div class="headuu" id="headuu"><a href="../login" style="text-decoration: none;color:white;">Login<i class="fas fa-sign-in-alt" style="font-size: 20px;margin-left:5px;"></i></a></div>
      </div>
</header>
<div class="recover">
    <form action="" method="post">
        <div class="hra" style="font-size:30px;">Recover Account</div>
        <br>
        <?php 
        if(!empty($pass_err)){
            echo'<div class="err">'.$pass_err.'</div>';
        }
        if(!empty($suc_err)){
            echo'<div class="errt">'.$suc_err.'</div>';
        }
        ?>
        <br>
        <input type="password" name="stoken" id="stoken" placeholder="Security Token" required>
        <br>
        <input type="password" name="npassword" id="npassword" placeholder="New Password" required>
        <br>
        <input type="password" name="cnpassword" id="cnpassword" placeholder="Confirm New Password" required>
        <input type="submit" id="submit" value="Reset Password">
    </form>
</div>
</body>
</html>
