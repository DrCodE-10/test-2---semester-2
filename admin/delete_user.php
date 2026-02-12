<?php
require 'auth.php';
require '../includes/db.php';

$id = (int)$_GET['id'];

$conn->query("DELETE FROM users WHERE id=$id");

header("Location: users.php");
exit;
