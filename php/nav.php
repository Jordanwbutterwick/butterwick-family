    <header>
        <nav>           
            <ul class="navbar">
                <li><a href="./index.php" class="link">Home</a></li>
                <li><a href="./add.php" class="link">Add a Family Member</a></li>
                <li><a href="./tree.php" class="link">Family Tree</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <div class="greeting"><h2 id="greeting">
    <?php 
    include("variables.php"); 
    include("functions.php");
	print(giveGreeting()); ?>
    </h2></div>
    