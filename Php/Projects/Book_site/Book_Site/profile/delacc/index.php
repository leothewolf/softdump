<?php


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: ../../login");
}else{
  $username = $_SESSION['username'];
}

require_once "../../config.php";

if(isset($username)){
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  $table = mysqli_fetch_array($result);
  $sid = $table["id"];
  $semail = $table["email"];
  $susername = $table["username"];
  $spassword = $table["password"];
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $rpassword = $_POST["password"];
    if(password_verify($rpassword , $spassword)){
        $curdate = date("j") . "/" . date("n") ."/" . date("Y");
        $date = $curdate;
        $content = $susername." deleted account";
        $query = "INSERT INTO logs (username, date, content) VALUES (?, ?, ?)";
        $result = mysqli_prepare($conn, $query);
        if($result){
            mysqli_stmt_bind_param($result, "sss", $param_username, $param_date, $param_content);
            $param_username = "Admin";
            $param_date = $date;
            $param_content = $content;
            if(mysqli_stmt_execute($result)){}mysqli_stmt_close($result);
        }
        
        $query = "DELETE FROM users WHERE username = '$susername'";
        $result = mysqli_query($conn,$query);

        $query3 = "DELETE FROM books WHERE username = '$susername'";
        $result3 = mysqli_query($conn,$query3);

        $query3 = "DELETE FROM bookmark WHERE username = '$susername'";
        $result3 = mysqli_query($conn,$query3);

        $query4 = "DELETE FROM likes WHERE username = '$susername'";
        $result4 = mysqli_query($conn,$query4);

        unset($_SESSION['username']);
        
        header("location: ../../login");
    }else{
        $pass_err = "Password is incorrect";
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Account</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
    <link rel="stylesheet" href="../../css/profile.css" />
    <link rel="stylesheet" href="../../css/header.css" />
</head>
<body>
    <header>
      <div class="headh">Book Site</div>
      <?php 
      
      if(isset($username)){
          echo '<div class="headu" id="headu" onclick="myFunction()">
        <i class="fas fa-user-circle"></i>
        <div class="headuu">'.$username.'</div>
      </div>';
      }else{
          echo '<div class="headu" id="headu">
          <div class="headuu" id="headuu"><a href="../login" style="text-decoration: none;color:white;">Login<i class="fas fa-sign-in-alt" style="font-size: 20px;margin-left:5px;"></i></a></div>
      </div>';
      }

      ?>
    </header>
    <div class="headext" id="headext">
      <?php 
      if($username == "admin"){
        echo '<a href="../../admin" style="text-decoration: none;color:black;"><span><i class="fas fa-users-cog"></i>Admin Panel</span></a>';
      }
      ?>
      <a href="../../" style="text-decoration: none;color:black;"><span><i class="fas fa-book-reader"></i>Read Books</span></a>
      <a href="../../mybooks" style="text-decoration: none;color:black;"><span><i class="fas fa-swatchbook"></i>MyBooks</span></a>
      <a href="../../publishabook" style="text-decoration: none;color:black;"><span><span><i class="fas fa-book"></i>Publish A Book</span></a>
      <a href="../../logout.php" style="text-decoration: none;color:black;"><span style="border-bottom: none"
        ><i class="fas fa-sign-out-alt"></i> Logout</span
      ></a>
    </div>



    <div class="profile" style="background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url('../../img/bg.jpg')">
      <div class="profilemain">
        <img src="../../img/user.png" alt="">
        <br>
        <br>
        <?php 
        if(!empty($pass_err)){
            echo'<div class="err">'.$pass_err.'</div>';
        }
        ?>
        <div class="info" id="info">
          <span>Are you sure you want to delete your account? (This can't be undone under any condition)</span> 
          <div class="pfpbtn" style="margin-top:10px;">
            <button onclick="delSure()"> YES</button>
            <a href="../"><button style="margin-left:10px;"> NO</button></a>
            <br>
          </div>

        </profile>
      </div>
    </div>

    <script>
      var timesClicked = 0;
      function myFunction() {
        if (timesClicked % 2 == 0) {
          document.getElementById("headext").style.display = "initial";
          timesClicked++;
        } else {
          document.getElementById("headext").style.display = "none";
          timesClicked++;
        }
      }
      function delSure(){
          document.getElementById("info").innerHTML = "<div class='cdel'><span>Sorry to see you go, hope you comeback soon.</span><br><br><form action='' method='POST'><input type='password' name='password' id='password' placeholder='Input Password'><br><input type='submit' value='Permanent Delete' id='permdela'></form><a href='../'><button id='permdela' style='margin-top:-20px;background:#0069d9;border: 1px solid #0062cc;'> No</button></a></div>";
      }
    </script>
</body>
</html>