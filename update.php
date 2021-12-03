<?php
    require_once "./configdb/connect-db.php";
    if((isset($_POST['task']) and !empty($_POST['task'])) and (isset($_POST['id']) and !empty($_POST['id']))){
        $id = $_POST['id'];
        $task = $_POST['task'];
        $time = date('Y-m-d');
        $sql = "UPDATE  tasks set title='$task',thoigian ='$time ' where id = '$id'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
?>

