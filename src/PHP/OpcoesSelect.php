<?php
    session_start();
    include_once("conexaoDeDados.php");

    //Gerar busca no banco de dados
    $query = "SELECT id, cargo FROM cargos ORDER BY cargo ASC";
    $result = mysqli_query($conn, $query);

    $opcoes = array();

    $opcaoPlaceholder = array("id" => "", "cargo" =>"Cargo");
    $opcoes[] = $opcaoPlaceholder;

    while ($row = mysqli_fetch_assoc($result)){
        $opcoes[] = $row;
    }
    echo json_encode($opcoes);
?>