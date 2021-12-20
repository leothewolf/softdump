<?php $link = $_GET["link"]; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanks For Reporting</title>
    <link rel="stylesheet" href="css/testbook.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="shortcut icon" type="image/ico" href="https://iconarchive.com/download/i75808/martz90/circle/books.ico">
</head>
<body class="reportcon">
    <div class="repth">
        <img src="img/mdvdthkyou.gif" alt="Trouble Loading Image">
        <p>Thanks for reporting and helping us keep this site moderated. Your report will be reviewed and an action will be taken within 24 hours. If you find any other book content violating terms feel free to report anytime.</p>
        <a href="<?php echo $link; ?>"><button>Navigate Back To The Book</button></a>
        <a href="/book_site"><button style="margin-top:10px;">Read More Books <i class="fas fa-book-reader"></i></button></a>
    </div>
</body>
</html>