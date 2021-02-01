<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odpovedi</title>
</head>
<body>
<?php
/*parametr id*/
if (isset ($_GET["id"])){
    $id=$_GET["id"];
if (!($con = mysqli_connect("localhost","anketa","","anketa")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (mysqli_query($con,
"UPDATE odpovedi SET pocet_hlasu = pocet_hlasu + 1 WHERE id_odpovedi=" . addslashes($id)))
{
  echo "Úspěšně pridan hlas.";
}
else
{
  echo "Nelze provést dotaz. " . mysqli_error($con);
}
mysqli_close($con);
}

?>


<?php
/*zobrazeni otazky*/
if (!($con = mysqli_connect("localhost", "anketa", "", "anketa")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT * FROM otazky")))
{
  die("Nelze provést dotaz.</body></html>");
}
while ($radek = mysqli_fetch_array($vysledek))
{
    $id_otazky = $radek["id_otazky"];
?>
<h3><?php echo htmlspecialchars($radek["otazka"]); ?></h3>
<?php
/*zobrazeni odpovedi*/
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek2 = mysqli_query($con, "SELECT * FROM odpovedi WHERE id_otazky=". addslashes($id_otazky))))
{
  die("Nelze provést dotaz.</body></html>");
} ?>
<table border="1">
<?php
while ($radek2 = mysqli_fetch_array($vysledek2))
{
?>
<tr><td><?php echo $radek2["odpoved"]; ?></td><td><a href="odpovedi.php?id=<?php echo $radek2["id_odpovedi"];?>">Pocet hlasu:<?php echo $radek2["pocet_hlasu"]?></a><td></tr>
<?php
} ?>
</table>
<?php
}
mysqli_free_result($vysledek);
mysqli_free_result($vysledek2);
mysqli_close($con);
?>
</body>
</html>