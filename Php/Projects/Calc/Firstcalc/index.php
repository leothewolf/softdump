<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 
<form action="index.php" method="get">
    Num1: <input type="number" name="num1">
    <br>
    <br>
    Num2: <input type="number" name="num2">
    <br>
    <br>
    <button type="submit">Submit</button>
</form>
Answer:
<?php 
echo $_GET["num1"] * $_GET["num2"];

?>
</body>
</html>