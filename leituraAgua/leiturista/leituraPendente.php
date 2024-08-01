<?php
$id_cliente = "";
if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Leiturista') {
    header("Location: ../index.php");
    exit();
}
$id_leiturista = $_SESSION['user_id'];

// Primeiro, pegue todos os clientes associados ao leiturista
$sql = "SELECT identidade_cliente FROM identidade WHERE identidade_leiturista = '$id_leiturista'";
$res = $conn->query($sql);

$temLeituraPendente = false; // Variável de controle

if ($res->num_rows > 0) {
    echo "<table class='table table-hover table-striped table-bordered'>";
    echo "<tr>";
    echo "<th>Nome</th>";
    echo "<th>Província</th>";
    echo "<th>Bairro</th>";
    echo "<th>Quarteirão</th>";
    echo "<th>Número da casa</th>";
    echo "<th>Ação</th>";
    echo "</tr>";
    
    // Array para armazenar os maiores IDs por cliente
    $clientes_maior_id = [];

    // Iterar sobre os clientes para encontrar o maior ID para cada um
    while ($row = $res->fetch_assoc()) {
        $id_cliente = $row['identidade_cliente'];
        
        // Pegue o maior ID da tabela identidade para este cliente
        $sql_maior_id = "SELECT MAX(id) as maior_id FROM identidade WHERE identidade_cliente = '$id_cliente'";
        $res_maior_id = $conn->query($sql_maior_id);
        if ($res_maior_id->num_rows > 0) {
            $row_maior_id = $res_maior_id->fetch_assoc();
            $maior_id = $row_maior_id['maior_id'];
            $clientes_maior_id[$id_cliente] = $maior_id;
        }
    }

    // Iterar sobre os maiores IDs para listar os detalhes dos usuários correspondentes
    foreach ($clientes_maior_id as $id_cliente => $maior_id) {
        $sql_usuario = "SELECT id, nome, provincia, bairro, quarteirao, nrcasa, estado,limite FROM usuario WHERE id = '$id_cliente'";
        $res_usuario = $conn->query($sql_usuario);
        if ($res_usuario->num_rows > 0) {
            while ($usuario = $res_usuario->fetch_assoc()) {
                if (($usuario['estado'] == 1) && ($usuario['id'] == $id_cliente)) {
                    echo "<tr>";
                    echo "<td>{$usuario['nome']}</td>";
                    echo "<td>{$usuario['provincia']}</td>";
                    echo "<td>{$usuario['bairro']}</td>";
                    echo "<td>{$usuario['quarteirao']}</td>";
                    echo "<td>{$usuario['nrcasa']}</td>";
                    echo "<td><button onclick=\"location.href='?page=leitura&id=" . $id_cliente . "';\" class='btn btn-primary btn-sm'>Fazer Leitura</button></td>";
                    echo "</tr>";
                    $temLeituraPendente = true; // Marca que encontramos uma leitura pendente
                }
            }
        }
    }
    echo "</table>";
}

// Se nenhum usuário foi listado, exiba a mensagem de alerta
if (!$temLeituraPendente) {
    echo "<p class='alert alert-info'>Nenhuma Leitura Pendente!</p>";
}

