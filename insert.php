

<?php

include 'autolomake.php';
if (isset($_POST["rekisteri"])){
	$rekisterinro = $yhteys->real_escape_string($_POST["rekisteri"]);
	$vari = $yhteys->real_escape_string($_POST["vari"]);
	$vuosimalli = $yhteys->real_escape_string($_POST["vuosimalli"]);
	$omistaja = $yhteys->real_escape_string($_POST["omistaja"]);
	
	if(!empty($_POST["rekisteri"])){
		$hakusql="SELECT rekisterinro FROM auto WHERE rekisterinro = '$rekisterinro';";
		$tulokset = $yhteys->query($hakusql);
		if ($tulokset->num_rows > 0) {
		
			echo "Rekisterinumero on käytössä!";
		
		} else {
		$lisayssql="INSERT INTO auto(rekisterinro, vari, vuosimalli, omistaja) VALUES ('$rekisterinro','$vari','$vuosimalli','$omistaja')";
		
		$tulos = $yhteys->query($lisayssql);

			if ($tulos === TRUE) {
			echo "Tuote lisätty.";
	 		} else {
			echo "Virhe: " . $lisayssql . "<br>" . $yhteys->error;
	 		}
		}	
	}else 
		echo "Rekisterinumero on tyhjä";
	}

	


$yhteys->close();	
	
?>

