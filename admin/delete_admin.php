<?php
include 'config1.php';

if (!isset($_GET['id']) || $_GET['id'] == '') {
    header("Location: {$base_url}admin/delete_admin.php");
    exit;
}

$admin_id = mysqli_real_escape_string($connection, $_GET['id']);

$sql = "DELETE FROM admin WHERE admin_id = {$admin_id}";

if (mysqli_query($connection, $sql)) {
    header("Location: {$base_url}admin/delete_admin.php");
} else {
    echo "<div class='alert alert-danger text-center' role='alert'>Query Unsuccessful.</div>";
}
