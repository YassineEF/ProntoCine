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

if (sizeof($oneSerie) <= 3) {
    header("Location: ../../Movies/error");
} else {
?>
<div class="singleMovie">
    <div class="singleFilmUp">
        <h1 class="singleFilmTitle"><?= $oneSerie['name']; ?></h1>
        <p class="singleFilmStatus">(<?= $oneSerie['status']; ?>)</p>
    </div>
    <div class="singleFilmMid">

        <div class="singleFilmPosterResume">
            <div class="singleFilmLeft">
                <?php
                if ($oneSerie['poster_path'] == null) {
                    echo '<img src="../../public/assets/img/ProfilePicNA.png" alt="' . $oneSerie['name'] . '" >';
                } else {

                    echo '<img src="https://image.tmdb.org/t/p/w500' . $oneSerie['poster_path'] . '" alt="' . $oneSerie['name'] . '" >';
                }
                ?>
            </div>
            <div class="singleFilmCenterDown">
                <?php
                if ($oneSerie['overview'] == "") {
                    echo '<p class="singleFilmCenterDownParag" >Resume not available</p>';
                } else {
                    echo '<p class="singleFilmCenterDownParag" >' . $oneSerie['overview'] . '</p>';
                }
                // echo '<img src="https://image.tmdb.org/t/p/w780'.$Single['backdrop_path'] .'" alt="'.$Single['title'].'" class="singleFilmCenterDownImg">';
                ?>
            </div>
        </div>
        <div class="info">
            <div class="singleFilmCenter">
                <h2>Production Companies:</h2>
                <?php
                foreach ($oneSerie['production_companies'] as  $production_companie) {
                    echo '<p>-' . $production_companie['name'] . '</p>';
                    if ($production_companie['logo_path'] == null) {
                        echo '<img src="../../public/assets/img/NoLogoCompany.png" alt="Logo ' . $production_companie['name'] . '" >';
                    } else {
                        echo '<img src="https://image.tmdb.org/t/p/w45' . $production_companie['logo_path'] . '" alt="Logo ' . $production_companie['name'] . '" >';
                    }
                }
                ?>
                <h2>Created By:</h2>
                <?php
                foreach ($oneSerie['created_by'] as  $creator) {
                    echo '<p>-' . $creator['name'] . '</p>';
                }
                ?>
                <h2>Networks:</h2>
                <?php
                foreach ($oneSerie['networks'] as  $network) {
                    echo '<p>-' . $network['name'] . '</p>';
                    if ($network['logo_path'] == null) {
                        echo '<img src="../../public/assets/img/NoLogoCompany.png" alt="Logo ' . $network['name'] . '" >';
                    } else {
                        echo '<img src="https://image.tmdb.org/t/p/w45' . $network['logo_path'] . '" alt="Logo ' . $network['name'] . '" >';
                    }
                }
                ?>
            </div>
            <div class="singleFilmRight">
                <?php
                echo "<p class='miniTitle'>average episode Duration:</p>";
                foreach ($oneSerie['episode_run_time'] as $avgTime) {
                    if ($avgTime == 0) {
                        echo '<p>&nbsp&nbsp&nbsp&nbspDuration not available</p>';
                    } else {
                        echo '<p>&nbsp&nbsp&nbsp&nbsp' . convertToHoursMins($avgTime) . '</p>';
                    }
                }
                echo "<p class='miniTitle'>First Release Date:</p>";
                echo "<p>&nbsp&nbsp&nbsp&nbsp" . convertDate($oneSerie['first_air_date']) . "</p>";
                echo "<p class='miniTitle'>Vote Average:</p>";
                echo "<p>&nbsp&nbsp&nbsp&nbsp" . $oneSerie['vote_average'] . "/10</p>";
                echo "<p class='miniTitle'>Total season:</p>";
                echo "<p>&nbsp&nbsp&nbsp&nbsp" . $oneSerie['number_of_seasons'] . "</p>";
                echo "<p class='miniTitle'>Total episodes:</p>";
                echo "<p>&nbsp&nbsp&nbsp&nbsp" . $oneSerie['number_of_episodes'] . "</p>";

                ?>
            </div>
            <div class='Trailer'>
                <?php
                // var_dump($video);
                if (sizeof($video['results']) == 0) {
                    echo '<p class="NotAvailable">Video not available</p>';
                } else {
                    echo  '<iframe width="520" height="345"  src=" https://www.youtube.com/embed/' . $video['results'][0]['key'] . '"></iframe>';
                }
                ?>
            </div>
        </div>
        <div class="singleFilmDown">
            <h3 class='FilmActorTitle'>Cast</h3>
            <div class="actorsSingleFilm">
                <?php
                if (sizeof($cast['cast']) == 0) {
                    echo '<h4>Actors not available</h4>';
                } else {
                    foreach ($cast['cast'] as $actor) {
                        echo '<article class = "singleFilmActor"> ';
                        if ($actor['profile_path'] == null) {
                            echo '<a href="../../Actors/singleActor/' . $actor['id'] . '"><img src="../../public/assets/img/ProfilePicNA.png" alt="Actor: ' . $actor['name'] . '" >';
                        } else {
                            echo '<a href="../../Actors/singleActor/' . $actor['id'] . '"><img src="https://image.tmdb.org/t/p/w185' . $actor['profile_path'] . '" alt="Actor: ' . $actor['name'] . '" >';
                        }
                        echo '<h4><span class="namePlaceholder">Name</span>:  ' . $actor['name'] . '</h4>';
                        echo '<h4><span class="namePlaceholder">Character</span>:  ' . $actor['character'] . '</h4></a>';
                        echo '</article>';
                    }
                }
                ?>
            </div>
        </div>

    </div>
</div>
<?php
}
?>