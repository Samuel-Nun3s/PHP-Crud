<?php include "../validar.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exclusão de Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
            <?php
                include "conexao.php";

                $id = $_POST['id'];
                $nome = $_POST['nome'];

                $sql = "DELETE from `pessoas` WHERE cod_pessoa = $id";

                if (mysqli_query($conn, $sql)) {
                    mensagem("$nome excluido com sucesso!", "success");
                } else {
                    mensagem("$nome não foi excluido!", "danger");
                }

            ?>
            <div class="botao botao-edit">
                <a href="pesquisa.php">Voltar</a>
            </div>
</body>
</html>