<?php
if(empty($query)){
    header("Location: ./error");
}
 ?>
 <h2 class="FilmCategoryTitle">Search Result</h2>
        <div class="FilmCategory">
            <?php
            if ($searchRes['results'] == 0) {
                echo '<h2 class="FilmCategoryTitle">No results available</h2>';
            } else {
                foreach ($searchRes['results']  as $searchResult) {
                    switch ($searchResult['media_type']) {
                        case 'movie':
                            echo '<figure>';
                            if ($searchResult['poster_path'] == null) {
                                echo '<a href="./singleFilm/' . $searchResult['id'] . '"><img src="../public/assets/img/ProfilePicNA.png" alt="' . $searchResult['title'] . '">';
                            } else {
                                echo '<a href="./singleFilm/' . $searchResult['id'] . '"><img src="https://image.tmdb.org/t/p/w185' . $searchResult['poster_path'] . '"alt="' . $searchResult['title'] . '">';
                            }
                            echo '<figcaption>' . $searchResult['title'] . '</figcaption></a>';
                            echo '</figure>';
                            break;
                        case 'tv':
                            echo '<figure>';
                            if ($searchResult['poster_path'] == null) {
                                echo '<a href="../Series/singleSerie/' . $searchResult['id'] . '"><img src="../public/assets/img/ProfilePicNA.png" alt="' . $searchResult['name'] . '">';
                            } else {
                                echo '<a href="../Series/singleSerie/' . $searchResult['id'] . '"><img src="https://image.tmdb.org/t/p/w185' . $searchResult['poster_path'] . '"alt="' . $searchResult['name'] . '">';
                            }
                            echo '<figcaption>' . $searchResult['name'] . '</figcaption></a>';
                            echo '</figure>';
                            break;
                        case 'person':
                            echo '<figure>';
                            if ($searchResult['profile_path'] == null) {
                                echo '<a href="../Actors/singleActor/' . $searchResult['id'] . '"><img src="../public/assets/img/ProfilePicNA.png" alt="' . $searchResult['name'] . '">';
                            } else {
                                echo '<a href="../Actors/singleActor/' . $searchResult['id'] . '"><img src="https://image.tmdb.org/t/p/w185' . $searchResult['profile_path'] . '"alt="' . $searchResult['name'] . '">';
                            }
                            echo '<figcaption>' . $searchResult['name'] . '</figcaption></a>';
                            echo '</figure>';
                            break;
                    }
                }
            }
            ?>
        </div>