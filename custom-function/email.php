<?php

include __DIR__ . '/url.php';

/**
 * Send comic data to user email.
 *
 *
 * @param $user_email
 * @param $unsubscribe_hash
 * @param $comics_data
 */

function send_comic_email($user_email, $unsubscribe_hash, $comics_data)
{
    $to = $user_email;
    $subject = 'Amazing Comics';
    $message = '
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazing Comics</title>
</head>
<body> 
    <h1>' . $comics_data['image_title'] . '</h1>
    <img src=' . $comics_data['img_url'] . ' alt=' . $comics_data['img_alt'] . '>
</body>
</html>';
}
