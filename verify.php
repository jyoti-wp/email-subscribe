<?php

/**
 * Step one : Connect to Database.
 */

include __DIR__ . '/databaseconnection.php';
include __DIR__ . '/custom-function/verify.php';

$user_email = isset($_GET['email']) ? $_GET['email'] : '';
$action = 'verify.php?email=' . $user_email;
$verification_code = isset($_POST['verification_code']) ? $_POST['verification_code'] : '';

ig

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Kindly verify</title>
</head>

<body>
    <div class="container">
        <a href="/index.php">Back to Home Page!</a>
        <div class="row">
            <div class="column form form-action">
                <h3 class="text-center">Kindly check your email for verification code!</h3>
                <form action="" method="POST">
                    <input type="text" name="verification code" value="<?php echo $verification_code ?>">
                    <input type="text" hidden name="email" value="<?php echo $user_email; ?>">
                </form>
            </div>
        </div>
    </div>
</body>

</html>