<?php
include 'db_connect.php';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
    <link rel="stylesheet" href="carrito.css">
</head>
<body>
<div class="cart-container">
    <h1>Tu carrito</h1>
    <table>
        <tr>
            <th>Artículo</th>
            <th>Imagen</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Acción</th>
        </tr>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $article_id) {
            $sql = "SELECT * FROM articles WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $article_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $article = $result->fetch_assoc();
            echo '<tr>';
            echo '<td>' . $article['title'] . '</td>';
            echo '<td><img src="' . $article['image_url'] . '" alt="' . $article['title'] . '"></td>';
            echo '<td>' . $article['description'] . '</td>';
            echo '<td>' . $article['price'] . '</td>';
            echo '<td><button type="button" onclick="location.href=\'remove_from_cart.php?id=' . $article_id . '\'">Eliminar del carrito</button></td>';
            echo '</tr>';
            $total += $article['price'];
        }
        ?>
    </table>
    <h2>Total: <?php echo $total; ?></h2>
    <button type="button" onclick="location.href='checkout.php'">Proceder al pago</button>
    <button type="button" onclick="location.href='index.php'">Regresar al inicio</button>
</div>
</body>
</html>