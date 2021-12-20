<?php 

session_start();
if(isset($_SESSION["username"])){
    $rusername = $_SESSION["username"];
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docs</title>
    <link rel="stylesheet" href="../css/testbook.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
</head>
<body>
    <header>
      <div class="headh">Book Site</div>
      <?php 
      
      if(isset($rusername)){
          echo '<div class="headu" id="headu" onclick="myFunction()">
        <i class="fas fa-user-circle"></i>
        <div class="headuu">'.$rusername.'</div>
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
      if($rusername == "admin"){
        echo '<a href="../admin" style="text-decoration: none;color:black;"><span><i class="fas fa-users-cog"></i>Admin Panel</span></a>';
      }
      ?>
      <a href="../profile" style="text-decoration: none;color:black;"><span><i class="fas fa-user"></i>Profile</span></a>
      <a href="../" style="text-decoration: none;color:black;"><span><i class="fas fa-book-reader"></i>Read Books</span></a>
      <a href="../mybooks" style="text-decoration: none;color:black;"><span><i class="fas fa-swatchbook"></i>MyBooks</span></a>
      <a href="../bookmarks" style="text-decoration: none;color:black;"><span><i class="fas fa-bookmark"></i>Bookmarks</span></a>
      <a href="../publishabook" style="text-decoration: none;color:black;"><span><i class="fas fa-book"></i>Publish A Book</span></a>
      <a href="../logout.php" style="text-decoration: none;color:black;"><span style="border-bottom: none"
        ><i class="fas fa-sign-out-alt"></i> Logout</span
      ></a>
    </div>

      <div class="bookc">
        <h2><strong>How to access profile?</strong></h2>
        <img src="../img/pfpdrop.png" alt="">
        <p>Click on the profile icon in the header (upper part of the website), a menu will appear then click on the profile to access your profile.</p>

        <h2><strong>How to publish a book?</strong></h2>
        <p>To publish a book navigate to <a href="../publishabook">publish book page</a> and publish a book.</p>

        <h2>How to edit a book?</h2>
        <p>To edit a book navigate to <a href="../mybooks">my books</a> and then click on the book you wish to edit.</p>

        <h2>How to bookmark a book?</h2>
        <p>To bookmark a book click on <i class="far fa-bookmark"></i> given in the start of book.</p>

        <h2>How to like a book?</h2>
        <p>To like a book click on the <i class="fas fa-thumbs-up"></i> given in the end of the book.</p>

        <h2>How to remove bookmark?</h2>
        <p>To remove a bookmark either click on <i class="far fa-bookmark"></i> given in the start of book or navigate to <a href="../bookmarks">bookmarks</a> and remove from there.</p>

        <h2>How to remove a like from the book?</h2>
        <p>To remove like from a book click on the <i class="fas fa-thumbs-down"></i> given in the end of the book.</p>
      </div>
      <footer>
      <div class="fleft">
        <h1>Book Site</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium
          nostrum libero consequuntur unde, provident perspiciatis rerum sint
          totam quos sed consequatur.
        </p>
      </div>
      <div class="fright">
        <div class="frl">
          <h2>Site Links</h2>
          <a href="../contactus">Contact Us</a>
        </div>
        <div class="flr">
          <h2>Social Links</h2>
          <a href="https://www.facebook.com" target="_blank"><i class="fab fa-facebook-square"></i></a>
          <a href="https://www.twitter.com"
            ><i class="fab fa-twitter-square" style="margin-left: 10px" target="_blank"></i>
          </a>
        </div>
      </div>
    </footer>
    <div class="cpyr">©2021 Book Site All rights reserved.</div>

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