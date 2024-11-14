<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="restrito/css/style.css">
</head>
<body>
    <main>
        <section id="form-initial" class="form">
            <div id="login-header">
                <h1>Login</h1>
                <p>Faça login para acessar o programa</p>
            </div>
            <form action="index.php" method="POST" >
                <div class="form-group">
                    <label for="login">Usuário:</label>
                    <input type="text" name="login" id="login">
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha">
                </div>
                <input type="submit" value="Entrar" class="button button-register success">
            </form>
            <?php
                include "restrito/conexao.php";
                if (isset($_POST['login'])) {
                    $login = mysqli_real_escape_string($conn, $_POST['login']);
                    $senha = mysqli_real_escape_string($conn, md5($_POST['senha']));
                    
                    $sql = "SELECT * from `usuarios` WHERE login = '$login' AND senha = '$senha'";

                    if ($result = mysqli_query($conn, $sql)) {
                        $num_registros = mysqli_num_rows($result);
                        if ($num_registros == 1) { 
                            $linha = mysqli_fetch_assoc($result);
                            if (($login == $linha['login']) and ($senha == $linha['senha'])) {
                                session_start();
                                $_SESSION['login'] = "Samuel";
                                header("location: restrito");
                            } else {
                                echo "login inválido";
                            }
                        } else {
                            echo "<p id='feedback'>Login ou senha inválidos</p>";
                        }
                    } else {
                        echo "Nenhum resultado no Banco de Dados";
                    }
                }
            ?>
        </section>
    </main>
</body>
</html>