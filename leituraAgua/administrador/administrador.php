<?php
$data_diferenca = 0;
include('../config.php');
include("../data_manipulacao.php");

// Inicia a sessão antes de qualquer saída HTML
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$nome_adm = "";

if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Administrador') {
    header("Location: ../index.php");
    exit();
}

$id_administrador = $_SESSION['user_id'];
$sql = "SELECT id, nome FROM usuario";
$res = $conn->query($sql);
while ($row = $res->fetch_object()) {
    if ($row->id == $id_administrador) {
        $nome_adm = $row->nome;
    }
}

// Pegar os clientes com limite >= 3
$base_de_dados = "SELECT id, nome, limite, categoria, data_counte FROM usuario";
$resultado = $conn->query($base_de_dados);

// Pegar os leituristas
$leituristas = $conn->query($base_de_dados);
$dados = $conn->query($base_de_dados);

if (isset($_POST['leituristaId'])) {
    $leituristaId = $_POST['leituristaId'];
}


if (isset($_POST['clienteId'])) {
    $clienteId = $_POST['clienteId'];
}
//armazenamento de valores de session
if(isset($clienteId)){
    $_SESSION['identidade_cliente']= $clienteId;
}
if(isset($leituristaId)){
    $_SESSION['identidade_leiturista']= $leituristaId;
}

//recuperacao de valores de session
if(isset($_SESSION['identidade_cliente']) && $_SESSION['identidade_leiturista']){
  $identidade_cliente= $_SESSION['identidade_cliente'];
  $identidade_leiturista=$_SESSION['identidade_leiturista'];
  $insercao="INSERT INTO identidade(identidade_cliente,identidade_leiturista) VALUES ('{$identidade_cliente}','{$identidade_leiturista}')";
  $resposta=$conn->query($insercao);

  $comandoSQL="UPDATE usuario SET estado='1' WHERE id='$identidade_cliente'";
  $execucao=$conn->query($comandoSQL);
  if($resposta==true){
    print"<script>alert('Leiturista alocado com sucesso...')</script>";
  }else{
    print"<script>alert('Erro ao alocar leiturista...')</script>";
  }
  unset($_SESSION['identidade_cliente']);
  unset($_SESSION['identidade_leiturista']);
}


//controle de leitura
$temLeituraPendente = false; 
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <title>Administrador</title>
    <style>
           #notificationsPopup {
            width: calc(100% + 50px);
            height: calc(100% + 30px);
            overflow: auto;
            padding: 15px; /* Adiciona um pequeno padding para melhor visualização */
            box-sizing: border-box; /* Garante que o padding não aumente as dimensões */
        }
        #btnnotificacao,
#messageButton {
    border: none;
    outline: none;
    background-color: transparent;
    cursor: pointer;
}

#btnnotificacao:hover,
#messageButton:hover {
    background-color: lightgray;
}

#btnnotificacao:active,
#messageButton:active {
    background-color: black;
    color: white;
}


    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <div class="sidebar-close">
            <button id="sidebarClose">&#9776;</button>
        </div>
        <div class="">
            <h4>Administração</h4>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="?page=home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=perfil">Perfil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=cadastro">Cadastro</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=cliente">Cliente</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?page=leiturista">Leiturista</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Terminar Sessão</a>
            </li>
        </ul>
    </div>
    <!-- Main Content -->
    <div class="content main-container" id="content">
        <div class="dashboard-header">
            <h1><?php echo "Olá, {$nome_adm}"; ?></h1>
            <div>
                <button id="sidebarToggle" class="">&#9776;</button>
                <button id="btnnotificacao">&#9993;</button>
                <button id="messageButton">&#128276;</button>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 content-include">
                    <div>
                        <?php 
                            switch(@$_REQUEST['page']){
                                case 'cadastro':
                                    include("./cadastro.php");
                                    break;
                                case 'cliente':
                                    include("./cliente/cliente.php");
                                    break;
                                case 'operacliente':
                                    include("./cliente/opera.php");
                                    break;
                                case 'editarcliente':
                                    include("./cliente/editar.php");
                                    break;
                                case 'leiturista':
                                    include("./leiturista/leiturista.php");
                                    break;
                                case 'operaleiturista': 
                                    include("./leiturista/opera.php");
                                    break;
                                case 'editarleiturista': 
                                    include("./leiturista/editar.php");
                                    break;
                                case 'alertas':
                                    include("./alertas.php");
                                    break;
                                case 'login':
                                    include("./login.php");
                                    break;
                                case 'actualizarestado':
                                    include("./actualizarestado.php");
                                    break;
                                case 'operacoes':
                                    include("./operacoes.php");
                                    break;
                                case 'perfil':
                                    include("./perfil.php");
                                    break;
                                case 'actualizarperfil':
                                    include("./actualizarperfil.php");
                                    break;
                                default:
                                    include("./home.php");
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- notificacao -->
     <!-- Notificações -->
<div class="popup" id="notificationsPopup">
    <div class="popup-header">
        <h4>Notificações</h4>
        <div>
            <button id="closeNotificationsPopup">&times;</button>
        </div>
    </div>
    <div class="popup-content">
        <ul>
        <?php
    $lida='';
    $marcar='';
$ex = "SELECT id, mensagem, id_usuario, estado FROM notificacao ORDER BY id DESC"; // Supondo que 'id' indica a ordem cronológica
$retribuicao = $conn->query($ex);
echo "<table class='table table-hover table-striped table-bordered'>";
echo "<tr>";
echo "<th>Nome</th>";
echo "<th>Email</th>";
echo "<th>Província</th>";
echo "<th>Bairro</th>";
echo "<th>Quarteirão</th>";
echo "<th>Número de casa</th>";
echo "<th>Mensagem</th>";
echo "<th>Estado</th>";
echo "</tr>";

while ($li = $retribuicao->fetch_object()) {
    $selecao = "SELECT * FROM usuario WHERE id = '{$li->id_usuario}'";
    $executar = $conn->query($selecao);
    $meu = $executar->fetch_object();
    $estado = $li->estado == 0 ? "Não lida" : "Lida";
    $lida= $li->estado == 0 ? 'btn btn-success btn-lg':'btn btn-dark btn-lg';
    $marcar=$li->estado == 0 ? 'Marcar como lida': 'lida';
    
    echo "<tr>";
    echo "<td>{$meu->nome}</td>";
    echo "<td>{$meu->email}</td>";
    echo "<td>{$meu->provincia}</td>";
    echo "<td>{$meu->bairro}</td>";
    echo "<td>{$meu->quarteirao}</td>";
    echo "<td>{$meu->nrcasa}</td>";
    echo "<td>{$li->mensagem}</td>";
    echo "<td>";
    echo "<form method='post' action='?page=actualizarestado'>";
    echo "<input type='hidden' name='acao' value='actualizarestado'>";
    echo "<input type='hidden' name='id_notificacao' value='{$li->id}'>";
    echo "<input type='submit' class='{$lida}' value='$marcar'>";
    echo "</form>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
?>

        </ul>
    </div>
</div>

    <!-- Pop-up de cliente -->
    <div class="popup" id="messagePopup">
        <div class="popup-header">
            <h4>Clientes Irregulares</h4>
            <div>
                <button id="toggleMode">🌗</button>
                <button id="closePopup">&times;</button>
            </div>
        </div>
        <div class="popup-content">
            <ul>
                <?php
                while($linha = $resultado->fetch_object()) {
                    if ($linha->limite >= 3) {
                        $data_diferenca=contarTempo($linha->data_counte);
                        echo "<li class='custum-li' style='padding:10px;'><a href='#' class='leiturista-link' data-leiturista='$linha->id'>{$linha->nome}</a> <p style='display:inline;'>{$data_diferenca}</p></li>";
                        $temLeituraPendente = true;
                    }
                }
                if (!$temLeituraPendente) {
                    echo "<p class='alert alert-info'>Nenhum Cliente Irregular</p>";
                }
                ?>
            </ul>
        </div>
    </div>

    <!-- Novo Pop-up para Leituristas -->
    <div class="popup" id="leituristaPopup">
        <button class="back-button" id="backButton">&#8592;</button>
        <div class="popup-header">
            <h4>Leituristas</h4>
            <div>
                <button id="toggleModeLeiturista">🌗</button>
                <button id="closeLeituristaPopup">&times;</button>
            </div>
        </div>
        <div class="popup-content">
            <ul>
                <?php
                while($linha = $leituristas->fetch_object()) {
                    if ($linha->categoria == 'Leiturista') {
                        echo "<li class='custum-li' style='padding:10px;'><a href='#'>{$linha->nome}</a>  <button class='btn btn-primary' identidade_leiturista='$linha->id'>Alocar</button></li>";

                        echo"<li></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            let isDragging = false;
            let offset = { x: 0, y: 0 };
            
            function onMouseMove(event, popupId) {
                if (isDragging) {
                    const left = event.clientX - offset.x;
                    const top = event.clientY - offset.y;
                    $(popupId).css({ top: `${top}px`, left: `${left}px`, transform: 'none' });
                }
            }
            
            function makePopupDraggable(popupId) {
                $(popupId + ' .popup-header').on('mousedown', function (event) {
                    isDragging = true;
                    const rect = $(popupId)[0].getBoundingClientRect();
                    offset.x = event.clientX - rect.left;
                    offset.y = event.clientY - rect.top;
                    $(window).on('mousemove', (e) => onMouseMove(e, popupId));
                });
                
                $(window).on('mouseup', function () {
                    isDragging = false;
                    $(window).off('mousemove', (e) => onMouseMove(e, popupId));
                });
            }
                //cliente
            makePopupDraggable('#messagePopup');
            makePopupDraggable('#leituristaPopup');

            $('#sidebarToggle, #sidebarClose').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('shifted');
            });

            $('#messageButton').on('click', function () {
                $('#messagePopup').show();
            });

            $('#closePopup').on('click', function () {
                $('#messagePopup').hide();
            });

            $('#toggleMode').on('click', function () {
                $('#messagePopup').toggleClass('light-mode');
            });

            $('.leiturista-link').on('click', function (event) {
                event.preventDefault();

                const clienteId = $(this).data('leiturista');
        //pegar o id do cliente ao ser selecionado
                function enviarClienteId(clienteId) {
                        $.ajax({
                            type: "POST",
                            url: "administrador.php", // URL do mesmo arquivo PHP
                            data: { clienteId: clienteId },
                            success: function(response) {
                                // Exibir a resposta do PHP
                                console.log(response);
                                
                            }
                        });
                    }
        // Chame a função para enviar clienteId
                enviarClienteId(clienteId);

                $('#messagePopup').hide();
                $('#leituristaPopup').show();
            });

            //leiturista 
            $('#backButton').on('click', function () {
                $('#leituristaPopup').hide();
                $('#messagePopup').show();
            });

            $('#closeLeituristaPopup').on('click', function () {
                $('#leituristaPopup').hide();
            });

            $('#toggleModeLeiturista').on('click', function () {
                $('#leituristaPopup').toggleClass('light-mode');
                $('#backButton').toggleClass('light-mode');
            });
//

$(document).on('click', '.btn-primary', function () {
        const leituristaId = $(this).attr('identidade_leiturista');

        // Enviar uma requisição AJAX para o servidor com o ID do leiturista
        $.ajax({
            type: "POST",
            url: "administrador.php", // URL do mesmo arquivo PHP
            data: { leituristaId: leituristaId },
            success: function(response) {
                console.log(response);
                // alert("Leiturista alocado com sucesso...")
            }
        });
    });
       // Fechar o pop-up ao clicar fora dele
            $(window).on('click', function (event) {
                if ($(event.target).is('#messagePopup')) {
                    $('#messagePopup').hide();
                }
                if ($(event.target).is('#leituristaPopup')) {
                    $('#leituristaPopup').hide();
                }
            });
        });
        //notificacao
        $(document).ready(function () {
    let isDragging = false;
    let offset = { x: 0, y: 0 };

    function onMouseMove(event, popupId) {
        if (isDragging) {
            const left = event.clientX - offset.x;
            const top = event.clientY - offset.y;
            $(popupId).css({ top: `${top}px`, left: `${left}px`, transform: 'none' });
        }
    }

    function makePopupDraggable(popupId) {
        $(popupId + ' .popup-header').on('mousedown', function (event) {
            isDragging = true;
            const rect = $(popupId)[0].getBoundingClientRect();
            offset.x = event.clientX - rect.left;
            offset.y = event.clientY - rect.top;
            $(window).on('mousemove', (e) => onMouseMove(e, popupId));
        });

        $(window).on('mouseup', function () {
            isDragging = false;
            $(window).off('mousemove', (e) => onMouseMove(e, popupId));
        });
    }

    // Notificações
    makePopupDraggable('#notificationsPopup');

    $('#btnnotificacao').on('click', function () {
        $('#notificationsPopup').show();
    });

    $('#closeNotificationsPopup').on('click', function () {
        $('#notificationsPopup').hide();
    });

    $('#toggleNotificationsMode').on('click', function () {
        $('#notificationsPopup').toggleClass('light-mode');
    });

    // Fechar o pop-up ao clicar fora dele
    $(window).on('click', function (event) {
        if ($(event.target).is('#notificationsPopup')) {
            $('#notificationsPopup').hide();
        }
    });
});

    </script>
</body>
</html>
