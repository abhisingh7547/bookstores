<?php include "../dbconfig.php";
isAuth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <?php include "include/header.php";?>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-2 mt-5">
            <?php include "include/side.php";?>
            </div>
            <div class="col-10">
                <div class="row">
                    <div class="col-8">
                        <h3 class="text-primary mt-2 fw-bolder">Manage books</h3>
                    </div>
                    <div class="col-4">
                        <a href="insertBook.php" class="btn btn-success fw-bold float-end text-light d-inline-block" style="font-size:20px;">ADD book</a>
                    </div>
                </div>
                <table class="table table-bordered border-50 border-danger">
                    <thead>
                    <tr>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Id</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Title</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Author</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Isbn</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Description</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Price</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Discount</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Cover</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Genre</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Nop</th>
                        <th scope="col" class="fw-bold text-center bg-success text-light fw-bold" style="font-size:20px;">Action</th>
                    </tr>
                    </thead>
                    <?php
                    $callingBooks = mysqli_query($connect,"select * from books");
                    while($row = mysqli_fetch_array($callingBooks)){
                ?>
                <tr>
                    <td class="fw-bold text-center"><?= $row['id'];?></td>
                    <td class="fw-bold text-center"><?= $row['title'];?></td>
                    <td class="fw-bold text-center"><?= $row['author'];?></td>
                    <td class="fw-bold text-center"><?= $row['isbn'];?></td>
                    <td class="fw-bold text-center"><?= $row['description'];?></td>
                    <td class="fw-bold text-center"><?= $row['price'];?></td>
                    <td class="fw-bold text-center"><?= $row['discount_price'];?></td>
                    <td class="fw-bold text-center"><?= $row['cover'];?></td>
                    <td class="fw-bold text-center"><?= $row['genre_id'];?></td>
                    <td class="fw-bold text-center"><?= $row['nop'];?></td>
                    <td>
                        <a href="?del=<?= $row['id'];?>" class="btn btn-danger text-light fw-bold"><i class='bi bi-trash'>Delete</i></a>
                        <a href="editBook.php?id=<?= $row['id'];?>" class="btn btn-info text-light fw-bold"><i class='bi bi-pencil-square'></i>Edit</a>
                        <a href="../view.php?book_id=<?= $row['id'];?>" class="btn btn-warning text-light fw-bold"><i class="bi bi-view-list"></i>View</a>
                    </td>
                </tr>
                <?php } ?>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php 
if(isset($_GET['del'])){
    $del = $_GET['del'];
    $query = mysqli_query($connect,"delete from books where id='$del'");
    echo "<script>window.open('manageBooks.php','_self')</script>";
}
?>