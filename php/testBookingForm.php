<?php 

$testType = filter_input(INPUT_POST, "testType", FILTER_VALIDATE_INT);
$name = $_POST["name"];
$email = $_POST["email"];
$phoneNum = filter_input(INPUT_POST, "phoneNum", FILTER_VALIDATE_INT);
$nhsNum = filter_input(INPUT_POST, "nhsNum", FILTER_VALIDATE_INT);
$testLocation = filter_input(INPUT_POST, "testLocation", FILTER_VALIDATE_INT);
$testDate = $_POST["testDate"];
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
        
$sql = "INSERT INTO testBooking (testType,name, email, phoneNum, nhsNum, testLocation, testDate)
        VALUES (?, ?, ?, ?, ?, ?, ?)"; //placeholder values to prevent sql injection attacks //

$stmt = mysqli_stmt_init($conn); //uses the connection as an arguement //

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "issiiis",
                       $testType,
                       $name,
                       $email,
                       $phoneNum,
                       $nhsNum,
                       $testLocation,
                       $testDate);

mysqli_stmt_execute($stmt);

echo mysqli_stmt_error($stmt);

echo "Thank you ".$name." your test date of ".$testDate." has been submitted. A confirmation email will be sent to ".$email; 


?>