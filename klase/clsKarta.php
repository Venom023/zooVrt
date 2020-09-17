<?php

class clsKarta

{
    public $nazivzivotinje;
    public $godina_zivotinje;
    public $id_karte;
    public $nazivkarte;
    public $emailKupca;
    public $cena;
    public $vrstaKarte;
    public $id_zivotinje;

public function snimiKartu($konekcija)
{
    $upit = "INSERT INTO `zivotinje` (`id_zivotinje`, `godina_zivotinje`, `nazivzivotinje`) VALUES ($this->id_zivotinje, '$this->godina_zivotinje', '$this->nazivzivotinje');";
    $result = mysqli_query($konekcija, $upit);
    $upit = "INSERT INTO `karta` (`id_karte`, `nazivkarte`, `emailKupca`, `cena`, `vrstaKarte`, `id_zivotinje`) VALUES ($this->id_karte, '$this->nazivkarte', '$this->emailKupca',
     '$this->cena', '$this->vrstaKarte', $this->id_zivotinje);";
    $result = mysqli_query($konekcija, $upit);
    if(!$result)
            {
                echo "Podaci o karti nisu upisani u bazu podataka. Greška! ";
                echo "<br/>";
                mysqli_error($konekcija);
                echo $upit;
            }
            else
            {
                echo "Uspešno upisani podaci o karti ".$this->nazivkarte." u bazu podataka!";
                echo "<br/>";
            }
}

public function prikazSvihKarata($konekcija)
{

    $upit = "SELECT * FROM (SELECT * FROM karta ORDER BY `nazivkarte`) AS ONE LEFT OUTER JOIN
        (SELECT * FROM zivotinje WHERE id_zivotinje=`id_zivotinje`) AS TWO ON ONE.id_karte = TWO.id_zivotinje;";
    $result = mysqli_query($konekcija, $upit);            
    return $result;
}


public function pretraga($konekcija, $pretraga)
{
    $upit = "SELECT * FROM (SELECT * FROM karta WHERE `nazivkarte` LIKE '%$pretraga%' ORDER BY `nazivkarte`) AS ONE LEFT OUTER JOIN
    (SELECT * FROM zivotinje WHERE id_zivotinje=`id_zivotinje`) AS TWO ON ONE.id_karte = TWO.id_zivotinje;";
    $result = mysqli_query($konekcija, $upit);               
    return $result;
}

public function obrisiKartu($konekcija, $id_karte)
{
    $upit = "DELETE `karta`, `zivotinje` 
    FROM `karta`, `zivotinje` 
    WHERE `zivotinje`.`id_zivotinje` = `karta`.`id_karte` AND `karta`.`id_zivotinje` ='$id_karte'";
    $result = mysqli_query($konekcija, $upit);               
    return $result;
}

public function promeniKartu($konekcija, $stariIdKarte)
{
  
    $upit = "UPDATE karta SET `id_karte` = '$this->id_karte', 
    `nazivkarte` ='$this->nazivkarte', `nazivzivotinje` = '$this->nazivzivotinje', `emailKupca` = '$this->emailKupca', `godina_zivotinje` = '$this->godina_zivotinje', `vrstaKarte` = '$this->vrstaKarte' WHERE `id_karte` = '$starid_karte';";
    $result = mysqli_query($konekcija, $upit); 
             
    if(!$result)
            {
                echo "Podaci o karti nisu azurirani. Greška! ";
                echo "<br/>";
                mysqli_error($konekcija);
            }
            else
            {
                echo "Uspešno promenjeni podaci o karti ".$this->nazivkarte." u bazu podataka!";
                echo "<br/>";
            }
}
}

?>