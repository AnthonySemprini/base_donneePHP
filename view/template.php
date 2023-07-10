<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title><?= $titre ?></title>
</head>

<body>
    <header>
        <nav class="nav">
            <a class="nav" href="index.php?action=listFilms">Film</a>
            <a class="nav" href="index.php?action=listActeurs">Acteur</a>
            <a class="nav" href="index.php?action=listRealisateurs">Réalisateur</a>
            <a class="nav" href="index.php?action=listGenres">Genre</a>
            <a class="nav" href="index.php?action=listRoles">Role</a>
            <a class="nav" href="index.php?action=formCasting">Casting</a>
        </nav>
        <div class="logoCine">
        <div class="logo">
            <img id="tel" src="./public/img/tel.png" alt="">
            <img id="ticket" src="./public/img/ticket.png" alt="">
        </div>
        <h1>Cinema</h1>
        </div>
        <p id="citation">“La photographie, c'est la vérité et le cinéma, c'est vingt-quatre fois la vérité par seconde..."<br>J.L. Godart</p>
        
    </header>
    <div id="wrapper">
        <main>
            <div id="container">
                <h2><?= $titre_secondaire ?></h2>
                <?= $content ?>
            </div>
        </main>
    </div>

</body>

</html>