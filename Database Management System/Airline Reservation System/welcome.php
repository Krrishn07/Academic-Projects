
<style>
table {
  width: 100%;
}

th{
  height: 50px;
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
  padding: 15px;
  text-align: left;
  background-color: #48b4e0;
  color: white;
}

td {
  text-align:center;
  font-size: 15px;
  font-family: sans-serif;
  padding: 15px;
  text-align: left;

}
tr:hover {background-color: #f5f5f5;}
tr:nth-child(even) {background-color: #f2f2f2;}

</style>
<!DOCTYPE html>
<html>
<head>

<title>Fleetaway-Home</title>
  <link rel="shortcut icon" type="image/png" href="images/icon1.png">
  
  <style>
    div{
      background-color: #48b4e0;
      padding: 5px 5px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      text-align:center;
      font-family: Verdana;
      font-size: 40px;
      color: white;
    }

    div img {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #48b4e0;
  }

  ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #48b4e0;
  }

  li {
    float: left;
  }

  li a {
    display: block;
    color: #000000;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-weight: bold;
    border: 3px solid white;
    margin: 2px;
  }


  li a:hover:not(.active) {
    background-color: #00627a;
  }

  .active {
    background-color: #ffffff;
  }

  body{
    background: url("images/plane3.jpg");
    background-size: cover;
    background-repeat: no-repeat;
  }
  .wrapper{
    width: 350px; padding: 20px;
    display: block;
    color: black;
    text-align: left;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 25px;
    font-family: sans-serif;
    //background-image: url("images/cssback.png");

  }
  p{
    font-size: 20px;
    font-family: sans-serif;
  }
</style>

</head>
<body>
  <div style="object-fit: cover"><img src="images/Fleetaway.png" alt="logo" width="1500px"></div>
  <br>
  <ul>
    <li><a href="logout.php">Logout</a></li>
    <li><a class="active" href="welcome.php">Home</a></li>
    <li><a href="addflight.html">Add Flight</a></li>
    <li><a href="deleteflight.html">Delete Flight</a></li>
    <li><a href="updateflight.html">Update Flight</a></li>
    <li><a href="cancelbooking.html">Cancel Booking</a></li>
  </ul>
  <br>
  <div><b> Flight Details:</b></div><br>


  <<?php

  include 'config.php';

  $sql = "SELECT * FROM flights";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr><th>Flight_Id</th><th>Flight_Name</th><th>Source</th><th>Destination</th><th>Departure</th><th>Arrival</th><th>Fair_Economic</th><th>Fair_Business</th><th>Available_seats</th></tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['Id']}</td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Destination']}</td><td>{$row['Departure']}</td><td>{$row['Arrival']}</td><td>{$row['Fair_Economic']}</td><td>{$row['Fair_Business']}</td><td>{$row['Available_seats']}</td></tr>";

  }
  echo "</table>";


  mysqli_close($conn);

  ?>
  <br>
  <div><b>User Details:<b></div>
  <<?php

  include 'config.php';

  $sql = "SELECT * FROM users";

  $result = mysqli_query($conn,$sql);

  echo"<table border ='1'>";
  echo "<tr><th>User_Id</th><th>FirstName</th><th>LastName</th><th>MobileNo</th><th>Email</th><th>Flight_Id</th><th>Seats_booked</th><th>Total_Cost</th></tr>";

  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr><td>{$row['UserId']}</td><td>{$row['FirstName']}</td><td>{$row['LastName']}</td><td>{$row['MobileNo']}</td><td>{$row['Email']}</td><td>{$row['Flight_Id']}</td><td>{$row['Seats_booked']}</td><td>{$row['Total_Cost']}</td></tr>";

  }
  echo "</table>";

  mysqli_close($conn);

  ?>

</body>
</html>
