<?php
$connect = mysqli_connect("localhost","root","","bookstore");

$id = $_GET['id'];
$callingbooks = mysqli_query($connect,"select * from books where id='$id'");
$row = mysqli_fetch_array($callingbooks);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<?php include "include/header.php";?>
    
    <div class="container">
         <div class="row">
            <div class="col-5 mx-auto mt-4">
                <div class="card">
                    <h2 class="h2 bg-success text-light fw-bold text-center">INSERT BOOK</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:19px;">Title</label>
                        <input type="text" name="title" value="<?php echo $row['title'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:19px;">Author</label>
                        <input type="text" name="author" value="<?php echo $row['author'];?>" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:19px;">Isbn</label>
                        <input type="text" name="isbn" value="<?php echo $row['isbn'];?>" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:19px;">Decription</label>
                        <textarea class="form-control" name="description" value="<?php echo $row['description'];?>"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:19px;">Price</label>
                        <input type="text" class="form-control" name="price" value="<?php echo $row['price'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:19px;">Discount_price</label>
                        <input type="text" class="form-control" name="discount_price" value="<?php echo $row['discount_price'];?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:19px;">Cover</label>
                        <input type="file" class="form-control" name="cover" value="">
                    </div>
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:19px;">Genre_id</label>
                        <select class="form-select" name="genre_id" value="<?php echo $row['genre_id'];?>">
                        <?php 
                        $callinggenre = mysqli_query($connect,"select * from genre");
                        while($rowG = mysqli_fetch_array($callinggenre)){
                        ?>
                           <option value="<?= $rowG['id'];?>"><?= $rowG['cat_title'];?></option>
                           <?php } ?>
                       </select>
                    </div>
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:19px;">Nop</label>
                        <input type="text" class="form-control" name="nop" value="<?php echo $row['nop'];?>">
                    </div>
                    <div class="mb-3">
                        <input type="Submit"  name="save" class="btn btn-danger fw-bold mt-4" style="margin-left:230px;font-size:19px;">
                    </div>
                </form>
                <?php
                    if(isset($_POST['save'])){
                    $title = $_POST['title'];
                    $author = $_POST['author'];
                    $isbn = $_POST['isbn'];
                    $description = $_POST['description'];
                    $price = $_POST['price'];
                    $discount_price = $_POST['discount_price'];
                    $cover = $row['cover'];     
                    if($_FILES['cover']['name'] != ""){
                        $cover = $_FILES['cover']['name'];
                        $tmp_cover = $_FILES['cover']['tmp_name'];
                        move_uploaded_file($tmp_cover,"../images/$cover");
                    }
                    $genre_id = $_POST['genre_id']; 
                    $nop = $_POST['nop'];

                    //get
                    $id = $_GET['id'];
            

                    $query = mysqli_query($connect,"update books SET title='$title',author='$author',isbn='$isbn',description='$description',price='$price',discount_price='$discount_price',cover='$cover',genre_id='$genre_id',nop='$nop' where id='$id'");
                    if($query){
                        echo "<script>window.open('manageBooks.php','_self')</script>";
                    }
                }
                ?>
            </div>
            </div>
        </div>    
    </div>
</body>
</html>
