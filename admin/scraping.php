<?php

function averageGetPrice ($bookTitle)
{
    $codesource = utf8_encode(file_get_contents('https://www.google.com/search?q=' .$bookTitle . '&tbm=shop&tbs=vw:l,mr:1,root_cat:529627&sa=X&ved=0ahUKEwjpiYz8guzlAhWBz4UKHTK8AxMQvSsI0AIoAA&biw=1920&bih=976'));
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
    
        $prices[] = $price; // tab filled
    }
    
    return array_sum($prices)/ count($prices);

}




var_dump(averageGetPrice("Les%20misérables"));
    
   


   
?> 
