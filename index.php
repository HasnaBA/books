<?php

$db=new PDO('mysql:host=localhost;dbname=books', 'root');
if (!isset($_GET['action'])) {
  require('controllers/home.php');
  showHome();
} else {
  $action = (string) $_GET['action'];//on recupere l' action

  switch ($action) {
    case 'books': 
    require_once('controllers/books.php');
    listBooks();
    break;

    case 'book': // creation page pour que des qu' on clique sur un livre ca nous mene dans la page du livre
    if (isset($_GET['id'])) {
      require_once('controllers/books.php');
      showBook($_GET['id']);
    } 
    break;
    

    default:
      require('views/404.php');
  }
}
