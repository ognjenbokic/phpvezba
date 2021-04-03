<?php 
	
	//ucitava PHP fajl koji sadrzi klasu DbKonektor
	require_once('DbKonektor.php');

	//kreira instancu klase DbKonektor
	$konektor = new DbKonektor();

	//koristi metodu za upit oz DbKonektor da izvrsi upit nad tabelom baze
	$rezultat = $konektor->upit('SELECT prezime FROM student');

	//pribavlja slog iz skupa rezultata upita i snima ga kao niz
	$red = $konektor->fetchArray($rezultat);

	//prikazuje vrednost pribavljenu upitom na ekranu
	echo $red['prezime'];

 ?>