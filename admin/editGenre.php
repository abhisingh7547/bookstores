<?php
$connect = mysqli_connect("localhost","root","","bookstore");

$id = $_GET['id'];
$callinggenre = mysqli_query($connect,"select * from genre where id='$id'");
$row = mysqli_fetch_array($callinggenre);
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
<?php include "include/header.php";?>
    
    <div class="container">
         <div class="row">
            <div class="col-5 mx-auto mt-4">
                <div class="card">
                <h2 class="h2 bg-success text-light fw-bold text-center">INSERT GENRE</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="" class="fw-bold" style="font-size:20px;">Cat_Title</label>
                        <input type="text" name="cat_title" value="<?php echo $row['cat_title'];?>" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="Submit"  name="save" class="btn btn-danger fw-bold mt-4" style="margin-left:230px;font-size:19px;">
                    </div>
                </form>
                <?php
                    if(isset($_POST['save'])){
                    $cat_title = $_POST['cat_title'];

                    //get
                    $id = $_GET['id'];
            

                    $query = mysqli_query($connect,"update genre SET cat_title='$cat_title' where id='$id'");
                    if($query){
                        echo "<script>window.open('manageGenres.php','_self')</script>";
                    }
                }
                ?>
            </div>
            </div>
        </div>    
    </div>
    
</body>
</html>
