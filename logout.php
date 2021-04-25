<?php
require_once __DIR__ . '/vendor/autoload.php';
setcookie("Daisl-x", "logout");
header('Location: /Login.php');
