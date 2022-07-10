<?php
//function to convert minutes in a format where we have hours and minute
function convertToHoursMins($time)
{
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return   $hours . " hours " . $minutes . " minutes";
}
//function that convert from american date to european date format
function convertDate($dateAmerican)
{
    $timestamp = strtotime($dateAmerican);
    $dateFrench = date("d-m-Y", $timestamp);
    return $dateFrench;
}
?>
<div class="singleActor">
    <div class="singleActorUp">
        <h1 class="singleActorTitle"><?= $actor['name']; ?></h1>
    </div>
    <div class="singleActorCenter">
        <div class="singleActorPhoto">
            <?php
            if ($actor['profile_path'] == null) {
                echo '<img src="../../public/assets/img/ProfilePicNA.png" alt="' . $actor['name'] . '" >';
            } else {
                echo '<img src="https://image.tmdb.org/t/p/w185' . $actor['profile_path'] . '" alt="' . $actor['name'] . '" >';
            }
            ?>
        </div>
        <div class="singleActorinfo">
            <?php
            echo '<p  class="miniTitle">biography:</p>';
            if ($actor['biography'] == '') {

                echo '<p class="NotAvailable">Biography not available</p>';
            } else {
                echo '<p>' . $actor['biography'] . '</p>';
            }
            echo '<p class="miniTitle">Birthday:</p>';
            echo '<p>' . convertDate($actor['birthday']) . '</p>';
            echo '<p class="miniTitle" >Deathday:</p>';
            if ($actor['deathday'] == null) {
                echo '<p>Still alive</p>';
            } else {
                echo '<p>' . convertDate($actor['deathday']) . '</p>';
            }
            echo '<p  class="miniTitle">Place of birth:</p>';
            echo '<p>' . $actor['place_of_birth'] . '</p>';



            ?>
        </div>
    </div>
    <div class="singleActorDown">
        <div class="singleActorMovie">
            <h3>Movie</h3>
            <?php
            foreach ($movies['cast'] as $movie) {
                if ($movie['media_type'] == 'movie') {
                    // var_dump($movie['id']);
                    if (!array_key_exists('release_date', $movie)) {
                        echo "<p><a href='../../Movies/singleFilm/" . $movie['id'] . "'>Release date not available:  " . $movie['title'] . "  (" . $movie['character'] . ")</a></p>";
                    } else {
                        if ($movie['release_date'] == '') {
                            echo "<p><a href='../../Movies/singleFilm/" . $movie['id'] . "'>Release date not available:  " . $movie['title'] . "  (" . $movie['character'] . ")</a></p>";
                        } else {
                            echo "<p><a href='../../Movies/singleFilm/" . $movie['id'] . "'>" . convertDate($movie['release_date']) . ":  " . $movie['title'] . "  (" . $movie['character'] . ")</a></p>";
                        }
                    }
                }
            }
            ?>
        </div>
        <div class="singleActorMovie">
            <h3>Tv Series</h3>
            <?php
            foreach ($movies['cast'] as $movie) {
                if ($movie['media_type'] == 'tv') {
                    if ($movie['first_air_date'] == " ") {
                        echo "<p><a href='../../Series/singleSerie/" . $movie['id'] . "'>First air date not available:  " . $movie['name'] . " (" . $movie['character'] . ")</a></p>";
                    } else {
                        echo "<p><a href='../../Series/singleSerie/" . $movie['id'] . "'>" . convertDate($movie['first_air_date']) . ":  " . $movie['name'] . " (" . $movie['character'] . ")</a></p>";
                    }
                }
            }


            ?>
        </div>

    </div>
</div>