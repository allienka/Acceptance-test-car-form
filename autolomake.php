<!DOCTYPE html>
<html>
<head>
	<title>Autolomake</title>
</head>
<body>
<?php
$palvelin = "localhost";
$kayttaja = "root";  
$salasana = "";
$tietokanta = "Autot";	
	
$yhteys = new mysqli($palvelin, $kayttaja, $salasana, $tietokanta);

if ($yhteys->connect_error) {
	die("Yhteyden muodostaminen epäonnistui: " . $yhteys->connect_error);
 }
 $yhteys->set_charset("utf8");

 $hakusql="SELECT hetu, nimi FROM henkilo;";
 $tulokset = $yhteys->query($hakusql);
?>
	<h4>Syötä auton tiedot:</h4>
	<form action="insert.php" method="post">
		<input type="text" name="rekisteri" placeholder="Rekisterinro"/><br><br>
		<input type="text" name="vari" placeholder="Väri"/><br><br>
		<input type="text" name="vuosimalli" placeholder="Vuosimalli"/><br><br>
		<select name="omistaja" >
		
		<!-- lisää tähän vaihtoehdot tietokannasta
		esim. <option value="281182-070W">Anne Autoilija</option>
		-->
		<option> Valitse Omistaja</option>
		<?php while ($rivi = $tulokset->fetch_assoc()):;?>
		<option value="<?php echo $rivi["hetu"];?>">
		<?php echo $rivi["nimi"];?></option>
		<?php endwhile;?>
		</select><br><br>
		<input type="submit" name="lisays" value="Lisää auto"><br><br>
	</form>
	</body>
</html>


