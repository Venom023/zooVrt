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
<h4>Brisanje karte</h4>
    <?php  
        $id_karte=$_GET['id_karte'];

	//otvaranje konekcije do baze podataka
    include 'klase/clsKonekcijaBP.php';
    $objKonekcija = new clsKonekcijaBP();
    $konekcija = $objKonekcija->otvoriKonekciju();

    //referenciranje na klasu objKarta
    include 'klase/clsKarta.php';
    
    //instanciranje objekta objKarta
    $objKarta = new clsKarta();
        
        //poziv metode za brisanje artikla
        $result=$objKarta->obrisiKartu($konekcija,$id_karte);

        //ispis poruke o uspešnosti brisanja
        if ($result)
          {echo "Karta je uspešno obrisana iz baze!";}
         else
          {echo "Karta nije uspešno obrisana iz baze!";}

        //uništavanje objekata
        $objKarta = null;
        $objKonekcija = null;
?> 
</br></br>
<a href="pretragaKarta.php"><button type="button">Povratak</button></a>

</body>
</html>
