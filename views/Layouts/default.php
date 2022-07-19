<?php
define('RACINE', "http://localhost/ProntoCine");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- TITLE -->
    <title>PRONTOCINE</title>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="<?= RACINE ?>/public/assets/css/main.css">
    <!-- FONT-AWSOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- FAVICON -->
    <link rel="icon" type="image/x-icon" href="<?= RACINE ?>/public/assets/img/LogoIcon.png">
</head>

<body>
    <header>
        <div class="headerUp">

            <div class="left">
                <a href="<?= RACINE ?>/Movies/index"><img src="<?= RACINE ?>/public/assets/img/Logo1.png" alt="Logo Addicine"></a>
            </div>
            <form action="<?= RACINE ?>/Movies/find" method="get" class="searchBar" id="searchForm">
                <input type="text" class="search" name="keyWord" id="keyWord" required>
                <i class="fa fa-search" id="searchLogo"></i>
            </form>
            <ul class="menu-nav">
                <div class="dropdownMenu">
                    <li>Movie</li>
                    <div class="dropdown-content">
                        <a href="<?= RACINE ?>/Movies/categoryFilm/top_rated/1">Top Rated</a>
                        <a href="<?= RACINE ?>/Movies/categoryFilm/popular/1">Popular</a>
                        <a href="<?= RACINE ?>/Movies/categoryFilm/upcoming/1">Upcoming</a>
                    </div>
                </div>
                <div class="dropdownMenu">
                    <li>Tv series</li>
                    <div class="dropdown-content">
                        <a href="<?= RACINE ?>/Series/categoryTv/top_rated/1">Top Rated</a>
                        <a href="<?= RACINE ?>/Series/categoryTv/popular/1">Popular</a>
                        <a href="<?= RACINE ?>/Series/categoryTv/on_the_air/1">On the air</a>
                    </div>
                </div>
                <div class="dropdownMenu">
                    <li>Movie Genre</li>
                    <div class="dropdown-content">
                        <?php foreach ($movieGenres['genres'] as $movieGenre) : ?>
                            <a href="<?= RACINE ?>/Movies/genreMovie/<?= $movieGenre['id'] ?>/1"><?= $movieGenre['name'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="dropdownMenu">
                    <li>Tv series Genre</li>
                    <div class="dropdown-content">
                    <?php foreach ($serieGenres['genres'] as $serieGenre) : ?>
                            <a href="<?= RACINE ?>/Series/genreSerie/<?= $serieGenre['id'] ?>/1"><?= $serieGenre['name'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </ul>
            <div class="menu-btn">
                <span class="menu-btn_burger"></span>
            </div>
        </div>

    </header>
    <div class="line"> </div>
    <main>
        <?= $content ?>
    </main>
    <script src="<?= RACINE ?>/public/assets/js/app.js"></script>
</body>

</html>