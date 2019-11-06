<?php

if (!isset($_GET['action'])) {
  require('controllers/home.php');
  showHome();
} else {
  $action = (string) $_GET['action'];//on recupere l' action

  switch ($action) {
    case 'books': 
    require_once('controllers/books.php');
    $active_pages = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    listBooks($active_pages);
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
