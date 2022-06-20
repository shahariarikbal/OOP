<?php

    include 'model.php';
    $model = new Model();
    $id = $_REQUEST['id'];
    $delete = $model->delete($id);

    if($delete){
        echo "<script>alert('User info deleted')</script>";
        header("Location: list.php");
    }

?>