<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/src/sesion.php';
$message = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (SessionManager::login($_POST['username'], $_POST['password'])) {
        header('Location: index.php');
        exit(0);
    } else {
        $message = "Gagal login";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($message) { ?>
        <h1><?= $message ?></h1>
    <?php } ?>
    <form action="login.php" method="POST">
        <label>Username :
            <input type="text" name="username">
        </label>
        <label>password :
            <input type="password" name="password">
        </label>
        <button type="submit">Login</button>
    </form>
</body>

</html>