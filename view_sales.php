<?php
include 'header.php';
include 'config.php';

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Search & Pagination
$search = trim($_GET['search'] ?? '');
$page = max(1, (int)($_GET['page'] ?? 1));
$limit = 10;
$offset = ($page - 1) * $limit;
$deleted = $_GET['deleted'] ?? 0;

// Total count
if($search) {
    $countSql = "SELECT COUNT(*) as total FROM sales WHERE product LIKE ? OR category LIKE ?";
    $stmt = $conn->prepare($countSql);
    $searchTerm = "%$search%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $totalRecords = $stmt->get_result()->fetch_assoc()['total'];
} else {
    $result = $conn->query("SELECT COUNT(*) as total FROM sales");
    $totalRecords = $result->fetch_assoc()['total'];
}
$totalPages = ceil($totalRecords / $limit);

// Fetch sales
if($search) {
    $sql = "SELECT * FROM sales WHERE product LIKE ? OR category LIKE ? ORDER BY id DESC LIMIT ? OFFSET ?";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$search%";
    $stmt->bind_param("ssii", $searchTerm, $searchTerm, $limit, $offset);
    $stmt->execute();
    $sales = $stmt->get_result();
} else {
    $sql = "SELECT * FROM sales ORDER BY id DESC LIMIT $limit OFFSET $offset";
    $sales = $conn->query($sql);
}

$totalRevenueSql = $search ? 
    "SELECT COALESCE(SUM(amount), 0) as total FROM sales WHERE product LIKE '%$search%' OR category LIKE '%$search%'" : 
    "SELECT COALESCE(SUM(amount), 0) as total FROM sales";
$totalRevenueResult = $conn->query($totalRevenueSql);
$totalRevenue = $totalRevenueResult->fetch_assoc()['total'];
?>

<main>
    <div class="page-header">
        <h1>Sales Records 
            <?php if($deleted): ?><span class="success">✓ Deleted</span><?php endif; ?>
            <?php if($search): ?><span class="badge">Found <?php echo $totalRecords; ?> results</span><?php endif; ?>
        </h1>
        
        <!-- Search & Actions -->
        <div class="table-actions">
            <form method="GET" class="search-form">
                <input type="text" name="search" placeholder="🔍 Search..." 
                       value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Search</button>
                <?php if($search): ?><a href="view_sales.php" class="btn-secondary">Clear</a><?php endif; ?>
            </form>
            <div class="action-buttons">
    <a href="export_sales.php<?php echo $search ? '?search=' . urlencode($search) : ''; ?>" class="btn-primary">📊 Export CSV</a>
    <a href="add_sales.php" class="btn-primary">➕ Add Sale</a>
</div>

        </div>
    </div>

    <?php if($totalRecords == 0): ?>
        <div class="empty-state">
            <h3><?php echo $search ? 'No results found for "' . htmlspecialchars($search) . '"' : 'No sales yet'; ?></h3>
            <p><a href="add_sales.php" class="btn-primary">Start by adding your first sale →</a></p>
        </div>
    <?php else: ?>
        <!-- Sales Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Amount (RM)</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $sales->fetch_assoc()): ?>
                    <tr>
                        <td><strong>#<?php echo $row['id']; ?></strong></td>
                        <td><?php echo htmlspecialchars($row['product']); ?></td>
                        <td><span class="category-tag"><?php echo htmlspecialchars($row['category']); ?></span></td>
                        <td><strong>RM <?php echo number_format($row['amount'], 2); ?></strong></td>
                        <td><?php echo date('M j, Y', strtotime($row['created_at'])); ?></td>
                        <td>
                            <a href="edit_sales.php?id=<?php echo $row['id']; ?>" class="btn-edit">Edit</a>
                            <a href="delete_sales.php?id=<?php echo $row['id']; ?>" 
                               class="btn-delete" 
                               onclick="return confirm('Delete sale #<?php echo $row['id']; ?>?\nProduct: <?php echo addslashes($row['product']); ?>');">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr class="table-total">
                        <td colspan="3"><strong>Total Revenue:</strong></td>
                        <td colspan="3"><strong>RM <?php echo number_format($totalRevenue, 2); ?></strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Pagination -->
        <?php if($totalPages > 1): ?>
        <div class="pagination">
            <?php if($page > 1): ?>
                <a href="?page=<?php echo $page-1; ?><?php echo $search ? '&search=' . urlencode($search) : ''; ?>" class="page-link">← Prev</a>
            <?php endif; ?>

            <?php 
            $start = max(1, $page - 2);
            $end = min($totalPages, $page + 2);
            for($i = $start; $i <= $end; $i++): 
            ?>
                <a href="?page=<?php echo $i; ?><?php echo $search ? '&search=' . urlencode($search) : ''; ?>" 
                   class="page-link <?php echo $i == $page ? 'active' : ''; ?>">
                    <?php echo $i; ?>
                </a>
            <?php endfor; ?>

            <?php if($page < $totalPages): ?>
                <a href="?page=<?php echo $page+1; ?><?php echo $search ? '&search=' . urlencode($search) : ''; ?>" class="page-link">Next →</a>
            <?php endif; ?>
            <span class="page-info">Page <?php echo $page; ?> of <?php echo $totalPages; ?></span>
        </div>
        <?php endif; ?>
    <?php endif; ?>
</main>
<?php include 'footer.php'; ?>
