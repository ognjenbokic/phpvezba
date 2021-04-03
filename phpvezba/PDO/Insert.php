<?php
    /************PDO ekstenzija - (PHP Data Object)************/

    
    

    //definisanje promenjivih
    $hostname ='localhost';
    $username = 'root';
    $password='';
    $dbname='vts';
    //$dsn = mysql: host=$hostname ; dbname=$dbname ; charset=utf8" // $dsn je prvi argument konstruktora PDO tipa string
    
    /*Konektovanje na bazu se vrsi tako sto se kreira instanca klase PDO
    $dbh=new PDO("$dsn", $username, $password); 
    */

    //PDO appi rukuje greskama uz pomoc izuzetaka i zato se kod pise unutar Try bloka
    try {
        $dbh = new PDO("mysql:host=$hostname;bdname=$dbname;charset=utf8",$username,$password);
        
        /*poruka o uspesnom konektovanju*/
        echo 'Konekcija na mysql server je uspela <br/>';
        
        /*SQL upiti nad tabelama baze dolaze ovde */
        //upit vrsimo tako sto pozivamo metoduu exec() objekta $dbh kojoj kao parametar prosledjujemo SQL upit u ovom slucaju INSERT
        //ako je uspesan upit metoda vraca integer odn. broj na koliko slogova je imao uticaja SQL upit, ukoliko nije bilo efekta ni na jedan slog metoda ce vratiti NULL
        $count = $dbh->exec("INSERT INTO student(broj_indexa, prezime, ime, status, sifra)VALUES('WD33/20','Peric','Zivko','B','5')");
        
        //ispis broja slogova na koji smo imali uticaja(nije obavezno)

        echo $count;

        /*zatvaranje konekcije sa mysql serverom i bazom podataka*/
        $dbh=null;


    } catch (PDOExeception $e) {
        echo $e->getMessage();
    }
?>