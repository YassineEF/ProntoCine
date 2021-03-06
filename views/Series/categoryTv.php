<?php
define('TRATTO', "http://localhost/ProntoCine");
$pageButton = $page;
$pagePrevious = $page;

if ($serieCat['results'] == null || !is_numeric($page) || $page > 500) {
    header("Location: ".TRATTO."/Movies/error");
} else {
?>

<h2 class="FilmCategoryTitle"><?= str_replace("_", " ", $category) ?></h2>
<div class="FilmCategory">
    <?php

    foreach ($serieCat['results'] as $oneTvCat) {
        echo '<figure>';
        if ($oneTvCat['poster_path'] == null) {
            echo '<a href="../../singleSerie/' . $oneTvCat['id'] . '"><img src="../../public/assets/img/ProfilePicNA.png" alt="' . $oneTvCat['name'] . '" class="">';
        } else {
            echo '<a href="../../singleSerie/' . $oneTvCat['id'] . '"><img src="https://image.tmdb.org/t/p/w342' . $oneTvCat['poster_path'] . '"alt="' . $oneTvCat['name'] . '" class="">';
        }
        echo '<figcaption>' . $oneTvCat['name'] . '</figcaption></a>';
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
        echo '<a href="' . TRATTO . '/Series/categoryTv/' . $category . '/' . $pagePrevious . '" > <i class="fas fa-chevron-circle-left"></i> Previous</a>';
    }
    if ($category == 'upcoming') {
        if ($pageButton == 19) {
            echo '<a href="#" >No more pages</a>';
        } else {
            $pageButton +=  1;
            echo '<a href="' . TRATTO . '/Series/categoryTv/' . $category . '/' . $pageButton . '" >Next <i class="fas fa-chevron-circle-right"></i></a>';
        }
    } else {
        if ($pageButton == 500) {
            echo '<a href="#" >No more pages</a>';
        } else {
            $pageButton +=  1;
            echo '<a href="' . TRATTO . '/Series/categoryTv/' . $category . '/' . $pageButton . '" >Next <i class="fas fa-chevron-circle-right"></i></a>';
        }
    }
    }

    ?>
</div>