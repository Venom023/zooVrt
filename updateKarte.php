<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Zoo vrt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
       
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <?php include 'meni.php';?>
</head>
<body>
    
<h4>Izmena karte</h4>    
<?php

        $godina_zivotinje=$_GET['godina_zivotinje'];
        $nazivzivotinje=$_GET['nazivzivotinje'];
        $id_karte=$_GET['id_karte'];
        $nazivkarte=$_GET['nazivkarte'];
        $emailKupca=$_GET['emailKupca'];
        $cena=$_GET['cena'];
        $vrstaKarte=$_GET['vrstaKarte'];
        $id_zivotinje=$_GET['id_zivotinje'];
        $stariIdKarte=$_GET['id_karte'];

        //otvaranje konekcije do baze podataka
        include 'klase/clsKonekcijaBP.php';
        $objKonekcija = new clsKonekcijaBP();
        $konekcija = $objKonekcija->otvoriKonekciju();

        //referenciranje na klasu clsArtikl
        include 'klase/clsKarta.php';
        
        //instanciranje objekta objKarta
        $objKarta = new clsKarta();
        
        //dodeljivanje vrednosti atributima
        $objKarta->godina_zivotinje = $godina_zivotinje;
        $objKarta->id_karte = $id_karte;
        $objKarta->nazivkarte = $nazivkarte;
        $objKarta->nazivzivotinje = $nazivzivotinje;
        $objKarta->emailKupca = $emailKupca;
        $objKarta->cena = $cena;
        $objKarta->vrstaKarte = $vrstaKarte;
        $objKarta->id_zivotinje = $id_zivotinje;

        //poziv metode za unos novog artikla
        $objKarta->promeniKartu($konekcija, $stariIdKarte);

        //ispis poruke o uspešnosti upisa u BP iz klase
        //uništavanje objekata
        $objKarta = null;
        $objKonekcija = null;
?>     

<br>
<br>
<a href="unosKarte.php"><button type="button">Povratak</button></a>
</body>
</html>