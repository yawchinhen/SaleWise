<?php 
include 'header.php'; 
include 'config.php'; 

if(isset($_SESSION['username'])) {
    header("Location: dashboard.php");
    exit;
}

$error = '';
if ($_POST) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($user = $result->fetch_assoc()) {
        if(password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: dashboard.php");
            exit;
        } else $error = "Incorrect password";
    } else $error = "User not found";
}
?>
<main>
    <h1>Login</h1>
    <?php if($error) echo "<p class='error'>$error</p>"; ?>
    <form method="post">
        <label>Username:</label>
        <input type="text" name="username" required>
        <label>Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</main>
<?php include 'footer.php'; ?>
