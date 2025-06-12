<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'confg.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = "Please fill in all fields";
        header("Location: login.php");
        exit();
    }

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            
            // Set session cookie parameters
            ini_set('session.cookie_lifetime', 0);
            ini_set('session.gc_maxlifetime', 3600);
            session_set_cookie_params(3600);
            
            // Regenerate session ID for security
            session_regenerate_id(true);
            
            header("Location: account.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid email or password";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Invalid email or password";
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>