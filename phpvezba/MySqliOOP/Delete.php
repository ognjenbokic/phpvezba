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
    $sql="Delete from student where broj_indeksa like 'IT80/16'";
    //metoda query objekta $mysqli vraca TRUE ako je upit uspesno izvrsen
    if($mysqli->query($sql)===TRUE){
        echo "Student je izbrisan iz evidencije";
    }else{
        echo "Greska pri brisanju studenta iz evidencije". $mysqli->error;
    }



    $mysqli->close();


?>