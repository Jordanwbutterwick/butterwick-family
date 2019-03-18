<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    include_once("./php/head.php");
    ?>
    <title>Butterwick Family</title>
</head>
<body>
    <?php 
    include_once("./php/nav.php");
    ?>
<main>
    <div class="content">
        <h1>Family Tree</h1>
        <h2>Search for a family member</h2>
        <p>*hint* you can leave the search field blank to search for everyone in the database</p>
        <div class="search">
            <form action="searchresults.php" name="search" method="POST">
                <input type="text" name="search" size="40" maxlength="50">
                <input type="submit" name="submit" value="search">
            </form>
        </div>
    </div>
</main>
<?php 
    include_once("./php/footer.php");
    ?>
</body>
</html>