<?php
// Starting the session
session_start();

// Setting session variables
$_SESSION['username'] = 'RajanGawade';
$_SESSION['isLoggedIn'] = true;

// Using session variables
$username = $_SESSION['username'];
$isLoggedIn = $_SESSION['isLoggedIn'];

// Destroying the session
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Session Management Demo</title>
</head>
<body>
    <h1>Session Management Demo</h1>
    <?php if ($isLoggedIn) : ?>
        <p>Welcome, <?php echo $username; ?>!</p>
        <p>You are logged in.</p>
    <?php else : ?>
        <p>You are not logged in.</p>
    <?php endif; ?>
</body>
</html>
