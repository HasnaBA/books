<?php


$limit = 20;

require_once('utiles/db.php');


 // starting pagination


function countBooks ()
{
    $db = dbConnect(); //connexion base de donn'ée

    //preparation de la requete
    $stmt = $db->prepare('SELECT 
        count(*) 
        FROM `books` 
    ');

    $stmt->execute(); //execute

    return $stmt->fetchColumn();//return fetchALL(retourne tout),fetchColumn(retoutnre le nbr de colonne)

}

function getBooks()
{
    global $limit;

    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $db = dbConnect();
    $count = countBooks();
    $offset = ($page - 1)  * $limit; // Calculate the offset for the query

    
   

    $db = dbConnect();

    $stmt = $db->prepare('SELECT /* slectionne b.tout*/
        books.*,
        authors.name AS author
        FROM books
        LEFT JOIN authors 
        ON books.author_id = authors.id /*indique ou faire la correspondance*/
        LIMIT '. $offset .', '. $limit .'
        ');

    $stmt->bindParam(':offset' , $offset);
    $stmt->bindParam(':limit' , $limit);

    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
  //ending pagination



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

 

?>