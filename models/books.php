<?php


function getBooks()
{
    $file = file_get_contents('json/books.json');
    $books = json_decode($file,true);
    return $books;
}

function getBook($id)

{
    $file = file_get_contents('json/books.json');
    $books = json_decode($file,true);
    $result = null;
        foreach($books as $book) {  ///je liste tous les books et si le bon id match a l' id recherché
            if ($book['id'] === $id) {
            $result = $book;
        }
    }
   return $result;
}