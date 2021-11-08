<?php
require_once 'db.php';
require_once 'lotto.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(!empty($_POST['torlesID'])) {
        $torles = $_POST['torlesID'];
        lotto::delete($torles);
    }
}

$data = lotto::getAllByID();

?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Lottoszamok</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-2">
            </div>
            <div class="col-8">
            <h1>Megjátszott lotto szelvények</h1>
            <?php
            foreach($data as $tomb) {
                echo '<div class="container elem">';
                echo '<form method="POST">';
                echo '<table>';
                echo '<input type="hidden" name="torlesID" value="' . $tomb->getId() . '">';  
                echo '<tr><td>Játékos neve:</td><td>'. $tomb->getJatekosNeve() .'</td></tr>';
                echo '<tr><td>Első szám:</td><td>'. $tomb->getElsoSzam() .'</td></tr>';
                echo '<tr><td>Második szám:</td><td>'. $tomb->getMasodikSzam() .'</td></tr>';
                echo '<tr><td>Harmadik szám:</td><td>'. $tomb->getHarmadikSzam() .'</td></tr>';
                echo '<tr><td>Negyedik szám:</td><td>'. $tomb->getNegyedikSzam() .'</td></tr>';
                echo '<tr><td>Ötödik szám:</td><td>'. $tomb->getOtodikSzam() .'</td></tr>';
                echo '</table>';
                echo '<button id="torlesgomb" class="torles" type="submit">Törlés</button>';
                echo '</form>';
                echo '</div>';
            }
            ?>
            </div>
            <div class="col-2">
            </div>
            <a href="ujLotto.php" class="hozzaadas">Szelvény hozzáadása</a>
        </div>
    </div>
</body>
</html>