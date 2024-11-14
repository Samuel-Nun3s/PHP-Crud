<?php 
    $server = "localhost";
    $user = "root";
    $password = "";
    $base_dados = "empresa";

    if ($conn = mysqli_connect($server, $user, $password, $base_dados)) {
        //echo "Conectado!";
    } else {
        echo "Erro!";
    }

    function mensagem($texto, $tipo) {
        echo "<div class='feedback $tipo'>
                <p>$texto</p>
            </div>";
    }

    function mostra_data($data) {
        $d = explode('-', $data);
        $escreve = $d[2] . "/" . $d[1] . "/" . $d[0];
        return $escreve;
    }

    function mover_foto($vetor_foto) {
        $vtipo = explode('/', $vetor_foto['type']);
        $tipo = $vtipo[0] ?? "";
        $extensao = $vtipo[1] ?? "";
        if ((!$vetor_foto['error']) and ($tipo == "image")) {
            $nome_arquivo = date('Ymdhms') . ".$extensao"; 
            move_uploaded_file($vetor_foto['tmp_name'], "img/" . $nome_arquivo);
            return $nome_arquivo;
        } else {
            return 0;
        }
    }

    function clear($conexao, $texto_puro) {
        $texto = mysqli_real_escape_string($conexao, $texto_puro);
        $texto = htmlspecialchars($texto);
        return $texto;
    }

?>