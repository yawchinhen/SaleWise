<?php 
include 'header.php'; 
?>

<main>
    <h1>About SaleWise</h1>
    
    <section class="about-section">
        <h2>🎯 Project Purpose</h2>
        <p>SaleWise is a comprehensive <strong>full-stack sales management system</strong> designed to solve common business challenges in tracking transactions, monitoring revenue, and analyzing sales performance. Built for small to medium enterprises, it provides secure user authentication, complete CRUD operations, and real-time dashboards.</p>
    </section>

    <section class="about-section">
        <h2>📋 Key Objectives</h2>
        <ul>
            <li>✅ <strong>Secure Authentication</strong>: Password hashing with PHP's password_verify()</li>
            <li>✅ <strong>CRUD Operations</strong>: Create, Read, Update, Delete sales records</li>
            <li>✅ <strong>Real-time Dashboard</strong>: Total revenue, transactions, top products</li>
            <li>✅ <strong>Fully Responsive</strong>: Works on desktop, tablet, mobile (CSS Grid/Flexbox)</li>
            <li>✅ <strong>SQL Injection Protection</strong>: Prepared statements throughout</li>
            <li>✅ <strong>XSS Prevention</strong>: htmlspecialchars() on all outputs</li>
        </ul>
    </section>

    <section class="about-section">
        <h2>🛠️ Technologies Used</h2>
        <div class="tech-stack">
            <div class="tech-card">
                <strong>Frontend</strong><br>
                HTML5 • CSS3 • JavaScript
            </div>
            <div class="tech-card">
                <strong>Backend</strong><br>
                PHP 8+ • MySQL
            </div>
            <div class="tech-card">
                <strong>Server</strong><br>
                XAMPP/WAMP (Apache + MySQL)
            </div>
        </div>
    </section>

    <section class="about-section">
        <h2>📊 Features Overview</h2>
        <div class="features-grid">
            <div class="feature">
                <h3>🔐 Secure Login</h3>
                <p>Session management with password hashing</p>
            </div>
            <div class="feature">
                <h3>📝 Sales Entry</h3>
                <p>Quick transaction recording with validation</p>
            </div>
            <div class="feature">
                <h3>📈 Dashboard</h3>
                <p>Key metrics: revenue, transactions, top sellers</p>
            </div>
            <div class="feature">
                <h3>✏️ Edit/Delete</h3>
                <p>Full CRUD with confirmation dialogs</p>
            </div>
        </div>
    </section>
</main>

<?php include 'footer.php'; ?>
