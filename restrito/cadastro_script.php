<?php include "../validar.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        include "conexao.php";

        $nome = clear($conn, $_POST['nome']);
        $endereco = clear($conn, $_POST['endereco']);
        $telefone = clear($conn, $_POST['telefone']);
        $email = clear($conn, $_POST['email']);
        $data_nascimento = $_POST['data_nascimento'];

        /* Atributos do vetor FILES: $_FILES['nome']['atributos'];
        name: exemplo.jpg
        type: image/jpeg
        tmp_name: "C:\xampp\tmp\php84DB.tmp"
        error: 0 = tudo certo / 1 = deu erro
        size: 72889 
        */

        $foto = $_FILES['foto'];
        $nome_foto = mover_foto($foto);
        if ($nome_foto == 0) {
            $nome_foto = null;
        }

        $sql = "INSERT INTO `pessoas`(`nome`, `endereco`, `telefone`, `email`, `data_nascimento`, `foto`) VALUES ('$nome','$endereco','$telefone','$email','$data_nascimento', '$nome_foto')";

        if (mysqli_query($conn, $sql)) {
            if ($nome_foto != null) {
                echo "<img src=img/$nome_foto> title='$nome_foto";
            }
            mensagem("$nome cadastrado com sucesso!", "success");
        } else {
            mensagem("$nome não foi cadastrado!", "danger");
        }

    ?>
    <a href="index.php" class="button normal" id="back-home">Voltar</a>
</body>
</html>