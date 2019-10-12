<?php
session_start();
$firstname = $_POST["fname"];
$lastname = $_POST["Lname"];
$gender = $_POST["Gender"];
$email = $_POST["email"];
$city = $_POST["city"];
$mobile = $_POST["phoneno"];
$user=$_POST["Uid"];
$_SESSION['user']=$user;
$password = $_POST["password"];
$con = new mysqli("localhost","root","","quickride");
$cipher = "aes-128-gcm";
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
    session_unset();
    session_destroy();
}
if (in_array($cipher, openssl_get_cipher_methods()))
{
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($password, $cipher, null, $options=0, $iv, $tag);
    $original_plaintext = openssl_decrypt($ciphertext, $cipher, null, $options=0, $iv, $tag);
    $sql = "insert into passkeys values('$user','$cipher','$iv','$tag')";
    
}
$storedata = "insert into customers values('$firstname','$lastname','$gender','$email','$city','$mobile','$user','$ciphertext')";

if ($con->query($storedata) === TRUE) {
    echo "Customer registered successfully";
    $con->query($sql);
header("Location: http://localhost/Carpooling/welcome.php");
exit;
} else {
    echo "Error in registration: " . $con->error;
    session_unset();
    session_destroy();
}

$con->close();

?>