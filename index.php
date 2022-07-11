<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | DB Books App</title>
    <link rel="stylesheet" href="app.css">
</head>

<body>
    <div class="containerKindle">
        <img src="ctecka.png" alt="">
        <div class="shadow"></div>
        <div class="innerHome">
            <header>
                <div class="logo">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-books" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <rect x="5" y="4" width="4" height="16" rx="1"></rect>
                    <rect x="9" y="4" width="4" height="16" rx="1"></rect>
                    <path d="M5 8h4"></path>
                    <path d="M9 16h4"></path>
                    <path d="M13.803 4.56l2.184 -.53c.562 -.135 1.133 .19 1.282 .732l3.695 13.418a1.02 1.02 0 0 1 -.634 1.219l-.133 .041l-2.184 .53c-.562 .135 -1.133 -.19 -1.282 -.732l-3.695 -13.418a1.02 1.02 0 0 1 .634 -1.219l.133 -.041z"></path>
                    <path d="M14 9l4 -1"></path>
                    <path d="M16 16l3.923 -.98"></path>
                </svg>
                </div>

                <h1>DB Books App</h1>
                <!-- menu -->
                <nav>
                    <?php
                    include 'menu.php';
                    menu();
                    ?>
                </nav>
            </header>
        </div>
    </div>

</body>

</html>