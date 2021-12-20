<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="contactus"></div>
        <h1>Contact Us</h1>
        <form action="index.php" method="post">
        <input type="text" name="fname" placeholder="First Name">
        <br>
        <br>
        <input type="text" name="lname" placeholder="Last Name">
        <br>
        <br>
        <input type="text" name="subject" placeholder="Subject">
        <br>
        <br>
        <input type="email" name="email" placeholder="Email">
        <br>
        <br>
        <textarea name="opt_msg" placeholder="Message"></textarea>
        <br>
        <br>
        <input type="submit" value="Submit">
        </form>
    </div>
    <?php

    if (isset($_POST['submit'])) {

        $fname = "\n" . "First Name: " . $_POST["fname"] . "\n";
        $lname = "Last Name: " . $_POST["lname"] . "\n";
        $subject = "Subject: " . $_POST["subject"] . "\n";
        $email = "Email: " . $_POST["email"] . "\n";
        $opt_msg = "Optional Message: " . $_POST["opt_msg"] . "\n";

        $header="From: ".$email;

        $message="You recieved an email from". $fname . "/n/n" . $opt_msg;
        
        $myfile = fopen("uploads/file.txt","a");

        fwrite($myfile , $fname);
        fwrite($myfile , $lname);
        fwrite($myfile , $subject);
        fwrite($myfile , $email);
        fwrite($myfile , $opt_msg);

        $myemail="myemail@mail.com";
        mail($myemail,$subject,$message,$header);
    }
    ?>
</body>
</html>