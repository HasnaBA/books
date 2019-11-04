<?php
require('models/home.php');

function showHome()
{
    $books = getBooks();
    require('views/home.php');
}