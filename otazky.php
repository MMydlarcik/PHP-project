<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otázky</title>
</head>
<body>
<?php
if (isset ($_POST["otazka"])){
if (!($con = mysqli_connect("localhost","anketa","","anketa")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (mysqli_query($con,
"INSERT INTO otazky(otazka) VALUES('" . 
addslashes($_POST["otazka"]) . "')"
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
?>
<?php
if (!($con = mysqli_connect("localhost", "anketa", "", "anketa")))
{
  die("Nelze se připojit k databázovému serveru!</body></html>");
}
mysqli_query($con,"SET NAMES 'utf8'");
if (!($vysledek = mysqli_query($con, "SELECT * FROM otazky")))
{
  die("Nelze provést dotaz.</body></html>");
}
?>
<h1>Příspěvky</h1>
<table border="1">
<?php
while ($radek = mysqli_fetch_array($vysledek))
{
  echo "<tr><th>". htmlspecialchars($radek["otazka"]) . "</th>";
  $cil = htmlspecialchars($radek["id_otazky"]);?>
  <th><a href="otazka.php?id=<?php echo $cil;?>">Kliknete sem</a></th></tr>
  <?php
}
mysqli_free_result($vysledek);
mysqli_close($con);
?>
</table>
<br><br>

    <form method="POST" action="otazky.php">
        <textarea name="otazka" rows="10" cols= "50">Vlozte otazku</textarea><br>
        <input type="submit" value="Zapis otazku">
    </form>
    <br><br>

</body>
</html>