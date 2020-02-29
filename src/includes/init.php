<?php

session_start();

define('ROOT', __DIR__ . '/..');

function path($file)
{
    return ROOT . '/' . $file;
}

require_once path('config.php');
require_once path('vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

DB::configure(DB_CONNECTION_STRING, DB_USERNAME, DB_PASSWORD, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

function authorize($role)
{
    if (!isset($_SESSION) || !isset($_SESSION['role']) || $_SESSION['role'] != $role) {
        error('Unauthorized user', "Unauthorized user", 401);
        exit();
    }
}

function redirect($url, $flash = null)
{
    if ($flash) {
        $_SESSION['flash'] = serialize($flash);
    }

    header("Location: $url");
    exit();
}

function error($title = "fatal error", $body = "fatal error", $code=400)
{
    $_SESSION['errtitle'] = $title;
    $_SESSION['errbody'] = $body;
    $_SESSION['errcode'] = $code;
    redirect("/includes/errorPage/errorPage.php");
}

function getFlash()
{
    $flash = null;

    if (isset($_SESSION['flash'])) {
        $flash = unserialize($_SESSION['flash']);
        $_SESSION['flash'] = null;
    }

    return $flash;
}

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}

function get($param, $default = null)
{
    return $_GET[$param] ?? $default;
}

function post($param, $default = null)
{
    return $_POST[$param] ?? $default;
}

function render($template, $v = null)
{
    ob_start();
    require path($template);
    return ob_get_clean();
}

function email($to, $subject, $body)
{
    $mail = new PHPMailer;

    $mail->setFrom(SMTP_FROM_EMAIL, SMTP_FROM_NAME);
    $mail->addAddress($to);

    $mail->isSMTP();
    $mail->isHTML(true);
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Host = SMTP_HOST;
    $mail->Port = SMTP_PORT;
    $mail->Username = SMTP_USERNAME;
    $mail->Password = SMTP_PASSWORD;
    $mail->Subject = $subject;
    $mail->Body = $body;

    return $mail;
}