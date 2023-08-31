<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 
$name="";
$username="";
$pass_word="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name= test_input($_POST["name"]);
    if (!preg_match('/^[a-zA-Z\s]*$/', $name)){
          
          
      $nerr= "Only letters and white space allowed...";
    }
    $username= test_input($_POST["username"]);
    $pass_word= test_input($_POST["password"]);

    $query = "SELECT * FROM admin WHERE username=? AND pass_word=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $pass_word);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['admin_id'] = $username;
        header("Location: Admindashboard.html"); 
        exit();
    } else {
        echo "Invalid username or password";
    }
    


}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;



}

?>