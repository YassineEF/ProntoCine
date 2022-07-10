<?php
define('TRATTO', "http://localhost/Cinelovers");
    $pageButton = $page;
    $pagePrevious =$page;


    if (sizeof($serieList['results']) <= 3 || !is_numeric($id)) {
        header("Location: ../../../Movies/error");
    } else {
?>
<h2 class="FilmCategoryTitle">
    <?php
    foreach ($serieGenres['genres'] as $genreActual) {
        if ($genreActual['id'] == $id) {
            echo $genreActual['name'];
        }
    }
    ?></h2>
<div class="FilmCategory">
    <?php

    foreach ($serieList['results'] as $serieParGenre) {
        // var_dump($oneTvCat);
        echo '<figure>';
        if ($serieParGenre['poster_path']  == null) {
            echo '<a href="../../singleSerie/' . $serieParGenre['id'] . '"><img src="../../public/assets/img/ProfilePicNA.png" alt="' . $serieParGenre['name'] . '" class="">';
        } else {
            echo '<a href="../../singleSerie/' . $serieParGenre['id'] . '"><img src="https://image.tmdb.org/t/p/w342' . $serieParGenre['poster_path'] . '"alt="' . $serieParGenre['name'] . '" class="">';
        }
        echo '<figcaption>' . $serieParGenre['name'] . '</figcaption></a>';
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
        echo '<a href="'. TRATTO .'/Series/genreSerie/' . $id . '/' . $pagePrevious . '" > <i class="fas fa-chevron-circle-left"></i> Previous</a>';
    }
    if ($pageButton == 500) {
        echo '<a href="#" >No more pages</a>';
    } else {
        $pageButton ++;
        echo '<a href="'. TRATTO .'/Series/genreSerie/' . $id . '/' . $pageButton . '" >Next <i class="fas fa-chevron-circle-right"></i></a>';
    }
}

    ?>
</div>