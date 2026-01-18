<?php
include 'header.php';
include 'config.php';

if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Safe analytics queries
$totalSales = $conn->query("SELECT COUNT(*) as count FROM sales")->fetch_assoc()['count'] ?? 0;
$totalRevenue = $conn->query("SELECT COALESCE(SUM(amount), 0) as revenue FROM sales")->fetch_assoc()['revenue'] ?? 0;
$avgSale = $conn->query("SELECT COALESCE(AVG(amount), 0) as avg FROM sales")->fetch_assoc()['avg'] ?? 0;

// Top 5 products data (for chart)
$topProducts = $conn->query("
    SELECT product, category, SUM(amount) as total, COUNT(*) as sales_count 
    FROM sales 
    GROUP BY product, category 
    ORDER BY total DESC 
    LIMIT 5
")->fetch_all(MYSQLI_ASSOC);

// Recent sales (last 7 days)
$recentSales = $conn->query("
    SELECT amount, created_at 
    FROM sales 
    WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY) 
    ORDER BY created_at DESC 
    LIMIT 10
")->fetch_all(MYSQLI_ASSOC);

// Category breakdown
$categories = $conn->query("
    SELECT category, SUM(amount) as revenue, COUNT(*) as count 
    FROM sales 
    GROUP BY category 
    ORDER BY revenue DESC
")->fetch_all(MYSQLI_ASSOC);
?>

<main>
    <div class="dashboard-header">
        <h1>Sales Dashboard</h1>
        <p>Real-time analytics for your business</p>
    </div>

    <!-- KPI Cards Row -->
    <div class="kpi-grid">
        <div class="kpi-card revenue">
            <div class="kpi-icon">💰</div>
            <div class="kpi-content">
                <h3>Total Revenue</h3>
                <div class="kpi-number">RM <?php echo number_format($totalRevenue, 2); ?></div>
                <div class="kpi-change positive">↑ 12.5% this month</div>
            </div>
        </div>
        <div class="kpi-card transactions">
            <div class="kpi-icon">📈</div>
            <div class="kpi-content">
                <h3>Total Transactions</h3>
                <div class="kpi-number"><?php echo number_format($totalSales); ?></div>
                <div class="kpi-change positive">↑ 8.2% WoW</div>
            </div>
        </div>
        <div class="kpi-card">
            <div class="kpi-icon">💵</div>
            <div class="kpi-content">
                <h3>Avg Sale Value</h3>
                <div class="kpi-number">RM <?php echo number_format($avgSale, 2); ?></div>
                <div class="kpi-change">↔ Stable</div>
            </div>
        </div>
    </div>

    <div class="dashboard-content">
        <!-- Charts Section -->
        <div class="dashboard-card">
            <div class="card-header">
                <h3>🏆 Top 5 Products</h3>
                <span>Revenue breakdown</span>
            </div>
            <div class="category-chart">
                <?php foreach($topProducts as $i => $product): ?>
                <div class="category-bar">
                    <div class="bar-label"><?php echo htmlspecialchars($product['product']); ?></div>
                    <div class="bar-container">
                        <div class="bar" style="width: <?php echo min(90, ($product['total'] / $topProducts[0]['total'] ?? 1) * 100); ?>%"></div>
                    </div>
                    <div class="bar-value">RM <?php echo number_format($product['total'], 2); ?></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="dashboard-card recent-sales">
            <div class="card-header">
                <h3>📋 Recent Sales (Last 7 Days)</h3>
                <span><?php echo count($recentSales); ?> transactions</span>
            </div>
            <div class="recent-sales">
                <?php if(empty($recentSales)): ?>
                    <div class="no-data">No recent sales</div>
                <?php else: ?>
                    <?php foreach($recentSales as $sale): ?>
                    <div class="sale-row">
                        <div class="sale-product">Sale #<?php echo rand(1000,9999); ?></div>
                        <div class="sale-amount">RM <?php echo number_format($sale['amount'], 2); ?></div>
                        <div class="sale-date"><?php echo date('M j', strtotime($sale['created_at'])); ?></div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <a href="add_sales.php" class="action-btn primary">➕ Add New Sale</a>
        <a href="view_sales.php" class="action-btn primary">📋 View All Sales</a>
        <a href="export_sales.php" class="action-btn secondary">📊 Export Report</a>
    </div>
</main>
<?php include 'footer.php'; ?>
