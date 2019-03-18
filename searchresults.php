<?php 
    include_once("./php/head.php");
    include_once("./php/nav.php");
    include("./php/functions.php");
?>
<title>Butterwick Family</title>
<body>
    <div class="content">
        <h1>Your Search Results</h1>
        <a href="tree.php" class="link">Make another Search</a>
        <div class="results">
<!-- loops through search results -->
<?php search_func() ?>
        </div>
    </div>
<?php include_once('./php/footer.php') ; ?> 
</body>
 

<!-- SELECT * FROM stock WHERE name Like '%name_here%'-->