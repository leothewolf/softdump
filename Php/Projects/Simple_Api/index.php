<?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){ 
        if(isset($_GET["token"])){
            if($_GET["token"] == "JzdWIiOiIxMjM0NTY3ODkwIiwibm"){
                if(isset($_GET["message"]) && isset($_GET["reply"])){
                    $input = "'".$_GET["message"] . "' : '" . $_GET["reply"]."'";
                    if(strpos(file_get_contents("abc.txt"),$input) !== false) {
                        echo "Already in file";
                    }else{
                        $fp = fopen('abc.txt', 'a');//opens file in append mode  
                        fwrite($fp, "\n".$input);   
                        fclose($fp);  
                        
                        echo "File appended successfully"; 
                    }
                }else{
                    echo "No message variable set";
                }
            }else{
                echo "Token wrong!!";
            }
        }else{
            echo "Token not set";
        }
    }
?>
