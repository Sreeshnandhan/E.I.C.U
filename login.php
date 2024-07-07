<?php

   $email= $_POST['email'];
   $pswd= $_POST['pswd'];

   // Database connection here
   $con = new mysqli("localhost","root","","website details");
   if($con->connect_error) {
    die("Failed to connect : ".$con->connect_error);
   } else {
       $stmt = $con->prepare("select * from register where email = ?");
       $stmt->bind_param("s", $email);
       $stmt->execute();
       $stmt_result = $stmt->get_result();
      if ($stmt_result->num_rows > 0) {
       $data = $stmt_result->fetch_assoc();
        if($data['password2'] === $pswd) {
            header("Location:movies.html");
        } else {
           echo "<h2>Invalid Email or Password</h2>";
       }
    } else {
        echo "<h2>Invalid Email or Password</h2>";  
    }
  }
         
   
?>
