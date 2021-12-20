<?php $targetuser ="'.$username.'";
                            $targettitle ="'.$title.'";
                            $targetdescription ="'.$description.'";
                            require_once "config.php";
                            $query = "SELECT * FROM books WHERE username = \'$targetuser\' AND description = \'$targetdescription\'";
                            $Table = mysqli_query($conn,$query); 
                            while($Row=mysqli_fetch_array($Table)){
                              $title = $Row["title"];
                              $bookc = $Row["bookc"];
                            }
              ?>
              <html lang="en">
                    <head>
                      <meta charset="UTF-8" />
                      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                      <title>'.$title.' | '.$username.' | '.$sitename.'</title>
                      <link rel="stylesheet" href="../css/testbook.css" />
                      <style>
                        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap");
                      </style>
                    </head>
                    <body>
                      <div class="content">
                        <div class="title">
                          <?php echo $title; ?>
                        </div>
                        <div class="bookc">
                          <?php echo $bookc; ?>
                        </div>
                      </div>
                    </body>
                  </html>