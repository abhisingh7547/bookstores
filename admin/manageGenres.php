
<?php include "../dbConfig.php";
isAuth();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | book store</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include "include/header.php";?>

    <div class="container mt-3">
        <div class="row">
            <div class="col-3 mt-5">
            <?php include "include/side.php";?>
            </div>
            <div class="col-9">
                <div class="row">
                    <div class="col-8 mt-4">
                        <h3 class="text-primary">Manage Books</h3>
                    </div>
                    <div class="col-4 mt-2">
                        <a href="insertBook.php" class="btn btn-success float-end fw-bold text-light d-inline-block" style="font-size:20px;">ADD Book</a>
                    </div>
                </div>
              <div class="row">
                  <div class="col-8">
                  <table class="table table-bordered border-40 border-danger">
                  <tr>
                      <th scope="col" class="text-center fw-bold bg-success text-light" style="font-size:21px;">id</th>
                      <th scope="col" class="text-center fw-bold bg-success text-light" style="font-size:21px;">title</th>
                      <th scope="col" class="text-center fw-bold bg-success text-light" style="font-size:21px;">Action</th>
                  </tr>
                  <?php 
                  $callinggenre = mysqli_query($connect,"select * from genre");
                  while($row = mysqli_fetch_array($callinggenre)){
                ?>

                <tr>
                    <td class="text-center fw-bold"><?= $row['id'];?></td>
                    <td class="text-center fw-bold"><?= $row['cat_title'];?></td>
                    <td>
                        <a href="?del=<?= $row['id'];?>" class="btn btn-danger d-inline-block fw-bold" style="margin-left:55px;"><i class='bi bi-trash'></i>Delete</a>
                        <a href="editGenre.php?id=<?= $row['id'];?>" class="btn btn-info d-inline-block text-light fw-bold" style="margin-left:55px;"><i class='bi bi-pencil-square'></i>Edit</a>
                        <a href="" class="btn btn-success d-inline-block fw-bold" style="margin-left:55px;"><i class="bi bi-view-list"></i>View</a>
                    </td>
                </tr>

            <?php } ?>
              </table>
                  </div>
                  <div class="col-4">
                      <div class="card">
                          <div class="card-body">
                              <h4 class="text-dark fw-bold">INSERT GENRE</h4>
                              <form action="" method="post">
                                  <div class="mb-3">
                                      <label for="" class="text-dark fw-bolder">Title</label>
                                      <input type="text" name="cat_title" class="form-control">
                                  </div>
                                  <div class="mb-3">
                                      <input type="submit" name="send" class="btn btn-danger w-100 fw-bold">
                                  </div>
                              </form>
                              <?php 
                              if(isset($_POST['send'])){
                                    $data = [
                                        'cat_title' => $_POST['cat_title']
                                    ];

                                    $query = insertData("genre",$data);

                                    if($query){
                                        echo "<script>window.open('manageGenres.php','_self')</script>";
                                    }
                              }
                              ?>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
    </div>

    
</body>
</html>
<?php 
if(isset($_GET['del'])){
    $del = $_GET['del'];
    $query = mysqli_query($connect,"delete from genre where id='$del'");
    echo "<script>window.open('manageGenres.php','_self')</script>";
}
?>