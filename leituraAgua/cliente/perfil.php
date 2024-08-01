<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil de Usuário</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .profile-icon {
      font-size: 115px;
      margin: 15px;
    }
    .edit-btn {
      font-size: 35px;
      margin-left: 150px; /* 150px adicional */
    }
    .profile-container {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 5px;
      position: relative;
    }
    .profile-container button {
      position: absolute;
      right: -150px; /* Desloca o botão 150px à direita do ícone */
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="profile-container">
      <i class="profile-icon fas fa-user-circle"></i>
      <button id="editButton" class="btn btn-light edit-btn"><i class="fas fa-edit"></i></button>
    </div>

    <?php
    if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Cliente') {
        header("Location: ../index.php");
        exit();
    }
    
    $usuariologado = $_SESSION['user_id'];
    $funcaosqp="SELECT * FROM usuario WHERE id=$usuariologado ";
    $eitaresposta=$conn->query($funcaosqp);
    $linhada=$eitaresposta->fetch_object();
    ?>
    <form method='post' action='?page=actualizarperfil'>
    <input type='hidden' name='acao' value='actualizarperfil'>
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" value="<?php print$linhada->nome ?>" readonly>
      </div>
      <div class="form-group">
        <label for="sexo">Sexo</label>
        <input type="text" class="form-control" id="sexo" value="<?php print$linhada->sexo ?>" readonly>
      </div>
      <div class="form-group">
        <label for="provincia">Província</label>
        <input type="text" class="form-control" id="provincia" value="<?php print$linhada->provincia ?>" readonly>
      </div>
      <div class="form-group">
        <label for="bairro">Bairro</label>
        <input type="text" class="form-control" id="bairro" value="<?php print$linhada->bairro ?>" readonly>
      </div>
      <div class="form-group">
        <label for="quarteirao">Quarteirão</label>
        <input type="text" class="form-control" id="quarteirao" value="<?php print$linhada->quarteirao ?>" readonly>
      </div>
      <div class="form-group">
        <label for="nrcasa">Número da Casa</label>
        <input type="text" class="form-control" id="nrcasa" value="<?php print$linhada->nrcasa ?>" readonly>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php print$linhada->email ?>" readonly>
      </div>
      <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control"  name="senha" id="senha" value="<?php print$linhada->senha ?>" readonly>
      </div>
      <button type="submit" class="btn btn-primary" id="alterarButton" disabled>Alterar</button>
    </form>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#editButton').on('click', function(e) {
        e.preventDefault();
        var isEditable = $('#email').prop('readonly');
        $('#email, #senha').prop('readonly', !isEditable);
        $('#alterarButton').prop('disabled', !isEditable);
      });
    });
  </script>
</body>
</html>
