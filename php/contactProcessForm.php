<?php

//print_r($_POST);//
 



$name = $_POST["name"];
$email = $_POST["email"];
$phoneNum = filter_input(INPUT_POST, "phoneNum", FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
$message = $_POST["message"];
//$terms = filter_input(INPUT_POST, "terms",FILTER_VALIDATE_BOOLEAN);//

/*if (! $terms){
  die("Terms must be accepted to continue");
} */

// below only used when developing locally //
$host = "localhost";
$dbname = "contactForm_db";
$username ="root";
$password ="mysql";


$conn = mysqli_connect( $host,
                        $username,
                        $password,
                 $dbname); // Has to be in this order or use named arguements then it doesnt matter ie hostname: $host etc //
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO contactform (name, email, phoneNum,type, message)
        VALUES (?, ?, ?, ?, ?)"; //placeholder values to prevent sql injection attacks //

$stmt = mysqli_stmt_init($conn); //uses the connection as an arguement //

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssiis",
                       $name,
                       $email,
                       $phoneNum,
                       $type,
                       $message);

mysqli_stmt_execute($stmt);

echo mysqli_stmt_error($stmt);

echo "Thank you ".$name." your query has been submitted. A memeber of the support team will respond within 2 buisness days. If your query is urgent please call the helpline on 08001234567 (Monday to Friday 08:00-18:00). A confirmation email has been sent to ".$email ; 


?>