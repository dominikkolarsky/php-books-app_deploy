<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vložení | DB Books App</title>

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

                <h2>Formulář pro vložení knihy</h2>

            </header>

            <!-- form vlozeni -->
            <main>
                <form action="vlozeni.php" method="post">
                    <!-- <label for="vstup_isbn">ISBN</label><br> -->
                    <input class="inputText" type="text" name="vstup_isbn" placeholder="ISBN">

                    <!-- <label for="vstup_jmeno">Jméno</label><br> -->
                    <input class="inputText" type="text" name="vstup_jmeno" placeholder="Jméno autora">

                    <!-- <label for="vstup_prijmeni">Příjmení</label><br> -->
                    <input class="inputText" type="text" name="vstup_prijmeni" placeholder="Příjmení autora">

                    <!-- <label for="vstup_kniha">Název knihy</label><br> -->
                    <input class="inputText" type="text" name="vstup_kniha" placeholder="Název knihy">

                    <!-- <label for="vstup_popis">Popis knihy</label><br> -->
                    <textarea class="inputText" name="vstup_popis" placeholder="Popis knihy..."></textarea>

                    <input type="submit" name="submit" value="Vložit knihu">
                </form>

                <!-- logika vlozeni -->
                <?php
                // pripojeni k databazi:
                include 'mysqli_connection.php';
                Connection();

                // pokud je vse vyplneno, tak:
                if ((!empty($_POST['vstup_isbn']))
                    && (!empty($_POST['vstup_jmeno']))
                    && (!empty($_POST['vstup_prijmeni']))
                    && (!empty($_POST['vstup_kniha']))
                    && (!empty($_POST['vstup_popis']))
                ) {
                    $query_vlozeni =
                        "INSERT INTO knihy(isbn, jmeno_autor, prijmeni_autor, nazev_knihy, popis) VALUES('" .
                        addslashes($_POST["vstup_isbn"]) . "', '" .
                        addslashes($_POST["vstup_jmeno"]) . "', '" .
                        addslashes($_POST["vstup_prijmeni"]) . "', '" .
                        addslashes($_POST["vstup_kniha"]) . "', '" .
                        addslashes($_POST["vstup_popis"]) . "')";

                    // pokud vse probehlo, vypis:
                    if (mysqli_query($con, $query_vlozeni)) {
                        echo "<p>Kniha byla vložena do databáze.</p>";
                    }
                    // odpoj se:
                    mysqli_close($con);
                }
                // jinak vypis:
                else {
                    echo "<p>Všechny položky formuláře musí být vyplňeny!</p>";
                }
                ?>
            </main>
        </div>
    </div>




</body>

</html>