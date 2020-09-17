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
    <?php include 'meni.php';
    $godina_zivotinje=$_GET['godina_zivotinje'];
    $nazivzivotinje=$_GET['nazivzivotinje'];
    $id_karte=$_GET['id_karte'];
    $nazivkarte=$_GET['nazivkarte'];
    $emailKupca=$_GET['emailKupca'];
    $cena=$_GET['cena'];
    $vrstaKarte=$_GET['vrstaKarte'];
    $id_zivotinje=$_GET['id_zivotinje'];
    $stariIdKarte=$_GET['id_karte'];
    ?>

</head>
<body>

<h4>Izmena karte</h4>
    <table class="table table-striped">
        <form method="post" action="submitKarta.php"> 
            <tr><td align=right>ID Karte</td><td><input  type="number" name="id_karte" size="10" autofocus required maxlength=10 tabindex=1 class="form-control"></td></tr>
            <tr><td align=right>ID zivotinje</td><td><input  type="number" name="id_zivotinje" size="10" autofocus required maxlength=10 tabindex=2 class="form-control"></td></tr> 
            <tr><td align=right>Naziv karte</td><td><input type="text" name="nazivkarte" size="50" required maxlength=50 tabindex=3 class="form-control"></td></tr> 
            <tr><td align=right>Email kupca</td><td><input type="text" name="emailKupca" size="50" required maxlength=50 tabindex=3 class="form-control"></td></tr> 
            <tr><td align=right>Cena</td><td><input type="text" name="cena" size="10" maxlength=10 tabindex=4 class="form-control"></td></tr>
            <tr><td align=right>Vrsta Karte</td><td><input type="text" name="vrstaKarte" size="30" required maxlength=30 tabindex=5 class="form-control"></td></tr> 
            <tr><td align=right>Datum rezervisanja karte</td><td><input type="date" name="godina_zivotinje"  required maxlength=4 tabindex=6 class="form-control"></td></tr> 
            <tr><td align=right>Naziv zeljene zivotinje</td><td><input type="text" name="nazivzivotinje" size="30" required maxlength=30 tabindex=7 class="form-control"></td></tr> 
            <tr><td></td>
                <td>
                    <br/>
                    <input type="submit" class="btn btn-primary" name="submit" value="Snimi" tabindex=8>
                    <input type="hidden" class="btn btn-primary" name="starisbn" value="<?php echo $stariIdKarte;?>">
                    <button type="reset" class="btn btn-danger" name="cancel" tabindex=9>Poništi</button>
                </td>
            </tr>
        </form>
    </table> 


</body>
</html>
