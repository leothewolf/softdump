<?php 

session_start();
if($_SESSION["username"]){
  $username = $_SESSION["username"];
}

?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
      integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
  </head>
  <body>
    <header style="background:black;border-bottom:1px solid white;">
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
      <a href="../mybooks" style="text-decoration: none;color:black;"><span><i class="fas fa-swatchbook"></i>MyBooks</span></a>
      <a href="../" style="text-decoration: none;color:black;"><span><i class="fas fa-book-reader"></i>Read Books</span></a>
      <a href="../bookmarks" style="text-decoration: none;color:black;"><span><i class="fas fa-bookmark"></i>Bookmarks</span></a>
      <a href="../logout.php" style="text-decoration: none;color:black;"><span style="border-bottom: none"
        ><i class="fas fa-sign-out-alt"></i> Logout</span
      ></a>
    </div>
    <div class="ctus">
      <div class="container">
        <h2>Contact Us</h2>
        <form action="" method="post">
          <div class="row100">
            <div class="col">
              <div class="inputbox">
                <input type="text" required="required" />
                <span class="text">First Name</span>
                <span class="line"></span>
              </div>
            </div>
            <div class="col">
              <div class="inputbox">
                <input type="text" required="required" />
                <span class="text">Last Name</span>
                <span class="line"></span>
              </div>
            </div>
          </div>
          <div class="row100">
            <div class="col">
              <div class="inputbox">
                <input type="text" required="required" />
                <span class="text">Email</span>
                <span class="line"></span>
              </div>
            </div>
            <div class="col">
              <div class="inputbox">
                <input type="text" required="required" />
                <span class="text">Mobile (Optional)</span>
                <span class="line"></span>
              </div>
            </div>
          </div>
          <div class="row100">
            <div class="col">
              <div class="inputbox textarea">
                <textarea required="required"></textarea>
                <span class="text">Type Your Message Here...</span>
                <span class="line"></span>
              </div>
            </div>
          </div>
          <div class="row100">
            <div class="col">
              <input type="submit" value="Send" />
            </div>
          </div>
        </form>
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

<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
  header("location: ../");
}

?>
