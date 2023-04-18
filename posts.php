<?php
include_once('functions.php');
include_once('database.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?> - Posty</title>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
</head>
<body>
    <?php
    printNavbar();
    ?>
    <main class="container mt-5">
        <h2>Posty</h2>
        <?php
        $posts = getAllPosts();
        if(count($posts) == 0) {
            ?>
            <p>brak postów</p>
            <?php
        } else {
            foreach($posts as $a){

            }
        }
    </main>
    <script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>