<?php
if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Leiturista') {
    header("Location: ../index.php");
    exit();
}

$usuariologado = $_SESSION['user_id'];
if (isset($_POST['acao']) && $_POST['acao'] == "actualizarperfil") {
        $email=$_POST['email'];
       $senha=$_POST['senha'];
        $atualizacao = "UPDATE usuario SET email='$email',senha='$senha' WHERE id = $usuariologado";
        $res = $conn->query($atualizacao);
        if($res==true){
            print"<script>alert('Dados actualizados com sucesso...')</script>";
            echo "<script>location.href='?page=perfil';</script>";
        }else{
            print"<script>alert('Erro ao actualizar os dados...')</script>";
            echo "<script>location.href='?page=perfil';</script>";
        }
    
}