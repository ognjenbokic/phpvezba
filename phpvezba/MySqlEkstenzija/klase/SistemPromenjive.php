<?php 
	
	class SistemPromenjive{
		
		var $sistemskep;
		
		function dajSistemProm() {
			
			//sistemske promenjive za konekciju sa bazom i upite

			$sistemskep['dbhost'] = 'localhost';
			$sistemskep['dbkorisnik'] = 'root';
			$sistemskep['dblozinka'] = '';
			$sistemskep['dbime'] = 'fakultet';

			return $sistemskep;
		}
		
	}

 ?>