<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once("./php/head.php"); ?>
    <title>Butterwick Family</title>
</head>
<body>
    <?php include_once("./php/nav.php");?>
<main>
    <div class="content">
        <h1>Add family member information</h1>
        <div class="text"><p>You can put your own or anyone else's information into the form below and press submit to send to the database. You will know the submission was successful from the message that gets displayed after a submission.</p></div>
        <div class="form">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <p><label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname"></p>
                <p><label for="lastname">Last Name or Maiden Name:</label>
                <input type="text" name="lastname" id="lastname"></p>
                <p><label for="bornintofamily">Born or married into family:</label>
                    <select name="bornintofamily" id="bornintofamily">
                        <option value="1">Born</option>
                        <option value="0">Married</option>
                    </select></p>
                <p><label for="birthdate">Birth Date:</label>
                <input type="date" name="birthdate" id="birthdate"></p>
                <p><label for="birthplace">Place of Birth:</label>
                <input type="text" name="birthplace" id="birthplace"></p>
                <p><label for="emailaddress">Email Address:</label>
                <input type="text" name="email" id="emailaddress"></p>
                <p><label for="phone">Phone Number:</label>
                <input type="text" name="phone" id="phone"></p>
                <input type="submit" value="Submit">
            </form>
            <?php include_once("./php/functions.php");
                $msg = NewPerson();
                print($msg); ?>
        </div>
    </div>
</main>
<?php include_once("./php/footer.php"); ?>
</body>
</html>