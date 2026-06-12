<?php
session_start();
require_once '../config/app.php';

$_SESSION = [];
session_destroy();

header('Location: ' . $BASE_URL . 'home.php');
exit;