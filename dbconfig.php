<?php

    if (session_status() === PHP_SESSION_NONE) {
        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ||
            (isset($_SERVER['SERVER_PORT']) && (int)$_SERVER['SERVER_PORT'] === 443);

        ini_set('session.use_strict_mode', '1');
        ini_set('session.cookie_httponly', '1');
        ini_set('session.cookie_secure', $isHttps ? '1' : '0');

        session_set_cookie_params([
            'lifetime' => 0,
            'path' => '/',
            'domain' => '',
            'secure' => $isHttps,
            'httponly' => true,
            'samesite' => 'Lax'
        ]);
    }

    // Database credentials are read from environment variables so the same
    // codebase can run both on a local XAMPP install and in production.
    // Sensible defaults are provided for a fresh local (XAMPP) setup.
    $dbHost = getenv('DB_HOST') ?: 'localhost';
    $dbUser = getenv('DB_USER') ?: 'root';
    $dbPass = getenv('DB_PASS') ?: '';
    $dbName = getenv('DB_NAME') ?: 'vsfms';

    $con = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    if($con == false){
        die("Connection Error". mysqli_connect_error());
    }

    mysqli_set_charset($con, 'utf8mb4');

    include_once('system_log.php');

?>