<?php

/**
 * Subscribe user
 *
 * @param $user_email
 * @param $mysqli
 *
 * @return mixed
 */

function subscribe_user($user_email, $mysqli)
{
    $subscribed = 'yes';
    $query = "UPDATE my_users SET subscribed=? WHERE email=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param('ss', $subscribed, $user_email);
    $stmt->execute();
    $is_update_sucessful = $stmt->affected_rows;

    $stmt->close();
    $mysqli->close();
    return $is_update_sucessful;
}
