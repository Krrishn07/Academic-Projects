<?php

include 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST") {
   // username and password sent from form

   $username = $_POST['username'];
   $password = $_POST['password'];

   $sql = "SELECT Id FROM admins WHERE Username = '$username' and Password = '$password'";
   $result = mysqli_query($conn,$sql);
   $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
   //$active = $row['active'];

   $count = mysqli_num_rows($result);

   // If result matched $myusername and $mypassword, table row must be 1 row

   if($count == 1) {
      $_SESSION["myusername"]=$username;
      $_SESSION['login_user'] = $username;


      header("location: welcome.php");
   }else {
      $error = "Your Login Name or Password is invalid<br><br>";
    echo"<link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1\" crossorigin=\"anonymous\"><div class=\"alert alert-success\" role=\"alert\"><h4 class=\"alert-heading\">Sorry!</h4><p>$error</p><hr><a href=\"admin.html\" class=\"button\">Login</a></div>";




   }
}

mysqli_close($conn);

 ?>
