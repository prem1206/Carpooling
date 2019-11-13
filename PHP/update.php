<?php
session_start();
if(!isset($_SESSION["user"]))
{
    header("Location: http://localhost/Carpooling/Home.php");
}
$temp = $_SESSION["user"];
$mobile = $_POST["phoneno"];
$user=$_POST["Uid"];
$con = new mysqli("localhost","root","","quickride");
$update =  "UPDATE customers
SET username = '$user',mobile ='$mobile'
WHERE username = '$temp'";

$con->query($update);
$_SESSION["user"] = $user;

header("Location: http://localhost/Carpooling/profile.php?user=$user");
$con->close();

?>
<script>
    alert("into update");
    </script>