<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hola mundo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    
<?php include 'header.php';
?>
<?php
$sql = "SELECT * FROM articles";
$result = $conn->query($sql);
$articles = $result->fetch_all(MYSQLI_ASSOC);
?>

    <div class="principal">
        <input type="text" class="buscador" id="buscar">
    </div>

    <div id="results" class="grid-container">
    <?php foreach ($articles as $article): ?>
        <div class="grid-item">
            <a href="article.php?id=<?php echo $article['id']; ?>">
                <img src="<?php echo $article['image_url']; ?>" alt="<?php echo $article['title']; ?>" style="width:100%; height:auto;">
                <h3><?php echo $article['title']; ?></h3>
                <p><?php echo $article['content']; ?></p>
            </a>
        </div>
    <?php endforeach; ?>
</div>

    <script src="script.js"></script>
</body>
</html>
