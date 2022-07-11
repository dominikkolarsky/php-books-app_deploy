<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přehled | DB Books App</title>

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

                <h2>Databáze již vložených knih</h2>

            </header>

            <!-- logika prehledu -->
            <?php
            // pripojeni k databazi:
            include 'mysqli_connection.php';
            Connection();

            // select knih z databaze
            $query_vyber = "SELECT isbn, jmeno_autor, prijmeni_autor, nazev_knihy, popis FROM knihy";
            $data = mysqli_query($con, $query_vyber);

            if (!$data) {
                die("Nepovedlo se provést výběr dat z databaze.");
            }
            ?>

            <!-- prehled jednotlivych knih pod sebou -->
            <main>
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
            </main>


</body>

</html>