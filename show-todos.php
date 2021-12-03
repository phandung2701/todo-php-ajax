<?php 

require_once "./configdb/connect-db.php";

$sql = "SELECT * FROM tasks";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

?>
<div class="todo-list-item">
    <div>
        <span class="todo-list-item-content"><?php echo $row['title']; ?></span>
        <p><?php echo $row['thoigian']; ?></p>
    </div>
    <div>
        <span class="material-icons edit-icon" id="updateBtn" data-id="<?php echo $row['id']; ?>">
            drive_file_rename_outline
        </span>
        <span class="material-icons delete-icon" id="removeBtn" data-id="<?php echo $row['id']; ?>"> delete </span>
    </div>
</div>
<?php
    }
    echo '<div class="pending-text">You have ' . mysqli_num_rows($result) . ' pending tasks.</div>';
} else {
    echo '<div class="todo-list-item2">No Record Found.</div>';
}

?>

