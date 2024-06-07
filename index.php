<?php
include('database/database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>ToDoList</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <header>
        <div class="container">
        <figure>
            <img src="img/icone logo.png" alt="Logo ToDo" class="logo">
        </figure>
        <h1>ToDo List</h1>
        </div>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./index.php">ToDoList</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./about.php">A propos</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <?php include('database/crawler.php');?>


    <?php include('database/ajout.php');?>


    <body>

    </body>
    <footer>

    </footer>

</body>

</html>