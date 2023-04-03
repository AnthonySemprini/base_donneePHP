<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $titre ?></title>
</head>

<body>
    <header>
        <p>Cinema</p>
        <p>“La photographie, c'est la vérité et le cinéma, c'est vingt-quatre fois la vérité par seconde...”</p>
        <p>J.L. Godart</p>
        <nav>
            <a href="index.php?action=listFilms">Film</a>
            <a href="index.php?action=listActeurs">Acteur</a>
            <a href="index.php?action=listRealisateurs">Réalisateur</a>
        </nav>
    </header>
    <div id="wrapper">
        <main>
            <div id="container">
                <h1>PDO Cinema</h1>
                <h2><?= $titre_secondaire ?></h2>
                <?= $content ?>
            </div>
        </main>
    </div>

</body>

</html>