<?php


session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: ../login");
}

$username = $_SESSION['username'];

$id = $_GET["id"];
$musername = $_GET["username"];

if($username != $musername){
    header("location: ../mybooks");
}


require_once "../config.php";

$query="SELECT * FROM books WHERE username = '$username' AND id = '$id'";

$Table = mysqli_query($conn,$query);

while($Row=mysqli_fetch_array($Table)){
    $sbookc = $Row["bookc"];
    $stitle = $Row["title"];
    $sdescription =  $Row["description"];
    $seditdate = $Row["editdate"];
}


if ($_SERVER['REQUEST_METHOD'] == "POST"){
  $title = $_POST["etitle"];
  $description = $_POST["edescription"];
  $bookc = $_POST["ebookc"];
    $curdate = date("j") . "/" . date("n") ."/" . date("Y");
    $date = $curdate;

  $query = "UPDATE books SET title='$title', description='$description', bookc='$bookc', editdate='$date' WHERE id='$id'";
    if (mysqli_query($conn, $query))
    {
      $curdate = date("j") . "/" . date("n") ."/" . date("Y");
      $date = $curdate;
      $content = $username." edited book <br/> Title: ".$stitle." <br/> Edited Title: ".$title." <br/> Description: ".$sdescription." <br/> Edited Description: ".$description." <br/> Book Content: ".$sbookc." <br/> Edited Book Content: ".$bookc.". <br/> Dated:".$date;
      $query = "INSERT INTO logs (username, date, content) VALUES (?, ?, ?)";
      $result = mysqli_prepare($conn, $query);
      if($result){
        mysqli_stmt_bind_param($result, "sss", $param_username, $param_date, $param_content);
        $param_username = $username;
        $param_date = $date;
        $param_content = $content;
        if(mysqli_stmt_execute($result)){
          header("location: ../books/" . $username . "_". $id .".php");
        }mysqli_stmt_close($result);
      }
    }else{
        echo "Something went wrong... cannot redirect!";
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
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">

    <title>Edit Book</title>
  </head>
  <body  style="background: linear-gradient(rgba(255,255,255,.90), rgba(255,255,255,.90)), url('../img/bg.jpg')">
  
  <header>
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
      <div class="headh">Book Site</div>
      <?php 
      
      if(isset($username)){
          echo '<div class="headu" id="headu" onclick="headerDis()">
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
  <script>
      var timesClicked = 0;
      function headerDis() {
        if (timesClicked % 2 == 0) {
          document.getElementById("headext").style.display = "initial";
          timesClicked++;
        } else {
          document.getElementById("headext").style.display = "none";
          timesClicked++;
        }
      }
  </script>

<div class="container mt-4">



<form action="" method="post">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputtitle4">Title:</label>
      <input type="text" class="form-control" name="etitle" id="etitle" placeholder="Title" maxlength="60" value="<?php echo $stitle ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputdesc4">Description:</label>
      <input type="text" class="form-control" name ="edescription" id="edescription" placeholder="Description:" maxlength="120" value="<?php echo $sdescription ?>">
    </div>
    <div class="form-group col-md-12">
      <label for="exampleFormControlTextarea1">Book Content:</label>
      <textarea class="form-control" name ="ebookc" id="ebookc" rows="17"><?php echo $sbookc?></textarea>
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
</html>





