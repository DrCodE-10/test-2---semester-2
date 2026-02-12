<?php
require 'auth.php';
require '../includes/db.php';
include 'header.php';

$result = $conn->query("SELECT id, name, email, role, created_at FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin | Users</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>

<h2>Registered Users</h2>

<table border="1" cellpadding="10" cellspacing="0">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Registered</th>
    <th>Action</th>
</tr>

<?php while ($u = $result->fetch_assoc()): ?>
<tr>
    <td><?= $u['id'] ?></td>
    <td><?= htmlspecialchars($u['name']) ?></td>
    <td><?= htmlspecialchars($u['email']) ?></td>
    <td><?= $u['role'] ?></td>
    <td><?= $u['created_at'] ?></td>
    <td>
        <?php if ($u['role'] !== 'admin'): ?>
            <a href="make_admin.php?id=<?= $u['id'] ?>">Make Admin</a> |
        <?php endif; ?>
        <a href="delete_user.php?id=<?= $u['id'] ?>"
           onclick="return confirm('Delete this user?')">Delete</a>
    </td>
</tr>
<?php endwhile; ?>

</table>

<br>
<a href="dashboard.php">⬅ Back to Dashboard</a>

</body>
</html>
