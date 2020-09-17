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

    $nazivzivotinje='';
    $godina_zivotinje='';
    $id_karte='';
    $nazivkarte='';
    $emailKupca='';
    $cena='';
    $vrstaKarte='';
    $id_zivotinje='';


    if ($konekcija) 
    {
        $upit = "SELECT * FROM (SELECT * FROM karta) AS ONE LEFT OUTER JOIN (SELECT * FROM zivotinje) AS TWO ON ONE.id_karte = TWO.id_zivotinje;";
        $result = mysqli_query($konekcija, $upit); 
        $brredova = mysqli_num_rows($result);
        if ($brredova>0)
        {
            $red=0;
            while($red = mysqli_fetch_array($result))
                {
                    $id_karte = $red['id_karte'];
                    $id_zivotinje = $red['id_zivotinje'];
                    $nazivkarte = $red['nazivkarte'];
                    $emailKupca = $red['emailKupca'];
                    $vrstaKarte = $red['vrstaKarte'];
                    $cena = $red['cena'];
                    $godina_zivotinje=$red['godina_zivotinje'];
                    $nazivzivotinje=$red['nazivzivotinje'];
                }
        }
    }

    //ispis vrednosti promenljivih sa podacima o posetioca

    echo "<h3 align='center'> SPISAK Karta KOJE SE NALAZE U BAZI</h3>";
    //referenciranje na klasu 
    include 'klase/clsKarta.php';
    
    //instanciranje objekta objKarta
    $objKarta = new clsKarta();
   
    if ($konekcija) 
		{
    
        $result = $objKarta->prikazSvihKarata($konekcija);
    
        if ($result)
        {
		$brredova = mysqli_num_rows($result);
		echo "<br/>";
		
		if ($brredova>0) 
		   {
			echo "<br/>";
            echo "<table class='table' border='2s'>";
            echo "<tr>
            
            <th>ID karte</th>
            <th>ID zivotinje</th>
			<th>Naziv karte</th>	
			<th>Email kupca</th>
            <th>Vrsta karte</th>
            <th>Cena karte</th>
			<th>Datum rezervisanja karte</th>
            <th>Naziv zeljene zivotinje</th>

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
			echo "<td>" . $red['godina_zivotinje'] . "</td>";
            echo "<td>" . $red['nazivzivotinje'] . "</td>";  
            
        	echo "</tr>";
			}
			echo "</table>";
		    }//br redova 
        echo "<br/>";
        echo "Ukupan broj karata u bazi: ".$brredova;
        echo "<br>";
		}// if $result
    } 
    $objKarta=null;
    $objKonekcija->zatvoriKonekciju($konekcija);
    $objKonekcija=null;
?>   
</div>

</body>
</html>
