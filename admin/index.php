<?php 
require_once('../utiles/db.php');//rappel le dossier utiles où il y a la connexion Mysql
     

    $db = dbConnect(); //
    $stmt = $db->prepare('SELECT * FROM `authors` ORDER BY name');//statement pour preparer une base de donnee, select tout from authors

    $stmt->execute(); //execute le statement

    $authors = $stmt->fetchAll(PDO::FETCH_ASSOC);//stock le statement dans variable et liste tout (fetchAll)




?>
                    


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/style.css">


    <title>Document</title>
</head>

<body>
    <form action="./" method="post">

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input name="title" maxlength="10" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Titre du livre...">
                        <small id="titleHelp" class="form-text text-muted">Titre du livre entre 0 et 255.</small>
                    </div>
                    <div class="form-group">
                        <label for="auteur">Nom de l' auteur</label>
                        <input type="text" class="form-control" id="auteur" placeholder="nom de l'auteur">
                    </div>
                    <div class="form-group">
                        <label for="description">Description du livre</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    
                    
                    <div class="form-group">
                    
                        <label for="exampleFormControlSelect1">Auteur</label>
                        <select name="auteur_id" class="form-control" id="Auteur_id">
                        
                            <?php foreach ($authors as $author) { ?>
                                <option value="<?php echo $author ['id'];?>"><?php echo $author ['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <form>



                    </form>
                </div>

            </div>
        </div>


</html>