<!DOCTYPE html>
<html lang="en">
<?php
require_once __DIR__ . "/src/sesion.php";
session_start();

try {
    $session = SessionManager::getCurrentSession();
} catch (Exception $exception) {
    header('Location:login.php');
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>halo <?= $_SESSION['username'] ?></h1>
</body>

</html>