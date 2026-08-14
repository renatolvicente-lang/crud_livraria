<?php

include "../infra/conexao.php";

$id = $_POST["id"];
$titulo = $_POST["titulo"];
$autor = $_POST["autor"];
$ano = $_POST["ano"];

$sql = "UPDATE livros SET titulo='$titulo',autor='$autor',ano='$ano' WHERE id = '$id'";

$comando = $conexao -> prepare($sql);
$comando -> bind_param('ssi', $titulo, $autor, $ano);
$comando -> execute();

header("Location: ../index.php");
