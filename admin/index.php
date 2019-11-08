<?php

require_once('../utiles/db.php'); //rappel le dossier utiles où il y a la connexion Mysql

$db = dbConnect();

session_start();

if (isset($_SESSION['id'])) {
    session_destroy(); //deconnecte de la session
}

if (isset($_POST['email'])) {
    $email = (string) $_POST['email'];
    $password = (string) $_POST['password'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL) && $password) {

        $stmt = $db->prepare('SELECT * FROM users WHERE email = :email');

        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            header("Location: ./profile.php");           //redirection sur profile quand utilisateur connecte
        }
    }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



</head>

<style>
    .container {

        padding-top: 300px;
    }
</style>





<body>
    <div class="container">
        <h1 class="mt-3 mb-3"> Se connecter </h1>
        <form action="./" method="post">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="login">adresse email ou pseudo</label>
                    <input required name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse email">
                    <small id="email" class="form-text text-muted">entrer email</small>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input required type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>

                <button type="submit" class="btn btn-primary">Soumettre</button>

            </div>
            <div class="col-md-12">
            </div>
        </form>
    </div>













</body>

</html>




?>