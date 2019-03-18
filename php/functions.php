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
    if (isset($_POST['firstname'])) {
        $conn = connectDB();
        $newEntry = array("firstname" => $_POST['firstname'],
            "lastname_maidenname" => $_POST['lastname'], 
            "born_into_family" => $_POST['bornintofamily'],
            "birthdate" => $_POST['birthdate'],
            "birthplace" => $_POST['birthplace'],
            "email" => $_POST['email'],
            "phone" => $_POST['phone']);


        $sql = "INSERT INTO person (firstname, lastname_maidenname, born_into_family, birthdate, birthplace, email, phone) VALUES (?,?,?,?,?,?,?)";
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('ssisssi', $first_name, $last_name, $bornintofamily, $birthdate, $birthplace, $email, $phone);
        
            // Set parameters
            $first_name = $_REQUEST['firstname'];
            $last_name = $_REQUEST['lastname'];
            $bornintofamily = $_REQUEST['bornintofamily'];
            $birthdate = $_REQUEST['birthdate'];
            $email = $_REQUEST['email'];
            $birthplace = $_REQUEST['birthplace'];
            $phone = $_REQUEST['phone'];

        
            if ($first_name == "") 
            { 
                echo ("<p>First Name cannot be blank</p>"); 
                exit(); // no need to go further 
            };
            if ($last_name == "") 
            { 
                echo ("<p>Last Name cannot be blank</p>"); 
                exit(); // no need to go further 
            };

            // Attempt to execute the prepared statement
            if($stmt->execute()){
                echo ("<p>". $first_name . " has been registered to the database. <a href='index.html'>Return to homepage</a></p>"); 
            } else{
                echo "ERROR: Could not execute query: $sql. " . $conn->error;
            };
            $stmt->close();
            closeDB($conn);
        }
    } else {
        exit;
    }
    
}
function search_func() {
    $connect = connectDB();
    if(!isset($_POST['search'])) {
        header('Location:tree.php');
    }
    $search_sql = "SELECT * FROM person WHERE firstname Like '%".$_POST['search']."%'";
    $search_query = mysqli_query($connect, $search_sql);
    if(mysqli_num_rows($search_query) !=0) {
        $search_rs=mysqli_fetch_assoc($search_query);
    }
    if(mysqli_num_rows($search_query) != 0) {
        do { ?>

    <div class="search_card">
        <a href="./selected.php" class="link"><?php echo $search_rs['firstname']. " "; echo $search_rs['lastname_maidenname'] ?></a>
        <p>Birth date: <?php echo $search_rs['birthdate'] ; ?></p>
        <p>Birth place: <?php echo $search_rs['birthplace'] ; ?></p>
        <p>Father: <?php echo $search_rs['father'] ; ?></p>
    </div>
        <?php } while ($search_rs=mysqli_fetch_assoc($search_query));
    } else {
        echo "<p>That person was not found</p><br /><p>Add them to the database <a href='./add.php'>here</a></p>";
        closeDB($connect); 
    }
}
?>