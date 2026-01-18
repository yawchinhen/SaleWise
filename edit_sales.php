<?php
include 'header.php';
include 'config.php';
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$id = (int)($_GET['id'] ?? 0);
if($id <= 0) {
    header("Location: view_sales.php");
    exit;
}

// SAFE query with prepared statement
$stmt = $conn->prepare("SELECT * FROM sales WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$sale = $stmt->get_result()->fetch_assoc();

if(!$sale) {
    header("Location: view_sales.php");
    exit;
}

$message = '';
if(isset($_POST['update_sale'])) {
    $product = trim($_POST['product']);
    $category = trim($_POST['category']);
    $amount = (float)$_POST['amount'];
    
    $stmt = $conn->prepare("UPDATE sales SET product=?, category=?, amount=? WHERE id=?");
    $stmt->bind_param("ssdi", $product, $category, $amount, $id);
    if($stmt->execute()) {
        $message = "✅ Updated successfully!";
        // Refresh sale data
        $stmt = $conn->prepare("SELECT * FROM sales WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $sale = $stmt->get_result()->fetch_assoc();
    } else {
        $message = "❌ Update failed";
    }
}
?>
<main>
    <h1>Edit Sale #<?php echo $id; ?></h1>
    <?php if($message): ?><div class="success"><?php echo $message; ?></div><?php endif; ?>
    <form method="post">
        <label>Product:</label>
        <input type="text" name="product" value="<?php echo htmlspecialchars($sale['product']); ?>" required>
        <label>Category:</label>
        <input type="text" name="category" value="<?php echo htmlspecialchars($sale['category']); ?>" required>
        <label>Amount (RM):</label>
        <input type="number" step="0.01" name="amount" value="<?php echo $sale['amount']; ?>" min="0" required>
        <button name="update_sale">Update Sale →</button>
    </form>
</main>
<?php include 'footer.php'; ?>
