<?php
session_start();

// Set the timeout duration (in seconds)
$timeout_duration = 10; // 1 minute

// Check if the last activity time is set
if (isset($_SESSION['LAST_ACTIVITY'])) {
    // Calculate the session's duration
    $elapsed_time = time() - $_SESSION['LAST_ACTIVITY'];

    // If the duration exceeds the timeout duration, log out the user
    if ($elapsed_time > $timeout_duration) {
        // Destroy the session
        session_unset();
        session_destroy();

        // Redirect to office_login.php with a message
        header("Location: office_login.php?message=" . urlencode("You have been logged out due to inactivity.") . "&type=" . urlencode("info"));
        exit();
    }
}

// Update the last activity time
$_SESSION['LAST_ACTIVITY'] = time();

// Your other code can go here
?>