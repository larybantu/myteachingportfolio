<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // 1. CSRF Protection - verify token
    if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        http_response_code(403);
        die("Invalid request.");
    }
    
    // 2. Rate limiting (basic session-based)
    $now = time();
    if (isset($_SESSION['last_submit']) && ($now - $_SESSION['last_submit']) < 60) {
        die("Please wait before submitting again.");
    }
    $_SESSION['last_submit'] = $now;
    
    // 3. Input validation
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    $errors = [];
    
    if (empty($name) || strlen($name) > 100) {
        $errors[] = "Invalid name.";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }
    
    if (empty($message) || strlen($message) > 5000) {
        $errors[] = "Invalid message.";
    }
    
    if (!empty($errors)) {
        die(implode(" ", $errors));
    }
    
    // 4. Sanitize for output (HTML context)
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    
    // 5. Prevent email header injection
    $to = "hbantu@gmail.com";
    $subject = "New Contact Form Message";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    
    // Use a fixed, safe From address - put user email in Reply-To
    $headers = [
        "From: noreply@yourdomain.com",
        "Reply-To: " . filter_var($email, FILTER_SANITIZE_EMAIL),
        "Content-Type: text/plain; charset=UTF-8"
    ];
    
    if (mail($to, $subject, $body, implode("\r\n", $headers))) {
        echo "Message sent successfully.";
    } else {
        error_log("Mail failed for: $email");
        echo "Failed to send message.";
    }
}

// Generate CSRF token for the form
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
