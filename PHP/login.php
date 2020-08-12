<?php

session_start();
if(isset($_SESSION['user']))
{   
    header("Location: http://localhost/Carpooling/welcome.php");
}

$userid = $_POST["Userid"];
$password=$_POST["Password"];
if($userid!=null)
{ 
$_SESSION["user"]=$userid;
$_SESSION["password"]=$password;
//$remember=$_POST["remember"];

$con = new mysqli("localhost","root","","quickride");
if($con->connect_error)
    echo "Connection error"+ $con->connect_error;
$getdata = "select username,password from customers
            where username = '$userid'";

$result = $con->query($getdata);
if($result->num_rows > 0)
    {  $row = $result->fetch_assoc();
        $getcode = "select * from passkeys
            where username = '$userid'";
        $coderesult = $con->query($getcode);
        if($coderesult->num_rows > 0)
        {
            $row1 = $coderesult->fetch_assoc();
            $cipher =$row1["cipher"] ;
            $iv = $row1["iv"];
            $tag =$row1["tag"];
            $ciphertext = $row["password"];
            $original_password = openssl_decrypt($ciphertext, $cipher, null, $options=0, $iv, $tag);
            
        }
        
        if($original_password!=$password )
        {
            header("Location: http://localhost/Carpooling/index.php");
            session_unset();
            session_destroy();

        }
        else
        {header("Location: http://localhost/Carpooling/welcome.php?event=loggedin");
        exit;}
    }
else
    echo "invalid Username";    


$con->close();
}
?>