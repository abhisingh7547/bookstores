<?php include "dbConfig.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include "header.php";?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-3">
                <?php include "left.php";?>
            </div>
            <div class="col-9">
                <div class="row">
                    <!-- starting-->
                    <?php
                    // searching work here
                    if(isset($_GET['find'])){
                        $search = $_GET['search'];
                        $callingBooks = mysqli_query($connect,"select * from books where isbn='$search' OR title LIKE '%$search%'");
                    }
                    elseif(isset($_GET['cat_title'])){
                        $cat_title = $_GET['cat_title'];
                        $callingBooks = mysqli_query($connect,"select * from books where genre_id='$cat_title'");
                    }
                    else{
                        $callingBooks = mysqli_query($connect,"select * from books");
                    }
                    while($row = mysqli_fetch_array($callingBooks)){
                    ?>
                    <div class="col-3">
                        <div class="card">
                            <img src="images/<?= $row['cover'];?>" class="w-100" style="object-fit:cover;height:200px" alt="">
                            <div class="card-body">
                                <h5 class="text-dark fw-bold"> <?= $row['title'];?></h5>
                                <h4 class="h6 text-success fw-bold">RS. <?= $row['discount_price'];?>/ <del><?= $row['price'];?>/-</del></h4>
                            </div>
                            <div class="card-footer">
                                <a href="view.php?book_id=<?= $row['id'];?>" class="btn btn-info">Know More</a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- ending-->
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>