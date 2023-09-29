<?php
    session_start();
    include_once("conexaoDeDados.php");

    $cargo = filter_input(INPUT_POST, 'cargo');
    $descricao = filter_input(INPUT_POST, 'descricao');

    //Verificar duplicidade
    $verificar_cargo = "SELECT id FROM cargos WHERE cargo='$cargo' ";
    $resultado = mysqli_query($conn, $verificar_cargo);

    if (mysqli_num_rows($resultado) > 0){
        $_SESSION['msg'] = "Cargo já cadastrado, o que deseja fazer?";
        $_SESSION['cargo'] = $cargo;
        $_SESSION['descricao'] = $descricao;
        header("Location:#"); //editar 
    }else{
        $inserir_cargo = "INSERT INTO cargos (cargo, descricao, created)
        VALUES('$cargo', '$descricao', NOW())";

        $cargo = mysqli_query($conn, $inserir_cargo);

        if(mysqli_insert_id($conn)){
            $_SESSION['msg'] = "cadastrado!";
            header("Location: ../pages/home/OfficeTable.html");
        } else{
            $_SESSION['msg'] = "Ocorreu um erro ao cadastrar!";
            header("Location: ../pages/home/OfficeTable.html");
        }
    }

?>