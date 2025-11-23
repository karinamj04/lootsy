<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro - Lootsy</title>
  <meta name="description" content="Cadastro de usuário na plataforma Lootsy, onde você pode criar sua conta na nossa plataforma!.">

  <!-- CSS e CSS bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles/cadastro.css">
  <link rel="shortcut icon" href="assets/images/imagem_da_logo.png" type="image/x-icon">

  <!-- Fonte -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet"/>
</head>

<body>

  <!-- Cabeçalho da página -->
  <header class="cabecalho">
    <div class="icone">
      <a href="../home.php">
        <img src="assets/images/logo+nome.png" alt="Lootsy">
      </a>
    </div>
     
    <div class="trilho" id="trilho">
      <div class="indicador"></div>
    </div>
  </header>
  <!-- Final do header -->

  <main class="container-fluid">
    <section>
      <div class="cadastro">
        <div class="lootsy-body">
          <a href="../home.php">
            <img src="assets/images/logo+nome.png" alt="Lootsy">
          </a>
        </div>

        <!-- Formulário de cadastro -->
        <form action="inseri.php" method="post" class="formulario" id="formCadastro">

          <div class="form-group">
            <label for="nome" class="parametros">Nome Completo</label>
            <input type="text" id="nome" name="nome" class="form-control" minlength="15" maxlength="60" autocomplete="name" required>
          </div>

          <div class="form-group">
            <label for="sexo" class="parametros">Sexo</label>
            <select id="sexo" name="sexo" class="form-control" required>
              <option value="" disabled selected>Selecione</option>
              <option value="Masculino">Masculino</option>
              <option value="Feminino">Feminino</option>
              <option value="Outro">Outro</option>
            </select>
          </div>

          <div class="form-group">
            <label for="data" class="parametros">Data de Nascimento</label>
            <input type="date" id="data" name="data" class="form-control" autocomplete="bday" min="1900-01-01" max="2030-01-01" required>
          </div>

          <div class="form-group">
            <label for="mae" class="parametros">Nome Materno</label>
            <input type="text" id="mae" name="mae" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="email" class="parametros">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" autocomplete="email" required>
          </div>

          <div class="form-group">
            <label for="telefone" class="parametros">Telefone Celular</label>
            <input type="tel" id="telefoneCelular" name="telefoneCelular" class="form-control" title="Formato válido: +55 21 99999-9999" autocomplete="tel-local" required>
            <small class="padraotelefone">Formato: (+55)XX-XXXXXXXX</small>
          </div>

          <div class="form-group">
            <label for="cep" class="parametros">CEP</label>
            <input type="text" id="cep" name="cep" class="form-control" placeholder="Ex: 21000-000" required>
            <small class="padraotelefone">Formato: XXXXX-XXX</small>
          </div>

          <div class="form-group">
            <label for="cpf" class="parametros">CPF</label>
            <input type="text" id="cpf" name="cpf" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="endereco" class="parametros">Endereço Completo</label>
            <input type="text" id="endereco" name="endereco" class="form-control" autocomplete="street-address" required>
          </div>

          <div class="form-group">
            <label for="login" class="parametros">Login</label>
            <input type="text" id="login" name="login" class="form-control" maxlength="6" required>
            <small class="padraologin">Exatamente 6 caracteres alfabéticos.</small>
          </div>

          <div class="form-group">
            <label for="senha" class="parametros">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" maxlength="8" required>
            <small class="padraosenha">Exatamente 8 caracteres alfabéticos.</small>
          </div>

          <div class="form-group">
            <label for="confirmarSenha" class="parametros">Confirmar Senha</label>
            <input type="password" id="confirmarSenha" name="confirmarSenha" class="form-control" maxlength="8" autocomplete="new-password" required>
          </div>

          <div class="botoes">
            <input type="submit" name="submit" value="CADASTRAR" id="botao">
            <button type="reset" id="limpar">LIMPAR</button>
          </div>

          <p class="login_mensagem">JÁ POSSUI UMA CONTA? 
            <a href="login.php" class="login">FAÇA SEU LOGIN</a>
          </p>

          <div id="mensagem"></div>

        </form>
      </div>
    </section>
  </main>

  <!-- Jquery e JS bootstrap -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- JS -->
  <script src="js/cadastro.js"></script>
  
</body>
</html>
