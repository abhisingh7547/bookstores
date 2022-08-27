<?php include "dbConfig.php";

$id = $_GET['book_id'];

if(!isset($_GET['book_id'])){
    echo "<script>window.open('index.php','_self')</script>";
}

$query = mysqli_query($connect,"select * from books where id='$id'");

$row = mysqli_fetch_array($query);
?>
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
                    <div class="col-3">
                        <img src="images/<?= $row['cover'];?>" alt="" class="w-100">
                    </div>
                    <div class="col-5">
                        <table class="table border-dark">
                            <tr>
                                <th>Title</th>
                                <td><?= $row['title'];?></td>
                            </tr>
                            <tr>
                                <th>Author</th>
                                <td><?= $row['author'];?></td>
                            </tr>
                            <tr>
                                <th>ISBN</th>
                                <td><?= $row['isbn'];?></td>
                            </tr>
                            <tr>
                                <th>Nop</th>
                                <td><?= $row['nop'];?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12">
                        <h5>RS. <?= $row['discount_price'];?> <del><?= $row['price'];?></del></h5>
                    </div>
                    <div class="col-12">
                        <a href="" class="btn btn-success">Buy Now</a>
                        <a href="" class="btn btn-warning text-light">Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>