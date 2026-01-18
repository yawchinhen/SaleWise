<?php 
include 'header.php';  // Already has session_start()
include 'config.php'; 

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$message = '';
if(isset($_POST['add_sale'])) {
    $product = trim($_POST['product']);
    $category = trim($_POST['category']);
    $amount = (float)$_POST['amount'];  // Cast to float

    $sql = "INSERT INTO sales (product, category, amount) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssd", $product, $category, $amount);  // "ssd" not "ssi"
    if($stmt->execute()) {
        $message = "✅ Sale added successfully!";
    } else {
        $message = "❌ Error: " . $conn->error;
    }
}
?>
<main>
    <h1>Add New Sale</h1>
    <?php if($message): ?><div class="success"><?php echo $message; ?></div><?php endif; ?>
    <form method="post">
        <label>Product Name:</label>
        <input type="text" name="product" required>
        <label>Category:</label>
        <input type="text" name="category" required>
        <label>Amount (RM):</label>
        <input type="number" step="0.01" name="amount" min="0" required>
        <button type="submit" name="add_sale">Add Sale →</button>
    </form>
</main>
<?php include 'footer.php'; ?>
