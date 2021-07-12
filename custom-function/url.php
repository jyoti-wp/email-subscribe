<?php

/**
 * Get Current page url.
 *
 * @return string
 */

function get_current_page_url()
{
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $url = 'https://';
    } else {
        $url = 'http://';
    }

    $url .= $_SERVER['HTTP_HOST'];

    $url .= $_SERVER['REQUEST_URI'];

    return $url;
}
