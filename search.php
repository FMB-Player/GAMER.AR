<?php
include 'db_connect.php';
$query = $_GET['q'];
$sql = "SELECT * FROM articles WHERE title LIKE ? OR content LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = "%" . $query . "%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$articles = [];
while ($row = $result->fetch_assoc()) {
    $articles[] = $row;
}

echo json_encode(['articles' => $articles]);

$stmt->close();
$conn->close();
