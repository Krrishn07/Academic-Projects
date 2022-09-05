<?php
include 'config.php';

$flight_id = $_POST['flight_id'];
$total_cost = $_POST['price'];
$total_adults = $_POST['total_adults'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mob_no = $_POST['mob_no'];
$email = $_POST['email'];

$sql = "INSERT INTO users (FirstName,LastName, MobileNo, Email, Flight_Id, Seats_booked ,Total_Cost) VALUES ('$firstname','$lastname','$mob_no','$email','$flight_id','$total_adults','$total_cost')";

$result = mysqli_query($conn,$sql);

$sql = "SELECT Available_seats FROM flights WHERE Id =$flight_id";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);
$updated_seats = $row['Available_seats'] - $total_adults;

$sql = "UPDATE flights SET Available_seats= $updated_seats WHERE Id =$flight_id";
$result = mysqli_query($conn,$sql);
echo"<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1\" crossorigin=\"anonymous\"><div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Success!</h4><p>Ticket Booked<br><br></p><hr></div>";

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<style>
.button {
    background-color: #48b4e0;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

body{
  background-image: url("images/Flight06.jpg");
  text-align: center;
  padding-top: 50px;
}
</style>
</head>
<body>

<a href="website.php" class="button">Done</a>


</body>
</html>
