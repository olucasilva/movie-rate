<div class='news-element' id='newsElement'>
    <img class="detail-cover" id="moviePoster" src="https://image.tmdb.org/t/p/w220_and_h330_face<?php echo $item->poster_path?>" />
    <div class="info">
        <div class="news-title" id="ts">
            <label for="title" id="newsTitle"><?php echo $item->title?></label>
        </div>
        <div class="news-preview">
            <p id="newsPreview"><?php echo $item->overview?></p>
        </div>
    </div>
</div>