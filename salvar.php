<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['dados'] = $_POST;
    header('Location: resultado.php');
    exit();
} else {
    echo "Acesso inválido.";
}
?>
