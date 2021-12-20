<?php 

session_start();

if(isset($_SESSION["username"])){
    $sesusername = $_SESSION["username"];
}


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
</head>
<body style="background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url('img/bg.jpg')">
    <header>
      <div class="headh">Book Site</div>
      <?php 
      
      if(isset($sesusername)){
          echo '<div class="headu" id="headu" onclick="myFunction()">
        <i class="fas fa-user-circle"></i>
        <div class="headuu">'.$sesusername.'</div>
      </div>';
      }else{
          echo '<div class="headu" id="headu">
          <div class="headuu" id="headuu"><a href="login" style="text-decoration: none;color:white;">Login<i class="fas fa-sign-in-alt" style="font-size: 20px;margin-left:5px;"></i></a></div>
      </div>';
      }

      ?>
    </header>
    <div class="headext" id="headext">
      <?php 
      if($sesusername == "admin"){
        echo '<a href="admin" style="text-decoration: none;color:black;"><span><i class="fas fa-users-cog"></i>Admin Panel</span></a>';
      }
      ?>
      <a href="profile" style="text-decoration: none;color:black;"><span><i class="fas fa-user"></i>Profile</span></a>
      <a href="bookmarks" style="text-decoration: none;color:black;"><span><i class="fas fa-bookmark"></i>Bookmarks</span></a>
      <a href="mybooks" style="text-decoration: none;color:black;"><span><i class="fas fa-swatchbook"></i>MyBooks</span></a>
      <a href="publishabook" style="text-decoration: none;color:black;"><span><i class="fas fa-book"></i>Publish A Book</span></a>
      <a href="logout.php" style="text-decoration: none;color:black;"><span style="border-bottom: none"
        ><i class="fas fa-sign-out-alt"></i> Logout</span
      ></a>
    </div>
    <div class="bookc" style="margin-left: 10px;margin-top: 10px;background:white;bo-sizing:border-box;margin-right:10px;padding:10px;box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;border-radius:5px;">
        Books
        <p style="font-size:20px;margin-top:5px;bo-sizing:vorder-box;padding-right:10px;">Find thousands of books to read online. Discover and read free books by independent authors as well as tons of classic books. Browse categories to find your favorite literature genres: Romance, Fantasy, Thriller, Short Stories, Young Adult and Children’s Books… There are eBooks for everyone.</p>
    </div>
    <br>
    <!-- <div class="storyboard">
        <div class="storynav">
            <img src="book.png" alt="">
            <div class="storyinfo">
                <div class="title">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis</div>
                <hr>
                <div class="stdesc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad ea possimus quis, totam debitis perferendis!</div>
            </div>
        </div>
    </div> -->


    <div class="storyboard" style="padding: 0 10px;">
        <!-- <div class="storynav">
          <div class="storyinfo">
                <img src="img/book.png" alt="">
                <div class="storyinfomain">
                  <div class="title">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis</div>
                  <hr>
                  <div class="stdesc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad ea possimus quis, totam debitis perferendis!</div>
                </div>
          </div>
          <div class="stnm"><i class="fas fa-thumbs-up"> 10</i></div>
        </div> -->
        <?php 

        require_once "config.php";

        $query="SELECT * FROM books";

        $Table = mysqli_query($conn,$query);

        while($Row=mysqli_fetch_array($Table)){
            echo '
                <a href="books/'.$Row["username"].'_'.$Row["id"].'.php" style= "text-decoration: none; color:black;"><div class="storynav">
                  <div class="storyinfo">';
                  $id = $Row["id"];
                  require_once "config.php";
                  $query= "SELECT * FROM likes WHERE id = '$id'";
                  if($result = mysqli_query($conn, $query)){
                    if(mysqli_num_rows($result) == 0){
                      $likes=0;
                    }else{
                      $likes = mysqli_num_rows($result);
                    }
                  }
                  $query2= "SELECT * FROM likes WHERE id = '$id'";
                  if($result2 = mysqli_query($conn, $query2)){
                    if(mysqli_num_rows($result2) == 0){
                      $bookmark=0;
                    }else{
                      $bookmark = mysqli_num_rows($result2);
                    }
                  }
                  echo '
                        <img src="img/book.png" alt="">
                        <div class="storyinfomain">
                          <div class="title">'. $Row["title"] .'</div>
                          <hr>
                          <div class="stdesc">'. $Row["description"] .'</div>
                        </div>
                  </div>
                  <div class="stnm">
                    <div class="stnml">
                      <div style="margin-left: 10px;font-family: sans-serif;position: relative;top: 2px;font-weight: 600;"><i class="fas fa-user"></i> '.$Row["username"].'</div>
                    </div>
                    <div class="stnmr">
                      <i class="fas fa-bookmark" style="margin-right: 8px;"> '.$bookmark.'</i>
                      <i class="fas fa-thumbs-up"> '.$likes.'</i>
                    </div>
                  </div>
                </div></a>';
        }             

        ?>
      <div class="docscontent">
        <div class="docs1" style="margin-bottom: 10px;background:none;">
          <div class="img">
            <img src="img/docs1.png" alt="" style="box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;">
          </div>
        </div>
        <br>
        <div class="docs1" style="width:80%;position:relative;left:18%;box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;">
          <p>Need Help?</p>
          <p><a href="#" taget="_blank">Read docs</a></p>
          <p><a href="contactus">Contact Us</a></p>
        </div>
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
    </script>
</body>
</html>


