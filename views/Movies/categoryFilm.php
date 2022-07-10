<?php
define('TRATTO', "http://localhost/Cinelovers");
$pageButton = $page;
$pagePrevious = $page;
?>

<h2 class="FilmCategoryTitle"><?= $category == 'top_rated' ? 'top rated' : $category ?></h2>
<div class="FilmCategory">
    <?php

    foreach ($movieCat['results'] as $oneFilmCat) {
        echo '<figure>';
        if ($oneFilmCat['poster_path'] == null) {
            echo '<a href="../../singleFilm/' . $oneFilmCat['id'] . '"><img src="../../public/assets/img/ProfilePicNA.png" alt="' . $oneFilmCat['title'] . '" class="">';
        } else {
            echo '<a href="../../singleFilm/' . $oneFilmCat['id'] . '"><img src="https://image.tmdb.org/t/p/w342' . $oneFilmCat['poster_path'] . '"alt="' . $oneFilmCat['title'] . '" class="">';
        }
        echo '<figcaption>' . $oneFilmCat['title'] . '</figcaption></a>';
        echo '</figure>';
    }
    ?>
</div>

<div class="buttonsPages">
    <?php
    if ($pagePrevious <= 1) {
        echo '<a href="#">No previous pages</a>';
    } else {
        $pagePrevious -=  1;
        echo '<a href="' . TRATTO . '/Movies/categoryFilm/' . $category . '/' . $pagePrevious . '" > <i class="fas fa-chevron-circle-left"></i> Previous</a>';
    }
    if ($category == 'upcoming') {
        if ($pageButton == 19) {
            echo '<a href="#" >No more pages</a>';
        } else {
            $pageButton +=  1;
            echo '<a href="' . TRATTO . '/Movies/categoryFilm/' . $category . '/' . $pageButton . '" >Next <i class="fas fa-chevron-circle-right"></i></a>';
        }
    } else {
        if ($pageButton == 500) {
            echo '<a href="#" >No more pages</a>';
        } else {
            $pageButton +=  1;
            echo '<a href="' . TRATTO . '/Movies/categoryFilm/' . $category . '/' . $pageButton . '" >Next <i class="fas fa-chevron-circle-right"></i></a>';
        }
    }


    ?>
</div>