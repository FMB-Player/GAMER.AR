<?php

include 'db_connect.php';
include 'header.php'; // Incluye el archivo del encabezado

$user_id = $_SESSION['user_id'];

// Obtén el nombre de usuario actual
$sql = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$current_username = $user['username'];

// Obtén el número de artículos guardados
$sql = "SELECT COUNT(*) AS saved_articles FROM articles WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$articles = $result->fetch_assoc();
$saved_articles = $articles['saved_articles'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = $_POST['new_username'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    $sql = "UPDATE users SET username = ?, password = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $new_username, $new_password, $user_id);
    $stmt->execute();

    $_SESSION['username'] = $new_username;
    header('Location: index.php');
    exit;
}
?>

<h1>User Settings</h1>
<p>Current username: <?php echo $current_username; ?></p>
<p>Saved articles: <?php echo $saved_articles; ?></p>

<form method="POST">
    <label for="new_username">New Username:</label>
    <input type="text" id="new_username" name="new_username" required>
    <label for="new_password">New Password:</label>
    <input type="password" id="new_password" name="new_password" required>
    <button type="submit">Update</button>
</form>