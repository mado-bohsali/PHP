<?php

// define the data
$heroes = [
    "a-bomb" => [
        "id" => 1017100,
        "name" => "A-Bomb (HAS)",
   ],
     "captain-america" => [
         "id" => 1009220,
         "name" => "Captain America",
   ],
      "black-panther" => [
         "id" => 1009187,
         "name" => "Black Panther",
   ],
 
 ];

 $selectedHero = [];

 if(array_key_exists('hero', $heroes)){
     if(array_key_exists($_GET['hero'], $heroes)){
         $heroID = $_GET['hero'];
         $selectedHero = $heroes[$heroID];
     }
 }

 function path(array $queryData){
     return sprintf('./GET.php?%s',http_build_query($queryData)); //Generate URL-encoded query string
 }

echo path($heroes);