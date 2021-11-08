<?php
require_once 'db.php';
require_once 'lotto.php';


$data = lotto::getAllByID();

?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Lottoszamok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <h1>valami</h1>
    <?php
    foreach($data as $tomb) {
        echo '<div class="container border">';
        echo '<form method="POST">';
        echo '<input type="hidden" name="deleteId" value="' . $tomb->getId() . '">';
        echo '<h4 class="">'. $tomb->getJatekosNeve() .'       <button id="delBtn" class="btn" type="submit" >X</button></h4>';
        echo '</form>';
        echo '<p>Első szám: '. $tomb->getElsoSzam() .'</p>';
        echo '<p>Második szám: '. $tomb->getMasodikSzam() .'</p>';
        echo '<p>Harmadik szám: '. $tomb->getHarmadikSzam() .'</p>';
        echo '<p>Negyedik szám: '. $tomb->getNegyedikSzam() .'</p>';
        echo '<p>Ötödik szám: '. $tomb->getOtodikSzam() .'</p>';
        echo '</div>';
    }
    ?>
</body>
</html>