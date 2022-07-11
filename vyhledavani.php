<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyhledávání | DB Books App</title>

    <link rel="stylesheet" href="app.css">
</head>

<body>
    <div class="containerKindle">
        <img src="ctecka.png" alt="">
        <div class="shadow"></div>
        <div class="innerMain">
            <header>
                <h1>DB Books App</h1>
                <!-- menu -->
                <nav>
                    <?php
                    include 'menu.php';
                    menu();
                    ?>
                </nav>

                <h2>Vyhledávání v databázi</h2>

            </header>

            <!-- form vyhledavani -->
            <main>
                <form action="vyhledavani.php" method="POST">
                    <!-- <label for="vyhledavi_isbn">ISBN</label> -->
                    <input class="inputText" type="text" name="vyhledavani_isbn" placeholder="ISBN">

                    <!-- <label for="vyhledavani_jmeno">Jméno</label> -->
                    <input class="inputText" type="text" name="vyhledavani_jmeno" placeholder="Jméno autora">

                    <!-- <label for="vyhledavani_prijmeni">Příjmení</label> -->
                    <input class="inputText" type="text" name="vyhledavani_prijmeni" placeholder="Příjmení autora">

                    <!-- <label for="vyhledavani_kniha">Název knihy</label> -->
                    <input class="inputText" type="text" name="vyhledavani_kniha" placeholder="Název knihy">

                    <input type="submit" name="submit" value="Vyhledej knihu">
                </form>

                <!-- logika vyhledani -->
                <?php
                include 'mysqli_connection.php';
                // databaze connect
                Connection();

                // pokud je alespon 1 vyplnen
                if ((!empty($_POST['vyhledavani_isbn']))
                    || (!empty($_POST['vyhledavani_jmeno']))
                    || (!empty($_POST['vyhledavani_prijmeni']))
                    || (!empty($_POST['vyhledavani_kniha']))
                ) {
                    $isbn_dotaz = addslashes($_POST['vyhledavani_isbn']);
                    $jmeno_dotaz = addslashes($_POST['vyhledavani_jmeno']);
                    $prijmeni_dotaz = addslashes($_POST['vyhledavani_prijmeni']);
                    $kniha_dotaz = addslashes($_POST['vyhledavani_kniha']);

                    // select konkretni knihy z databaze
                    $query_vyhledavani = "SELECT isbn, jmeno_autor, prijmeni_autor, nazev_knihy, popis 
                                        FROM knihy WHERE isbn = '$isbn_dotaz' 
                                        OR jmeno_autor = '$jmeno_dotaz' 
                                        OR prijmeni_autor = '$prijmeni_dotaz' 
                                        OR nazev_knihy = '$kniha_dotaz'";

                    // data nalezenych knih
                    $data = mysqli_query($con, $query_vyhledavani);

                    // check vyberu
                    if (!$data) {
                        die("Nepovedlo se provést výběr dat z databaze.");
                    }

                ?>
                    <!-- prehled jednotlivych knih pod sebou -->
                    <div class="books">
                        <?php
                        while ($row = mysqli_fetch_array($data)) {
                            echo "<div class='book'>";
                            echo "<h3>Název knihy: " . $row['nazev_knihy'] . "</h3>";
                            echo "<span>Jméno autora: " . $row['jmeno_autor'] . "</span><br>";
                            echo "<span>Přijmení autora: " . $row['prijmeni_autor'] . "</span>";
                            echo "<h4>ISBN: " . $row['isbn'] . "</h4>";
                            echo "<span>Popis knihy: <br>" . $row['popis'] . "</span>";
                            echo "</div>";
                            echo "<hr>";
                        }
                        ?>
                    </div>
                <?php
                }
                // jinak zadej aspon jeden udaj
                else {
                    echo
                        '<div>
                            <p>Pro vyhledávání musí být ve formuláři vyplněn alespoň jeden dotaz!</p>
                        </div>';
                };
                ?>

            </main>
        </div>
    </div>


</body>

</html>