<?php 
session_start();
if(isset($_SESSION['user']))
{
    header("Location: http://localhost/Carpooling/welcome.php");
}
?>
<html>

<head>
    <title>Car Pooling</title>
    <link rel="stylesheet" type="text/css" href="css/pool.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lobster" />
    <script src="script/Home.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta charset="utf-8">
</head>

<body>
    <div class="section">
        <div class="video-control">
            <video autoplay loop muted>
                <source src="videos/Road-Tripping.mp4" type="video/mp4">
            </video>
        </div>
        <div id="overlay"></div>

        <nav style="background-color: rgba(174, 218, 243, 0.4);">
            <p class="headbar">Welcome to Quickride,Share your travel costs with our community.</p> 
            <a class="auth" onclick='login()' title="Login">Log in</a>
            <a class="auth" href="signup.html" title="Register">Sign up </a>
        </nav>
        <h1 class="home-title">Quick Ride</h1>
        <div id="log" class="container">
            <button class="close" onclick="logout()">X</button>
            <form id="myheader" action="PHP/login.php" method="POST">
                <div class="login-head">Login</div>

                <input type="text" name="Userid" placeholder="Username">
                <input type="password" name="Password" placeholder="password">
                <input type="submit" name="submit" value="Log in">
                <p><input type="checkbox" name="remember"> Remember Me</p>
            </form>
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
