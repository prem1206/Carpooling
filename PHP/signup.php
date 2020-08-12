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
$createtable = "CREATE TABLE passkeys (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username varchar(15) NOT NULL,
    cipher VARCHAR(30) NOT NULL,
    iv VARCHAR(30) NOT NULL,
    tag varchar(10)
    )";
 
 $con->query($createtable);
if (in_array($cipher, openssl_get_cipher_methods()))
{
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($password, $cipher, null, $options=0, $iv, $tag);
    $original_plaintext = openssl_decrypt($ciphertext, $cipher, null, $options=0, $iv, $tag);
    $sql = "insert into passkeys(username,cipher,iv,tag) values('$user','$cipher','$iv','$tag')";
    
}
$createtb = "CREATE TABLE customers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname varchar(15) NOT NULL,
    lastname varchar(15) NOT NULL,
    gender VARCHAR(6) NOT NULL,
    email varchar(30) NOT NULL,
    city varchar(15) NOT NULL,
    mobile varchar(10) NOT NULL, 
    username varchar(15) NOT NULL,
    password varchar(60) NOT NULL
    )";
 
$con->query($createtb);
$storedata = "insert into customers (firstname,lastname,gender,email,city,mobile,username,password) values('$firstname','$lastname','$gender','$email','$city','$mobile','$user','$ciphertext')";

if ($con->query($storedata) === TRUE) {
    echo "Customer registered successfully";
    $con->query($sql);
    header("Location: http://localhost/Carpooling/welcome.php?event=signedup");
exit;
} else {
    echo "Error in registration: " . $con->error;
    session_unset();
    session_destroy();
}

$con->close();

?>