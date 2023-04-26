<?php
echo "<div class='element-movie'>
    <a href='details.php?id=$item->id'>
      <img class='filme' id='$item->id' src='https://image.tmdb.org/t/p/w220_and_h330_face$item->poster_path'/>
    </a>
    <label>$item->title</label>
    <label>nota aqui</label>
  </div>
  ";
?>