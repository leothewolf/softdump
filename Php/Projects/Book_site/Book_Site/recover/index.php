<?php 

$token = rand(100000,999999);
$hashed_token = password_hash($token, PASSWORD_DEFAULT);

require_once "../config.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = $_POST["email"];
    if(empty($email)){
       $email_err = "Please input an email"; 
    }else{
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn,$sql);
        $emailcount = mysqli_num_rows($result);
        if($emailcount){
           $userdata = mysqli_fetch_array($result);
           $username = $userdata["username"];

           $subject = "Password Reset";
           $body = "Hi ".$username." You have requested to reset your password. Security Token:".$token;
           $sender_mail = "From: booksite@booksite.com";
           
           if(mail($email, $subject, $body, $sender_mail)){
               header("location: crecover.php?token=".$hashed_token."&username=".$username."&email=".$email);
           }else{
               echo 'Something went wrong';
           }

        }else{
            $email_err = "No such email found";
        }
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
        <div class="hra">Recover Account</div>
        <?php 
        if(!empty($email_err)){
            echo'<div class="err">'.$email_err.'</div>';
        }
        ?>
        <label for="email">Input Email associated with your account:</label>
        <input type="text" name="email" id="email" placeholder="Email Address">
        <input type="submit" id="submit" value="Recover Account">
    </form>
</div>
</body>
</html>
