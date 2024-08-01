<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            background: url('imagens/login.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .login-container {
            margin-top: 100px;
            max-width: 400px;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100 ">
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form action="index.php" method="post" class="px-5">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required class="form-control">
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required class="form-control">
            </div>
            <div class="form-group text-center">
                <input type="submit" value="Entrar" class="btn btn-primary btn-block">
            </div>
        </form>
    </div>
</div>

<?php
// buscar dados na base de dados e inserir num array de objetos
include('config.php');
$sql = "SELECT id, email, senha, categoria FROM usuario";
$res = $conn->query($sql);
$users = [];
while ($row = $res->fetch_object()) {
    $users[] = [
        "email" => $row->email,
        "senha" => $row->senha,
        "categoria" => $row->categoria,
        "id" => $row->id
    ];
}

// Função de autenticação
session_start();
function authenticate($email, $senha, $users) {
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['senha'] === $senha) {
            return $user; // Retorna o array completo do usuário
        }
    }
    return false;
}

// Captura os dados do formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    // Autentica o usuário
    $user = authenticate($email, $senha, $users);
//

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_categoria'] = $user['categoria'];
        $query="SELECT estate FROM usuario where id={$user['id']} ";
        $response=$conn->query($query);
        $linha=$response->fetch_object();
    if($linha->estate==1){
        
        print "<div class='d-flex justify-content-center align-items-center vh-100'>";
        print "<div class='text-center'>";
        print "<p class='alert alert-danger mg-l-5'>Usuário bloqueado!</p>";
        echo "<p class='alert alert-warning'>Para mais informações e recuperação, dirija-se à Instituição.</p>";
        print "</div>";
        print "</div>";
        
    }else{
        if ($user['categoria'] === 'Cliente') {
            header("Location: ./cliente/cliente.php");
            exit();
        } elseif ($user['categoria'] === 'Leiturista') {
            header("Location: ./leiturista/leiturista.php");
            exit();
        } elseif ($user['categoria'] === 'Administrador') {
            header("Location: ./administrador/administrador.php");
            exit();
        }
    }
    } else {
        echo "<script>alert('Email ou senha incorrectos');</script>";
    }
}
?>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
