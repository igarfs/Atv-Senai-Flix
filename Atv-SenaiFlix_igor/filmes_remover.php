<?php
include ('config.php');

$id = $_GET['id'];
$sql = "DELETE FROM filmes WHERE id = '$id'";
$conn->query($sql);


header ('location: indexX.php?pagina=filmes_listar');
?>