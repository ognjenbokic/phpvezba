<?php
    $hostname ='localhost';
    $username = 'root';
    $password='';
    $dbname='vts';

    $mysqli=new mysqli($hostname,$username,$password,$dbname);
    if($mysqli->connect_errno){
        echo "Neuspesna konekcija na MySql:". $mysqli->connect_error;
        exit();
    }
    //postavljanje karakter seta za podatke iz tabele na utf
    $mysqli->set_charset("utf8");
    //sql upit nad tabelom//metoda query objekta $mysqli vraca TRUE ako je upit uspesno izvrsen
    $sql="INSERT INTO student(broj_indeksa,prezime,ime,status,sifra)VALUES('IT15/20','Mikic','Zorica','S',8)";
    //metoda query objekta $mysqli vraca TRUE ako je upit uspesno izvrsen
    if($mysqli->query($sql)===TRUE){
        echo "Podaci o studentu su dodati u tabelu";
    }else{
        echo "Greska pri unosu podataka o studentu". $mysqli->error;
    }



    $mysqli->close();


?>