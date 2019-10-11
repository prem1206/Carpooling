<?php 
session_start();
if(isset($_SESSION['user']))
{
    header("Location: http://localhost/quickride/welcome.php");
}
?>
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
            <a href="Home.html"  title="go to home page">Home </a>
            <a href="ride.html" title="search for available rides"> Find Ride </a>
            <a href="ride.html" target="_blank" title="Give rides">Offer Ride</a>
            <a href="contact.html " title="see contacts"> Contact</a>
            <a href="http://localhost/html2/users.html" target="_blank" title="Feedback">Reviews</a>
            <a class="auth" onclick='login()'>Log in</a>
            <a class="auth" href="signup.html" title="Register">Sign up </a>
        </nav>
        <h1 >Quick Ride</h1>
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
        <img src="home_driver.jpg" width="400px" height="300px" style="float: left;margin-right:50px ">
        <br><br><br>
        <h2><b>Driving in your car soon?</b></h2>
        Lets make this your least expensive journey ever<br><br>
        <br><a href="ride.html" style="background-color: transparent;" ><button>Offer Ride</button></a>
        
    </div>
        <div class="where">
            <h2>Where do you want to go?</h2>
            
        </div>
        <div>
            <br><br>
            Go literally anywhere
        </div>
       <!-- <footer>
      <p >Posted by: Prem chandak</p>
      <p>Contact information: <a href="mailto:someone@example.com">someone@example.com</a>
        </p>
    </footer>-->
        </div>
</body>



</html>