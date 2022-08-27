<div class="list-group">
    <?php
    $callingGenres = mysqli_query($connect,"select * from genre");
    while($rowG = mysqli_fetch_array($callingGenres)){
    ?>
    <a href="?cat_title=<?= $rowG['id']; ?>" class="list-group-item list-group-item-action text-light fw-bold bg-success" 
    style="font-size:19px;"><?= $rowG['cat_title']; ?>
         
        <span class="float-end"><?php

            $queryCount = mysqli_query($connect,"select * from books where genre_id='".$rowG['id']."'");
            $count = mysqli_num_rows($queryCount);
            if($count > 0){
                echo "($count)";
            }
        ?></span>
    </a>
    <?php } ?>
</div>