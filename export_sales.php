<?php
session_start();  // ADD THIS
include 'config.php';

if(!isset($_SESSION['username'])) {  // ADD SECURITY
    header("Location: login.php");
    exit;
}

$search = $_GET['search'] ?? '';
$where = $search ? "WHERE product LIKE '%" . mysqli_real_escape_string($conn, $search) . "%' OR category LIKE '%" . mysqli_real_escape_string($conn, $search) . "%'" : '';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="sales_' . date('Y-m-d_H-i-s') . '.csv"');
header('Cache-Control: no-cache');

$output = fopen('php://output', 'w');

// Headers
fputcsv($output, ['ID', 'Product', 'Category', 'Amount (RM)', 'Date', 'Created']);

// Data
$sales = $conn->query("SELECT * FROM sales $where ORDER BY id DESC");
$totalRevenue = 0;

while($row = $sales->fetch_assoc()) {
    $totalRevenue += $row['amount'];
    fputcsv($output, [
        $row['id'],
        $row['product'],
        $row['category'],
        'RM ' . number_format($row['amount'], 2),
        date('d/m/Y', strtotime($row['created_at'])),
        $row['created_at']
    ]);
}

// Totals row
fputcsv($output, ['', '', '', 'TOTAL REVENUE:', 'RM ' . number_format($totalRevenue, 2), '']);

fclose($output);
exit;
?>
