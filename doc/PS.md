<h1>Prepared Statements</h1>

<h2>O que é o Prepared Statements</h2>

<p>É um recurso do Banco de dados que separa a estrutura de código SQL da consulta de dados inseridos, usando interrogação (?) ou nomes como marcadores de posição, o que impede tentativas de ataques de <b>SQL injection</b>.</p>

<h2>Exemplos</h2>
<h3>Um exemplo de código não tratado:</h3>

    $titulo = $_POST["titulo"];
    $autor = $_POST["autor"];
    $ano = $_POST["ano"];

    $sql = "INSERT INTO livros (titulo,autor,ano) VALUES ('$titulo','$autor','$ano')";

    mysqli_query($conexao, $sql);

    header("Location: ../index.php");

<h4>Problemas:</h4>
<ul>
    <li>Facilidade para possivel <b>SQL injection</b></li>
    <li>Dados entram diretamente na SQL</li>
    <li>Dados inválidos podem ser cadastrados</li>
    
</ul>

<h3>Um exemplo de código tratado:</h3>

    // 1. Prepara o modelo da consulta SQL
    $sql = "INSERT INTO livros (titulo,autor,ano) VALUES (:titulo,:autor,:ano)";
    $stmt = $msqli -> prepare($sql);

    // 2. Associa os valores reais e executa
    $stmt->execute([
    'titulo' => $_POST["titulo"],
    'autor' => $_POST["autor"],
    'ano' => $_POST["ano"]
    ]);

<h2>Importancia do Prepared Statement</h2>

<h3>Segurança</h3>
<ul>

<li><b>Bloqueio de SQL Injection:</b> Impede que entradas maliciosas alterem a lógica da consulta original, pois os valores digitados por usuários são tratados estritamente como dados, e nunca como comandos executáveis.</li>

<li><b>Tratamento automático de caracteres:</b> Caracteres especiais (como aspas simples) são neutralizados de forma automática pelo driver do banco de dados</li>

</ul>

<h3>Desempenho e Eficiência</h3>

<ul>
<li><b>Pré-compilação:</b> O banco de dados analisa, compila e otimiza o plano de execução da instrução SQL apenas uma vez.</li>
<li><b>Reutilização: </b>O plano compilado fica em cache. Consultas repetidas com parâmetros diferentes ganham velocidade em execuções subsequentes</li>
</ul>