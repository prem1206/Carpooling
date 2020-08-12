<?php 
session_start();
if(!isset($_SESSION["user"]))
{
    header("Location: http://localhost/Carpooling/Home.php");
}

?>

<!doctype html>
<html>

<head>
    <title>Car Pooling</title>
    <link rel="stylesheet" type="text/css" href="css/pool.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <script src="script/Home.js"></script>
    <script src="script/welcome.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
</head>

<body>
    <div  class="section">
        <div class="video-control">
            <video autoplay loop muted>
                <source src="videos/Road-Tripping.mp4" type="video/mp4">
            </video>
        </div>
<?php 
if(!isset($_GET["event"]))
    $_GET["event"]=null;
if($_GET["event"]==="loggedin"){ ?>        
        <div id="welcome" style="display:block" class="welcome-container">
            Welcome to<br> QuickRide !!!!
        </div>
<?php }  elseif($_GET["event"]=="Booked"){ ?>        
        <div id="welcome" style="display:block" class="welcome-container">
            Ride Booked Successfully !!!<br>
        </div>
<?php }  elseif($_GET["event"]=="signedup"){ ?>        
        <div id="welcome" style="display:block" class="welcome-container">
            Registered Successfully !!!<br>
        </div>
        
<?php } else{ ?>        
    
<?php } ?>


        <nav>
            <h5 class="title-of-site">Quick Ride</h5>
            <a href="Home.php"  title="go to home page">Home </a>
            <a href="ride.php" title="search for available rides"> Find Ride </a>
            <a href="ride.php" title="Give rides">Offer Ride</a>
            <a href="contact.html " title="see contacts"> Contact</a>
            <a href="http://localhost/html2/users.html" target="_blank" title="Feedback">Reviews</a>
            <a class="auth1" href="profile.php?user=<?php echo $_SESSION['user'] ?>" > <?php echo $_SESSION["user"] ?></a>
            <a class="auth1"   href="./PHP/logout.php">Logout</a>
    
        </nav>
        <h1 style="color:transparent;background-color:transparent">Quick Ride</h1>
        <form class="shortcut" action="PHP/booking.php" method="post">
            <input type="text" required name="source" onfocus="onfocus1(this)" onblur="onfocus2(this)" placeholder="Leaving from....">
            <input type="text" required name="Destination" onfocus="onfocus1(this)" onblur="onfocus2(this)" placeholder="Going to.... ">
            <input type="date" required name="date" onfocus="onfocus1(this)" onblur="onfocus2(this)" placeholder="Travel Date">
            <input type="number" required max="6" name="quantity" min="1" onfocus="onfocus1(this)" onblur="onfocus2(this)" placeholder="Passenger ">
            <input type="submit" name="mode" value="Ride ">
        </form>
   
    </div>
      
    <div class="offerride">
        <div class="offerride-img">
            <img src="images/home_driver.jpg" width="400px" height="300px">
        </div>
        <div class="offerride-content">
            <h2 style="color: rgb(5, 71, 82);font-size: 30px;font-weight: 700;line-height: 1.06;">
                Driving in your car soon?</h2>
            <h3 style="color: rgb(112, 140, 145);font-size: 16px; line-height: 20px;">
                Lets make this your least expensive journey ever</h3><br>
            <a href="ride.php" style="background-color: rgb(0, 175, 245);  color: rgb(255, 255, 255);">Offer Ride</a>
        </div>
    </div>

    
    <footer class="footer">
        <div class="row">
            <div class="column" >
            <p>Posted by: SomeExample Enterprose Ltd</p>
      <p>Contact information: <a href="mailto:someone@example.com">some@example.com</a>.</p>
      <p>Terms and Conditions</p>
             </div>
            <div class="column">
                  
                <p>Contacts</p>
                 <p>About us</p>
                <p>Frequently asked question</p>
            </div>
        </div>  
     
    </footer>
</body>



</html>