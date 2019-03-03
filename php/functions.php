<?php


function connectDB() {
    $first_name = $last_name = $email = $birthplace = $phone = ""; 
    $host="localhost";
    $user="admin";
    $pswrd="Butterwick";
    $dbname="familytree";

    $conn = new mysqli($host, $user, $pswrd, $dbname);
    if ($conn->connect_errno){
        print("ERROR: There was an error connecting to the database<br>");
        print("ERROR NUMBER: ". $link->connect_errno . "<br>");
        print("ERROR MESSAGE: ". $link->connect_error . "<br>");
        exit();
    }
    return $conn; //returning the mysqli object
}

function closeDB($conn) {
    $conn->close();
}

 function NewPerson() {
    $conn = connectDB();
    $newEntry = array("firstname" => $_POST['firstname'],
    "lastname_maidenname" => $_POST['lastname'], 
    "birthplace" => $_POST['birthplace'],
    "email" => $_POST['email'],
    "phone" => $_POST['phone']);


    $sql = "INSERT INTO person (firstname, lastname_maidenname, birthplace, email, phone) VALUES (?,?,?,?,?)";
    if($stmt = $conn->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param('ssssi', $first_name, $last_name, $birthplace, $email, $phone);
    
        // Set parameters
        $first_name = $_REQUEST['firstname'];
        $last_name = $_REQUEST['lastname'];
        $email = $_REQUEST['email'];
        $birthplace = $_REQUEST['birthplace'];
        $phone = $_REQUEST['phone'];

    
        if ($first_name == "") 
        { 
            echo ("First Name cannot be blank"); 
            exit(); // no need to go further 
        };
        if ($last_name == "") 
        { 
            echo ("Last Name cannot be blank"); 
            exit(); // no need to go further 
        };

        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo ($first_name . " has been registered to the database. <a href='index.html'>Return to homepage</a>"); 
        } else{
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
        };
        $stmt->close();
        closeDB($conn);
    }
}

?>

 



