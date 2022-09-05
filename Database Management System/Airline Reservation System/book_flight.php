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
  background-color: #4CAF50;
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

<?php

$id = $_POST['Id'];
$price = $_POST['price'];
$total_adults = $_POST['total_adults'];


 ?>
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
input[type=text],[type=number],[type=email],[type=date],select{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #48b4e0;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #00627a;
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
<div class="wrapper">
<form action="update.php" method="post">
  <input type="hidden" name="flight_id" value="<?php echo "$id"?>"></input>
  <input type="hidden" name="price" value="<?php echo "$price"?>"></input>
  <input type="hidden" name="total_adults" value="<?php echo "$total_adults"?>"></input>

  First Name:  <input type="text" name="firstname" required></input><br><br>
  Last Name:   <input type="text" name="lastname" required ></input><br><br>
  Mobile No: <input type="number" maxlength="10" name="mob_no" required></input><br><br>
  Email Id:  <input type="email" placeholder="" name="email" required></input><br><br>

  

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: -510px 0px 540px 600px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>

</p>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/action_page.php">
      
        <div class="row">
          <div class="col-50">
           
             </div>
            </div>
         

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="">
            <label for="expmonth">Expiry Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="">
            <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="">
                <label for="expyear">Expiry Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="">
            <div class="row">
        
          
          </div>
          
        </div>
        <label>
          
        </label>
        <input type="submit" value="Book Flight" class="btn">
      </form>
    </div>
  </div>
</div>
</form>
</div>









</body>
</html>
