<?php

if (!isset($_GET['action'])) {
  require('controllers/home.php');
  showHome();
} else {
  $action = (string) $_GET['action'];

  switch ($action) {
    case 'books': 
    require('controllers/books.php');
    listBooks();
    break;

    default:
      require('views/404.php');
  }
}
