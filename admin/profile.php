<?php

session_start();

if (!isset($_SESSION['id'])) {
    header('Location : ./');
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        id : <?php echo $_SESSION['id']; ?>

    </div>
    <div >
       nom: <?php echo $_SESSION['name']; ?>

    </div>
 

</body>

</html>