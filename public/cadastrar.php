<?php

include "../infra/conexao.php";

//$titulo = $_POST["titulo"];
//$autor = $_POST["autor"];
//$ano = $_POST["ano"];

$sql = "INSERT INTO livros (titulo,autor,ano) VALUES (:titulo,:autor,:ano)";


$stmt = $pdo->prepare($sql);


$stmt->execute([
    'titulo' => $_POST["titulo"],
    'autor' => $_POST["autor"],
    'ano' => $_POST["ano"]
]);


header("Location: ../index.php");
?>