<?php 
session_start();
if(isset($_SESSION["username"])){
    $session_username = $_SESSION["username"];
    if($_SESSION["username"] != "admin"){
        header("location: ../");
    }
}else{
    header("location: ../login");
}

require_once "config.php";
        $sql = "SELECT * FROM users";
        if ($result=mysqli_query($conn,$sql)) {
            $usercount=mysqli_num_rows($result);
            $usercount = $usercount - 1;
        }
        $sql = "SELECT * FROM reports";
        if ($result=mysqli_query($conn,$sql)) {
            $reportcount=mysqli_num_rows($result);
        }
        $sql = "SELECT * FROM books";
        if ($result=mysqli_query($conn,$sql)) {
            $bookcount=mysqli_num_rows($result);
        }
        $sql = "SELECT * FROM logs";
        if ($result=mysqli_query($conn,$sql)) {
            $logcount=mysqli_num_rows($result);
        }

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@600;700&display=swap');
    .bsit a{
        text-decoration:none;
        color:#444;
    }
    .bsit a:hover{
        text-decoration:underline;
    }
    </style>
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
    <header>
    <div class="headext" id="headext">
        <a href="../profile" style="text-decoration: none;color:black;"><span><i class="fas fa-user"></i>Profile</span></a>
        <a href="../" style="text-decoration: none;color:black;"><span><i class="fas fa-book-reader"></i>Read Books</span></a>
        <a href="../mybooks" style="text-decoration: none;color:black;"><span><i class="fas fa-swatchbook"></i>MyBooks</span></a>
        <a href="../publishabook" style="text-decoration: none;color:black;"><span><span><i class="fas fa-book"></i>Publish A Book</span></a>
        <a href="../bookmarks" style="text-decoration: none;color:black;"><span><i class="fas fa-bookmark"></i>Bookmarks</span></a>
      <a href="../logout.php" style="text-decoration: none;color:black;"><span style="border-bottom: none"
        ><i class="fas fa-sign-out-alt"></i> Logout</span
      ></a>
    </div>
      <div class="headh"><i class="fas fa-bars" onclick="sideBar1()"></i> <div class="headhh">Book Site</div></div>
      <?php 
      
      if(isset($session_username)){
          echo '<div class="headu" id="headu" onclick="headerDis()">
        <i class="fas fa-user-circle"></i>
        <div class="headuu">'.$session_username.'</div>
      </div>';
      }else{
          echo '<div class="headu" id="headu">
          <div class="headuu" id="headuu"><a href="../login.php" style="text-decoration: none;color:white;">Login<i class="fas fa-sign-in-alt" style="font-size: 20px;margin-left:5px;"></i></a></div>
      </div>';
      }

      ?>
  </header>
  <div class="mainbody" style="background: linear-gradient(rgba(255,255,255,.5), rgba(255,255,255,.5)), url('../img/bg.jpg');">
        <div class="sidebarmain">
            <div class="sidebar">
                <span onclick="userDis()">Users</span>
                <span onclick="bookDis()">Books</span>
                <span onclick="reportDis()">Reports</span>
                <span onclick="logDis()">Logs</span>
            </div>
        </div>

        <div class="sidebarmainmobile" id="sidebarmainmobile">
            <div class="sidebarmobile">
                <span onclick="userDis(); sidebarHide()">Users</span>
                <span onclick="bookDis(); sidebarHide()">Books</span>
                <span onclick="reportDis(); sidebarHide()">Reports</span>
                <span onclick="logDis(); sidebarHide()">Logs</span>
            </div>
        </div>

        <div class="mainpanel" id="mainpanel">

            <!-- Users -->
            <div class="users" id="users">
            <div class="nouser">
                Number Of Users:
                <div class="nu"><?php echo $usercount?></div>
            </div>
            <?php 

                if($usercount == 0){
                    echo '<div class="nsh">
                        <img src="../img/magnify.png" alt="">
                        NOTHING TO SHOW HERE
                    </div>';
                }

            ?>
            
                <!-- <span>
                    <div class="info">username</div>
                    <div class="button"><button>DELETE</button></div>
                </span> -->
                <?php 

                require_once "config.php";

                $query="SELECT * FROM users";

                $Table = mysqli_query($conn,$query);

                while($Row=mysqli_fetch_array($Table)){
                    if($Row["username"] != "admin"){
                        echo '<span>
                        <div class="info">'.$Row["username"].'</div>
                        <div class="delbutton">
                            <div class="delbuttonc" id="delbuttonc'.$Row["username"].'">
                                <a href="userdelete.php?username='.$Row["username"].'"><button id="canbtn">CONFIRM</button></a>
                                <button id="conbtn" onclick="myDel(x=&apos;'.$Row["username"].'&apos;)">CANCEL</button>
                            </div>
                            <button class="delbtn" id="delbtn'.$Row["username"].'" onclick="myFunction(x=&apos;'.$Row["username"].'&apos;)">DELETE</button>
                        </div>

                    </span>';
                    }
                }
                ?>
                <script>
                        function myFunction(x) {
                            var getId = "delbuttonc" + x;
                            var getId2 = "delbtn" + x;
                            document.getElementById(getId).style.display = "flex";
                            document.getElementById(getId2).style.display = "none";
                        }
                        function myDel(x) {
                            var delId = "delbuttonc" + x;
                            var delId2 = "delbtn" + x;
                            document.getElementById(delId).style.display = "none";
                            document.getElementById(delId2).style.display = "initial";
                        }
                </script>
            </div>
            <!-- Users End -->

            <!-- Books -->
            <div class="books" id="books">
                <div class="nouser">
                    Number Of Books:
                    <div class="nu"><?php echo $bookcount; ?></div>
                </div>
                <?php 

                if($bookcount == 0){
                    echo '<div class="nsh">
                        <img src="../img/magnify.png" alt="">
                        NOTHING TO SHOW HERE
                    </div>';
                }

                ?>
                <div class="bookboard">
                    <!-- <div class="bs">
                        <div class="bsi">
                            <i class="fas fa-book"></i>
                            <div class="bsinfo">
                                <div class="bsit">Title: </div>
                                <div class="bsit">Desc: </div>
                            </div>
                        </div>
                        <div class="bsb">
                            <div class="bsbc">
                                <button>CANCEL</button>
                                <button>CONFIRM</button>
                            </div>
                            <button>DELETE</button>
                        </div>
                    </div> -->
                    <?php 
                    
                    require_once "config.php";

                    $query="SELECT * FROM books";

                    $Table = mysqli_query($conn,$query);

                    while($Row=mysqli_fetch_array($Table)){
                        echo '<div class="bs">
                        <div class="bsi">
                            <i class="fas fa-book"></i>
                            <div class="bsinfo">
                                <div class="bsit">Title: <a href="../books/'.$Row["username"].'_'.$Row["id"].'.php" target="_blank">'.$Row["title"].'<a/></div>
                                <div class="bsit">Desc: '. $Row["description"] .'</div>
                            </div>
                        </div>
                        <div class="bsb">
                            <div class="bsbc" id="bsbc'.$Row["id"].'">
                                <button class="bccancel" onclick="myDel1(x=&apos;'.$Row["id"].'&apos;)">CANCEL</button>
                                <a href="bdelete.php?id='.$Row["id"].'&tusername='.$Row["username"].'"><button class="bcconfirm">CONFIRM</button></a>
                            </div>
                            <button class="bcdel" id="bsdelbtn'.$Row["id"].'" onclick="myFunction1(x=&apos;'.$Row["id"].'&apos;)">DELETE</button>
                        </div>
                    </div>';
                    }

                    ?>
                    <script>
                        function myFunction1(x) {
                            var getId = "bsbc" + x;
                            var getId2 = "bsdelbtn" + x;
                            document.getElementById(getId).style.display = "flex";
                            document.getElementById(getId2).style.display = "none";
                        }
                        function myDel1(x) {
                            var delId = "bsbc" + x;
                            var delId2 = "bsdelbtn" + x;
                            document.getElementById(delId).style.display = "none";
                            document.getElementById(delId2).style.display = "initial";
                        }
                    </script>
                </div>
            </div>
            <!-- Books End -->

            <!-- Reports Start -->
            
            <div class="reports" id="reports">
                <div class="nouser">
                    Reports:
                    <div class="nu"><?php echo $reportcount; ?></div>
                </div> 
                <?php 
                
                if($reportcount > 0){
                    echo '<a href="reportdel.php"><button class="reportdelbtn"><i class="far fa-trash-alt"></i> CLEAR REPORT LOGS</button></a>';
                }else{
                    echo '<div class="nsh">
                        <img src="../img/magnify.png" alt="">
                        NOTHING TO SHOW HERE
                    </div>';
                }
                
                ?>
                <div class="rboard">

                    <?php 
                    
                    $query="SELECT * FROM reports";
                    $Table = mysqli_query($conn,$query);
                    while($Row=mysqli_fetch_array($Table)){
                        echo '<div class="replog">
                        <i class="fas fa-chevron-right"></i>
                        <p>'.$Row["reason"].'</p>
                    </div>';
                    }

                    ?>
                </div>
            </div>

            <!-- Reports End -->

            <!-- Logs start -->

            <div class="logs" id="logs">
            <div class="nouser">
                    Logs:
                    <div class="nu"><?php echo $logcount; ?></div>
                </div> 
                <?php 

                if($logcount > 0){
                    echo '<a href="logdel.php"><button class="logdelbtn"><i class="far fa-trash-alt"></i> CLEAR LOGS</button></a>';
                }else{
                    echo '<div class="nsh">
                        <img src="../img/magnify.png" alt="">
                        NOTHING TO SHOW HERE
                    </div>';
                }

                ?>
                <div class="lgboard">
                    <!-- <div class="lglog">
                        <i class="fas fa-chevron-right"></i>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quam ut ducimus ad nulla suscipit ullam, cupiditate exercitationem officiis esse sed.</p>
                    </div> -->

                    <?php 
                    
                    $query="SELECT * FROM logs";
                    $Table = mysqli_query($conn,$query);
                    while($Row=mysqli_fetch_array($Table)){
                        echo '<div class="lglog">
                        <i class="fas fa-chevron-right"></i>
                        <p>'.$Row["content"].'</p>
                    </div>';
                    }

                    ?>
                </div>
            </div>

            <!-- Logs End -->
        </div>
    </div>

    <script>
        function userDis(){
            document.getElementById("users").style.display = "initial";
            document.getElementById("books").style.display = "none";
            document.getElementById("reports").style.display = "none";
            document.getElementById("logs").style.display = "none";
        }
        function bookDis(){
            document.getElementById("users").style.display = "none";
            document.getElementById("books").style.display = "initial";
            document.getElementById("reports").style.display = "none";
            document.getElementById("logs").style.display = "none";
        }
        function reportDis(){
            document.getElementById("users").style.display = "none";
            document.getElementById("books").style.display = "none";
            document.getElementById("reports").style.display = "initial";
            document.getElementById("logs").style.display = "none";
        }
        function logDis(){
            document.getElementById("users").style.display = "none";
            document.getElementById("books").style.display = "none";
            document.getElementById("reports").style.display = "none";
            document.getElementById("logs").style.display = "initial";
        }
    </script>
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
      var timesClicked1 = 0;
      function sideBar1() {
        if (timesClicked1 % 2 == 0) {
          document.getElementById("sidebarmainmobile").style.display = "initial";
          timesClicked1++;
        } else {
          document.getElementById("sidebarmainmobile").style.display = "none";
          timesClicked1++;
        }
      }
      function sidebarHide(){
        document.getElementById("sidebarmainmobile").style.display = "none";
        timesClicked1++; 
      }
  </script>
</body>
</html>