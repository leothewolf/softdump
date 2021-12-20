<?php


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login");
}else{
  $username = $_SESSION['username'];
}
 

$sitename = "Booksite";

require_once "../config.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $title = $_POST["title"];
  $description = $_POST["description"];
  $bookc = $_POST["bookc"];

  $sql = "INSERT INTO books (username, title, description, bookc, createdate) VALUES (?, ?, ?, ?, ?)";//creating sql query
    $stmt = mysqli_prepare($conn, $sql);//preparing statment
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "sssss", $username, $title, $description, $bookc, $date);

        // Set these parameters
        $curdate = date("j") . "/" . date("n") ."/" . date("Y");
        $date = $curdate;

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
          $query="SELECT * FROM books WHERE username = '$username' AND title = '$title' AND bookc = '$bookc'";

          $result = mysqli_query($conn,$query);

          while($Row = mysqli_fetch_array($result)){
            $rid = $Row["id"];
          }
            fopen('../books/' . $username . '_'. $rid .'.php', 'w');
              $myfile = fopen('../books/' . $username . '_'. $rid .'.php', 'w');
              $txt = '
              <?php 

                session_start();
                if(isset($_SESSION["username"])){
                  $rusername = $_SESSION["username"];
                }

                $targetuser ="'.$username.'";
                    $targetid = "'.$rid.'";     
                    $targetlink1 = "books/".$targetuser."_".$targetid.".php";
                            require_once "config.php";
                            $query = "SELECT * FROM books WHERE username = \'$targetuser\' AND id = \'$targetid\'";
                            $Table = mysqli_query($conn,$query); 
                            while($Row=mysqli_fetch_array($Table)){
                              $title = $Row["title"];
                              $bookc = $Row["bookc"];
                            }
                            $eols = array("\n");
                            $bookcf = str_replace($eols,"<br/>",$bookc);
                            if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $targetuser;
                            $rusername;
                            $select = $_POST["report"];
                            $reasonp = $_POST["reason"];

                            require_once "config.php";
                            $sql = "INSERT INTO reports (rusername, tusername, reason, date) VALUES (?, ?, ?, ?)";
                            $stmt = mysqli_prepare($conn, $sql);
                            if($stmt){
                              mysqli_stmt_bind_param($stmt, "ssss", $rusername, $targetuser, $reason, $date);
                              $curdate = date("j") . "/" . date("n") ."/" . date("Y");
                              $date = $curdate;

                              $reason = "<strong>Report by ".$rusername.":</strong> <br/> Reason: ".$select." <br/> Message: ".$reasonp." <br/> Reported URL: <a href=\"".$targetlink1."\" target=\"_blank\">Click To Navigate</a> <br/> Dated: ".$date;

                              if(mysqli_stmt_execute($stmt)){   
                                header("location: ../report.php?link=".$targetlink1);            
                              }
                            }mysqli_stmt_close($stmt);
                          mysqli_close($conn);
                          }

                          if(isset($rusername)){
                            $query3 = "SELECT * FROM likes WHERE id = \'$targetid\' AND username = \'$rusername\'";
                            $result3 = mysqli_query($conn, $query3);
                            if(mysqli_num_rows($result3) == 0){
                              $likevar = 0;
                            }else if(mysqli_num_rows($result3) == 1){
                              $likevar = 1;
                            }
                          }
                          if(isset($rusername)){
                            $query4 = "SELECT * FROM bookmark WHERE id = \'$targetid\' AND username = \'$rusername\'";
                            $result4 = mysqli_query($conn, $query4);
                            if(mysqli_num_rows($result4) == 0){
                              $bookmark = 0;
                            }else if(mysqli_num_rows($result4) == 1){
                              $bookmark = 1;
                            }
                          }
                        

                        ?>
              
              <html lang="en">
                    <head>
                      <meta charset="UTF-8" />
                      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                      <title>'.$title.' | '.$username.' | '.$sitename.'</title>
                      <link rel="stylesheet" href="../css/testbook.css" />
                      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
                      <style>
                        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");
                        a{
                          color:#b9b9b9;
                        }
                        a:hover{
                          color:#aac8f9;
                        }
                      </style>
                      <link rel="stylesheet" href="../css/header.css" />
                      <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
                    </head>
                    <body>
                    <header>
                        <div class="headh">Book Site</div>
                        <?php 
                        
                        if(isset($rusername)){
                            echo \'<div class="headu" id="headu" onclick="myFunction()">
                          <i class="fas fa-user-circle"></i>
                          <div class="headuu">\'.$rusername.\'</div>
                        </div>\';
                        }else{
                            echo \'<div class="headu" id="headu">
                            <div class="headuu" id="headuu"><a href="../login" style="text-decoration: none;color:white;">Login<i class="fas fa-sign-in-alt" style="font-size: 20px;margin-left:5px;"></i></a></div>
                        </div>\';
                        }

                        ?>
                      </header>
                      <div class="headext" id="headext">
                        <?php 
                        if($rusername == "admin"){
                          echo \'<a href="../admin" style="text-decoration: none;color:black;"><span><i class="fas fa-users-cog"></i>Admin Panel</span></a>\';
                        }
                        ?>
                        <a href="../profile" style="text-decoration: none;color:black;"><span><i class="fas fa-user"></i>Profile</span></a>
                        <a href="../" style="text-decoration: none;color:black;"><span><i class="fas fa-book-reader"></i>Read Books</span></a>
                        <a href="../mybooks" style="text-decoration: none;color:black;"><span><i class="fas fa-swatchbook"></i>My Books</span></a>
                        <a href="../publishabook" style="text-decoration: none;color:black;"><span><i class="fas fa-book"></i>Publish A Book</span></a>
                        <a href="../bookmarks" style="text-decoration: none;color:black;"><span><i class="fas fa-bookmark"></i>Bookmarks</span></a>
                        <a href="../logout.php" style="text-decoration: none;color:black;"><span style="border-bottom: none"
                          ><i class="fas fa-sign-out-alt"></i> Logout</span
                        ></a>
                      </div>
                      <div class="content">
                        <div class="title">
                          <?php echo $title; ?>
                        </div>
                        <div class="user">
                          <img src="../img/user.png" alt="">
                          Book by <?php echo $targetuser;?>
                        </div>
                        <div class="bookc">
                          <?php 
                          
                          if(isset($rusername)){
                            if($bookmark == 0){
                              echo \'<a href="../user_action/bookmark.php?rusername=\'.$rusername.\'&tusername=\'.$targetuser.\'&id=\'.$targetid.\'"><div class="bookmark"><i class="far fa-bookmark"></i></a></div>\'; 
                            }else if ($bookmark == 1){
                              echo \'<a href="../user_action/unbookmark.php?rusername=\'.$rusername.\'&tusername=\'.$targetuser.\'&id=\'.$targetid.\'"><div class="bookmark"><i class="fas fa-bookmark"></i></a></div>\';
                            }
                          }else{
                            echo \'<div class="bookmark"><a href="../login"><i class="far fa-bookmark"></i></a></div>\'; 
                          }
                          
                          ?>
                          <?php echo $bookcf; ?>
                          <br/>
                          <div class="report">
                            <div class="like">
                              <?php 
                              if(isset($rusername)){
                                if($likevar == 0){
                                  echo \'<a href="../user_action/like.php?rusername=\'.$rusername.\'&tusername=\'.$targetuser.\'&id=\'.$targetid.\'"><i class="fas fa-thumbs-up"> LIKE</i></a>\';
                                }else if($likevar == 1){
                                  echo \'<a href="../user_action/unlike.php?rusername=\'.$rusername.\'&tusername=\'.$targetuser.\'&id=\'.$targetid.\'"><i class="fas fa-thumbs-down"> UNLIKE</i></a>\';
                                }
                              }
                              
                              ?>
                            </div>
                            <?php if(isset($rusername)){
                              echo \'<div onclick="reportDis()"><i class="fas fa-exclamation-circle"> REPORT</i></div>\';
                            }else{
                              echo \'<a href="../login/index.php?link=\'.$targetlink1.\'" style="color:#b9b9b9;"
                              onMouseOver="this.style.color="#aac8f9"" onMouseOut="this.style.color="#b9b9b9""><i class="fas fa-exclamation-circle"> REPORT</i></a>\';
                            }                         
                          ?>
                          </div>
                        </div>
                        <div class="reportpanel" id="report">
                          <div class="reportp">
                            <h2>Report Submission:</h2>
                            <p>Thanks for taking your time to report this book to webmaster:</p>
                            <strong><p><?php echo $title; ?> by <?php echo $targetuser; ?></p></strong>
                            <form action="" method="post">
                              <label for="report">Please let us know why you are choosing to report this:</label>
                              <select id="report" name="report">
                                <option value="">Please choose one:</option>
                                <option value="Spam">Spam</option>
                                <option value="Advertising">Advertising</option>
                                <option value="Copyright or plagiarism">Copyright or plagiarism (Please list down source of copyright or plagiarism)</option>
                                <option value="Other">Other (Please List down)</option>
                              </select>
                              <br>
                              <br>
                              <label for="reason">Reason:</label>
                              <textarea name="reason" id="reason" cols="30" rows="7"></textarea>
                              <br>
                              <br>
                              <div class="cancel" onclick="reportunDis()">CANCEL</div>   
                              <div class="btnspc43"></div>        
                              <input type="submit" value="SUBMIT" class="submit">
                            </form>
                          </div>                     
                          <script>
                            function reportDis(){
                              document.getElementById("report").style.display = "flex";
                            }
                            function reportunDis(){
                              document.getElementById("report").style.display = "none";
                            }
                          </script>
                        </div> 
                      </div>
                      <?php 
                      
                      if(str_word_count($bookcf)>300){
                        echo "<footer>
      <div class= \"fleft\">
        <h1>Book Site</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium
          nostrum libero consequuntur unde, provident perspiciatis rerum sint
          totam quos sed consequatur.
        </p>
      </div>
      <div class=\"fright\">
        <div class=\"frl\">
          <h2>Site Links</h2>
          <a href=\"../terms\">Terms</a>
          <br />
          <br />
          <a href=\"../contactus\">Contact Us</a>
        </div>
        <div class=\"flr\">
          <h2>Social Links</h2>
          <a href=\"https://www.facebook.com\"><i class=\"fab fa-facebook-square\" target=\"_blank\"></i></a>
          <a href=\"https://www.twitter.com\"
            ><i class=\"fab fa-twitter-square\" style=\"margin-left: 10px\" target=\"_blank\"></i>
          </a>
        </div>
      </div>
    </footer>
    <div class=\"cpyr\">©2021 Book Site All rights reserved.</div>";
                      }

                      ?>
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
                  </html>';
              fwrite($myfile, $txt);
            fclose($myfile);
            // Log submit
            $curdate = date("j") . "/" . date("n") ."/" . date("Y");
            $date = $curdate;
            $content = $username." submitted a book <br/> Title: ".$title." <br/> Description: ".$description." <br/> Book Content: ".$bookc." <br/> Dated:".$date;
            $query1 = "INSERT INTO logs (username, date, content) VALUES (?, ?, ?)";
            $result = mysqli_prepare($conn, $query1);
            if($result){
              mysqli_stmt_bind_param($result, "sss", $param_username, $param_date, $param_content);
              $param_username = $username;
              $param_date = $date;
              $param_content = $content;
              if(mysqli_stmt_execute($result)){
                header("location: ../books/" . $username . "_". $rid .".php");
              }mysqli_stmt_close($result);
            }
        }else{
            echo "Something went wrong... cannot redirect!";
        }
    }
  
  mysqli_stmt_close($stmt);
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
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
    <title>Publish A Book</title>
  </head>
  <body style="background: linear-gradient(rgba(255,255,255,.90), rgba(255,255,255,.90)), url('../img/bg.jpg')">
  <header>
      <div class="headh">Publish A Book</div>
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

<div class="container mt-4">
<h3><?php echo "A warm welcome ". $_SESSION['username']?></h3>
<hr style="border-color:black;">


<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputtitle4">Title:</label>
      <input type="text" class="form-control" name="title" id="inputtitle4" placeholder="Title" maxlength="60">
    </div>
    <div class="form-group col-md-6">
      <label for="inputdesc4">Description:</label>
      <input type="text" class="form-control" name ="description" id="inputdesc4" placeholder="Description:" maxlength="120">
    </div>
    <div class="form-group col-md-12">
      <label for="exampleFormControlTextarea1">Book Content:</label>
      <textarea class="form-control" name ="bookc" id="bookc" rows="14"></textarea>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
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
</html>




