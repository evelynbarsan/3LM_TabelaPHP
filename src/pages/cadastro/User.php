<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../../dist/output.css" rel="stylesheet">
        <script src="../../Scripts/ScriptClick.js"></script>
        <script src="../../Scripts/ScriptPage.js"></script>
        <script src="../../Scripts/ScriptSelectOpcoes.js"></script>
        <link rel="icon" href="../../../assets/img/Icon.svg">
        <title>Novo usuário</title>
    </head>
    <body>
        <header class="fixed grid grid-cols-12 grid-rows-5 top-0 h-20 w-full shadow-md bg-gradient-to-t from-laranja_1 to-laranja_2">
            <img class="flex col-start-1 col-span-2 row-start-2 row-span-3 self-center mx-11 w-40" src="../../../assets/img/Logo.svg">
        </header>

        <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        
        <form class=" grid grid-cols-12 grid-rows-12 w-screen h-screen  bg-cinzaClaro" action="../../PHP/UserDB.php" method="post">
            <div class="col-start-4 col-span-6 row-start-5">
                <input class="h-10 w-325 mr-5 mt-4" type="text" id="nome" name="nome" placeholder="Nome" required>
                <input class="h-10 w-325" type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" required>
            </div>

            <select class="col-start-4 col-span-6 row-start-6 text-cinza h-10 w-675 mt-7" id="cargo" name="cargo" required></select>
            
            <div class="col-start-4 col-span-6 row-start-7 text-cinza">
                <input class="h-10 w-325 mr-5 mt-10" type="date" id="nascimento" name="nascimento" placeholder="Data de nasc.">
                <input class="h-10 w-325" type="number" id="salario" name="salario" placeholder="Salário">
            </div>
            <input class="col-start-6 col-span-2 row-start-10 text-lg text-white bg-verde rounded-md" type="submit" value="Salvar" >
            <a class="flex col-start-6 col-span-2 row-start-11 justify-center mt-2 text-cinza" href="../home/UserTable.html">Cancelar</a>
        </form>
    </body>
</html>