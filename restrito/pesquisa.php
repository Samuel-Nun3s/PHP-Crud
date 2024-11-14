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
        include 'conexao.php';

        $pesquisa = $_POST['busca'] ?? '';

        $sql = "SELECT * FROM pessoas WHERE nome LIKE '%$pesquisa%'";

        $dados = mysqli_query($conn, $sql);

        ?>

    <main>
        <section id="tabela">
            <h1>Pesquisar</h1>

            <form action="pesquisa.php" method="POST">
                <input type="search" name="busca" id="pesquisa" placeholder="Nome" autofocus>
                <button id="pesquisar-botao" class="button normal">Pesquisar</button>
            </form>
            
            <div id="container">
                <table>
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Telefone</th>
                            <th>Email</th>
                            <th>Data de Nascimento</th>
                            <th>Funções</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                        while ($linha = mysqli_fetch_assoc($dados)) {
                            $cod_pessoa = $linha['cod_pessoa'];
                            $nome = $linha['nome'];
                            $endereco = $linha['endereco'];
                            $telefone = $linha['telefone'];
                            $email = $linha['email'];
                            $data_nascimento = $linha['data_nascimento'];
                            $data_nascimento = mostra_data($data_nascimento);
                            $foto = $linha['foto'];
                            if (!$foto == null) {
                                $mostra_foto = "<img id='image-table' src='img/$foto'>";
                            } else {
                                $mostra_foto = "";
                            }

                            echo "<tr>
                                    <td>$mostra_foto</td>
                                    <td>$nome</td>
                                    <td>$endereco</td>
                                    <td class='numero-tabela'>$telefone</td>
                                    <td>$email</td>
                                    <td>$data_nascimento</td>
                                    <td>
                                    <a href='cadastro_edit.php?id=$cod_pessoa' class='button button-edit normal'>
                                    Editar
                                    </a>

                                    <a href='#' onclick=" . '"' . "pegar_dados('$cod_pessoa', '$nome')" . '"' . " class='button button-delet danger open-modal'>
                                    Excluir
                                    </a>
                                    </td>
                                </tr>";
                        }

                    ?>

                    </tbody>
                </table>
            </div>

            
            <div id="table-footer">
                <a href="index.php" class="button normal" id="back-home">Voltar para o início</a>
            </div>

             <!-- MODAL -->
            <div id="fade" class="hide"></div>
            <div id="modal" class="hide">
                <div class="modal-header">
                    <h2>Confirmação de exclusão</h2>
                </div>
                <div class="modal-body">
                    <form action="delet_script.php" method="POST">
                    <p>Deseja realmente excluir?</p>
                    <p id="nome_pessoa">...</p>
                </div>
                <div class="modal-footer">
                    <button class="botao modal-close" id="close-modal">Não</button>
                    <input type="hidden" name="id" id="cod_pessoa" value="">
                    <input type="hidden" name="nome" id="nome_pessoa_1" value="">
                    <input class="botao modal-delet" type="submit" value="Sim">
                    </form>
                </div>
            </div>

        </section>
    </main>
    <script src="js/script.js"></script>
</body>
</html>
