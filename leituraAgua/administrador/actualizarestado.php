<?php
if (isset($_POST['acao']) && $_POST['acao'] == "actualizarestado") {
    if (isset($_POST['id_notificacao'])) {
        $id_do_notificacao = $_POST['id_notificacao']; // Pegando o ID da notificação do POST
        $atualizacao = "UPDATE notificacao SET estado = 1 WHERE id = $id_do_notificacao";
        $res = $conn->query($atualizacao);
        if ($res === true) {
            //echo "<script>alert('Atualizado com sucesso');</script>";
        } else {
            //echo "<script>alert('Erro na atualização');</script>";
        }
    } else {
       // echo "<script>alert('ID da notificação não fornecido');</script>";
    }
} else {
    //echo "<script>alert('Ação inválida');</script>";
}

