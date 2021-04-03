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
    //sql upit nad tabelom
    $sql="UPDATE student SET prezime='Babic' WHERE prezime='Mikic'";
    //metoda query objekta $mysqli vraca TRUE ako je upit uspesno izvrsen
    if($mysqli->query($sql)===TRUE){
        echo "Podaci o studentu izmenjeni su uspesno";
    }else{
        echo "Greska izmeni podataka o studentu". $mysqli->error;
    }



    $mysqli->close();


?>