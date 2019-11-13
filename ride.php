<?php 
session_start();
if(!isset($_SESSION["user"]))
{
    header("Location: http://localhost/Carpooling/Home.php");
}
?>

<html>

<head>
    <title>Car Pooling</title>
    <link rel="stylesheet" type="text/css" href="css/pool.css">
    <link rel="stylesheet" type="text/css" href="css/ride.css">
  
</head>

<body>
<div  class="section">

    <nav>
        <h5 class="title-of-site">Quick Ride</h5>
        <a href="Home.php"  title="go to home page">Home </a>
        <a href="ride.php" title="search for available rides"> Find Ride </a>
        <a href="ride.php" target="_blank" title="Give rides">Offer Ride</a>
        <a href="contact.html " title="see contacts"> Contact</a>
        <a href="http://localhost/html2/users.html" target="_blank" title="Feedback">Reviews</a>
        <a class="auth1" href="profile.php?user=<?php echo $_SESSION['user'] ?>" > <?php echo $_SESSION["user"] ?></a>
        <a class="auth1"   href="./PHP/logout.php">Logout</a>

    </nav>
   
    <div class="container">
        <form style="margin-left: 10%;margin-right: 10%;" method="post" action="PHP/booking.php">
            <p>Source</p>
            <input type="text" name="source" placeholder="Pickup....">
            <p>Destination</p>
            <input type="text" name="Destination" placeholder="Drop....">
            <p>Date</p>
            <input type="date" name="date" placeholder="dd-mm-yyyy">
            <p>No of Persons</p>
            <input type="number" max="6" min="1" name="quantity" placeholder="No of people">
            <br><br>
            <input type="submit" name="mode" value="Ride "> <br><br>
            <input type="submit" name="mode" value="Drive ">


        </form>

    </div>
 
</div>
  



</body>

</html>