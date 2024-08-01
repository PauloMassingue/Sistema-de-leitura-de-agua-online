<?php
if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Leiturista') {
    header("Location: ../index.php");
    exit();
}

$idd_leiturista = $_SESSION['user_id'];

// Primeiro, pegamos todas as ocorrências na tabela identidade associadas ao leiturista
$sql = "SELECT * FROM identidade WHERE identidade_leiturista = '$idd_leiturista'";
$res = $conn->query($sql);

// Pegar todos os usuários
$querysql = "SELECT * FROM usuario WHERE categoria ='Cliente'";
$resultado = $conn->query($querysql);
$clientes = [];
while ($linha = $resultado->fetch_object()) {
    $clientes[$linha->id] = $linha;
}

// Pegar as leituras para cada cliente associado ao leiturista
$queryleitura = "
    SELECT id, leitura, id_cliente, id_leiturista
    FROM leitura
    WHERE id_cliente IN (SELECT identidade_cliente FROM identidade WHERE identidade_leiturista = '$idd_leiturista')
    AND id_leiturista = '$idd_leiturista'
    ORDER BY data_leitura DESC
";
$result = $conn->query($queryleitura);
$leituras = [];
while ($line = $result->fetch_object()) {
    $leituras[$line->id_cliente][] = $line; // Permitir múltiplas leituras por cliente
}

if ($res == true) {
    echo "<table class='table table-hover table-striped table-bordered'>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Província</th>";
    echo "<th>Bairro</th>";
    echo "<th>Quarteirão</th>";
    echo "<th>Número da casa</th>";
    echo "<th>Leitura</th>";
    echo "</tr>";

    // Lista de IDs de leituras já exibidas
    $ids_exibidos = [];
    $historico_exibido = false; // Variável de controle para verificar se alguma leitura foi exibida

    while ($row = $res->fetch_object()) {
        if (isset($clientes[$row->identidade_cliente]) && isset($leituras[$row->identidade_cliente])) {
            $cliente = $clientes[$row->identidade_cliente];
            foreach ($leituras[$row->identidade_cliente] as $leitura) {
                if ($leitura->id_leiturista == $idd_leiturista && !in_array($leitura->id, $ids_exibidos)) {
                    echo "<tr>";
                    echo "<td>{$cliente->nome}</td>";
                    echo "<td>{$cliente->provincia}</td>";
                    echo "<td>{$cliente->bairro}</td>";
                    echo "<td>{$cliente->quarteirao}</td>";
                    echo "<td>{$cliente->nrcasa}</td>";
                    echo "<td>{$leitura->leitura}</td>";
                    echo "</tr>";
                    // Adicionar o ID da leitura à lista de exibidos
                    $ids_exibidos[] = $leitura->id;
                    $historico_exibido = true; // Marcando que alguma leitura foi exibida
                }
            }
        }
    }
    echo "</table>";

    // Verifica se algum histórico foi exibido
    if (!$historico_exibido) {
        echo "<p class='alert alert-info'>Não existe nenhum histórico</p>";
    }
} else {
    echo "<p class='alert alert-info'>Não existe nenhum histórico</p>";
}