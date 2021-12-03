<?php
    require_once "./configdb/connect-db.php";


$id = $_POST['id'];

$sql = "SELECT title FROM tasks WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row) {
    echo $row['title'];
} else {
    echo 0;
}

?>