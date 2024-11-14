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
    <main>
        <section class="form">
            <form action="cadastro_script.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" placeholder=" Nome Completo" required>
                </div>

                <div class="form-group">
                    <label for="endereço">Endereço:</label>
                    <input type="text" name="endereco" placeholder=" Rua..." required>
                </div>

                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" name="telefone" placeholder=" (xx) xxxxx-xxxx" maxlength="14" required>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" placeholder=" exemplo@teste.com" required>
                </div>

                <div class="form-group">
                    <label for="data">Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" required>
                </div>

                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" name="foto" accept="image/*">
                </div>

                <input type="submit" value="Cadastrar" class="button button-register success">

                <a href="index.php" role="button" id="back-home" class="button normal">Voltar para o início</a>

            </form>

        </section>
    </main>
</body>
</html>