<?php 
include 'header.php'; 
include 'config.php'; 
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = (int)($_GET['id'] ?? 0);
if($id > 0) {
    $stmt = $conn->prepare("DELETE FROM sales WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}
header("Location: view_sales.php?deleted=1");
exit;
?>
