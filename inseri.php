<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('conexao.php');

    // Recebe os dados enviados pelo formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $sexo = $_POST['sexo'];
    $endereco = $_POST['endereco'];
    $cep = $_POST['cep'];
    $email = $_POST['email'];
    $celular = $_POST['telefoneCelular'];
    $login = $_POST['login'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // senha segura
    $data_nascimento = $_POST['data'];
    $nome_materno = $_POST['mae'];

    // Prepara a query conforme sua tabela "cadastro"
    $sql = "INSERT INTO cadastro 
        (nome, cpf, sexo, endereco, cep, email, celular, logins, senha, data_nascimento, nome_materno)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conexao, $sql);
    mysqli_stmt_bind_param(
        $stmt,
        "sssssssssss",
        $nome, $cpf, $sexo, $endereco, $cep, $email,
        $celular, $login, $senha, $data_nascimento, $nome_materno
    );

    // Executa a inserção
    if (mysqli_stmt_execute($stmt)) {
        header("Location: login.php"); // redireciona
        exit();
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }
}
?>
