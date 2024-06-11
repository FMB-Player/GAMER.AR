<?php
include 'db_connect.php';
session_start();
?>
<nav class="header">
    <link rel="stylesheet" href="styles.css">
    <ul type="none">
    <?php
        if (isset($_SESSION['username'])) {
            echo '<li class="login-info">Hola, ' . $_SESSION['username'] . ' | <a href="logout.php">Cerrar</a></li>';
            echo '<li class="dropdown" id="cartDropdown">';
            echo '<a href="add_to_cart.php" class="dropbtn">Carrito</a>'; // Modificado aquí
            echo '</li>';
        } else {
            echo '<li class="login-info"><a href="login.php">Start!</a> | <a href="register.php">Registrame</a></li>';
        }
    ?>
    </ul>
</nav>

