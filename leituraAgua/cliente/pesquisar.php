<?php
$data_factura = 0;
include("../data_manipulacao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['searchDate'])) {
    $searchDate = $_POST['searchDate'];
    $stmt = $conn->prepare("SELECT * FROM leitura WHERE data_leitura = ?");
    $stmt->bind_param("s", $searchDate);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows > 0) {
        while ($row = $res->fetch_object()) {
            $data_factura = contarTempo($row->data_leitura);
            // echo "<div class='factura'>";
            echo "<div class='card-header'>Data: {$row->data_leitura}</div>";
            echo "<div class='card-body'>";
            echo "<p><strong>Consumo:</strong> {$row->consumo}m³</p>";
            echo "<p><strong>Leitura:</strong> {$row->leitura}</p>";
            echo "<p><strong>Valor:</strong> {$row->valor} Mzn</p>";
            echo "<p>{$data_factura}</p>";
            echo "<br>";
            echo "<hr>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='factura'>Nenhuma fatura encontrada para a data especificada.</div>";
    }
    exit;
} else {
    $sql = "SELECT * FROM leitura ORDER BY data_leitura DESC";
    $res = $conn->query($sql);
}
