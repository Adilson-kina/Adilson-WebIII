<?php
// Conexão com o banco (parte do config.php)
$host = 'localhost';
$dbname = 'escola';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}

// Processamento do POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $dados = [
            ':ra' => $_POST['ra'],
            ':nome' => $_POST['nome'],
            ':endereco' => $_POST['endereco'],
            ':curso' => $_POST['curso']
        ];

        if ($_POST['acao'] == 'incluir') {
            $stmt = $pdo->prepare("INSERT INTO alunos VALUES (:ra, :nome, :endereco, :curso)");
            $stmt->execute($dados);
            echo "Aluno cadastrado!";
        } 
        
        if ($_POST['acao'] == 'alterar') {
            $stmt = $pdo->prepare("UPDATE alunos SET 
                                nome = :nome,
                                endereco = :endereco,
                                curso = :curso
                                WHERE ra = :ra");
            $stmt->execute($dados);
            echo "Dados atualizados!";
        }
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>

<!-- Formulário HTML -->
<form method="POST">
    RA: <input type="text" name="ra" required><br>
    Nome: <input type="text" name="nome" required><br>
    Endereço: <input type="text" name="endereco" required><br>
    Curso: <input type="text" name="curso" required><br>
    <button type="submit" name="acao" value="incluir">Incluir</button>
    <button type="submit" name="acao" value="alterar">Alterar</button>
</form>
