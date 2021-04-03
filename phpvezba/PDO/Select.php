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
        $sql= 'SELECT * FROM student';
        //za SELECT upite koristi se metoda querry() objekta klase PDO
        /*metoda query() kao rezultat vraca objekat klase PDOstatement sa kojim mozemo da manipulesmo skupom rezultata*/
        $stmt = $dbh->query($sql);
        //uzimamo jedan po jedan slog iz skupa pomocu foreach petlje i smestamo ih u promenjivu $row koju kasnije ispisujemo
        foreach ($stmt as $row ) {
            print '<br/>'. $row['broj_indexa'].'-'.$row['prezime'].'-'.$row['ime'].'-'.$row['status'];
        }
        
        
        /*zatvaranje konekcije sa mysql serverom i bazom podataka*/
        $dbh=null;


    } catch (PDOExeception $e) {
        echo $e->getMessage();
    }
?>