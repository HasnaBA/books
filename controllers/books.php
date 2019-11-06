<?php
require('models/books.php');

function listBooks($active_page) //page active
{
    global $limit;
    $total_books = countBooks();
    $total_pages = ceil($total_books / $limit); //fonction ceil qui arrondi au nombre superieur  le nombre de livre/par le nombre limite
    
    if ($active_page > $total_pages){ //boucle pour faire revenir la page active a la premiere page quand la page entree par lutilisateur dans l'url est superieur au nbre de page
        $active_page = 1;
    }
    
    $books = getBooks();
    require('views/books.php');
}
function showBook ($id)
{

 $book=getBook($id);

 require('views/book.php');
}
