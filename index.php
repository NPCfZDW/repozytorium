
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>fishing World</title>
</head>
<body>
    <header>
        <nav class="menu">
            <div class="dropdown">
                <button title="Informacje" id="Opcje">Informacje</button> 
                <div class="dropdown-content">
                    <a href="#">Okresy Ochronne</a>
                    <a href="#">Wymiary Ochronne</a>
                    <a href="#">Karta Wędkarska</a>
                </div>
                </div>

            <div class="trofea"> <button title="Moje trofea" id="Opcje"><a href="trofea.html">Moje trofea</a></button></div>
            <div class="Styl"><button title="Styl" id="Opcje">Styl</button> </div>    
         </nav>
    </header>

    <main>
        <?php
        // Połączenie się z bazą danych SQL
        $serwer="localhost";
        $user="root";
        $pass="";
        $baza="ryby";
        $db = new mysqli($serwer, $user, $pass, $baza);
        
        // Sprawdzenie połączenia
        if (!$db) {
            die("Connection failed: " . error_log());
        }
        
        // Wykonanie zapytania SQL
        $sql = "SELECT * FROM ochrona";
        $wynik=$db->query($sql);
        
        // tworzę tabelę HTML i wyświetlam dane z tabeli
        $ile_wierszy=$wynik->num_rows;
        echo '<table>';
                echo '<tr><td>ID</td><td>Nazwa</td><td>Zakres</td><td>Minimalna_długość_ochronna</td></tr>';
                //pętla po rekordach z bazy
                for ($i=0; $i <$ile_wierszy; $i++)
                    {
                        $wiersz = $wynik->fetch_assoc();
                        echo '<tr>';
                        echo '<td class="row">'.$wiersz['ID'].'</td>';
                        echo '<td>'.$wiersz['Nazwa'].'</td>';
                        echo '<td>'.$wiersz['Zakres'].'</td>';
                        echo '<td>'.$wiersz['Minimalna_długość_ochronna'].'</td>';
                        echo '</tr>';
                    }
                echo '</table>';
        // Zamknij połączenie
        $db->close();
        ?>
</main>

    <footer></footer>
</body>
</html>
