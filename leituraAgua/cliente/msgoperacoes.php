<?php 
if (!isset($_SESSION['user_id']) || $_SESSION['user_categoria'] !== 'Cliente') {
    header("Location: ../index.php");
    exit();
}
$id_usuario = $_SESSION['user_id'];

if ($_REQUEST['acao'] == "mensagem") {
$message=$_POST["message"];
$sql="INSERT INTO notificacao(mensagem,id_usuario) VALUES ('{$message}','{$id_usuario}')";
$res=$conn->query($sql);
if($res=true){
print"<script>alert('Mensagem enviada...')</script>";
echo "<script>location.href='?page=home';</script>";
}else{
    print"<script>alert('Erro no envio de mensagem...')</script>";
    echo "<script>location.href='?page=default';</script>";
}}