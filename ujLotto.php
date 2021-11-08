<?php
 require_once 'db.php';
 require_once 'lotto.php';

 $jatekosNevHiba = false;
 $jatekosNevHibaUzenet = "";
 $elsoSzamHiba = false;
 $elsoSzamHibaUzenet = "";
 $masodikSzamHiba = false;
 $masodikSzamHibaUzenet = "";
 $harmadikSzamHiba = false;
 $harmadikSzamHibaUzenet = "";
 $negyedikSzamHiba = false;
 $negyedikSzamHibaUzenet = "";
 $otodikSzamHiba = false;
 $otodikSzamHibaUzenet = "";
 $nevHossz = false;


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty($_POST['ujJatekosNev'])) {
         $jatekosNevHiba = true;
         $jatekosNevHibaUzenet = "Nem lehet üres a név mező";
        
    } else {
         $jatekosNeve = $_POST['ujJatekosNev'];
    }

    if(empty($_POST['ujElsoSzam'])) {
         $elsoSzamHiba = true;
         $elsoSzamHibaUzenet = "Nem lehet üres a szám mező";
         
    } else {
         $elsoSzam = $_POST['ujElsoSzam'];
         
    }

    if(empty($_POST['ujMasodikSzam'])) {
        $masodikSzamHiba = true;
        $masodikSzamHibaUzenet = "Nem lehet üres a szám mező";

    } else {
        $masodikSzam = $_POST['ujMasodikSzam'];
    }

    if(empty($_POST['ujHarmadikSzam'])) {
        $harmadikSzamHiba = true;
        $harmadikSzamHibaUzenet = "Nem lehet üres a szám mező";

    } else {
        $harmadikSzam = $_POST['ujHarmadikSzam'];

    }
    if(empty($_POST['ujNegyedikSzam'])) {
        $negyedikSzamHiba = true;
        $negyedikSzamHibaUzenet = "Nem lehet üres a szám mező";

    } else {
        $negyedikSzam = $_POST['ujNegyedikSzam'];

    }

    if(empty($_POST['ujOtodikSzam'])) {
        $otodikSzamHiba = true;
        $otodikSzamHibaUzenet = "Nem lehet üres a szám mező";

    } else {
        $otodikSzam = $_POST['ujOtodikSzam'];

    }
    if(!empty($_POST['ujJatekosNev'])) {
        if (strlen($jatekosNeve) > 99) {
            $nevHossz = true;
            $jatekosNevHibaUzenet = "A név nem lehet hosszabb 99 karakternél";
        } 
   }
    
    if(!empty($_POST['ujElsoSzam']) && !empty($_POST['ujMasodikSzam']) && !empty($_POST['ujHarmadikSzam']) && !empty($_POST['ujNegyedikSzam']) && !empty($_POST['ujOtodikSzam'])) {
        if ($elsoSzam == $masodikSzam){
            $masodikSzamHiba = true; 
            $masodikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } elseif ($elsoSzam == $harmadikSzam){
            $harmadikSzamHiba = true; 
            $harmadikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } elseif ($elsoSzam == $negyedikSzam){
            $negyedikSzamHiba = true; 
            $negyedikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } elseif ($elsoSzam == $otodikSzam){
            $otodikSzamHiba = true; 
            $otodikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } elseif ($masodikSzam == $harmadikSzam){
            $harmadikSzamHiba = true; 
            $harmadikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } elseif ($masodikSzam == $negyedikSzam){
            $negyedikSzamHiba = true; 
            $negyedikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } elseif ($masodikSzam == $otodikSzam){
            $otodikSzamHiba = true; 
            $otodikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } elseif ($harmadikSzam == $negyedikSzam){
            $negyedikSzamHiba = true; 
            $negyedikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } elseif ($harmadikSzam == $otodikSzam){
            $otodikSzamHiba = true; 
            $otodikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } elseif ($negyedikSzam == $otodikSzam){
            $otodikSzamHiba = true; 
            $otodikSzamHibaUzenet = "A számok nem egyezhetnek meg";
        } 
    }

    if(!empty($_POST['ujElsoSzam']) && !empty($_POST['ujMasodikSzam']) && !empty($_POST['ujHarmadikSzam']) && !empty($_POST['ujNegyedikSzam']) && !empty($_POST['ujOtodikSzam'])) {
        if ($elsoSzam > 99){
            $elsoSzamHiba = true; 
            $elsoSzamHibaUzenet = "A szám nem lehet nagyobb mint 99";
        } elseif ($masodikSzam > 99){
            $masodikSzamHiba = true; 
            $masodikSzamHibaUzenet = "A szám nem lehet nagyobb mint 99";
        } elseif ($harmadikSzam > 99){
            $harmadikSzamHiba = true; 
            $harmadikSzamHibaUzenet = "A szám nem lehet nagyobb mint 99";
        } elseif ($negyedikSzam > 99){
            $negyedikSzamHiba = true; 
            $negyedikSzamHibaUzenet = "A szám nem lehet nagyobb mint 99";
        } elseif ($otodikSzam > 99){
            $otodikSzamHiba = true; 
            $otodikSzamHibaUzenet = "A szám nem lehet nagyobb mint 99";
        }
    }
    


    $hamis = !$jatekosNevHiba && !$elsoSzamHiba && !$masodikSzamHiba && !$harmadikSzamHiba && !$negyedikSzamHiba && !$otodikSzamHiba && !$nevHossz;
    echo $hamis;
    if($hamis) {
            $szelveny = new lotto($jatekosNeve, $elsoSzam, $masodikSzam, $harmadikSzam, $negyedikSzam, $otodikSzam);
            $szelveny->insert();
            sleep(3);
            header("Location:ujLottoSiker.php");     
    }   
 }
?><!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Új szelvény hozzáadása</title>
</head>
<body>
<div class=container>
    <h1>Új lotto szelvény felvétele</h1>
    <form method="POST"> 
        <div class="container row justify-content-center elem">
            <div class="col-2">
            </div>
            <div class="col-8">
                <div class="row justify-content-center">
                    <p>Adja meg a nevét</p>
                    <input id="ujJatekosNev" name="ujJatekosNev" type="text" >
                    <?php if($jatekosNevHiba) echo '<span class="hiba">' . $jatekosNevHibaUzenet . '</span>'?>
            
                    <p>Adja meg ez első lotto számot</p>
                    <input id="ujElsoSzam" name="ujElsoSzam" type="number">
                    <?php if($elsoSzamHibaUzenet) echo '<span class="hiba">' . $elsoSzamHibaUzenet . '</span>'?>
        
                    <p>Adja meg a második lotto számot</p>
                    <input id="ujMasodikSzam" name="ujMasodikSzam" type="number">
                    <?php if($masodikSzamHiba) echo '<span class="hiba">' . $masodikSzamHibaUzenet . '</span>'?>
                                
                    <p>Adja meg a harmadik lotto számot</p>
                    <input id="ujHarmadikSzam" name="ujHarmadikSzam" type="number">
                    <?php if($harmadikSzamHibaUzenet) echo '<span class="hiba">' . $harmadikSzamHibaUzenet . '</span>'?>
                                
                    <p>Adja meg a negyedik lotto számot</p>
                    <input id="ujNegyedikSzam" name="ujNegyedikSzam" type="number">
                    <?php if($negyedikSzamHibaUzenet) echo '<span class="hiba">' . $negyedikSzamHibaUzenet . '</span>'?>
                                
                    <p>Adja meg az ötödik lotto számot</p>
                    <input id="ujOtodikSzam" name="ujOtodikSzam" type="number">
                    <?php if($otodikSzamHibaUzenet) echo '<span class="hiba">' . $otodikSzamHibaUzenet . '</span>'?>

                    <div>
                        <input class="hozzaadas" type="submit" value="Hozzáadás">
                    </div>
                </div> 
            </div>   
            <div class="col-2">
            </div> 
        </div>  
    </form>
    <a href="index.php" class="vissza">Vissza a felvett szelvényekhez</a> 
</div> 
</body>
</html>