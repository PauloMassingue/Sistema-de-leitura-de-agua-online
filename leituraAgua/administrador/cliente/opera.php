<?php
switch($_REQUEST['acao']){
    case "bloquear":
        $sql="SELECT estate FROM  usuario WHERE id={$_REQUEST['id']} ";
        $res=$conn->query($sql);
        $linha=$res->fetch_object();
         if($linha->estate==1){
            $sql="UPDATE usuario SET estate=0  WHERE id={$_REQUEST['id']} ";   
            $res=$conn->query($sql);
            if($res==true){
                 print"<script> alert('usuario desbloqueado com sucesso...');</script>";
                 print"<script>location.href='?page=cliente';</script>";
            }else{
                print"<script> alert('Erro ao desbloquear usuario...');</script>";
                print"<script>location.href='?page=cliente';</script>"; 
            }}elseif ($linha->estate==0){
                $sql="UPDATE usuario SET estate=1  WHERE id={$_REQUEST['id']} ";   
                $res=$conn->query($sql);
                if($res==true){
                    print"<script> alert('usuario bloqueado com sucesso...');</script>";
                    print"<script>location.href='?page=cliente';</script>";
               }else{
                   print"<script> alert('Erro ao bloquear usuario...');</script>";
                   print"<script>location.href='?page=cliente';</script>"; 
               }
            }
            break;
    case "editar":
      $nome=$_POST['nome'];
      $sexo=$_POST['sexo'];
      $provincia=$_POST['provincia'];
      $bairro=$_POST['bairro'];
      $quarteirao=$_POST['quarteirao'];
      $nrcasa=$_POST['nrcasa'];
      $email=$_POST['email'];

            $sql="UPDATE usuario SET nome='{$nome}',sexo='{$sexo}',provincia='{$provincia}',bairro='{$bairro}',quarteirao='{$quarteirao}',nrcasa='{$nrcasa}',email='{$email}' WHERE id={$_REQUEST['id']} ";   
            $res=$conn->query($sql);
            if($res==true){
                 print"<script> alert('Cliente actualizado com sucesso...');</script>";
                 print"<script>location.href='?page=cliente';</script>";
            }else{
                print"<script> alert('Erro ao actualizar cliente...');</script>";
                print"<script>location.href='?page=cliente';</script>"; 
            }
    
} 
