<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Cliente') {
    header("Location: ../index.php");
    exit();
}
$id_cliente = $_SESSION['user_id'];

$taxaConsumo = 61.329;
$maior_id = 0;
$ultimaleitura = 0;
$menorConsumo = PHP_INT_MAX;

// Consultar dados de leitura
$sql = "SELECT id, consumo, leitura FROM leitura";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_object()) {
        // Atualizar maior_id e ultimaleitura
        if ($maior_id < $row->id) {
            $maior_id = $row->id;
            $ultimaleitura = $row->leitura;
        }

        // Atualizar menorConsumo
        if ($row->consumo < $menorConsumo) {
            $menorConsumo = $row->consumo;
        }
    }
}

// Verificar se a ação é fazerleitura
if ($_REQUEST['acao'] == "fazerleitura") {
    $data_leitura = $_POST["data_leitura"];
    $leitura = $_POST["leitura"];
    $consumo = $leitura - $ultimaleitura;
    
    if ($leitura < $ultimaleitura) {
        echo "<script>alert('Inválido! A leitura atual não deve ser menor que a leitura anterior...');</script>";
        echo "<script>location.href='?page=leitura';</script>";
    } elseif ($consumo < $menorConsumo) {
        // Incrementar o limite de leitura para o usuário específico
        $sql = "SELECT limite FROM usuario WHERE id = $id_cliente";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            $row = $res->fetch_object();
            $limite_leitura = $row->limite + 1;

            $sql_update = "UPDATE usuario SET limite = $limite_leitura WHERE id = $id_cliente";
            if ($conn->query($sql_update) === TRUE) {
                echo "<script>alert('Inválido! O consumo atual não deve ser menor que o menor consumo feito nos últimos 6 meses...');</script>";
                echo "<script>location.href='?page=leitura';</script>";
            } else {
                echo "<script>alert('Erro ao atualizar o limite de leitura...');</script>";
                echo "<script>location.href='?page=leitura';</script>";
            }
        } else {
            echo "<script>alert('Erro ao buscar o limite de leitura...');</script>";
            echo "<script>location.href='?page=leitura';</script>";
        }
    } else {
        $valor = $consumo * $taxaConsumo;
        $id_leiturista = $_POST["id_leiturista"];
        $id_cliente = $_POST["id_cliente"];

        $sql = "INSERT INTO leitura (data_leitura, leitura, consumo, valor, id_leiturista, id_cliente) VALUES ('$data_leitura', '$leitura', '$consumo', '$valor', '$id_leiturista', '$id_cliente')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Leitura efetuada com sucesso...');</script>";
            echo "<script>location.href='?page=leitura';</script>";
            $sql_actualizar = "UPDATE usuario SET limite = 0 WHERE id = $id_cliente";
            $conn->query($sql_actualizar);
        } else {
            echo "<script>alert('Erro ao efetuar leitura...');</script>";
            echo "<script>location.href='?page=leitura';</script>";
        }
    }
}