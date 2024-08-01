<div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="register-container">
            <h2 class="text-center">Cadastro</h2>
            <form action="?page=operacoes" method="POST" class="px-5">
                <input type="hidden" name="acao" value="cadusuario">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required class="form-control">
                </div>
                <div class="form-group">
                        <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" required>
                        <option value="">Selecione</option>
                        <option value="masculino">Masculino</option>
                        <option value="feminino">Feminino</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="provincia">Província:</label>
                    <input type="text" id="provincia" name="provincia" required>
                </div>
                <div class="form-group">
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="bairro" required>
                </div>
                <div class="form-group">
                    <label for="quarteirao">Quarteirão:</label>
                    <input type="number" id="quarteirao" name="quarteirao" required>
                </div>
                <div class="form-group">
                    <label for="nrcasa">Número de casa:</label>
                    <input type="number" id="nrcasa" name="nrcasa" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoria:</label>
                    <select id="categoria" name="categoria" required>
                        <option value="">Selecione</option>
                        <option value="Cliente">Cliente</option>
                        <option value="Leiturista">Leiturista</option>
                    </select>
                </div>
                <div class="form-group">
                        <label for="senha">Senha:</label>
                        <input type="password" id="senha" name="senha" value="12345" readonly required>
                </div>
                <!-- <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" id="confirm-password" name="confirm-password" required class="form-control">
                </div> -->
                <div class="form-group text-center">
                    <input type="submit" value="Cadastrar" class="btn btn-primary btn-block">
                </div>
            </form>
        </div>
    </div>
