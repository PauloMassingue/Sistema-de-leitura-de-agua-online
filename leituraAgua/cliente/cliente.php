<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Cliente</title>
    <style>
        body {
            background: #f0f8ff;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background-color: #333333; /* Preto meio claro */
            color: white;
            padding-top: 20px;
            transition: left 0.3s;
        }
        .sidebar.active {
            left: 0;
        }
        .sidebar a {
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            font-size: 1em; /* Tamanho padrão */
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .content {
            margin-left: 0;
            transition: margin-left 0.3s;
        }
        .content.shifted {
            margin-left: 250px;
        }
        .navbar {
            background-color: #00aaff;
        }
        .navbar .navbar-nav .nav-link {
            color: white;
        }
        .navbar .navbar-nav .nav-link.active {
            font-weight: bold;
        }
        .btn-primary {
            background-color: #00aaff;
            border-color: #00aaff;
        }
        .card-header {
            background-color: #ffa500;
            color: white;
        }
        #sidebarToggle {
            background: none;
            border: none;
            font-size: 1.5em;
            color: white;
        }
        .btn-profile {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px 15px;
            color: white;
            background-color: transparent;
            border: 1px solid white;
            border-radius: 5px;
            margin: 10px 0;
            text-decoration: none;
            font-size: 1em; /* Tamanho padrão */
        }
        .btn-profile i {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <?php
    session_start();
    include('../config.php');

    if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Cliente') {
        header("Location: ../index.php");
        exit();
    }
    
    $id_cliente = $_SESSION['user_id'];
    $nome_cliente = '';

    $sql = "SELECT id, nome FROM usuario";
    $res = $conn->query($sql);
    while ($row = $res->fetch_object()) {
        if ($id_cliente == $row->id) {
            $nome_cliente = $row->nome;
            break;
        }
    }
    ?>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <a style="text-decoration: none;" href="?page=perfil" class="btn-profile"><i class="bi bi-person-circle"></i>Ver Perfil</a>
        <a style="text-decoration: none;" href="../index.php">Terminar Sessão</a>
    </div>

    <!-- Main Content -->
    <div class="content" id="content">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <button class="btn btn-dark" id="sidebarToggle">
                    &#9776;
                </button>
                <span class="navbar-brand mb-0 h1">Olá, <?php echo htmlspecialchars($nome_cliente); ?></span>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="cliente.php">Home</a>
                        <a class="nav-link" href="?page=leitura">Leitura</a>
                        <a class="nav-link" href="?page=historico">Histórico</a>
                    </div>
                </div>
            </div>
        </nav>
        
        <!-- Rotas -->
        <div class="container">
            <div class="row">
                <div class="mt-5">
                    <?php
                    switch (@$_REQUEST['page']) {
                        case 'leitura':
                            include("./leitura.php");
                            break;
                        case 'historico':
                            include("./historico.php");
                            break;
                        case 'consulta':
                            // incluir consulta.php ou outro arquivo necessário
                            break;
                        case 'login':
                            include('../index.php');
                            break;
                        case 'msg':
                            include('./msgoperacoes.php');
                            break;
                        case 'operacoes':
                            include("./operacoes.php");
                            break;
                        case 'actualizarperfil':
                            include("./actualizarperfil.php");
                            break;
                        case 'perfil':
                            include("./perfil.php");
                            break;
                        default:
                            include("./home.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarToggle').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('shifted');
            });
        });
    </script>
</body>
</html>
