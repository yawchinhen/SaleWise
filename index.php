<?php include 'header.php'; ?>
<main>
    <section class="hero">
        <div class="hero-content">
            <h1>🚀 SaleWise</h1>
            <h2>Smart Sales Management System</h2>
            <p>Track transactions, analyze revenue, and make data-driven decisions with our secure, responsive sales platform.</p>
            <?php if(!isset($_SESSION['username'])): ?>
                <div class="cta-buttons">
                    <a href="register.php" class="btn-primary">Get Started Free</a>
                    <a href="login.php" class="btn-secondary">Login</a>
                </div>
            <?php else: ?>
                <div class="cta-buttons">
                    <a href="dashboard.php" class="btn-primary">View Dashboard</a>
                    <a href="add_sales.php" class="btn-secondary">+ Add Sale</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="features">
        <h2>Why Choose SaleWise?</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🔐</div>
                <h3>Secure Authentication</h3>
                <p>Password hashing & session management</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Real-time Analytics</h3>
                <p>Total revenue, top products, transaction count</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>Fully Responsive</h3>
                <p>Works perfectly on desktop, tablet, mobile</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Fast CRUD Operations</h3>
                <p>Add, edit, delete sales with prepared statements</p>
            </div>
        </div>
    </section>

    <?php if(isset($_SESSION['username'])): ?>
    <section class="quick-stats">
        <h2>Quick Stats</h2>
        <?php
        include 'config.php';
        $totalSales = $conn->query("SELECT COUNT(*) FROM sales")->fetch_row()[0];
        $totalRevenue = $conn->query("SELECT COALESCE(SUM(amount), 0) FROM sales")->fetch_row()[0];
        ?>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number"><?php echo number_format($totalSales); ?></div>
                <div class="stat-label">Total Transactions</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">RM <?php echo number_format($totalRevenue, 2); ?></div>
                <div class="stat-label">Total Revenue</div>
            </div>
        </div>
        <a href="dashboard.php" class="btn-primary full-width">View Full Dashboard →</a>
    </section>
    <?php endif; ?>

    <section class="how-it-works">
        <h2>How It Works</h2>
        <div class="steps">
            <div class="step">
                <div class="step-number">1</div>
                <p>Register & Login Securely</p>
            </div>
            <div class="step">
                <div class="step-number">2</div>
                <p>Add Sales Transactions</p>
            </div>
            <div class="step">
                <div class="step-number">3</div>
                <p>View Dashboard Analytics</p>
            </div>
        </div>
    </section>
</main>
<?php include 'footer.php'; ?>
