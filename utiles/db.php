<?php
/**
 * Connection mysql
 */
function dbConnect()
{
    return new PDO('mysql:host=localhost;dbname=books', 'root');

}
