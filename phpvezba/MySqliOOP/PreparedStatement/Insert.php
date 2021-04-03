
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
    $sql="INSERT INTO student(broj_indeksa,prezime,ime,status,sifra) VALUES (?,?,?,?,?)";

    /*Metodom prepare() naseg $mysqli objekta vrsimo pripremu naseg INSERT upita. 
    Ukoliko je upit uspesan, metoda prepare  ce vratiti vrednost objekta klase Statement $stmt. 
    On sadrzi sve sto je potrebno od pripremnih vrednosti za upit koji smo prosledili kao argument prepare metodi.
    Ukoliko upit nije uspesno pripremljen metoda prepare ce vratiti FALSE samim tim islov nase If petlje nece biti zadovoljen */
    if ($stmt = $mysqli->prepare($sql)) {
        
        //Metodom bind_param objeka $stmt vezujemo parametre za placeholdere naseg pripremljenog upita.
        //prvi parametar sadrzi sablon koji definise tipove ostalih parametara koje vezujemo za placeholdere
        $stmt->bind_param("ssssi",$br_ind,$prezime,$ime,$status,$sifra);
        
        //dodela vrednosti parametrima upita
        $br_ind="IT14/20";
        $prezime="Miric";
        $ime="Mitar";
        $status="B";
        $sifra="7";

        //izvrsenje upita se vrsi funkcijom execute() objekta $stmt
        $stmt->execute();

        //dodela vrednosti parametrima upita
        $br_ind="IT9/20";
        $prezime="Kitic";
        $ime="Mile";
        $status="B";
        $sifra="7";

        //izvrsenje upita 
        $stmt->execute();

        echo "Novi studenti su dodati u bazu podataka.";
        /*Zatvaranje pripremljenog upita*/
        $stmt->close();
    }
    else{
        /*Greška*/
        printf("Greška u izvrsenju pripremljenog upita:%s\n",
        $mysqli->error);
    }

    $mysqli->close();


?>