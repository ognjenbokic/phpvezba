
<?php
/*PREPARED STATEMENT primenom MySqli ekstenzije */

    $hostname ='localhost';
    $username = 'root';
    $password='';
    $dbname='vts';
    //konektovanje na bazu
    $mysqli=new mysqli($hostname,$username,$password,$dbname);
    if($mysqli->connect_errno){
        echo "Neuspesna konekcija na MySql:". $mysqli->connect_error;
        exit();
    }
    //postavljanje karakter seta za podatke iz tabele na utf
    $mysqli->set_charset("utf8");



    //prepare i bind

    //Umesto konkretnih vrednosti unosimo ?  On ostavlja mesto-placeholdere za nase vrednosti. 
    $sql="SELECT * FROM student WHERE sifra=? AND prezime=?";

    /*Metodom prepare() naseg $mysqli objekta vrsimo pripremu naseg INSERT upita. 
    Ukoliko je upit uspesan, metoda prepare  ce vratiti vrednost objekta klase Statement $stmt. 
    On sadrzi sve sto je potrebno od pripremnih vrednosti za upit koji smo prosledili kao argument prepare metodi.
    Ukoliko upit nije uspesno pripremljen metoda prepare ce vratiti FALSE samim tim islov nase If petlje nece biti zadovoljen */
    if ($stmt = $mysqli->prepare($sql)) {
        
        //Metodom bind_param objeka $stmt vezujemo parametre za placeholdere naseg pripremljenog upita.
        //prvi parametar sadrzi sablon koji definise tipove ostalih parametara koje vezujemo za placeholdere
        $stmt->bind_param("is",$sifra,$prezime);
        
        //dodela konkretne vrednosti parametrima upita
        
        $prezime="Miric";
        $sifra="7";

        //izvrsenje upita se vrsi funkcijom execute() objekta $stmt
        $stmt->execute();
        
        //metodom get_result() objekta klase statement pravimo objekat klase  result koji sadrzi sva svojstva i metode neophodne da bi se moglo manipulisati elementima iz skupa rezultata
        //u ovom slucaju pozivamo metodu fetch_assoc() objekta klase result  da bi dohvatili prvi slog iz resultset-a i smestili ga u varijablu $row koju kasnije ispisujemo
        $result = $stmt->get_result();
        while ($row=$result->fetch_assoc()) {
            echo $row['broj_indeksa'].'-'.$row['prezime'].'-'.$row['ime'].'-'.$row['status']."<br>";
        }

        //zatvranje pripremljenog upita
        $stmt->close();
    }
    else{
        /*Greška*/
        printf("Greška u izvrsenju pripremljenog upita:%s\n",
        $mysqli->error);
    }

    $mysqli->close();


?>