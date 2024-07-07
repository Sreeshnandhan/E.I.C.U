<?php

$comment = $_POST['cb'];
if (!empty($comment) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "website details";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $INSERT = "INSERT INTO comment (comment)values('$comment')";
  if ($conn->query($INSERT) === TRUE) {
    echo '<script> alert ("THANKS FOR YOUR COMMENT");window.location.href="kadhal kanave.html" </script> ';   
} else {
    echo '<script> alert ("Error: " . $sql . "<br>" . $conn->error)</script>';
    
}
    $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>