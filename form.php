<?php
$db_server = "localhost";
$user = "root";
$pass = "";
$db_name = "mydat";
$conn = "";

try{
    $conn = mysqli_connect($db_server, $user , $pass,  $db_name);

}
catch (mysqli_sql_exception){
    echo "no connect!";

}

?>