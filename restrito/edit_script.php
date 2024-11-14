<?php include "../validar.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
            <?php
                include "conexao.php";

                $id = $_POST['id'];
                $nome = $_POST['nome'];
                $endereco = $_POST['endereco'];
                $telefone = $_POST['telefone'];
                $email = $_POST['email'];
                $data_nascimento = $_POST['data_nascimento'];

                // $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento')";

                $sql = "UPDATE `pessoas` set `nome` = '$nome', `endereco` = '$endereco', `telefone` = '$telefone', `email` = '$email', `data_nascimento` = '$data_nascimento' WHERE cod_pessoa = $id";

                if (mysqli_query($conn, $sql)) {
                    mensagem("$nome alterado com sucesso!", "success");
                } else {
                    mensagem("$nome não foi alterado!", "danger");
                }

            ?>
            <div class="botao botao-edit">
                <a href="pesquisa.php">Voltar</a>
            </div>
</body>
</html>