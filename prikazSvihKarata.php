<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Zoo vrt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
     <link rel="stylesheet" type="text/css" href="css/style-body.css">
       
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <?php include 'meni.php';?>
</head>
<body>
    <div class="wrap">
<h4>Prikaz svih karata</h4>
<table class="table table-striped">
        <form method="get" action=""> 
           <tr>
            </tr>
        </form>
    </table>     
<?php

    $result="";
    $brredova=0;
    
	//otvaranje konekcije do baze podataka
    include 'klase/clsKonekcijaBP.php';
    $objKonekcija = new clsKonekcijaBP();
    $konekcija = $objKonekcija->otvoriKonekciju();

    //referenciranje na klasu objKarta
    include 'klase/clsKarta.php';
    
    //instanciranje objekta objKarta
    $objKarta = new clsKarta();
   
    if ($konekcija) 
		{
             $result = $objKarta->prikazSvihKarata($konekcija);
        
             $brredova = mysqli_num_rows($result);
             echo "<br/>";
             echo "Broj pronadjenih karata: ".$brredova;

		if ($brredova>0) 
		   {
			echo "<br/>";
			echo "<table  class='table' border='2'>";
            echo "<tr>

            <th>ID karte</th>
            <th>ID zivotinje</th>
			<th>Naziv karte</th>	
			<th>Email kupca</th>
            <th>Vrsta karte</th>
            <th>Cena karte</th>
			<th>Datum rezervisanja karte</th>
            <th>Naziv izdavaca</th>
			</tr>";
             
			$red=0;
			while($red = mysqli_fetch_array($result))
			{
            echo "<tr>";
            echo "<td>" . $red['id_karte'] . "</td>";
            echo "<td>" . $red['id_zivotinje'] . "</td>";
			echo "<td>" . $red['nazivkarte'] . "</td>";
			echo "<td>" . $red['emailKupca'] . "</td>";
            echo "<td>" . $red['vrstaKarte'] . "</td>";
            echo "<td>" . $red['cena'] . "</td>"; 
			echo "<td>" . $red['Vrsta Karte_zivotinje'] . "</td>";
            echo "<td>" . $red['nazivzivotinje'] . "</td>";           

            $id_karte = $red['id_karte'];
            $id_zivotinje = $red['id_zivotinje'];
            $nazivkarte = $red['nazivkarte'];
            $emailKupca = $red['emailKupca'];
            $vrstaKarte = $red['vrstaKarte'];
            $cena = $red['cena'];
            $Vrsta Karte_zivotinje=$red['Vrsta Karte_zivotinje'];
            $nazivzivotinje=$red['nazivzivotinje'];

        	echo "</tr>";
			}
			echo "</table>";
		    } 
		echo "<br/>";
        }
    
    $objKarta=null;
    $objKonekcija->zatvoriKonekciju($konekcija);
    $objKonekcija=null;
?>     
</div>
</body>
</html>
