<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$host="localhost";
$user="admin";
$pswrd="Butterwick";
$dbname="familytree"



$conn = new mysqli($host, $user, $pswrd, $dbname);
 
// Check connection
if($conn === false){
    die("ERROR: Could not connect to database. " . $conn->connect_error);
}
 
// Prepare an insert statement
$sql = "INSERT INTO person (firstname, lastname_maidenname, birthplace, email, phone) VALUES (?, ?, ?, ?, ?)";
 
if($stmt = $conn->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sss", $first_name, $last_name, $email);
    
    // Set parameters
    $first_name = $_REQUEST['firstname'];
    $last_name = $_REQUEST['lastname'];
    $email = $_REQUEST['email'];
    $birthplace = $_REQUEST['birthplace'];
    $phonenumber = $_REQUEST['phone'];
    
    // Attempt to execute the prepared statement
    if($stmt->execute()){
        echo "Records inserted successfully.";
    } else{
        echo "ERROR: Could not execute query: $sql. " . $conn->error;
    }
} else{
    echo "ERROR: Could not prepare query: $sql. " . $conn->error;
}
 
// Close statement
$stmt->close();
 
// Close connection
$conn->close();
?>