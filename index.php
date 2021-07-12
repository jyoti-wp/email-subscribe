<?php
include __DIR__ . '/databaseconnection.php';
include __DIR__ . '/custom-function/url.php';
include __DIR__ . '/custom-function/user.php';
include __DIR__ . '/custom-function/verify.php';
include __DIR__ . '/custom-function/subscribe.php';


$message          = '';
$user_subscribed  = false;
$error_user_email = '';
$user_email       = '';
$errors           = [];


if (isset($_POST['submit'])) {
    $validate_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $user_email     = mysqli_real_escape_string($mysqli, $validate_email);
    $response       = get_user_with_email($user_email, $mysqli);


    if ($response['user_exists'] && 'no' === $response['subscribed']) {
        send_user_to_verification_page($user_email);
    }
    if ($response['user_exists'] && 'yes' === $response['subscribed']) {
        array_push($errors, 'Already Subscribed!');
    }

    // if user exists and verified but not subscribed 
    if ($response['user_exists'] && 'yes' === $response['is_verified'] && 'no' === $response['subscribed']) {
        $user_subscribed = subscribe_user($user_email, $mysqli);
        $message = 'Thank you. You have been successfuly subscribed';
    }

    // create user

    if (0 === count($errors) && !$user_subscribed) {
        $verification_code = create_user($user_email, $mysqli);
        $email_sent = send_verification_email($user_email, $verification_code, $mysqli);

        if ($email_sent) {
            send_user_to_verification_page($user_email);
        } else {
            echo 'Something went wrong! Try again.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Email Fuckin Signup</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column form login">
                <form action="" method="POST">
                    <h2 class="text-center">Amazing Comics</h1>
                        <p class="text-center">Subscribe with your email.</p>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="Submit" name="submit" class="form-control button" value="subscribed">
                        </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>