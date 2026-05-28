<?php
// Configurações do banco de dados
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "testelogin";

try {
    // 1. Conecta ao banco de dados usando PDO
    $pdo = new PDO("mysql:host=$host;dbname=$banco;charset=utf8mb4", $usuario, $senha);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "✓ Conexão com banco de dados estabelecida!<br>";

    // 2. Verifica se o formulário enviou os dados via POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // 3. Valida se o campo NOME foi enviado
        if (empty($_POST['NOME']) || empty($_POST['EMAIL']) || empty($_POST['SENHA'])) {
            echo "❌ ERRO: Todos os campos são obrigatórios!";
            echo "<br><a href='Trabalho do Quiz- login.html'>Voltar</a>";
            exit;
        }
        
        // 4. Limpa e valida o input
        $EmailUSU = trim($_POST['EMAIL']);
        $SenhaUSU = trim($_POST['SENHA']);

        // Validação de email e senha
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $EmailUSU)
            || !preg_match('/^[a-záéíóúàâêôñ0-9\s]+$/i', $SenhaUSU)) {
            echo "❌ ERRO: Dados inválidos!";
            echo "<br><a href='Trabalho do Quiz- login.html'>Voltar</a>";
            exit;
        }
        
        if (strlen($EmailUSU) < 5 || strlen($EmailUSU) > 100) {
            echo "❌ ERRO: Email deve ter entre 5 e 100 caracteres!";
            echo "<br><a href='Trabalho do Quiz- login.html'>Voltar</a>";
            exit;
        }

        // 5. Prepara e executa o comando SQL
        $sql = "INSERT INTO infos (senha, email) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$SenhaUSU, $EmailUSU]);

        echo "✓ Email e senha salvos com sucesso na tabela infos!<br>";
        echo "Email registrado: <strong>" . htmlspecialchars($EmailUSU) . "</strong><br>";
        echo "<br><a href='Trabalho do Quiz- login.html'>Voltar</a>";
        
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
    echo "<br><a href='index.html'>Voltar</a>";
}
?>