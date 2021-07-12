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

/**
 * Verify user and update subscription.
 *
 * @param $user_email
 * @param $verification_code
 * @param $mysqli
 *
 * @return array
 */

function verify_user_and_update_subscription($user_email, $verification_code, $mysqli)
{
    $subscribed  = 'yes';
    $is_verified = 'yes';
    $response    = [
        'success'       => false,
        'error_message' => '',
    ];

    $does_user_exists = does_user_exist($user_email, $mysqli);

    if (!$does_user_exists) {
        $response['success']       = false;
        $response['error_message'] = 'user does not exist';

        return $response;
    }
}
