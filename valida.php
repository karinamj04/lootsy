<?php
session_start();
include("conexao.php");

// Se já estiver logado, manda para o painel
if (isset($_SESSION['usuario'])) {
    header("Location: painel.php");
    exit();
}

// Se o formulário de login foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email'] ?? '');
    $senha = trim($_POST['senha'] ?? '');

    // Busca usuário pelo e-mail
    $sql = $conexao->prepare("SELECT cpf, senha FROM cadastro WHERE email = ?");
    $sql->bind_param("s", $email);
    $sql->execute();
    $resultado = $sql->get_result();

    // Se encontrou o e-mail
    if ($resultado->num_rows === 1) {

        $usuario = $resultado->fetch_assoc();

        // Verifica senha
        if (password_verify($senha, $usuario['senha'])) {

            // Guarda CPF para etapa 2FA
            $_SESSION['cpf_2fa'] = $usuario['cpf'];

            // Limpa qualquer pergunta anterior
            unset($_SESSION['pergunta_atual']);

            header("Location: autenticar.php");
            exit();
        } 
        else {
            $_SESSION['erro_login'] = "Senha incorreta.";
            header("Location: login.php");
            exit();
        }
    } 
    else {
        $_SESSION['erro_login'] = "E-mail não encontrado.";
        header("Location: login.php");
        exit();
    }
}
?>
