<?php
$servername = "localhost";
$username = "id21107801_richard";
$password = "OLAOLu2005**";
$dbname = "id21107801_students";

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
$passport="";
$BirthC="";
$Country="";

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
$PassErr="";
$BCerr="";
$ContErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["Fname"])){
        $FNerr="Please fill field";

    }
$Fname= test_input($_POST["Fname"]);
    if(!ctype_alpha($Fname)) {
       
      $FNerr= "Only letters and white space allowed.";
    }

    if(empty($_POST["Lname"])){
        $LNerr="Please fill field";

    }
     $Lname= test_input($_POST["Lname"]);
    if (!ctype_alpha($Lname)){
         
          
      $LNerr= "Only letters and white space allowed..";
    }
    
    if(empty($_POST["Faname"])){
        $FAerr="Please fill field";

    }
     $FAname= test_input($_POST["Faname"]);
    if (!preg_match('/^[a-zA-Z\s]*$/', $FAname)){
          
          
      $FAerr= "Only letters and white space allowed...";
    }
    
    if(empty($_POST["Mname"])){
        $MOerr="Please fill field";

    }
    $MOname= test_input($_POST["Mname"]);
    if (!preg_match('/^[a-zA-Z\s]*$/', $MOname)){
          
           
      $MOerr= "Only letters and white space allowed....";
    }
    
    if(empty($_POST["Dob"])){
        $dobErr="Please fill field";

    }else{
          $DOB= test_input($_POST["Dob"]);
        

    }
    if(empty($_POST["Emailaddress"])){
        $EMerr="Please fill field";

    }
    $email= test_input($_POST["Emailaddress"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
          
           
      $EMerr= "invalid email format";
    }
    
    if(empty($_POST["Phonenumber"])){
        $PNerr="Please fill field";

    }
     $phoneNO= test_input($_POST["Phonenumber"]);
    if (!is_numeric($phoneNO)){
         
           
      $PNerr= "invalid phone number";
    }
    
    if(empty($_POST["homeaddress"])){
        $HaddErr="Please fill field";

    }else{
    $Haddress= test_input($_POST["homeaddress"]);
    
    }
    
    if(empty($_POST["City"])){
        $CityErr="Please fill field";

    }else{
        $City= test_input($_POST["City"]);
    }
    
    
    if(empty($_POST["gender"])){
        $gendErr="Please fill field";

    }else{
          $gender= test_input($_POST["gender"]);
          
    }
    if(empty($_POST["Passport"])){
        $PassErr="Please fill field";

    }else{
          $passport= test_input($_POST["Passport"]);
        

    }
    if(empty($_POST["Birth_certificate"])){
        $BCerr="Please fill field";

    }else{
          $BirthC= test_input($_POST["Birth_certificate"]);
        
    }
    if(empty($_POST["country"])){
        $ContErr="Please fill field";

    }
    $Country= test_input($_POST["country"]);
    if (!preg_match('/^[a-zA-Z\s]*$/', $Country)){
          
           
          $ContErr= "Only letters and white space allowed.......";
        }
          
        

      if(!empty($FNerr)){
        echo $FNerr;
     }if(!empty($LNerr)){
         echo $LNerr;
     }if(!empty($FAerr)){
         echo $FAerr;
     }if(!empty($MOerr)){
         echo $MOerr;
     }if(!empty($dobErr)){
        echo $dobErr;
     }if(!empty($EMerr)){
         echo $EMerr;
     }if(!empty($PNerr)){
         echo $PNerr;
     }if(!empty($HaddErr)){
         echo $HaddErr;
     }if(!empty($CityErr)){
        echo $CityErr;
     }if(!empty($gendErr)){
        echo $gendErr;
    }if(!empty($PassErr)){
        echo $PassErr;
    }if(!empty($BCerr)){
        echo $BCerr;
    }if(!empty($ContErr)){
        echo $ContErr;
    }
    

        
    

    /*if (checkDB($conn, $email, $phoneNO)) {
        echo "Email or phone number already exists.";
    } */

elseif (empty($FNerr) && empty($LNerr) && empty($FAerr) && empty($MOerr) && empty($dobErr) && empty($EMerr) && empty($PNerr) && empty($HaddErr) && empty($CityErr) && empty($gendErr) && empty($PassErr) && empty($BCerr) && empty($ContErr)) {
    
    $sql = "INSERT INTO details (Fname, Lname, Faname, Mname, Dob, Emailaddress, Phonenumber, homeaddress, City, gender, Passport, Birth_certificate, country) VALUES ('$Fname', '$Lname', '$FAname', '$MOname', '$DOB', '$email', '$phoneNO', '$Haddress', '$cityS', '$gender', '$passport', '$BirthC', '$Country')";


    if ($conn->query($sql) === TRUE) {
        
        $subject= "Congratulations on Your Successful Admission to Carlifonia Preparatory College";
$message= "Dear $Fname $Lname,

I hope this email finds you well and filled with excitement because I am thrilled to share some incredible news with you! On behalf of Carlifonia Preparatory College, I am delighted to inform you that your application for admission has been successful, and you have been partially accepted into our esteemed college for the 2023/2034 First semester intake. Congratulations on this remarkable achievement!. On completion of the acceptance fee a spot will be reserved for you as our esteemed student.

As a student at Carlifonia Preparatory College, you will be joining a vibrant and diverse academic environment that fosters intellectual growth and personal development. Our faculty members are renowned experts in their respective fields, and they are committed to guiding and nurturing students to reach their full potential. You will have access to state-of-the-art facilities, extensive resources, and a wide range of opportunities for research, internships, and experiential learning.

In the coming weeks, you will receive additional information about orientation, course registration, and the various support services available to you. We encourage you to take advantage of these resources to ensure a smooth transition into college life and to set yourself up for a successful academic journey.

We believe that you will play a crucial role in shaping the future of our college and leaving a lasting legacy. Your unique perspectives and contributions will enrich our community and inspire your fellow students.

Once again, congratulations on your well-deserved admission to Carlifonia Preparatory College. We eagerly await your arrival on campus and are excited to witness your growth and achievements over the next few years.

If you have any questions or need any assistance, please do not hesitate to reach out to our admissions office at (+8 1440 456 782). We are here to support you throughout your college journey.

Wishing you all the best as you embark on this thrilling new chapter in your life!

Warm regards,

Jameson
Admission Officer
Carlifonia Preparatory College
calprepcollege@gmail.com
909-281-5953
";
sendEmail($email, $subject, $message);
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    //header("Location:notification.html");
    
}else {
    echo "";
}
}

$sql = "SELECT * FROM details";
$result = $conn->query($sql);
if ($result) {
    
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];



        $apiKey = "FLWSECK_TEST-1d7fcc4f4c67e1ed9552b26d11b95048-X";
        $endpoint = "https://api.flutterwave.com/v3/payments";


$data = array(
    "tx_ref" => generateTX_REF(10),
    "amount" => "25000",
    "currency" => "NGN",
    "redirect_url" => "https://cpc-project.000webhostapp.com/notification.php",
    "meta" => array(
        "consumer_id" => $id,
        
    ),
    "customer" => array(
        "email" => $email,
        "phonenumber" => $phoneNO,
        "name" => $Fname &" "& $Lname
    ),
    "customizations" => array(
        "title" => "Acceptance fee Payments",
       
    )
);}}

$headers = array(
    "Authorization: Bearer " . $apiKey,
    "Content-Type: application/json"
);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $endpoint);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
}

curl_close($ch);
$responseData = json_decode($response, true);

if ($responseData && isset($responseData['data']['link'])) {
    $paymentLink = $responseData['data']['link'];
    header("Location:$paymentLink");
    //echo "Payment link: " . $paymentLink; 
} else {
    echo "Failed to retrieve payment link.";
}
//var_dump(json_decode($response, true));


$sql = "SELECT * FROM messages WHERE sent_status = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $email = $row['recipient_email'];
        $subject = $row['subject'];
        $message = $row['message'];

        
        if (sendEmail($email, $subject, $message)) {
            
            $messageId = $row['id'];
            $updateSql = "UPDATE messages SET sent_status = 1 WHERE id = $messageId";
            $conn->query($updateSql);
        } else {
            echo "Failed to send the email to: $email";
        }
    }
}

$conn->close();





function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;



}
function sendEmail($email, $subject, $message) {
    
    $headers = "From: richardolaolu@dilivva.com"; 
    ini_set('SMTP', 'mail.nqb8.co');
    ini_set('smtp_port', '465');
    ini_set('sendmail_from', 'richardolaolu@dilivva.com');
    ini_set('mail_password', '5%M1^#f3%1m1');
    return mail($email, $subject, $message, $headers);
}

function checkDB($conn, $email, $phoneNO) {
    
    $email = mysqli_real_escape_string($conn, $email);
    $phoneNO = mysqli_real_escape_string($conn, $phoneNO);

    
    $sql = "SELECT * FROM details WHERE Emailaddress = '$email' OR Phonenumber = '$phoneNO'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return true; 
    } else {
        return false; 
    }
}

function generateTX_REF($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}


?>