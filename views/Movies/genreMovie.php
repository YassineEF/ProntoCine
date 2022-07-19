<?php
define('TRATTO', "http://localhost/ProntoCine");
$pageButton = $page;
$pagePrevious = $page;
if (sizeof($movieList['results']) <= 3 || !is_numeric($id)) {
    header("Location: ../../error");
} else {

?>

    <h2 class="FilmCategoryTitle">
        <?php
        foreach ($movieGenres['genres'] as $genreActual) {
            if ($genreActual['id'] == $id) {
                echo $genreActual['name'];
            }
        }
        ?></h2>
    <div class="FilmCategory">
        <?php

        foreach ($movieList['results'] as $filmParGenre) {
            // var_dump($oneTvCat);
            echo '<figure>';
            if ($filmParGenre['poster_path']  == null) {
                echo '<a href="../../singleFilm/' . $filmParGenre['id'] . '"><img src="../../public/assets/img/ProfilePicNA.png" alt="' . $filmParGenre['title'] . '" class="">';
            } else {
                echo '<a href="../../singleFilm/' . $filmParGenre['id'] . '"><img src="https://image.tmdb.org/t/p/w342' . $filmParGenre['poster_path'] . '"alt="' . $filmParGenre['title'] . '" class="">';
            }
            echo '<figcaption>' . $filmParGenre['title'] . '</figcaption></a>';
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
        echo '<a href="' . TRATTO . '/Movies/genreMovie/' . $id . '/' . $pagePrevious . '" > <i class="fas fa-chevron-circle-left"></i> Previous</a>';
    }
    if ($pageButton == 500) {
        echo '<a href="#" >No more pages</a>';
    } else {
        $pageButton++;
        echo '<a href="' . TRATTO . '/Movies/genreMovie/' . $id . '/' . $pageButton . '" >Next <i class="fas fa-chevron-circle-right"></i></a>';
    }
}
    ?>
    </div>