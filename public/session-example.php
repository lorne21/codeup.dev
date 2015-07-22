<?php
// start the session (or resume an existing one)
// this function must be called before trying to set of get any session data!
session_start();

// get the current session id
$sessionId = session_id();

// initialize view count variable
$viewCount = 0;

// check to see if we have a view count being tracked in the session
if (!empty($_SESSION['VIEW_COUNT'])) {
    // we found one, use it instead of the default
    $viewCount = $_SESSION['VIEW_COUNT'];
}

// increment the counter
$viewCount++;

// store the new value to the session
$_SESSION['VIEW_COUNT'] = $viewCount;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Session Example</title>
</head>
<body>
    Session Id: <?php echo $sessionId; ?><br>
    View Count: <?php echo $viewCount; ?>
</body>
</html>