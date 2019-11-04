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
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
</head>

<body >
    <div  class="section">
        <div class="video-control">
            <video autoplay loop muted>
                <source src="videos/Road-Tripping.mp4" type="video/mp4">
            </video>
        </div>
        <div id="overlay"></div>

        <nav>
            <h5 class="title-of-site">Quick Ride</h5>
            <a href="Home.php"  title="go to home page">Home </a>
            <a href="ride.html" title="search for available rides"> Find Ride </a>
            <a href="ride.html" target="_blank" title="Give rides">Offer Ride</a>
            <a href="contact.html " title="see contacts"> Contact</a>
            <a href="http://localhost/html2/users.html" target="_blank" title="Feedback">Reviews</a>
            <a class="auth1" href="profile.php?user=<?php echo $_SESSION['user'] ?>" > <?php echo $_SESSION["user"] ?></a>
            <a class="auth1"   href="./PHP/logout.php">Logout</a>
    
        </nav>
        <h1 style="color:transparent;background-color:transparent">Quick Ride</h1>
        <div id="log" class="container">
                <button class="close" onclick="logout()">X</button>
            <form id="myheader" action="PHP/login.php" method="POST">
                <div class="login-head" >Login</div>
                
                <input type="text" name="Userid" placeholder="Username">
                <input type="password" name="Password" placeholder="password">
                <input type="submit" name="submit" value="Log in">
                <p><input type="checkbox" name="remember"> Remember Me</p>
            </form>
        </div>

        <div class="shortcut">
            <input type="text" onfocus="onfocus1(this)" onblur="onfocus2(this)" placeholder="Leaving from....">
            <input type="text" onfocus="onfocus1(this)" onblur="onfocus2(this)" placeholder="Going to.... ">
            <input type="date" onfocus="onfocus1(this)" onblur="onfocus2(this)" placeholder="Travel Date">
            <input type="submit" onclick="onfocus(this)" placeholder="Find Ride ">
        </div>
   
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
            <a href="ride.html" style="background-color: rgb(0, 175, 245);  color: rgb(255, 255, 255);">Offer Ride</a>
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