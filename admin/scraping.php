<?php
require_once('../utils/db.php');
function averageGetPrice ($bookTitle)
{
    $url = 'https://www.google.com/search?q=' . urlencode($bookTitle) . '&tbm=shop&tbs=vw:l,mr:1,root_cat:529627&sa=X&ved=0ahUKEwjpiYz8guzlAhWBz4UKHTK8AxMQvSsI0AIoAA&biw=1920&bih=976';
    $codesource = utf8_encode(file_get_contents($url));
    // preg_match_all("#<div class=\"A8OWCb\"><div><b>.+</b></div><div>.+</div></div>#iU", $codesource, $tableau_resultat);
    
    $doc = new DOMDocument();
    @$doc->loadHTML($codesource);
    
    $elements = $doc->getElementById('ires')->getElementsByTagName('b');
    
    $prices = array(); //creation tableau
    
    foreach ($elements as $element) {
        $lastChart = mb_substr($element->nodeValue, -1, 1, 'utf-8');
    
        if ($lastChart !== '€') {
            continue;
        }
    
        $price = $element->nodeValue;
        $price = (float) str_replace(',', '.', $price);
    
        $prices[] = $price; // array filled
    }
    
    return array_sum($prices)/ count($prices); 
}

$db = dbConnect();
$stmt = $db->prepare('SELECT title FROM books LIMIT 0, 10'); 
$stmt->execute();
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($books as $book) { //boucle qui rappelle chaque livre
    try {
        $average = averageGetPrice($book['title']); //execute la fonction pour chaque livre
        var_dump($average);
        $stmt = $db->prepare('UPDATE books SET averagePrice = :averagePrice WHERE id = :id');
        $stmt->bindParam(':id', $book['id'], PDO::PARAM_INT);
        $stmt->bindParam(':averagePrice', $average);
        $stmt->execute();
    } catch (Exception $e) {}   //try catch pour continuer si ne trouve pas
}

?>






