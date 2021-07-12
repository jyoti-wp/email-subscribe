<?php
include __DIR__ . '/custom-functions/url.php';

/**
 * Sends the user email with the generated verification code..
 *
 * @param $user_email
 * @param $verification_code
 *
 * @return bool Returns true if the email sent successfully.
 */

function send_verification_email($user_email, $verification_code)
{

    $to         = $user_email;
    $subject    = 'Verification Email';

    $message    = '
    Thanks for subscribing!
    Your veirfication code is:
    ' . $verification_code;

    return mail($to, $subject, $message);
}
