<?php
    session_start();
    include_once("conexaoDeDados.php");

    $nome = filter_input(INPUT_POST, 'nome');
    $sobrenome = filter_input(INPUT_POST, 'sobrenome');
    $cargo = filter_input(INPUT_POST, 'cargo');
    $nascimento = filter_input(INPUT_POST, 'nascimento');
    $salario = filter_input(INPUT_POST, 'salario');

    // teste
    // echo "Nome: $nome $sobrenome <br>";
    // echo "Cargo: $cargo";


    // Verificar duplicidade
    $verificar_usuario = "SELECT id FROM funcionarios WHERE nome = '$nome' AND sobrenome = '$sobrenome' AND nascimento = '$nascimento'";
    $resultado = mysqli_query($conn, $verificar_usuario);

    //Caso usuário esteja cadastrado
if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['msg'] = "Usuário já cadastrado. O que deseja fazer?";
    $_SESSION['nome'] = $nome;
    $_SESSION['sobrenome'] = $sobrenome;
    $_SESSION['nascimento'] = $nascimento;
    $_SESSION['cargo'] = $cargo;
    $_SESSION['salario'] = $salario;
    header("Location: #"); // criar página de ações ou modal

} else {
    // Caso não haja cadastro, ele insere ao banco
    $inserir_usuario = "INSERT INTO funcionarios (nome, sobrenome, cargo, nascimento, salario, created)
    VALUES('$nome', '$sobrenome', '$cargo', '$nascimento', '$salario', NOW())";

    $funcionario = mysqli_query($conn, $inserir_usuario);

    if (mysqli_insert_id($conn)){
        $_SESSION['msg'] = "Cadastrado!";
        header("Location: ../pages/home/UserTable.html");
    } else{
        $_SESSION['msg'] = "Ocorreu um erro ao cadastrar!";
        header("Location: ../pages/cadastro/User.php");
    }
}
?>