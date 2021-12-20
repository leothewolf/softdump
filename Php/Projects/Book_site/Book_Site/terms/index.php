<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms</title>
    <link rel="stylesheet" href="../css/testbook.css">
    <link rel="stylesheet" href="../css/header.css">
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
      <div class="headh">Terms</div>
      <?php 

      session_start();

      if(isset($_SESSION["username"])){
          $username = $_SESSION["username"];
      }
      
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
      <a href="../publishabook" style="text-decoration: none;color:black;"><span><span><i class="fas fa-book"></i>Publish A Book</span></a>
      <a href="../bookmarks" style="text-decoration: none;color:black;"><span><i class="fas fa-bookmark"></i>Bookmarks</span></a>
      <a href="../logout.php" style="text-decoration: none;color:black;"><span style="border-bottom: none"
        ><i class="fas fa-sign-out-alt"></i> Logout</span
      ></a>
    </div>
    <div class="title">Terms</div>
    <div class="bookc">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi commodi reprehenderit molestiae recusandae possimus dignissimos id ducimus. Voluptatem, quidem pariatur. Repellat mollitia explicabo ea, facilis cumque cum alias amet quidem natus. Atque a labore eveniet est laboriosam vel placeat repellendus quibusdam ab cupiditate! Reprehenderit dolore praesentium, provident laudantium rerum delectus accusamus eos iure architecto molestiae eum, fuga pariatur voluptate aspernatur, excepturi et non nihil quia enim? Deserunt error officia omnis assumenda, dolorem voluptates quia accusamus, esse saepe ipsa nemo vero, delectus et eligendi eius fugiat dolorum. Error quas dicta quis sed reiciendis nobis eveniet sequi, iure aut perferendis nostrum dolores dolorem libero ducimus esse ipsam. Accusantium consequuntur ratione atque a suscipit voluptatum, ea architecto magnam maiores rem natus praesentium. Possimus suscipit commodi expedita minima explicabo, molestiae excepturi voluptatem hic. 
        <br>
        <br>
        Exercitationem dolorum explicabo id libero provident, et atque commodi repellat illo sapiente. Accusamus, cum architecto sint natus at ad officia esse quam officiis ex dolorum harum a quaerat eos ipsum praesentium totam explicabo? Non omnis ipsum blanditiis aspernatur, nobis quibusdam consequatur, natus ipsa voluptatum adipisci perspiciatis placeat. Eos, delectus numquam, nostrum vitae quia amet pariatur harum dignissimos non, enim laboriosam? Aliquid porro voluptas excepturi, assumenda ullam corrupti asperiores expedita ut itaque consectetur ipsum animi quibusdam vel! Voluptas eius nulla vitae odio sapiente ex accusantium quae consequatur pariatur distinctio natus fuga perspiciatis, similique animi ipsa laborum dolores quisquam hic ipsam corrupti exercitationem mollitia in inventore? Voluptatibus veritatis non eius totam cupiditate, aut officiis obcaecati voluptates nisi. Commodi earum animi cupiditate, delectus explicabo sequi ad suscipit cumque laudantium velit quidem asperiores dolorem quasi mollitia ea dicta cum eligendi dolorum. 
        <br>
        <br>
        Illum esse, exercitationem, pariatur sint iusto repudiandae deserunt non magni consectetur beatae, sit expedita illo labore soluta rerum ullam porro dicta! Sequi, maxime. Rerum, accusantium, quod ipsum iste ab quia autem ad aliquam qui excepturi cum, sapiente deleniti? Quis incidunt eos cupiditate soluta recusandae animi qui perspiciatis veritatis, commodi veniam sed delectus ea nam repellendus modi facilis ut nulla nisi fugiat labore consequuntur molestias maiores a architecto? Maxime veniam pariatur, obcaecati molestias libero iste optio reiciendis dolores recusandae expedita nulla nemo sunt magni quo facilis ullam hic magnam exercitationem ut blanditiis, eveniet nam. Ratione magni nam praesentium dolor atque labore voluptates voluptatem. Tempora perferendis neque ipsam voluptas tenetur qui repellat expedita libero quam, laboriosam nam inventore. Nesciunt id temporibus quod corporis ipsa odio non adipisci harum voluptas iusto itaque natus aspernatur, optio perferendis vitae officia deserunt libero. Vero dolorum, in eaque rerum fugit officiis illo nisi, dolorem expedita, obcaecati ratione! Commodi minus libero voluptatum labore ea quod porro voluptates sed laborum fugiat et dolorum, exercitationem magnam ratione aliquam blanditiis autem amet voluptas consequatur, nihil atque consequuntur? 
        <br>
        <br>
        Provident officiis tempora natus minima! Ex fuga, ullam unde commodi libero veniam quam architecto mollitia! Pariatur, quibusdam placeat maiores, rerum dolore natus iure tenetur architecto autem dolorem quidem minus cum ad tempora vitae deserunt et blanditiis. Accusantium a nam tempore saepe rem maiores laboriosam officiis quia repellendus, incidunt quae ex earum in dicta! Placeat aperiam distinctio fugit hic aspernatur provident, molestias porro in dolorem quos repudiandae eum dolor repellat assumenda! Consectetur et delectus accusantium iusto, officia dignissimos, dolor vel repellendus veniam ipsum perspiciatis pariatur laborum sed cumque suscipit ratione! Cumque praesentium iste illo numquam, nobis voluptatum enim corrupti illum excepturi sit laudantium unde. Officiis quam doloribus ab aliquam molestiae architecto aut voluptatum est quisquam illum. Ratione, nihil quaerat. Itaque provident perferendis ad reprehenderit repellat esse magnam officia. Aperiam, eum ea. Nulla nobis, sequi saepe consequatur harum aliquam officiis eligendi, rem impedit, unde nam asperiores repudiandae in! Amet modi totam consequatur autem qui placeat expedita est nemo aperiam vero, ipsam sunt debitis! Ipsam, quam officia minus vel porro sequi qui, placeat, sunt dolor rerum voluptas voluptatum minima nihil iusto quas quaerat maxime nobis obcaecati. Repellendus ut molestiae ullam magni fugit quibusdam error officiis voluptatem? 
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