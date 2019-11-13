<?php 
session_start();
if(!isset($_SESSION["user"]))
{
    header("Location: http://localhost/Carpooling/Home.php");
}
else{
    $source = $_POST["source"];
    $destination = $_POST["Destination"];
    $date = $_POST["date"];
    $passenger = $_POST["quantity"];
    
    #$api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$source."&destinations=".$destination."&key=");
    $con = new mysqli("localhost","root","","quickride");
    $user = $_SESSION["user"];
    $createtable = "CREATE TABLE Bookings (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username varchar(15) NOT NULL,
        source VARCHAR(30) NOT NULL,
        destination VARCHAR(30) NOT NULL,
        ridedate varchar(10),
        passenger int
        )";
     
    // $con->query($createtable);    Uncomment it when running first time
         
        $sql = "INSERT into Bookings(username,source,destination,ridedate,passenger)
         VALUES('$user','$source','$destination','$date','$passenger')";
         if ($con->query($sql) === TRUE) {
            echo "Table MyGuests created successfully";
        } else {
            echo "Error creating table: " . $con->error;
        }
        header("Location: http://localhost/Carpooling/welcome.php?event=Booked");
        $con->close();
}

?>
