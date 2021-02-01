<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otazka</title>
</head>
<body>
<?php
$id_otazky=$_GET["id"];

/*pridani odpovedi*/
if (isset ($_POST["odpoved"])){
if (!($con = mysqli_connect("localhost","anketa","","anketa")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (mysqli_query($con,
"INSERT INTO odpovedi(odpoved, id_otazky) VALUES('" . 
addslashes($_POST["odpoved"]) . "', '" . addslashes($id_otazky) . "');" 
))
{
  echo "Úspěšně vloženo.";
}
else
{
  echo "Nelze provést dotaz. " . mysqli_error($con);
}
mysqli_close($con);
}

/*zobrazeni otazky*/
if (!($con = mysqli_connect("localhost", "anketa", "", "anketa")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT * FROM otazky WHERE id_otazky=" . addslashes($id_otazky))))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<h1>Otazka</h1>
<?php
while ($radek = mysqli_fetch_array($vysledek))
{
?>
<h3><?php echo htmlspecialchars ($radek["otazka"]);?></h3>
<?php
}
mysqli_free_result($vysledek);
mysqli_close($con);
?>

<?php
/*zobrazeni odpovedi*/
if (!($con = mysqli_connect("localhost", "anketa", "", "anketa")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT * FROM odpovedi WHERE id_otazky=" . addslashes($id_otazky))))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<table border="1">
<?php
while ($radek = mysqli_fetch_array($vysledek))
{
  echo "<tr><td>". htmlspecialchars($radek["odpoved"]) . "</td></tr>";
}
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</table>
<br><br>


 <form method="POST" action="otazka.php?id=<?php echo $id_otazky; ?>">
        <textarea name="odpoved" rows="5" cols= "50">Vlozte odpoved</textarea><br>
        <input name="id_otazky" type="hidden" value="<?php echo htmlspecialchars($_POST["id_otazky"]);?>">
        <input type="submit" value="Zapis odpoved">
    </form>
    <br><br>


</body>
</html>