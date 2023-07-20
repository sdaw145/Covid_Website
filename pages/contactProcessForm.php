<?php


$name = $_POST["name"];
$message = $_POST["message"];
$priority = filter_input(INPUT_POST, "priority", FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, "terms",FILTER_VALIDATE_BOOLEAN);

if (! $terms){
  die("Terms must be accepted to continue");
}
// below only used when developing locally //
$host = "localhost";
$dbname = "message_db";
$username ="root";
$password ="mysql";


$conn = mysqli_connect( $host,
                        $username,
                        $password,
                 $dbname); // Has to be in this order or use named arguements then it doesnt matter ie hostname: $host etc //
        
if (mysqli_connect_errno()) {
    die("Connection error: " . mysqli_connect_error());
}           
        
$sql = "INSERT INTO message (name, body, priority, type)
        VALUES (?, ?, ?, ?)"; //placeholder values to prevent sql injection attacks //

$stmt = mysqli_stmt_init($conn); //uses the connection as an arguement //

if ( ! mysqli_stmt_prepare($stmt, $sql)) {
 
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "ssii",
                       $name,
                       $message,
                       $priority,
                       $type);

mysqli_stmt_execute($stmt);

echo "Record saved.";

?>