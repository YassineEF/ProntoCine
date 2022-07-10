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
//error handle
if(sizeof($movie) <= 3) {
    header("Location: ../error");
} else {

?>
<div class="singleMovie">
    <div class="singleFilmUp">
        <h1 class="singleFilmTitle"><?= $movie['title']; ?></h1>
        <p class="singleFilmStatus">(<?= $movie['status']; ?>)
        <p>
    </div>
    <div class="singleFilmMid">

        <div class="singleFilmPosterResume">
            <div class="singleFilmLeft">
                <?php
                if ($movie['poster_path'] == null) {
                    echo '<img src="../../public/assets/img/ProfilePicNA.png" alt="Film: ' . $movie['title'] . '" >';
                } else {
                    echo '<img src="https://image.tmdb.org/t/p/w500' . $movie['poster_path'] . '" alt="' . $movie['title'] . '" >';
                }
                ?>
            </div>
            <div class="singleFilmCenterDown">
                <?php
                if ($movie['overview'] == "") {
                    echo '<p class="singleFilmCenterDownParag" >Resume not available</p>';
                } else {
                    echo '<p class="singleFilmCenterDownParag" >' . $movie['overview'] . '</p>';
                }
                ?>
            </div>
        </div>
        <div class="info">
            <div class="singleFilmCenter">
                <h2>Production Companies:</h2>
                <?php
                if (sizeof($movie['production_companies']) == 0) {
                    echo '<p class="miniTitle">Information not available</p>';
                } else {
                    foreach ($movie['production_companies'] as  $production_companie) {
                        echo '<p>-' . $production_companie['name'] . '</p>';
                        if ($production_companie['logo_path'] == null) {
                            echo '<img src="../../public/assets/img/NoLogoCompany.png" alt="Logo ' . $production_companie['name'] . '" >';
                        } else {
                            echo '<img src="https://image.tmdb.org/t/p/w45' . $production_companie['logo_path'] . '" alt="Logo ' . $production_companie['name'] . '" >';
                        }
                    }
                }

                ?>
            </div>
            <div class="singleFilmRight">
                <?php
                echo "<p class='miniTitle'>Duration:</p>";
                if ($movie['runtime'] == 0) {
                    echo '<p>&nbsp&nbsp&nbsp&nbspDuration not available</p>';
                } else {
                    echo '<p>&nbsp&nbsp&nbsp&nbsp' . convertToHoursMins($movie['runtime']) . '</p>';
                }
                echo "<p class='miniTitle'>Release Date:</p>";
                echo "<p>&nbsp&nbsp&nbsp&nbsp" . convertDate($movie['release_date']) . "</p>";
                echo "<p class='miniTitle'>Vote Average:</p>";
                echo "<p>&nbsp&nbsp&nbsp&nbsp" . $movie['vote_average'] . "/10</p>";
                echo "<p class='miniTitle'>Budget:</p>";
                $Budget = number_format($movie['budget'], 0, ',', ' ') . "$";
                echo "<p>&nbsp&nbsp&nbsp&nbsp" . ($movie['budget'] == 0 ?  "Budget not available" : $Budget) . "</p>";
                echo "<p class='miniTitle'>Revenue:</p>";
                $Revenue = number_format($movie['revenue'], 0, ',', ' ') . "$";
                echo "<p>&nbsp&nbsp&nbsp&nbsp" . ($movie['revenue'] === 0 ?  "Revenue not available" : $Revenue) . "</p>";

                ?>
            </div>
            <div class='Trailer'>
                <?php
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
                // var_dump($actors);
                foreach ($cast['cast'] as $actor) {
                    echo '<article class = " singleFilmActor"> ';
                    if ($actor['profile_path'] == null) {
                        echo '<a href=" ../../Actors/singleActor/' . $actor['id'] . '"><img src="../../public/assets/img/ProfilePicNA.png" alt="Actor: ' . $actor['name'] . '" >';
                    } else {
                        echo '<a href=" ../../Actors/singleActor/' . $actor['id'] . '"><img src="https://image.tmdb.org/t/p/w185' . $actor['profile_path'] . '" alt="Actor: ' . $actor['name'] . '" >';
                    }
                    echo '<h4><span class="namePlaceholder">Name</span>:  ' . $actor['name'] . '</h4>';
                    echo '<h4><span class="namePlaceholder">Character</span>:  ' . $actor['character'] . '</h4></a>';
                    echo '</article>';
                }
                ?>
            </div>
        </div>

    </div>
</div>
<?php 
}
?>