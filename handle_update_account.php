<?php
session_start();
require_once 'confg.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $display_name = $_POST['display_name'];
    $email = $_POST['email'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate input
    if (empty($first_name) || empty($last_name) || empty($display_name) || empty($email)) {
        $_SESSION['error'] = "Please fill in all required fields";
        header("Location: account.php");
        exit();
    }

    // Check if email is already taken by another user
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
    $stmt->bind_param("si", $email, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email is already taken by another user";
        header("Location: account.php");
        exit();
    }

    // If user wants to change password
    if (!empty($current_password)) {
        // Verify current password
        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (!password_verify($current_password, $user['password'])) {
            $_SESSION['error'] = "Current password is incorrect";
            header("Location: account.php");
            exit();
        }

        // Validate new password
        if (empty($new_password) || empty($confirm_password)) {
            $_SESSION['error'] = "Please fill in both new password fields";
            header("Location: account.php");
            exit();
        }

        if ($new_password !== $confirm_password) {
            $_SESSION['error'] = "New passwords do not match";
            header("Location: account.php");
            exit();
        }

        // Update user with new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET name = ?, lastname = ?, display_name = ?, email = ?, password = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $first_name, $last_name, $display_name, $email, $hashed_password, $user_id);
    } else {
        // Update user without changing password
        $stmt = $conn->prepare("UPDATE users SET name = ?, lastname = ?, display_name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $first_name, $last_name, $display_name, $email, $user_id);
    }

    if ($stmt->execute()) {
        $_SESSION['user_name'] = $first_name;
        $_SESSION['user_email'] = $email;
        $_SESSION['success'] = "Account updated successfully";
    } else {
        $_SESSION['error'] = "Failed to update account";
    }

    header("Location: account.php");
    exit();
} else {
    header("Location: account.php");
    exit();
}
?> 