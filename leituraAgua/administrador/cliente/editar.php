<?php 
$sql="SELECT * FROM usuario WHERE id={$_REQUEST['id']}";
$res=$conn->query($sql);
$row=$res->fetch_object();
?>
<div class="container d-flex justify-content-center align-items-center min-vh-100 style='background-color:azure'">
        <div class="register-container">
            <h2 class="text-center text-dark">Actualizar cliente</h2>
            <form action="?page=operacliente" method="POST" class="px-5">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id" value="<?php print($row->id); ?>">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php print($row->nome); ?>" class="form-control">
                </div>
                <div class="form-group">
                        <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo">
                        <option value=""><?php print($row->sexo); ?></option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="provincia">Província:</label>
                    <input type="text" id="provincia" name="provincia" value="<?php print($row->provincia); ?>" >
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" value="<?php print($row->bairro); ?>">
                </div>
                <div class="form-group">
                    <label for="quarteirao">Quarteirão:</label>
                    <input type="number" id="quarteirao" name="quarteirao" value="<?php print($row->quarteirao); ?>">
                </div>
                <div class="form-group">
                    <label for="nrcasa">Número de casa:</label>
                    <input type="number" id="nrcasa" name="nrcasa"  value="<?php print($row->nrcasa); ?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email"  value="<?php print($row->email); ?>" >
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="Actulizar" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
