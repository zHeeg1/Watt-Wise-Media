<?php      
    $host = "192.168.159.226:3306";  
    $user = "Projectgroep";  
    $password = 'REGENBOOG';  
    $db_name = "Project";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  