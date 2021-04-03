<?php 
	
	//klasa DbKonektor za konekciju na MySql bazu podataka i upiti
	
	require_once 'SistemPromenjive.php';

	class DbKonektor extends SistemPromenjive {

		var $upit;
		var $link;

		//Metoda DbKonektor, svrha:Konektovanje na bazu
		//ova metoda je konstruktor i moze se zvati i __construct()
		function DbKonektor(){
			
			//ucitavanje promenjive iz parent klase
			$sistemskep = SistemPromenjive::dajSistemProm();

			//uzimanje pojedinacnih promenjivih iz niza koji je ucitan
			$host = $sistemskep['dbhost'];
			$baza = $sistemskep['dbime'];
			$korisnik = $sistemskep['dbkorisnik'];
			$lozinka = $sistemskep['dblozinka'];

			//Konektovanje na bazu
			$this->link = mysql_connect($host,$korisnik,$lozinka);
			mysql_select_db($baza);
		}

		//Metoda:upit, Svrha:Izvrsava upit nad tabelom baze
		function upit($upit){
			$this->upit = $upit;
			return mysql_query($upit, $this->link);
		}

		//Metoda: fetchArray, Svrha: slog iz rez. upita daje kao niz
		function fetchArray($rezultat){
			return fetchArray($rezultat);
		}

		//Metoda koja sluzi za zatvaranje konekcije
		function close(){
			mysql_close($this->link);
		}
	}

 ?>