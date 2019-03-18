<?php include('./php/head.php');?>
<body>
    <?php include('./php/nav.php'); ?>
        <div class="content">
            <h1>Hello World</h1>
            <?php
                include('./php/functions.php');
                $connect = connectDB();
                $search_sql = "SELECT * FROM person WHERE id '%".$_REQUEST['id']."%'";
                $search_query = mysqli_query($connect, $search_sql);
                if(mysqli_num_rows($search_query) !=0) {
                    $search_rs=mysqli_fetch_assoc($search_query);
                }
                if(mysqli_num_rows($search_query) != 0) {
                    do { ?>
                <div class="selected_card">
                    <h2><?php echo $search_rs['firstname']. " "; echo $search_rs['lastname_maidenname']; ?></h2>
                    <p>Birth date: <?php echo $search_rs['birthdate'] ; ?></p>
                    <p>Birth place: <?php echo $search_rs['birthplace'] ; ?></p>
                    <p>Father: <?php echo $search_rs['father'] ; ?></p>
                </div>
                    <?php    } while ($search_rs=mysqli_fetch_assoc($search_query));
                } else {
                    closeDB($connect); 
                }
            ?>
        </div>
    <?php include('./php/footer.php');?>
</body>
