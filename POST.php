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

 if(array_key_exists('hero',$_POST)){
     if(array_key_exists($_POST['hero'], $heroes)){
         $heroID = $_POST['hero'];
         $selectedHero = $heroes[$heroID];
         print_r($_POST);
     }
 }

 ?>

<!DOCTYPE html>
 <html>
    <body>
        <form action="./POST.php" method="post" enctype="application/x-www-form-urlencoded">
            <label for="hero_select">Select your hero: </label>
            <select name="hero" id="hero_select">
            <?php 
                foreach($heroes as $heroID => $heroData){ ?>

                <option value="<?= $heroID ?>">
                    <?= $heroData['name'] ?>
                </option>

                <?php } ?>
            </select>
            <input type="submit" value="Show">
        </form>
    </body>
 </html>