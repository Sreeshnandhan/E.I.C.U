<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "imageuploadproject";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file_name = $_FILES["file"]["name"];
    $file_type = $_FILES["file"]["type"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    
    // Read file content
$file_content = file_get_contents($file_tmp);
$snd=$_POST['des'];
    if (empty($snd)||empty($file_name)){
        echo "<script>alert('file not upload||check the input');</script>";
    }else{
    // Insert file information into database
    $sql = "INSERT INTO data (filename,file,type,description) VALUES (?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $file_name, $file_content,$file_type,$snd); // 's' for string
    
    if ($stmt->execute()) {
        echo '<script>alert ("File uploaded successfully."); window.location.href="movies.html"</script>';

    } else {
        echo "Error uploading file: " . $stmt->error;
    }
}
    $stmt->close();
}

$conn->close();
?>
