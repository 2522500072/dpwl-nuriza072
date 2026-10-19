<?php
function base_url($path = '')
{
    global $config;
    return rtrim($config['base_url'], '/') . '/' . ltrim($path, '/');
}
function redirect($url)
{
    header("Location: index.php?url=" . $url);
    exit;
}