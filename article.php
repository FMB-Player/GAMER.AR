<?php
include 'db_connect.php';
$article_id = $_GET['id'];
$sql = "SELECT * FROM articles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $article_id);
$stmt->execute();
$result = $stmt->get_result();
$article = $result->fetch_assoc();
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $article['title']; ?></title>
    <link rel="stylesheet" href="articulos.css">
</head>
<body>
<div class="article-container">
    <h1><?php echo $article['title']; ?></h1>
    <img src="<?php echo $article['image_url']; ?>" alt="<?php echo $article['title']; ?>">
    <p><?php echo $article['content']; ?></p>
    <p>Vendedor: <?php echo $article['seller']; ?></p> <!-- Asumiendo que 'seller' es el campo del vendedor -->
    <p>Precio: <?php echo $article['price']; ?></p> <!-- Asumiendo que 'price' es el campo del precio -->
    <p>Descripción: <?php echo $article['description']; ?></p> <!-- Asumiendo que 'description' es el campo de la descripción -->
    <button type="button" onclick="location.href='add_item.php?id=<?php echo $article_id; ?>'">Agregar al carrito</button>
</div>

</body>
</html>