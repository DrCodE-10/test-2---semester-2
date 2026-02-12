<?php
include 'includes/db.php';
include 'includes/header.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass  = $_POST['password'];

    if ($name && $email && $pass) {

        $hashed = password_hash($pass, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name, email, password)
                VALUES ('$name', '$email', '$hashed')";

        if (mysqli_query($conn, $sql)) {
            header("Location: login.php");
            exit;
        } else {
            $message = "Email already exists!";
        }
    } else {
        $message = "All fields required!";
    }
}
?>

<h1>Create Account</h1>

<p style="color:red;"><?php echo $message; ?></p>

<form method="post">
    <input type="text" name="name" placeholder="Full Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
</form>

<?php include 'includes/footer.php'; ?>
