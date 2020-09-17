<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Zoo vrt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
      <link rel="stylesheet" type="text/css" href="css/style-body.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
       
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <?php include 'meni.php';?>
</head>
<body>
    <div class="wrap">
    
<h4>Prikaz svih karata</h4>
<table class="table">
        <form method="get" action=""> 
           <tr>
           <td align=right>
            Unesite naziv karte:
           </td> 
           <td>
            <input type="text" class="form-control" name="nazivzapretragu" size="40" autofocus maxlength=20 tabindex=1>
           </td>
            <td>
                <input type="submit" class="btn btn-primary" name="submitpretraga" value="Pretraga" tabindex=2>
            </td>
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
            if(isset($_GET['submitpretraga'])) 
            {
                //Pritisnuto dugme PRETRAGA, ista stranica se ponovo kreira ponovo
                $pretraga = $_GET['nazivzapretragu'];
                $result = $objKarta->pretraga($konekcija,$pretraga);
            }

        if ($result)
		   {
            $brredova = mysqli_num_rows($result);
            echo "<br/>";
            echo "Broj pronadjenih karata: ".$brredova;
            if ($brredova>0) 
            {
			echo "<br/>";
			echo "<table class='table' border='2'>";
            echo "<tr>
            <th>ID karte</th>
            <th>ID zivotinje</th>
			<th>Naziv karte</th>	
			<th>Cena karte</th>
			<th>Vrsta karte</th>
			<th>Datum rezervisanja karte</th>
            <th>Naziv zivotinje</th>
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
			echo "<td>" . $red['godina_zivotinje'] . "</td>";
            echo "<td>" . $red['nazivzivotinje'] . "</td>";           
            
            $id_karte = $red['id_karte'];
            $id_zivotinje = $red['id_zivotinje'];
            $nazivkarte = $red['nazivkarte'];
            $emailKupca = $red['emailKupca'];
            $vrstaKarte = $red['vrstaKarte'];
            $godina_zivotinje=$red['godina_zivotinje'];
            $nazivzivotinje=$red['nazivzivotinje'];

            echo "<td><a href='izmenaKarte.php?nazivzivotinje=$nazivzivotinje&id_karte=$id_karte&nazivkarte=$nazivkarte&emailKupca=$emailKupca&vrstaKarte=$vrstaKarte&id_zivotinje=$id_zivotinje'>Izmeni</a></td>
            <td><a href='brisanjeKarte.php?id_karte=$id_karte'>Obrisi</a></td>";

        	echo "</tr>";
			}
			echo "</table>";
		    } 
		echo "<br/>";
        }
    }
    $objKarta=null;
    $objKonekcija->zatvoriKonekciju($konekcija);
    $objKonekcija=null;
?>     
</div>
</body>
</html>
