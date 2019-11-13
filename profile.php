<?php 
session_start();
if(!isset($_SESSION["user"]))
{
    header("Location: http://localhost/Carpooling/Home.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <script src="script/profile.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Aclonica' rel='stylesheet'>
    <link href='https://fonts.googleapis.com/css?family=Acme' rel='stylesheet'>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

    <title>Profile</title>
</head>
<body>
    
        <?php
        if($_SESSION['user'] != $_GET['user'])
            echo $_SESSION['user'] . "   ". $_GET['user']."  "  ."error";
        else{
           $con = new mysqli("localhost","root","","quickride");
           $user = $_SESSION["user"];
           $profile = "SELECT * from customers where username = '$user'";
           
           $result = $con->query($profile);
           if($result->num_rows ==1)
           {$row = $result->fetch_assoc();
           }
           
           ?>
           <form method="post" action="PHP/update.php"  onsubmit="return valid(this);">
        <table border="1" style="border-collapse: collapse;"  class="table">
        <thead class="thead-dark">
            <tr>
                <th colspan="2" style="text-align: center;">PROFILE</th>
            </tr>
            </thead>
            <tr>
                <td class="thead-dark">First Name</td>
                <td><?php echo $row["firstname"]?></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><?php echo $row["lastname"] ?></td>
                </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $row["gender"] ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $row["email"] ?></td>
            </tr>
            <tr>
                <td>City</td>
                <td><?php echo $row["city"] ?></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td>
                <div class="column2" style="float: left">
                        <input type="text" onfocus="error(2);" maxlength="10" onchange="Avalability(this.value,2)"
                            id="key2" placeholder="XXXXXXX980" value='<?php echo $row["mobile"] ?>' name="phoneno" pattern="[\d]{10}">
                        <div id="keya2"></div>
                    </div>    
                </td>
            </tr>
            <tr>
                <td>UserName</td>
                <td>
                <div class="column2" style="float: left">
                        <input type="text" onfocus="error(3);" onblur="Avalability(this.value,3)" id="key3"
                            placeholder="UserName" value='<?php echo $row["username"] ?>' name="Uid" pattern="[A-Za-z]\w+">
                        <div id="keya3"></div>
                    </div>    
                
            </tr>
        </table>
        <a href="http://localhost/Carpooling/welcome.php"><button type="button" class="btn btn-danger"><-- Go Back</button></a>  

        <input type="submit" id="sub" value="Update">
        <form>
        <br><br><br>

         <?php
           $booking = "SELECT * FROM bookings WHERE username='$user' ORDER by ridedate DESC";
           $result1 = $con->query($booking);
           if($result1->num_rows>0)
            {   
        ?>
        <table border="1" style="border-collapse: collapse;"class="table">
        <thead class="thead-dark">
            <tr>
                <th colspan="4" style="text-align: center;">BOOKING HISTORY</th>
            </tr>
        
         <tr>
             <th scope="col">Date</th>
             <th scope="col">Source</th>
             <th scope="col">Destination</th>
             <th scope="col">Number of Passenger</th> 
         </tr>
         </thead>
        <tbody>
        <?php
                while($row1 = $result1->fetch_assoc())
                    {
        ?>          <tr>
                        <td><?php echo $row1["ridedate"] ?></td>
                        <td><?php echo $row1["source"] ?></td>
                        <td><?php echo $row1["destination"] ?></td>
                        <td><?php echo $row1["passenger"] ?></td> 
                    </tr>
        <?php        }

           }
        }
        
        ?>
        </tbody>
        </table>

</body>
</html>
