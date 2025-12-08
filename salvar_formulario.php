<?php
// ===== CONFIGURAÇÃO DO BANCO (AJUSTE AQUI) =====
$host   = "localhost:3306";
$user   = "root"; // usuario ou root
$pass   = "senhadobanco"; // senha
$dbname = "banco_de_chamadas"; //nome do banco

// Conexão
$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco: " . $conn->connect_error);
}

// ===== RECEBENDO DADOS DO FORMULÁRIO =====
$matricula             = $_POST['matricula'] ?? null;
$nome_teleatendente    = $_POST['nome_teleatendente'] ?? null;
$data_atendimento      = $_POST['data_atendimento'] ?? null;
$hora_atendimento      = $_POST['hora_atendimento'] ?? null;
$iniciativa            = $_POST['iniciativa'] ?? null;
$iniciativa_viatura    = $_POST['iniciativa_viatura'] ?? null;
$iniciativa_servidor   = $_POST['iniciativa_servidor'] ?? null;

$destino_servico       = $_POST['destino_servico'] ?? null;
$logradouro_chamada    = $_POST['logradouro_chamada'] ?? null;
$numero_chamada        = $_POST['numero_chamada'] ?? null;
$complemento_chamada   = $_POST['complemento_chamada'] ?? null;
$bairro_chamada        = $_POST['bairro_chamada'] ?? null;
$municipio_chamada     = $_POST['municipio_chamada'] ?? null;
$telefone_chamada      = $_POST['telefone_chamada'] ?? null;

$nome_solicitante      = $_POST['nome_solicitante'] ?? null;
$endereco_solicitante  = $_POST['endereco_solicitante'] ?? null;
$numero_solicitante    = $_POST['numero_solicitante'] ?? null;
$complemento_solicitante = $_POST['complemento_solicitante'] ?? null;
$bairro_solicitante    = $_POST['bairro_solicitante'] ?? null;
$municipio_solicitante = $_POST['municipio_solicitante'] ?? null;
$telefone_solicitante  = $_POST['telefone_solicitante'] ?? null;

$descricao_natureza    = $_POST['descricao_natureza'] ?? null;
$codigo_natureza       = $_POST['codigo_natureza'] ?? null;

// ===== INSERT COM PREPARED STATEMENT =====
$sql = "INSERT INTO registros_chamadas (
            matricula,
            nome_teleatendente,
            data_atendimento,
            hora_atendimento,
            iniciativa,
            iniciativa_viatura,
            iniciativa_servidor,
            destino_servico,
            logradouro_chamada,
            numero_chamada,
            complemento_chamada,
            bairro_chamada,
            municipio_chamada,
            telefone_chamada,
            nome_solicitante,
            endereco_solicitante,
            numero_solicitante,
            complemento_solicitante,
            bairro_solicitante,
            municipio_solicitante,
            telefone_solicitante,
            descricao_natureza,
            codigo_natureza
        )
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Erro ao preparar SQL: " . $conn->error);
}

// 23 campos → 23 's' (string)
$stmt->bind_param(
    "sssssssssssssssssssssss",
    $matricula,
    $nome_teleatendente,
    $data_atendimento,
    $hora_atendimento,
    $iniciativa,
    $iniciativa_viatura,
    $iniciativa_servidor,
    $destino_servico,
    $logradouro_chamada,
    $numero_chamada,
    $complemento_chamada,
    $bairro_chamada,
    $municipio_chamada,
    $telefone_chamada,
    $nome_solicitante,
    $endereco_solicitante,
    $numero_solicitante,
    $complemento_solicitante,
    $bairro_solicitante,
    $municipio_solicitante,
    $telefone_solicitante,
    $descricao_natureza,
    $codigo_natureza
);

if ($stmt->execute()) {
    echo "
    <div style='
        font-family: Arial;
        background-color: #d4edda;
        color: #155724;
        padding: 15px;
        border-radius: 5px;
        width: 300px;
        margin: 40px auto;
        text-align: center;
        font-size: 18px;'>
        Chamada salva com sucesso!<br>
        Redirecionando em <span id='contador'>3</span> segundos...
    </div>

    <script>
        let tempo = 3;
        let contador = document.getElementById('contador');
        
        setInterval(() => {
            tempo--;
            contador.textContent = tempo;
            if (tempo <= 0) {
                window.location.href = 'atendente_seu_formulario_integrado.php';
            }
        }, 1000);
    </script>
    ";
} else {
    echo "Erro ao salvar ocorrência: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
