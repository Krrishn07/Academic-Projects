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
  background: url("images/Flight02.jpg");
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
</style>


</head>
<body>
<div style="object-fit: cover"><img src="images/Fleetaway.png" alt="logo" width="1500px"></div>
<br>
<ul>
  <li><a class="active" href="website.php">Home</a></li>
  <li><a href="signup.html">Sign Up</a></li>
  <li><a href="admin.html">Admin</a></li>
  <li><a href="contact.html">Contact</a></li>
</ul>
<br>


<?php

include 'config.php';
/*function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
*/


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $source = $_POST["source"];
  $destination = $_POST["destination"];
  $departure = $_POST["departdate"];
  $trip = $_POST["trip"];
  if ($trip == 'return') {
    $arrival = $_POST["arrivedate"];
  }
  $adults = $_POST["adults"];
  $trip_class = $_POST['travel_class'];
  $total_adults = $adults;

}
if($trip == 'oneway'){
$sql = "SELECT * FROM flights WHERE Source = '$source' AND Destination = '$destination' AND '$departure'>=Departure AND Available_seats>0 ";
$result = mysqli_query($conn,$sql);
}
else {
  $sql = "SELECT * FROM flights WHERE Source = '$source' AND Destination = '$destination' AND '$departure'>=Departure AND '$arrival'<=Arrival AND Available_seats>0 ";
  $result = mysqli_query($conn,$sql);
}

echo"<table border ='1'>";
echo "<tr><th>Flight_Id</th><th>Flight_Name</th><th>Source</th><th>Destination</th><th>Fare</th><th>Action</th></tr>";
if ($trip_class == 'economic') {

  if ($trip == 'oneway') {

  while ($row = mysqli_fetch_assoc($result)) {
    $price = $row['Fair_Economic']*$adults;
    $id = $row['Id'];

  echo "<tr><td>{$row['Id']}</td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Destination']}</td><td>{$price}</td><td><form id= \"Passing\" method=\"post\" action=\"book_flight.php\">
<input name=\"Id\" type=\"hidden\" value=\"$id\">
<input name=\"price\" type=\"hidden\" value=\"$price\">
<input name=\"total_adults\" type=\"hidden\" value=\"$total_adults\">
<input name=\"submit\" type=\"submit\" value=\"Book\">
</form></td></tr>";

    }

  }
  else {
    while ($row = mysqli_fetch_assoc($result)) {
      $price_temp = $row['Fair_Economic']*$adults;
      $price = $price_temp*2;
      $id = $row['Id'];

    echo "<tr><td>{$row['Id']}</td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Destination']}</td><td>{$price}</td><td><form id= \"Passing\" method=\"post\" action=\"book_flight.php\">
  <input name=\"Id\" type=\"hidden\" value=\"$id\">
  <input name=\"price\" type=\"hidden\" value=\"$price\">
  <input name=\"total_adults\" type=\"hidden\" value=\"$total_adults\">
  <input name=\"submit\" type=\"submit\" value=\"Book\">
  </form></td></tr>";

      }

  }
}
else {

  if ($trip == 'oneway') {

  while ($row = mysqli_fetch_assoc($result)) {
    $price = $row['Fair_Business']*$adults;
    $id = $row['Id'];
    echo "<tr><td>{$row['Id']}</td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Destination']}</td><td>{$price}</td><td><form id= \"Passing\" method=\"post\" action=\"book_flight.php\">
  <input name=\"Id\" type=\"hidden\" value=\"$id\">
  <input name=\"price\" type=\"hidden\" value=\"$price\">
  <input name=\"total_adults\" type=\"hidden\" value=\"$total_adults\">
  <input name=\"submit\" type=\"submit\" value=\"Book\">
  </form></td></tr>";
    }
  }
  else {
    while ($row = mysqli_fetch_assoc($result)) {
      $price_temp = $row['Fair_Business']*$adults;
      $price = $price_temp*2;
      $id = $row['Id'];
      echo "<tr><td>{$row['Id']}</td><td>{$row['Name']}</td><td>{$row['Source']}</td><td>{$row['Destination']}</td><td>{$price}</td><td><form id= \"Passing\" method=\"post\" action=\"book_flight.php\">
    <input name=\"Id\" type=\"hidden\" value=\"$id\">
    <input name=\"price\" type=\"hidden\" value=\"$price\">
    <input name=\"total_adults\" type=\"hidden\" value=\"$total_adults\">
    <input name=\"submit\" type=\"submit\" value=\"Book\">
    </form></td></tr>";
      }
  }
}
echo "</table>";

mysqli_close($conn);

 ?>

</body>
</html>
