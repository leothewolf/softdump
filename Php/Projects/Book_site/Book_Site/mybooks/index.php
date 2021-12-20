<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: ../login");
}else{
    $username = $_SESSION['username'];
}



?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBooks</title>
    <link rel="stylesheet" href="../css/mybooks.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/header.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");
        .title a{
          text-decoration:none;
          color:black;
        }
        .title a:hover{
          text-decoration:underline;
        }
    </style>
</head>
<body style="background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url('../img/bg.jpg')">
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
      <a href="../profile" style="text-decoration: none;color:black;"><span><i class="fas fa-user"></i>Profile</span></a>
      <a href="../" style="text-decoration: none;color:black;"><span><i class="fas fa-book-reader"></i>Read Books</span></a>
      <a href="../bookmarks" style="text-decoration: none;color:black;"><span><i class="fas fa-bookmark"></i>Bookmarks</span></a>
      <a href="../publishabook" style="text-decoration: none;color:black;"><span><span><i class="fas fa-book"></i>Publish A Book</span></a>
      <a href="../logout.php" style="text-decoration: none;color:black;"><span style="border-bottom: none"
        ><i class="fas fa-sign-out-alt"></i> Logout</span
      ></a>
    </div>
    <?php 
    
    // require_once "../config.php";
    // $query1="SELECT * FROM books WHERE username = '$username'";
    // $result = mysqli_query($conn,$query1);
    // if(mysqli_num_rows($result) > 0){
    //   echo '<h2 style="margin-top: 10px;margin-left: 10px;">My Books</h2>';
    // }

    ?>
    <div class="storyboard" style="padding:0 10px;margin-top:20px;">
    <?php 

        require_once "../config.php";

        $query="SELECT * FROM books WHERE username = '$username'";

        $Table = mysqli_query($conn,$query);

        while($Row=mysqli_fetch_array($Table)){
            echo '
                <div class="storynava" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <div class="storynavd">
                        <img src="../img/book.png" alt="">
                        <div class="storyinfob">
                            <div class="title"><a href="../books/'.$Row["username"].'_'.$Row["id"].'.php">'. $Row["title"] .'<a/></div>
                            <hr>
                            <div class="stdesc" style="color:black;">'. $Row["description"] .'</div>
                        </div>
                    </div>
                    <div class ="ays" id="areyousure'.$Row["id"].'">Are you sure? (This can\'t be undone under any conditions)</div>
                    <div class="bookbtn" id="bookbtn'.$Row["id"].'">
                        <a href="../editbook/index.php?id='.$Row["id"].'&username='.$Row["username"].'"><button class="ebtn">Edit</button></a>
                        <button class="delbtn" onclick="myFunction1('.$Row["id"].')">Delete</button>
                    </div>
                    <div class="confirmdel" id="confirmdel'.$Row["id"].'">
                        <button class="canceldbtn" onclick="myDel('.$Row["id"].')">Cancel</button>
                        <a href="../user_action/delete.php?id='.$Row["id"].'&username='.$Row["username"].'"><button class="condelbtn">Confirm</button></a>
                    </div>
                </div>';
        }
    ?>
    <script>
            function myFunction1(x) {
                var getId = "confirmdel" + x;
                var getId2 = "bookbtn" + x;
                var getId3 = "areyousure" + x;
                document.getElementById(getId2).style.display = "none";
                document.getElementById(getId).style.display = "flex";
                document.getElementById(getId3).style.display = "flex";
            }
            function myDel(x) {
                var delId = "confirmdel" + x;
                var delId2 = "bookbtn" + x;
                var delId3 = "areyousure" + x;
                document.getElementById(delId).style.display = "none";
                document.getElementById(delId2).style.display = "flex";
                document.getElementById(delId3).style.display = "none";
            }
    </script>
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
    </script>
    <?php 
      
      $query1="SELECT * FROM books WHERE username = '$username'";
      $result = mysqli_query($conn,$query1);
      if(mysqli_num_rows($result) > 0){
        echo '<div class="docscontent">
        <div class="docs1" style="margin-bottom: 10px;background:none;">
          <div class="img">
            <img src="../img/docs1.png" alt="" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
          </div>
        </div>
        <br>
        <div class="docs1" style="width:80%;position:relative;left:18%;box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
          <p style="color:black;">Need Help?</p>
          <p><a href="#" taget="_blank">Read docs</a></p>
          <p><a href="contactus">Contact Us</a></p>
        </div>
      </div>';
      }

      ?>
    </div>
    <?php 
      
      $query1="SELECT * FROM books WHERE username = '$username'";
      $result = mysqli_query($conn,$query1);
      if(mysqli_num_rows($result) == 0){
        echo '<div class="nsha"><img src="../img/magnify.png" alt="">
        <br/> No Books Published Yet <br/> <button class="pab"><a href="../publishabook">Publish A Book</a></button></div>';
      }

      ?>
</body>
</html>