<?php
    require_once "./configdb/connect-db.php";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
if(isset($_POST['task']) and !empty($_POST['task'])){

    $task = $_POST['task'];
    $time = date('Y-m-d');
    $sql = "INSERT INTO tasks (title,thoigian) VALUES ('$task','$time ')";
    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}
?>
