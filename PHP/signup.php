<?php
$firstname = $_POST["fname"];
$lastname = $_POST["Lname"];
$gender = $_POST["Gender"];
$email = $_POST["email"];
$city = $_POST["city"];
$mobile = $_POST["phoneno"];
$user=$_POST["Uid"];
$password = $_POST["password"];
$con = new mysqli("localhost","root","","quickride");
$cipher = "aes-128-gcm";
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (in_array($cipher, openssl_get_cipher_methods()))
{
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext = openssl_encrypt($password, $cipher, $key, $options=0, $iv, $tag);
    $original_plaintext = openssl_decrypt($ciphertext, $cipher, $key, $options=0, $iv, $tag);
    $sql = "insert into encrypt values('$user','$cipher','$iv','$tag')";
    $con->query($sql);

}
$storedata = "insert into customers values('$firstname','$lastname','$gender','$email','$city','$mobile','$user','$ciphertext')";

if ($con->query($storedata) === TRUE) {
    echo "Customer registered successfully";
} else {
    echo "Error in registration: " . $conn->error;
}
header("Location: http://localhost/quickride/Home.html");
exit;
$con->close();

?>