<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "students";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Fname = "";
$Lname = "";
$FAname = "";
$MOname = "";
$DOB = "";
$email = "";
$phoneNO = "";
$Haddress = "";
$cityS = "";
$gender = "";

$FNerr="";
$LNerr="";
$FAerr="";
$MOerr="";
$dobErr="";
$EMerr="";
$PNerr="";
$HaddErr="";
$CityErr="";
$gendErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["Fname"])){
        $FNerr="Please fill field";

    }else{
          $Fname= test_input($_POST["Fname"]);
          if (!preg_match("/^!p[a-zA-Z-' ]*$/",$Fname)) {
      $FNerr= "Only letters and white space allowed";
    }
    }
    if(empty($_POST["Lname"])){
        $LNerr="Please fill field";

    }else{
          $Lname= test_input($_POST["Lname"]);
          if (!preg_match("/^!p[a-zA-Z-' ]*$/",$Lname)) {
      $LNerr= "Only letters and white space allowed";
    }
    }
    if(empty($_POST["Faname"])){
        $FAerr="Please fill field";

    }else{
          $name= test_input($_POST["Faname"]);
          if (!preg_match("/^!p[a-zA-Z-' ]*$/",$FAname)) {
      $FAerr= "Only letters and white space allowed";
    }
    }
    if(empty($_POST["Mname"])){
        $MOerr="Please fill field";

    }else{
          $MOname= test_input($_POST["Mname"]);
          if (!preg_match("/^!p[a-zA-Z-' ]*$/",$MOname)) {
      $MOerr= "Only letters and white space allowed";
    }
    }
    if(empty($_POST["Dob"])){
        $dobErr="Please fill field";

    }else{
          $DOB= test_input($_POST["Dob"]);
          if (!preg_match("^((?:19|20)\d\d)[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$",$DOB)) {
      $dobErr= "Only letters and white space allowed";
    }
    }
    if(empty($_POST["Emailaddress"])){
        $EMerr="Please fill field";

    }else{
          $email= test_input($_POST["Emailaddress"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $EMerr= "Only letters and white space allowed";
    }
    }
    if(empty($_POST["phonenumber"])){
        $PNerr="Please fill field";

    }else{
          $phoneNO= test_input($_POST["phonenumber"]);
          if (!preg_match("/^!p[a-zA-Z-' ]*$/",$phoneNO)) {
      $PNerr= "Only letters and white space allowed";
    }
    }
    if(empty($_POST["homeaddress"])){
        $HaddErr="Please fill field";

    }else{
          $Haddress= test_input($_POST["homeaddress"]);
          if (!preg_match("/^!p[a-zA-Z-' ]*$/",$Haddress)) {
      $HaddErr= "Only letters and white space allowed";
    }
    }
    if(empty($_POST["city"])){
        $CityErr="Please fill field";

    }else{
          $cityS= test_input($_POST["city"]);
          if (!preg_match("/^!p[a-zA-Z-' ]*$/",$cityS)) {
      $CityErr= "Only letters and white space allowed";
    }
    }
    if(empty($_POST["gender"])){
        $gendErr="Please fill field";

    }else{
          $gender= test_input($_POST["gender"]);
          if (!preg_match("/^!p[a-zA-Z-' ]*$/",$gender)) {
      $gendErr= "Only letters and white space allowed";
    }
    }
    if(!empty($FNerr)){
        echo $FNerr;
     }elseif(!empty($LNerr)){
         echo $LNerr;
     }elseif(!empty($FAerr)){
         echo $FAerr;
     }elseif(!empty($MOerr)){
         echo $MOerr;
     }elseif(!empty($dobErr)){
        echo $dobErr;
     }elseif(!empty($EMerr)){
         echo $EMerr;
     }elseif(!empty($PNerr)){
         echo $PNerr;
     }elseif(!empty($HaddErr)){
         echo $HaddErr;
     }elseif(!empty($CityErr)){
        echo $CityErr;
     }elseif(!empty($gendErr)){
        echo $gendErr;
    


}
if (empty($FNerr) && empty($LNerr) && empty($FAerr) && empty($MOerr) && empty($dobErr) && empty($EMerr) && empty($PNerr) && empty($HaddErr) && empty($CityErr) && empty($gendErr)) {
    $sql = "INSERT INTO details (Fname, Lname, Faname, Mname, Dob, Emailaddress, phonenumber, homeaddress, city, gender) VALUES ('$Fname', '$Lname', '$FAname', '$MOname', '$DOB', '$email', '$phoneNO', '$Haddress', '$cityS', '$gender')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}
$conn->close();
echo "Successful Submission";


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;



}

?>