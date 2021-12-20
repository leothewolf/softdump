<?php


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: ../login");
}else{
  $username = $_SESSION['username'];
}

require_once "../config.php";

if(isset($username)){
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  $table = mysqli_fetch_array($result);
  $sid = $table["id"];
  $semail = $table["email"];
  $susername = $table["username"];
  $spassword = $table["password"];

  $sql3 = "SELECT * FROM books WHERE username = '$susername'";
  if ($result3=mysqli_query($conn,$sql3)) {
    $bookcount=mysqli_num_rows($result3);
}
}



if(isset($_SESSION["username"])){
  $username = $_SESSION["username"]; 
  $sql = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $sql);
  $table = mysqli_fetch_array($result);
  $sid = $table["id"];
  $semail = $table["email"];
  $susername = $table["username"];
  $spassword = $table["password"]; 

  if($_SERVER['REQUEST_METHOD'] == "POST"){
      $opassword = $_POST["opassword"];
      $npassword = $_POST["npassword"];
      $cnpassword = $_POST["cnpassword"];
      if($npassword == $cnpassword){
        
        if(password_verify($opassword , $spassword)){
          if(strlen(trim($npassword)) >= 6){
            $hashed_password = password_hash($npassword, PASSWORD_DEFAULT);
            $query = "UPDATE users SET password = '$hashed_password' WHERE id = $sid";
            if(mysqli_query($conn, $query)){
              $suc_err = "Success";
            }
          }else{
            $pass_err = "Password should atleast be 6 characters";
          }  
        }else{
          $pass_err = "Old and new password don't match";
        }  
      }else{
        $pass_err = "Password don't match";
      }
  }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
    <link rel="stylesheet" href="../css/profile.css" />
    <link rel="stylesheet" href="../css/header.css" />
</head>
<body></body>
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
        echo '<a href="../admin" style="text-decoration: none;color:black;"><span><i class="fas fa-users-cog"></i>Admin Panel</span></a>';
      }
      ?>
      <a href="../" style="text-decoration: none;color:black;"><span><i class="fas fa-book-reader"></i>Read Books</span></a>
      <a href="../mybooks" style="text-decoration: none;color:black;"><span><i class="fas fa-swatchbook"></i>MyBooks</span></a>
      <a href="../publishabook" style="text-decoration: none;color:black;"><span><span><i class="fas fa-book"></i>Publish A Book</span></a>
      <a href="../bookmarks" style="text-decoration: none;color:black;"><span><i class="fas fa-bookmark"></i>Bookmarks</span></a>
      <a href="../logout.php" style="text-decoration: none;color:black;"><span style="border-bottom: none"
        ><i class="fas fa-sign-out-alt"></i> Logout</span
      ></a>
    </div>



    <div class="profile" style="background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url('../img/bg.jpg')">
      <div class="profilemain">
        <img src="../img/user.png" alt="">
        <br>
        <br>
        <div class="info" id="info">
        <?php 
        if(!empty($pass_err)){
            echo'<div class="err">'.$pass_err.'</div>';
        }
        if(!empty($suc_err)){
            echo'<div class="errt">'.$suc_err.'</div>';
        }
        ?>
          <span>Username: <?php echo $susername;?></span> 
          <span>Email: <?php echo $semail;?></span> 
          <span>Books Published: <?php echo $bookcount;?></span>
          <br>
          <div class="pfpbtn">
            <button onclick="editPfp()">Edit Profile</button>
            <button style="margin-left:10px;" onclick="editPass()">Change Password</button>
            <br>
          </div>
          <a href="delacc"><button class ="delAcc"><i class="fas fa-trash"></i> DELETE ACCOUNT</button></a>

          <!-- edit profile -->

          <!-- <form action="editprofile.php" method="POST">
            <input type="text" name="username" id="username" placeholder="Username" value="<?php //echo $susername;?>">
            <br>
            <br>
            <input type="email" name="email" id="email" placeholder="Email" value="<?php //echo $semail;?>">
            <br>
            <br>
            <div class="pfpbtn">
              <button onclick="backPfp()">Cancel</button>
              <input type="submit" value="Save" style="margin-left:10px;" id = "submit">
            </div>
          </form> -->

          <!-- Change Password -->

          <!-- <form action="" method="POST">
            <input type="password" name="opassword" id="opassword" placeholder="Old Password" required>
            <br>
            <br>
            <input type="password" name="npassword" id="npassword" placeholder="New Password" required>
            <br>
            <br>
            <input type="password" name="cnpassword" id="cnpassword" placeholder="Confirm New Password" required>
            <br>
            <br>
            <div class="pfpbtn">
              <button onclick="backPfp()">Cancel</button>
              <input type="submit" value="Save" style="margin-left:10px;" id ="submit">
            </div>
          </form> -->
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
      function editPfp(){
        document.getElementById("info").innerHTML = " <form action='editprofile.php' method='POST'><input type='text' name='username' id='username' placeholder='Username' value='<?php echo $susername;?>'><br><br><input type='email' name='email' id='email' placeholder='Email' value='<?php echo $semail;?>'><br><br><div class='pfpbtn'><button onclick='backPfp()'>Cancel</button><input type='submit' value='Save' style='margin-left:10px;' id = 'submit'></div></form>";
      }
      function backPfp(){
        document.getElementById("info").innerHTML = "<span>Username: <?php echo $susername;?></span> <span>Email: <?php echo $semail;?></span> <span>Books Published: <?php echo $bookcount;?></span><br><div class='pfpbtn'><button onclick='editPfp()'>Edit Profile</button><button style='margin-left:10px;' onclick='editPass()'>Change Password</button></div><a href='delacc'><button class ='delAcc'><i class='fas fa-trash'></i> DELETE ACCOUNT</button></a>";
      }
      function editPass(){
        document.getElementById("info").innerHTML = "<form action='' method='POST'><input type='password' name='opassword' id='opassword' placeholder='Old Password' required> <br><br><input type='password' name='npassword' id='npassword' placeholder='New Password' required><br><br><input type='password' name='cnpassword' id='cnpassword' placeholder='Confirm New Password' required><br><br><div class='pfpbtn'><button onclick='backPfp()'>Cancel</button><input type='submit' value='Save' style='margin-left:10px;' id ='submit'></div></form>";
      }
    </script>
</body>
</html>