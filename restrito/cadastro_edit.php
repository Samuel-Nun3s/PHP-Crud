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
    
        $id = $_GET['id'] ?? '';

        $sql = "SELECT * FROM pessoas WHERE cod_pessoa = $id";
        $dados = mysqli_query($conn, $sql);
        $linha = mysqli_fetch_assoc($dados);

    ?>

    <main>
        <section id="formulario">
            <form action="edit_script.php" method="POST">

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" placeholder=" Nome Completo" required value="<?php echo $linha['nome']?>">
                </div>

                <div class="form-group">
                    <label for="endereço">Endereço:</label>
                    <input type="text" name="endereco" placeholder=" Rua..." required value="<?php echo $linha['endereco']?>">
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" placeholder=" (xx) xxxxx-xxxx" maxlength="14" required value="<?php echo $linha['telefone']?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder=" exemplo@teste.com" required value="<?php echo $linha['email']?>">
                </div>

                <div class="form-group">
                    <label for="data">Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" required value="<?php echo $linha['data_nascimento']?>">
                </div>

                <input type="submit" value="Salvar Alterações" class="button">
                <input type="hidden" name="id" value="<?php echo $linha['cod_pessoa']?>">

            </form>

            <div class="botao botao-cadastro">
                <a href="index.php">Voltar para o início</a>
            </div>

        </section>
    </main>
</body>
</html>