<?php
    switch($_REQUEST['acao']) {
        case 'cadusuario':
            // Verificar se todos os campos necessários estão definidos
            if (isset($_POST["nome"], $_POST["sexo"], $_POST["provincia"], $_POST["bairro"], $_POST["quarteirao"], $_POST["nrcasa"], $_POST["email"], $_POST["categoria"], $_POST["senha"])) {
                $nome = $_POST["nome"];
                $sexo = $_POST["sexo"];
                $provincia = $_POST["provincia"];
                $bairro = $_POST["bairro"];
                $quarteirao = $_POST["quarteirao"];
                $nrcasa = $_POST["nrcasa"];
                $email = $_POST["email"];
                $categoria = $_POST["categoria"];
                $senha = $_POST["senha"];

                // Usar prepared statements para evitar SQL injection
                $stmt = $conn->prepare("INSERT INTO usuario (nome, sexo, provincia, bairro, quarteirao, nrcasa, email, categoria, senha) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("sssssssss", $nome, $sexo, $provincia, $bairro, $quarteirao, $nrcasa, $email, $categoria, $senha);

                if ($stmt->execute()) {
                    echo "<script>alert('Usuário cadastrado com sucesso...');</script>";
                    echo "<script>location.href='?page=cadastro';</script>";
                } else {
                    echo "<script>alert('Erro ao cadastrar usuário...');</script>";
                    echo "<script>location.href='?page=cadastro';</script>";
                }
                $stmt->close();
            } else {
                echo "<script>alert('Todos os campos são obrigatórios.');</script>";
                echo "<script>location.href='?page=cadastro';</script>";
            }
            break;

        case "editar":
            // Descomente e complete esta seção conforme necessário
            /*
            if (isset($_POST['id_paciente'], $_POST['id_medico'], $_POST['data_consulta'], $_POST['sintomas'])) {
                $id_paciente = $_POST['id_paciente'];
                $id_medico = $_POST['id_medico'];
                $data_consulta = $_POST['data_consulta'];
                $sintomas = $_POST['sintomas'];
                $estado = false;

                $stmt = $conn->prepare("UPDATE consulta SET id_paciente=?, id_medico=?, data_consulta=?, sintomas=?, estado=? WHERE id=?");
                $stmt->bind_param("iissii", $id_paciente, $id_medico, $data_consulta, $sintomas, $estado, $_REQUEST['id']);

                if ($stmt->execute()) {
                    echo "<script>alert('Consulta remarcada com sucesso...');</script>";
                    echo "<script>location.href='?page=visualizar';</script>";
                } else {
                    echo "<script>alert('Erro ao remarcar consulta...');</script>";
                    echo "<script>location.href='?page=visualizar';</script>";
                }
                $stmt->close();
            } else {
                echo "<script>alert('Todos os campos são obrigatórios.');</script>";
                echo "<script>location.href='?page=visualizar';</script>";
            }
            */
            break;

        case "excluir":
            // Descomente e complete esta seção conforme necessário
            /*
            if (isset($_REQUEST['id'])) {
                $stmt = $conn->prepare("DELETE FROM consulta WHERE id=?");
                $stmt->bind_param("i", $_REQUEST['id']);

                if ($stmt->execute()) {
                    echo "<script>alert('Consulta cancelada com sucesso...');</script>";
                    echo "<script>location.href='?page=visualizar';</script>";
                } else {
                    echo "<script>alert('Erro ao cancelar a consulta');</script>";
                    echo "<script>location.href='?page=visualizar';</script>";
                }
                $stmt->close();
            } else {
                echo "<script>alert('ID da consulta não fornecido.');</script>";
                echo "<script>location.href='?page=visualizar';</script>";
            }
            */
            break;
    }


