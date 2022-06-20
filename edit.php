<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>OOP PHP</title>
</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <h2>User update</h2>
            <hr/>
                <?php
                    include 'model.php';
                    $model = new Model();
                    $id = $_REQUEST['id'];
                    $row = $model->edit($id);

                    if(isset($_POST['submit'])){
                        if(isset($_POST['name']) && isset($_POST['phone']) 
                        && isset($_POST['email']) && isset($_POST['address'])){
                            if(!empty($_POST['name'])&& !empty($_POST['phone']) 
                            && !empty($_POST['email']) && !empty($_POST['address'])){

                                $data['id'] = $id;
                                $data['name'] = $_POST['name'];
                                $data['phone'] = $_POST['phone'];
                                $data['email'] = $_POST['email'];
                                $data['address'] = $_POST['address'];
    
                                $update = $model->update($data);

                                if($update){
                                    echo "<script>alert('User info updated')</script>";
                                    header("Location: list.php");
                                }else{
                                    echo "<script>alert('Empty')</script>";
                                    header("Location: edit.php?id=$id");
                                }
                                
                            }else{
                                echo "<script>alert('Empty')</script>";
                                header("Location: edit.php?id=$id");
                            }
                        }
                    }
                ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control" value="<?php echo $row['name'];?>" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter name" />
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" value="<?php echo $row['phone'];?>" id="phone" name="phone" aria-describedby="emailHelp" placeholder="Enter phone" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" value="<?php echo $row['email'];?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" rows="5" name="address" id="address">
                        <?php echo $row['address'];?>
                        </textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>