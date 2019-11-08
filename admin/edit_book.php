<?php
require_once('../utiles/db.php'); //rappel le dossier utiles où il y a la connexion Mysql


$db = dbConnect(); //

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;




$stmt = $db->prepare('SELECT * FROM `authors` ORDER BY name'); //statement pour preparer une base de donnee, select tout from authors

$stmt->execute(); //execute le statement

$authors = $stmt->fetchAll(PDO::FETCH_ASSOC); //stock le statement dans variable et liste tout (fetchAll)


if (isset($_POST['book'])) {

    $id = isset($_POST['id']) ? (int) $_POST['id'] : null;

    $description = (string) $_POST['description'];
    $auteur_id = (string) $_POST['auteur_id'];
    $page = (int) $_POST['pages'];
    $description = (string) $_POST['description'];
    $wikipediaLink = (string) $_POST['wikipedia_link'];
    $language = (string) $_POST['language'];
    $year = (int) $_POST['year'];
    $country = (string) $_POST['country'];
    $title = (string) $_POST['title']; //recupere le titre et le mettre en string
    $maxTitleLength = 255;
    if (!$title) {
        throw new Exception ('Invalid title');
    }
    if (strlen($title) > $maxTitleLength) {
        $title = substr($title, 0, $maxTitleLenght);
    }
    if (!preg_match('/^(http|https):\/\/([a-z]{2})\.wikipedia\.org\/([a-zA-Z0-9-_\/%:]+)?/i', $wikipediaLink)) {
        $wikipediaLink = '';
    }
    if ($id) {
        $stmt = $db->prepare('UPDATE 
            books 
            SET 
            title = :title, 
            description = :description, 
            author_id = :author_id, 
            pages = :pages, 
            wikipedia_link = :wikipedia_Link, 
            year = :year, 
            language = :language, 
            country = :country 
            WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
    } else {

        $stmt = $db->prepare('INSERT INTO 
        `books` (
            `title`, 
            `description`, 
            `author_id`, 
            `pages`, 
            `wikipedia_link`, 
            `year`, 
            `language`, 
            `country`
        )
        VALUES (
            :title,
            :description,
            :author_id,
            :pages,
            :year,
            :language,
            :country,
            :wikipedia_Link
        )');
    }

    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':author_id', $author_id, PDO::PARAM_INT);
    $stmt->bindParam(':pages', $page, PDO::PARAM_INT);
    $stmt->bindParam(':year', $year, PDO::PARAM_INT);
    $stmt->bindParam(':language', $laguage, PDO::PARAM_STR);
    $stmt->bindParam(':country', $country, PDO::PARAM_STR);
    $stmt->bindParam(':wikipedia_Link', $wikipediaLink, PDO::PARAM_STR);
    $stmt->bindParam(':wikipedia_Link', $wikipediaLink, PDO::PARAM_STR);


    $stmt->execute();

    if (!$id) {
        $id = $db->lastInsertId();
        header('Location: ' . $_SERVER['REQUEST_URI'] . '?id=' .$id);
    }

    var_dump($id);
}

if ($id) {   //edit un livre
    echo $id;

    $stmt = $db->prepare('SELECT * FROM `books` WHERE id = :id'); //statement pour preparer une base de donnee, select tout from authors

    $stmt->bindParam(':id', $id);
    $stmt->execute(); //execute le statement

    $book = $stmt->fetch(PDO::FETCH_ASSOC);
}

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


<style>
    .container {

        background-color: #00796B;
        padding: 80px;
        color: white;
        margin-top: 100px;
        font-size: 20px;
        border-radius: 2%;
    }

    h1 {
        text-align: center;
    }

    #structure {
        margin border-top: 100px;
    }

    .btn {
        width: 100%;
        margin-top: 50px;
        background-color: #B2DFDB;
        color: black;

    }
</style>

<body>
    <form action="./<?php echo isset($book) ? '?id=' . $book['id'] : ''; ?>" method="post">

        <div class="container">
            <h1 class="mb-3 mt-3"> <?php echo !isset($book) ? "Ajouter un livre" : "Editer : " . $book['title']; ?></h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Titre</label>
                        <input 
                        required name="title" value="<?php echo isset($book) ? $book['title'] : ''; ?>" maxlength="10" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Titre du livre...">
                        <small id="titleHelp" class="form-text text-muted">Titre du livre entre 0 et 255.</small>
                    </div>

                    <div class="form-group">
                        <label for="description">Description du livre</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">
                        <?php echo isset($book) ? $book['description'] : ''; ?>
                        </textarea>
                    </div>


                    <div class="form-group">

                        <label for="auteur_id">Auteur</label>
                        <select name="auteur_id" class="form-control" id="auteur_id">

                            <?php foreach ($authors as $author) { ?>
                                <option <?php echo (isset($book) && $book['author_id'] === $author['id']) ? 'selected' : ''; ?> value="<?php echo $author['id']; ?>">
                                    <?php echo $author['name']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="pages">Nombre de pages</label>
                        <input name="pages" value="<?php echo isset($book) ? $book['pages'] : ''; ?>" type="number" step="1" min="0" class="form-control" id="pages" aria-describedby="pagesHelp" placeholder="nombre de pages">

                    </div>
                </div>
                <div class="col-md-6">


                    <div class="form-group">
                        <label for="wikipedia_link">Lien Wikipedia</label>
                        <input name="wikipedia_link" value="<?php echo isset($book) ? $book['wikipedia_link'] : ''; ?>" type="text" class="form-control" id="wikipedia_link" aria-describedby="Help" placeholder="Lien Wikipedia">
                    </div>
                    <div class="form-group">
                        <label for="country">Pays</label>
                        <input name="country" value="<?php echo isset($book) ? $book['country'] : ''; ?>" type="text" class="form-control" id="country" aria-describedby="Help" placeholder="Pays">
                    </div>
                    <div id="structure" class="form-group">
                        <label for="language">Langage</label>
                        <input name="language" value="<?php echo isset($book) ? $book['language'] : ''; ?>" type="text" class="form-control" id="language" aria-describedby="Help" placeholder="langue">
                    </div>
                    <div class="form-group">
                        <label for="year">Année de parution</label>
                        <input name="year" value="<?php echo isset($book) ? $book['year'] : ''; ?>" type="number" class="form-control" id="year" aria-describedby="Help" placeholder="année de parution">
                    </div>





                </div>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" value="<?php echo isset($book) ? $book['id'] : ''; ?>" name="id">

                    <button name="book" class="btn btn-primary" type="submit">Soumettre</button>

                </div>

            </div>
        </div>
    </form>

</html>