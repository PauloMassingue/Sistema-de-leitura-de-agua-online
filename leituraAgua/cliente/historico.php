<?php
include("./pesquisar.php");
if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Cliente') {
    header("Location: ../index.php");
    exit();
}
$id_usuario = $_SESSION['user_id'];
?>
<div class="container mt-5">
    <h3>Lista de Facturas de Leitura de Água</h3>
    <!-- Campo de pesquisa por data -->
    <div class="input-group mb-3">
        <input type="date" id="searchDate" class="form-control" placeholder="Pesquisar por data" onchange="searchByDate()">
    </div>
    <div class="card mb-3" id="facturasList">
        <?php
        while ($row = $res->fetch_object()) {
                if($row->id_cliente==$id_usuario){
                    $data_factura = contarTempo($row->data_leitura);
                    echo "<div class='factura'>";
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
        }
        ?>
    </div>
</div>

<script>
    function searchByDate() {
        var searchDate = document.getElementById('searchDate').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '', true); // Post request to the same script
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById('facturasList').innerHTML = xhr.responseText;
            }
        };
        xhr.send('searchDate=' + searchDate);
    }
</script>
