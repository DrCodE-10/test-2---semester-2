<?php
require 'auth.php';
require '../includes/db.php';

$id = (int)$_GET['id'];

$conn->query("UPDATE users SET role='admin' WHERE id=$id");

header("Location: users.php");
exit;
