<?php

/**
 * Generate random password
 *
 * @return string Random password.
 */

function randomPassword()
{
    $alphabet       = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLPNOPQRSTUVWXYZ1234567890';
    $pass           = [];
    $alphaLength    = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass = $alphabet[$n];
    }

    return implode($pass);
}
/**
 * Get User data with email.
 *
 * @param $user_email
 * @param $mysqli
 *
 * @return array
 */
function get_user_with_email($user_email, $mysqli)
{

    $user_query = "SELECT * FROM `my_users` WHERE email=?";
    $stmt        = $mysqli->prepare($user_query);
    $stmt->bind_param('s', $user_email);
    $stmt->execute();
    $result     = $stmt->get_result();

    $response = [
        'user_exists' => flase,
        'subscribed' => '',
        'is_verified' => '',
        'verification_code' => '',
    ];

    while ($row = $result->fetch_row()) {
        if (0 !== $row[1]) {
            $response['user_exists'] = true;
            $response['subscribed'] = $row[2];
            $response['is_verified'] = $row[3];
            $response['verification_code'] = $row[4];
        }
    }

    return $response;
}

/**
 * Create User.
 *
 * Also generate random password and insert into database.
 *
 * @param string $user_email User email.
 * @param mysqli $mysqli     Mysqli instance.
 *
 * @return null
 */

function create_user($user_email, $mysqli)
{
    /**
     * Call the randomPassword() and store the password in a variable.
     */
    $verification_code = randomPassword();
    $unsubscribe_hash = randomPassword();

    $query = "INSERT INTO my_users(email, verification_code, unsubscribe_hash, subscribed, is_verified)
    VALUES (?, ?, ?, 'no', 'no')";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param($user_email, $verification_code, $unsubscribe_hash);
    $stmt->execute();

    $stmt->close();
    $mysqli->close();

    return $verification_code;
}

function send_user_to_verification_page($user_email)
{
}
