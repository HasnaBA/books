<?php
require_once('utiles/db.php');

function getBooks()
{
    $db = dbConnect();
    $stmt = $db->prepare('SELECT /* slectionne b.tout*/
        books.*,
        authors.name AS author
        FROM books
        LEFT JOIN authors 
        ON books.author_id = authors.id /*indique ou faire la correspondance*/
    ');

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBook($id)

{
    $db = dbConnect(); /*connexion */
    $stmt = $db->prepare('SELECT /* slectionne b.tout*/
        books.*,
        authors.name AS author
        FROM books
        LEFT JOIN authors 
        ON books.author_id = authors.id /*indique ou faire la correspondance*/
        WHERE books.id = :id 
    ');
    $stmt->bindParam(':id' , $id, PDO::PARAM_INT);

    $stmt->execute();
    return $stmt->fetch();

}