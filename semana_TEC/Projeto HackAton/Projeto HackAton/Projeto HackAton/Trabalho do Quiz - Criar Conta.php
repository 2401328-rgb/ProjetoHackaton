<?php
//Conexão com o BANCO DE DADOS
// Configurações do servidor local
$host = "localhost";
$user = "root";
$pass = "";
$banco = "hackaton_grupo7";

//Informações Enviadas do HTML


try {
    $EmailUSU = $_POST['EMAIL'];
    $SenhaUSU = $_POST['SENHA'];
    $NickUSU = $_POST['NOME'];
    // 1. Conecta ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✓ Conexão com banco de dados estabelecida!<br>";

    // 2. Verifica se o formulário enviou os dados via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $EmailUSU = trim($_POST['EMAIL']);
        $SenhaUSU = trim($_POST['SENHA']);
        $NickUSU = trim($_POST['NOME']);
        // 5. Prepara e executa o comando SQL
        $sql = "INSERT INTO grupo7projeto (senhas, email,nicks) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$SenhaUSU, $EmailUSU, $NickUSU]);

        echo "✓ Email e senha salvos com sucesso na tabela infos!<br>";
        echo "Email registrado: <strong>" . htmlspecialchars($EmailUSU) . "</strong><br>";
        echo "Nick registrado: <strong>" . htmlspecialchars($NickUSU) . "</strong><br>";
        echo "<br><a href='Trabalho do Quiz - Criar Conta.html'>Voltar</a>";
        
    } else {
        echo "ℹ️ Por favor, envie o formulário primeiro.";
    }
} catch(PDOException $e) {
    // Mensagens de erro específicas
    if (strpos($e->getMessage(), "SQLSTATE[HY000]") !== false) {
        echo "❌ ERRO: Não foi possível conectar ao banco de dados.<br>";
        echo "Verifique se:<br>";
        echo "- MySQL/MariaDB está rodando<br>";
        echo "- Host, usuário e senha estão corretos<br>";
        echo "- Banco de dados 'testelogin' existe<br>";
    } elseif (strpos($e->getMessage(), "SQLSTATE[42S02]") !== false) {
        echo "❌ ERRO: Tabela 'infos' não encontrada!<br>";
        echo "Crie a tabela com este comando SQL:<br>";
        echo "<code>CREATE TABLE infos (id INT AUTO_INCREMENT PRIMARY KEY, nome VARCHAR(100) NOT NULL);</code>";
    } else {
        echo "❌ ERRO: " . htmlspecialchars($e->getMessage());
    }
    echo "<br><a href='Trabalho do Quiz - Criar Conta.html'>Voltar</a>";
}
    
?>