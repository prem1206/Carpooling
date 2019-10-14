<?php
$value = $_REQUEST["value"];
$flag = $_REQUEST["flag"];

$con = new mysqli("localhost","root","","quickride");
if($con->connect_error)
    echo "Connection error"+ $con->connect_error;


if($flag == 1){
    $temp = "email";
 }
 if($flag == 2){
    $temp = "mobile";
 }
 if($flag == 3){
    $temp = "username";
 }

$getuser = "select $temp from customers
            where $temp = '$value'";

$result = $con->query($getuser);
if($result->num_rows > 0)
    {        
        echo "0";
    }
else
    echo "1";    


$con->close();

?>
