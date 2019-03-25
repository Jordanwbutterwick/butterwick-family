<?php
function connectDB() { 
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
            "phone" => $_POST['phone'],
            "gender" => $_POST['gender']);


        $sql = "INSERT INTO person (firstname, lastname_maidenname, born_into_family, birthdate, birthplace, email, phone, gender) VALUES (?,?,?,?,?,?,?,?)";
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param('ssisssii', $first_name, $last_name, $bornintofamily, $birthdate, $birthplace, $email, $phone, $gender);
        
            // Set parameters
            $first_name = $_REQUEST['firstname'];
            $last_name = $_REQUEST['lastname'];
            $bornintofamily = $_REQUEST['bornintofamily'];
            $birthdate = $_REQUEST['birthdate'];
            $email = $_REQUEST['email'];
            $birthplace = $_REQUEST['birthplace'];
            $phone = $_REQUEST['phone'];
            $gender = $_REQUEST['gender'];

        
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
            if ($gender == "") 
            { 
                echo ("<p>Gender cannot be blank</p>"); 
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

function getPeople() {
    // get the persons data from the datbase
    $conn = connectDB();

    $sql ="SELECT * FROM person";

    if (!$result = $conn->query($sql)){
        print("ERROR: there was an error submitting your SQL to the database <br>");
        print("SQL: $sql <br>");
        print("ERROR NUMER: ". $conn->errno . "<br>");
        print("ERROR MESSAGE: ". $conn->error . "<br>");
    }

    $person_array = [];
    
    // need to loop through as fetch_assoc gets one row at a time from result set.
    while ($person = $result->fetch_assoc()){
        $person_array[] = $person;
    }

    $result->free(); // free up memory

    closeDB($conn); // close connection

   
    return $person_array;// associated array of person information
}


function search_func() {
    $conn = connectDB();
    // sends you back if post isn't set
    if(!isset($_POST['search'])) {
        header('Location:tree.php');
    }
    // selects all columns when query is like firstname column
    $search_sql = "SELECT * FROM person WHERE firstname LIKE '%".$_POST['search']."%'";
    $search_query = mysqli_query($conn, $search_sql);
    if(mysqli_num_rows($search_query) !=0) {
        $search_rs=mysqli_fetch_assoc($search_query);
    }
    
    // loops theough search results
    if(mysqli_num_rows($search_query) != 0) {
        do {
            if($search_rs['father'] != NULL) {
                $conn = connectDB();
                $fathersql = 
                "SELECT * 
                FROM person 
                WHERE id LIKE '%".$search_rs['father']."%'";
                $fathername_query = mysqli_query($conn, $fathersql);
                if(mysqli_num_rows($fathername_query) !=0) {
                    $fathernamesearch_rs=mysqli_fetch_array($fathername_query);
                }
            } else {
                $fathernamesearch_rs = "<h5>No father found</h5>";
                
            }
            if($search_rs['mother'] != NULL) {
                $mothersql = 
                "SELECT firstname, lastname_maidenname 
                FROM person 
                WHERE id LIKE '%".$search_rs['mother']."%'";
                $mothername_query = mysqli_query($conn, $mothersql);
                if(mysqli_num_rows($mothername_query) !=0) {
                    $mothernamesearch_rs=mysqli_fetch_assoc($mothername_query);
                }
            } else {
                $mothernamesearch_rs = "<h5>No mother found</h5>";
                
            }
            if($search_rs['spouse'] != NULL) {
                $spousesql = 
                "SELECT firstname, lastname_maidenname 
                FROM person 
                WHERE id LIKE '%".$search_rs['spouse']."%'";
                $spousename_query = mysqli_query($conn, $spousesql);
                if(mysqli_num_rows($spousename_query) !=0) {
                    $spousenamesearch_rs=mysqli_fetch_assoc($spousename_query);
                }
            } else {
                $spousenamesearch_rs = "<h5>No spouse found</h5>";
                
            }
            
            ?>
    
    <div class="search_card" id="<?php echo $search_rs['id'] ; ?>">
        <a href="./selected.php" class="link"><?php echo $search_rs['firstname']. " "; echo $search_rs['lastname_maidenname'] ?></a>
        <p>ID Number: <?php echo $search_rs['id'] ; ?></p>
        <p>Birth date: <?php echo $search_rs['birthdate'] ; ?></p>
        <p>Birth place: <?php echo $search_rs['birthplace'] ; ?></p>
        <p>Father: <?php
                if($fathernamesearch_rs != "<h5>No father found</h5>") {
                    print("<a href='#".$search_rs['father']."'>".$fathernamesearch_rs['firstname']." ". $fathernamesearch_rs['lastname_maidenname']."</a>") ;
                } else {
                    print($fathernamesearch_rs);
                }
            ?></p>
        <p>Mother: <?php
                if($mothernamesearch_rs != "<h5>No mother found</h5>") {
                    print("<a href='#".$search_rs['mother']."'>".$mothernamesearch_rs['firstname']." ". $mothernamesearch_rs['lastname_maidenname']."</a>") ;
                } else {
                    print($mothernamesearch_rs);
                }
            ?></p>
        <p>Spouse: <?php
                if($spousenamesearch_rs != "<h5>No spouse found</h5>") {
                    print("<a href='#".$search_rs['spouse']."'>".$spousenamesearch_rs['firstname']." ". $spousenamesearch_rs['lastname_maidenname']."</a>") ;
                } else {
                    print($spousenamesearch_rs);
                }
                            ?></p>
    </div>
        <?php } while ($search_rs=mysqli_fetch_assoc($search_query));
    } else {
        echo "<p>That person was not found </p> <br /> <p> Add them to the database <a href='./add.php'>here</a></p>";
        closeDB($conn); 
    }
}

function giveGreeting() {

    include("php/variables.php");

    date_default_timezone_set('America/Edmonton');

    $current = getdate(time()); // this is my current date/time
    // $current = getdate(mktime(14, 0, 0, 1, 1, 2019)); // for testing

    if ($current["hours"] > 18) {
        $greeting = $greet[2];
    } elseif ($current["hours"] > 12) {
        $greeting = $greet[1];
    } else {
        $greeting = $greet[0];
    }
    return $greeting; //string
}
?>

