<?php
define('PATTERN', "http://localhost/ProntoCine");
?>
<div class="home">
<article>"Movies can be an art<br>Let yourself be carried away"</article>
         <div class="carousel">
             <?php foreach ($movies['results'] as $key => $film) : ?>
                    <?php if ($key === 0) { ?>
                        <img src="https://image.tmdb.org/t/p/w500<?= $film['backdrop_path'] ?>" alt="<?= $film['title'] ?>" class="slider active">
                        <h2 class="titleFilmPopulaire active"><?= $film['title'] ?></h2>
                    <?php  } else { ?>
                        <img src="https://image.tmdb.org/t/p/w500<?= $film['backdrop_path'] ?>" alt="<?= $film['title'] ?>" class="slider ">
                        <h2 class="titleFilmPopulaire"><?= $film['title'] ?></h2>
                    
                
                <?php  } endforeach; ?>
             <div class="next">
                 <i class="fas fa-chevron-circle-right"></i>
             </div>
             <div class="previous">
                 <i class="fas fa-chevron-circle-left"></i>
             </div>
         </div>
         <div class="filmPopular">
             <h2>Popular Movie</h2>
             <div class="sliderFilmPopulaire">
                 <?php foreach ($movies['results'] as $key => $film) : ?>
                        <figure>
                        <a href="<?= PATTERN ?>/Movies/singleFilm/<?= $film['id'] ?>"><img src="https://image.tmdb.org/t/p/w500<?= $film['poster_path'] ?>" alt="<?= $film['title'] ?>" class="posterPopularFilm">
                        <figcaption><?= $film['title'] ?></figcaption></a>
                        </figure>
                    <?php   endforeach; ?>
             </div>

         </div>
         <div class="filmPopular">
             <h2>Popular Series</h2>
             <div class="sliderFilmPopulaire">
                 <?php foreach ($series['results']  as $key => $serie) : ?>
                    <figure>
                       <a href="<?= PATTERN ?>/Series/singleSerie/<?= $serie['id'] ?>"><img src="https://image.tmdb.org/t/p/w500<?= $serie['poster_path'] ?>" alt="<= $serie['name'] ?>" class="posterPopularFilm">
                        <figcaption><?= $serie['name'] ?></figcaption></a>
                        </figure>
                    
                    <?php endforeach; ?>
                   
             </div>

         </div>
</div>
<script src="../public/assets/js/slider.js"></script>
    
    
    
    
    
    
    
    
    
    





