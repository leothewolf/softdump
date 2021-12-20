<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="index.php" method="POST">
<input type="text" name="role">
<input type="submit">
</form>

<?php

$role=$_POST["role"];
$role=strtolower($role);

switch($role){
    case 'visitor':
        echo "Welcome Visitor";
    break;
    case 'admin':
        echo "Welcome Admin";
    break;
    case 'moderator':
        echo "Welcome Moderator";
    break;
    default: echo "User has no role";   
}

?>


</body>
</html>