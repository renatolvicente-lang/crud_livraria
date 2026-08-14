<?php
include "../infra/conexao.php";
$id = $_GET["id"];
$sql = "DELETE FROM livros WHERE id=$id";

$comando = $conexao -> prepare($sql);

$comando -> bind_param('i', $id);

$comando -> execute();

header("Location: ../index.php");
?>