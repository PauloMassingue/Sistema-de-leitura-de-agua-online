<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Leiturista') {
    header("Location: ../index.php");
    exit();
}

$identidade_cliente = $_SESSION["cliente_identidade"];
$id_leiturista = $_SESSION["user_id"];
$taxaConsumo = 61.329;
$maior_id = 0;
$ultimaleitura = 0;

// Consultar dados de leitura
$sql = "SELECT id, leitura FROM leitura WHERE id_cliente='$identidade_cliente'";
$res = $conn->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_object()) {
        if ($maior_id < $row->id) {
            $maior_id = $row->id;
            $ultimaleitura = $row->leitura;
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
    } else {
        $valor = $consumo * $taxaConsumo;
        $sql = "INSERT INTO leitura (data_leitura, leitura, consumo, valor, id_leiturista, id_cliente) VALUES ('$data_leitura', '$leitura', '$consumo', '$valor', '$id_leiturista', '$identidade_cliente')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Leitura efetuada com sucesso...');</script>";
            $sql_actualizar = "UPDATE usuario SET limite = 0 WHERE id = $identidade_cliente";
            $conn->query($sql_actualizar);
            $comandoSQL="UPDATE usuario SET estado='0' WHERE id='$identidade_cliente'";
            $execucao=$conn->query($comandoSQL);
            echo "<script>location.href='?page=leituraPendente';</script>";
        } else {
            echo "<script>alert('Erro ao efetuar leitura...');</script>";
            echo "<script>location.href='?page=leitura';</script>";
        }
    }
}
