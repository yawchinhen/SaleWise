<?php 
include 'header.php'; 
include 'config.php'; 

if(isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

$message = '';
if ($_POST) {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $check = $conn->prepare("SELECT id FROM users WHERE username=?");
    $check->bind_param("s", $username);
    $check->execute();
    
    if($check->get_result()->num_rows == 0) {
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?,?)");
        $stmt->bind_param("ss", $username, $password);
        if($stmt->execute()) {
            $message = "Registered! <a href='login.php'>Login here</a>";
        }
    } else {
        $message = "<span class='error'>Username exists</span>";
    }
}
?>
<main>
    <h1>Register</h1>
    <?php if($message) echo "<p>$message</p>"; ?>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Register</button>
    </form>
</main>
<?php include 'footer.php'; ?>
