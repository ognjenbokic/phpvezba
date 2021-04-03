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
    /*sql upit nad tabelom, kao i kod insert,update i delete koristimo $mysqli->query($sql), 
    jedino je razlika sto sada u slucaju uspesnog izvrsenja select upita ne vraca kao vrednost TRUE nego OBJEKAT klase mysqli_result koji 
    pokazuje na resultset- skup slogova koje je kao rezultat vratio izvvrseni select upit */
    /*fetch_assoc metoda vraca asocijativno niz gde su indeksi niza nazivi polja tabele koju koristimo a vrednosti 
    tih elemenata su vrednosti tih polja za dati slog.
    Ukoliko necemo da vrednosti budu smestene u niz mozemo koristiti metodu fetch_object i tada ce rezultat biti tipa objekat gde ce svojstva tog objekta biti vrednosti  kolona tabele 
    nad kojom vrsimo sql upit.*/
    /*Ukoliko koristimo metodu fetch_row tada ce trazeni slog biti vracen kao numericki indeksirani niz.
    Metoda fetch_all , bice vracen niz koji je numericki indeksiran i odgovarajuci niz koji je  asocijativno indeksiran, potpuno istu stvar radi i fetch_array.
    */
    $result = $mysqli->query("SELECT * FROM student");
    while ($row=$result->fetch_assoc()) {
        echo $row['broj_indeksa'].'-'.$row['prezime'].'-'.$row['ime'].'-'.$row['status']."<br>";
    }

    $mysqli->close();


?>