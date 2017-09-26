<?php

session_start([
    'cache_limiter' => 'private',
    'read_and_close' => false
]);

$_SESSION['name'] = "James";

print_r($_SESSION);

$_SESSION['name']='changed';

print_r($_SESSION);
