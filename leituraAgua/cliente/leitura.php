<?php
// Início da sessão, se não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário não está logado ou não é um cliente
if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Cliente') {
    header("Location: ../index.php");
    exit();
}

// ID do cliente logado
$id_cliente = $_SESSION['user_id'];

// Verifica se o formulário foi enviado para fazer a leitura
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['acao']) && $_POST['acao'] == 'fazerleitura') {
    // Obtém a leitura do formulário
    $leitura = $_POST['leitura'];

    // Realiza qualquer validação necessária para a leitura

    // Insira a lógica para inserir a leitura no banco de dados
    // Exemplo: $sql_inserir_leitura = "INSERT INTO leituras (id_cliente, leitura) VALUES ($id_cliente, $leitura)";
    // $conn->query($sql_inserir_leitura);

    // Atualiza a data de contagem no banco de dados para o cliente
    date_default_timezone_set('Africa/Maputo');
    $agora = date('Y-m-d H:i:s'); // Obtém a data e hora atual no formato 'YYYY-MM-DD HH:MM:SS'
    $sql_update_data = "UPDATE usuario SET data_counte = '$agora' WHERE id = $id_cliente";
    $conn->query($sql_update_data);

    // Redireciona para outra página após a leitura
    header("Location: ?page=operacoes");
    exit();
}

// Consulta o limite atual do cliente
$sql_limite = "SELECT id, limite FROM usuario WHERE id = $id_cliente";
$res_limite = $conn->query($sql_limite);
if ($res_limite->num_rows > 0) {
    $row = $res_limite->fetch_assoc();
    $limite = $row['limite'];
} else {
    $limite = 0; // Defina um valor padrão se não encontrar o limite
}
// Fecha a conexão com o banco de dados
$conn->close();
?>

<h1>Leitura</h1>
<form action="?page=operacoes" method="post" onsubmit="return validateForm()">
    <!-- Campos ocultos para pegar automaticamente -->
    <input type='hidden' name='acao' value="fazerleitura">
    <input type="hidden" id="data_leitura" name="data_leitura" value="">
    <!-- Outros campos ocultos -->
    <input type="hidden" id="consumo" name="consumo" placeholder="Consumo" value="">
    <input type="hidden" id="valor" name="valor" placeholder="Valor" value="">
    <input type="hidden" id="id_leiturista" name="id_leiturista" placeholder="ID Leiturista" value="">
    <input type="hidden" id="id_cliente" name="id_cliente" placeholder="ID Cliente" value="<?php echo htmlspecialchars($id_cliente); ?>">
    <input type="hidden" id="limite" name="limite" placeholder="Limite" value="">

    <!-- Campo para a leitura -->
    <div class="mb-3">
        <input type="number" id="leitura" name="leitura" placeholder="Introduza a leitura" class="form-control" required>
    </div>

    <!-- Exibe mensagens dependendo do limite -->
    <div class="mb-3">
        <?php
        if ($limite == 2) {
            echo "<button class='btn btn-primary mb-3' type='submit'>FAZER LEITURA</button>";
            echo "<p class='alert alert-info'>Ficou com apenas uma tentativa de fazer leitura</p>";
        } elseif ($limite >= 3) {
            echo "<button style='display:none' class='btn btn-primary mb-3' type='submit'>FAZER LEITURA</button>";
            echo "<p class='alert alert-danger'>Excedeu o número de tentativas de fazer leitura.</p>";
            echo "<p class='alert alert-warning'>Para mais informações e recuperação, entre em contacto com a Instituição.</p>";
        } else {
            echo "<button class='btn btn-primary mb-3' type='submit'>FAZER LEITURA</button>";
        }
        ?>
    </div>
</form>

<!-- Script para definir a data atual no campo oculto -->
<script>
    function setDate() {
        const now = new Date();
        const year = now.getFullYear();
        let month = now.getMonth() + 1;
        let day = now.getDate();
        let hours = now.getHours();
        let minutes = now.getMinutes();
        let seconds = now.getSeconds();

        // Adiciona zero à esquerda para valores menores que 10
        month = month < 10 ? '0' + month : month;
        day = day < 10 ? '0' + day : day;
        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        console.log(`Formatted Date: ${formattedDate}`); // Adiciona log para depuração
        document.getElementById("data_leitura").value = formattedDate;
    }

    window.onload = function() {
        setDate();
    };

    // Validação do formulário
    function validateForm() {
        const input = document.getElementById("leitura");
        const value = input.value;

        if (!/^\d{4}$/.test(value)) {
            alert("Por favor, introduza um número de exatamente 4 dígitos.");
            return false;
        }

        return true;
    }
</script>
