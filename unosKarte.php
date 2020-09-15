<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Zoo vrt</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="css/styleMenu.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">   
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <?php include 'meni.php';?>
</head>
<body>

<h4>Karta unos</h4>
    <table class="table table-striped">
        <form method="post" action="submitKarta.php"> 
            <tr><td align=right>ID Karte*</td><td><input  type="number" name="id_karte" size="10" autofocus required maxlength=10 tabindex=1></td></tr>
            <tr><td align=right>ID Zivotinje*</td><td><input  type="number" name="id_zivotinje" size="10" autofocus required maxlength=10 tabindex=2></td></tr> 
            <tr><td align=right>Naziv karte*</td><td><input type="text" name="nazivkarte" size="50" required maxlength=50 tabindex=3></td></tr> 
            <tr><td align=right>Email Kupca*</td><td><input type="text" name="emailKupca" size="50" required maxlength=50 tabindex=3></td></tr> 
            <tr><td align=right>Cena karte</td><td><input type="text" name="cena" size="10" maxlength=10 tabindex=4></td></tr>
            <tr><td align=right>Vrsta karte*</td><td><input type="text" name="vrstaKarte" size="30" required maxlength=30 tabindex=5></td></tr> 
            <tr><td align=right>Godina rezervisanja karte*</td><td><input type="date" name="godina_zivotinje"  required maxlength=4 tabindex=6></td></tr> 
            <tr><td align=right>Naziv zeljenje zivotinje*</td><td><input type="text" name="nazivzivotinje" size="30" required maxlength=30 tabindex=7></td></tr> 
            <tr><td></td>
                <td>
                    <button type="reset" class="btn btn-danger" name="cancel" tabindex=8>Poništi</button>
                    <input type="submit" class="btn btn-info" name="submit" value="Snimi" tabindex=8>
                </td>
            </tr>
        </form>
    </table> 

</body>
</html>
